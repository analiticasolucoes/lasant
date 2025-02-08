<?php

namespace App\Repositories;

use App\Database\Database;
use Exception;
use ReflectionClass;

class Repository
{
    private Database $db;
    private string $className;
    private array $fields = [];

    private $object = null;

    /**
     * Constrói uma nova instância do repositório.
     *
     * @param Database $db Instância da classe de conexão com o banco de dados.
     * @param string $className Nome da classe do modelo.
     * @throws \ReflectionException
     */
    public function __construct(Database $db, string $className)
    {
        $this->db = $db;
        $this->className = "App\\Models\\".$className;

        $reflectionClass = new ReflectionClass($this->className);
        $this->fields = $this->getFieldsFromModel($reflectionClass);
    }

    /**
     * Cria um novo registro no banco de dados a partir de um objeto.
     *
     * Este método utiliza reflexão para inspecionar as propriedades do objeto e construir um array de
     * parâmetros para a inserção no banco de dados. Ele trata objetos DateTime, objetos com método getId()
     * e remove o elemento 'id' do array de parâmetros se existir.
     *
     * @param object $object O objeto a ser persistido.
     * @return bool Retorna TRUE se a inserção for bem-sucedida, FALSE caso contrário.
     * @throws \ReflectionException Se ocorrer um erro durante a reflexão.
     * @throws \Exception Se ocorrer qualquer outra exceção.
     */
    public function create($object): bool
    {
        $reflectionClass = new ReflectionClass($this->className);

        $parametros = [];
        foreach ($this->fields as $fieldConfig) {
            $property = $fieldConfig['atributo'];
            $column = $fieldConfig['campo'];

            $reflectionProperty = $reflectionClass->getProperty($property);
            $reflectionProperty->setAccessible(true);

            $value = $reflectionProperty->getValue($object);

            // Tratamento para objetos
            if (is_object($value)) {
                if ($value instanceof \DateTime) {
                    // Formata a data para o formato desejado (ajuste o formato conforme necessário)
                    $value = $value->format('Y-m-d H:i:s');
                }
                // Tenta recuperar o ID através do método getId()
                if (method_exists($value, 'getId')) {
                    $value = $value->getId();
                } else {
                    // Se não tiver o método getId() nem for DateTime, trata como um objeto complexo
                    // (implementar lógica para objetos complexos aqui)
                }
            }

            $parametros[$column] = $value;
        }
        // Remove o elemento 'id' do array, se existir
        if (array_key_exists('id', $parametros)) {
            unset($parametros['id']);
        }

        if($reflectionClass->getProperty("tabela")->getValue($object)) {
            $object->setId($this->db->getLastInsertId());
            $this->object = $object;
            return true;
        } else return false;
    }

    /**
     * Atualiza um registro no banco de dados com base nos dados de um objeto.
     *
     * Este método utiliza reflexão para inspecionar as propriedades do objeto e construir um array de
     * dados para a atualização no banco de dados. Ele trata objetos DateTime, objetos com método getId()
     * e remove o elemento 'id' do array de dados antes de construir a condição de atualização.
     *
     * **Importante:** O objeto passado como parâmetro deve ter propriedades públicas ou métodos getters
     * para as propriedades que serão atualizadas. Além disso, o objeto deve possuir um atributo 'id' que
     * será utilizado como chave para a atualização.
     *
     * @param object $object O objeto a ser atualizado. Deve ser uma instância de uma classe que representa
     *                      uma entidade a ser armazenada no banco de dados.
     * @return bool Retorna TRUE se a atualização for bem-sucedida, FALSE caso contrário.
     * @throws \ReflectionException Se ocorrer um erro durante a reflexão.
     * @throws \Exception Se ocorrer qualquer outra exceção.
     * @see \ReflectionClass Para mais informações sobre a classe ReflectionClass.
     */
    public function update($object): bool
    {
        $reflectionClass = new ReflectionClass($object);
        $className = $reflectionClass->getName();

        $dados = [];
        foreach ($this->fields as $fieldConfig) {
            $property = $fieldConfig['atributo'];
            $column = $fieldConfig['campo'];

            $reflectionProperty = $reflectionClass->getProperty($property);
            $reflectionProperty->setAccessible(true);

            $value = $reflectionProperty->getValue($object);

            // Tratamento para objetos (similar ao create())
            if (is_object($value)) {
                if ($value instanceof \DateTime) {
                    $value = $value->format('Y-m-d H:i:s');
                } else if (method_exists($value, 'getId')) {
                    $value = $value->getId();
                } else {
                    // ... (implementar lógica para objetos complexos)
                }
            }

            $dados[$column] = $value;
        }

        // Remove o elemento 'id' do array, se existir (já que é a chave da condição)
        if (array_key_exists('id', $dados)) {
            unset($dados['id']);
        }

        // Obtém o ID do objeto
        $id = $reflectionClass->getProperty('id')->getValue($object);

        $condicao = ['id' => $id];

        try {
            return $this->db->atualizar($reflectionClass->getProperty("tabela")->getValue($object), $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar o objeto: " . $e->getMessage());
        }
    }

    /**
     * Exclui um registro do banco de dados com base no ID do objeto.
     *
     * Este método utiliza reflexão para obter o atributo 'id' do objeto e construir uma condição de exclusão.
     * É esperado que o objeto passado como parâmetro possua um atributo 'id' que represente a chave primária.
     *
     * @param object $object O objeto a ser excluído. Deve possuir um atributo 'id'.
     * @return bool Retorna TRUE se a exclusão for bem-sucedida, FALSE caso contrário.
     * @throws \Exception Se ocorrer algum erro durante a exclusão.
     * @see \ReflectionClass Para mais informações sobre a classe ReflectionClass.
     */
    public function delete($object): bool
    {
        $reflectionClass = new ReflectionClass($object);

        // Obtém o ID do objeto
        $id = $reflectionClass->getProperty('id')->getValue($object);

        $condicao = "id = :id";
        $parametro = ['id' => $id];
echo "<pre>";var_dump($object);die;
        try {
            return (bool) $this->db->excluir($reflectionClass->getProperty("tabela")->getValue($object), $condicao, $parametro);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir o objeto: " . $e->getMessage());
        }
    }

    /**
     * Busca um registro no banco de dados com base no ID e retorna um objeto da classe especificada.
     *
     * Este método executa uma consulta SQL para buscar um registro com o ID fornecido na tabela
     * correspondente à classe especificada. O resultado da consulta é mapeado para um objeto da
     * classe informada utilizando o método `hydrateObject`.
     *
     * @param string $className O nome da classe do objeto a ser retornado.
     * @param int $id O ID do registro a ser buscado.
     * @return object|null Retorna um objeto da classe informada se o registro for encontrado, caso contrário retorna null.
     * @throws \Exception Se ocorrer algum erro durante a consulta ou a conversão do objeto.
     */
    public function find(string $className, int $id): ?object
    {
        try {
            $query = "SELECT * FROM $className WHERE id = :id";
            $params = ['id' => $id];
            $result = $this->db->consultar($query, $params);

            if (count($result) == 1) {
                $reflectionClass = new ReflectionClass($className);
                $object = $reflectionClass->newInstance();
                $this->hydrateObject($object, $result[0]);
                return $object;
            } else {
                return null;
            }
        } catch (\PDOException $e) {
            throw new \Exception("Erro ao executar a consulta: " . $e->getMessage());
        } catch (\ReflectionException $e) {
            throw new \Exception("Classe $className não encontrada: " . $e->getMessage());
        }
    }

    /**
     * Busca registros no banco de dados com base em uma condição e retorna um array de objetos.
     *
     * Este método executa uma consulta SQL para buscar registros que satisfaçam a condição especificada
     * na tabela correspondente à classe informada. Os resultados da consulta são mapeados para um array
     * de objetos da classe informada utilizando o método `hydrateObject`.
     *
     * @param string $className O nome da classe dos objetos a serem retornados.
     * @param string $column O nome da coluna para a condição WHERE.
     * @param mixed $value O valor a ser utilizado na condição WHERE.
     * @return array Um array de objetos da classe informada.
     * @throws \Exception Se ocorrer algum erro durante a consulta ou a conversão dos objetos.
     */
    public function findBy(string $className, string $column, $value): array
    {
        try {
            $query = "SELECT * FROM $className WHERE $column = :{$column}";
            $params = [$column => $value];
            $result = $this->db->consultar($query, $params);

            $reflectionClass = new ReflectionClass($className);
            $objects = [];
            foreach ($result as $row) {
                $object = $reflectionClass->newInstance();
                $this->hydrateObject($object, $row);
                $objects[] = $object;
            }

            return $objects;
        } catch (\PDOException $e) {
            throw new \Exception("Erro ao executar a consulta: " . $e->getMessage());
        } catch (\ReflectionException $e) {
            throw new \Exception("Classe $className não encontrada: " . $e->getMessage());
        }
    }

    /**
     * Recupera todos os registros da tabela correspondente à classe.
     *
     * Este método executa uma consulta SQL para recuperar todos os registros da tabela
     * correspondente à classe e os converte em um array de objetos.
     *
     * @return array Um array de objetos da classe.
     * @throws \Exception Se ocorrer algum erro durante a consulta ou a conversão dos objetos.
     */
    public function all(): array
    {
        $className = $this->className;
        $query = "SELECT * FROM $className";
        $result = $this->db->consultar($query, []);

        $objects = [];
        foreach ($result as $row) {
            $object = new $className;
            $this->hydrateObject($object, $row);
            $objects[] = $object;
        }

        return $objects;
    }

    /**
     * Obtém a lista de campos do modelo.
     *
     * Este método utiliza reflexão para instanciar um objeto da classe do modelo e obter a lista de campos
     * definidos na propriedade 'campos' do modelo.
     *
     * @param ReflectionClass $reflectionClass A instância da classe ReflectionClass do modelo.
     * @return array Um array associativo contendo a lista de campos do modelo.
     * @throws \ReflectionException Se ocorrer um erro durante a reflexão.
     * @throws \Exception Se a propriedade 'campos' não for encontrada no modelo.
     */
    private function getFieldsFromModel(ReflectionClass $reflectionClass): array
    {
        $model = $reflectionClass->newInstanceWithoutConstructor();

        if (!property_exists($model, 'campos')) {
            throw new \Exception("A propriedade 'campos' não foi encontrada na classe " . $reflectionClass->getName());
        }

        return $model->getCampos();
    }

    /**
     * Hidrata um objeto com os dados de um array.
     *
     * Este método atribui os valores do array às propriedades correspondentes do objeto,
     * utilizando a reflexão para identificar as propriedades e seus valores.
     *
     * @param object $object O objeto a ser hidratado.
     * @param array $data O array com os dados a serem atribuídos ao objeto.
     * @return void
     */

    private function hydrateObject(object $object, array $data): void
    {
        $reflectionClass = new ReflectionClass($object);
        foreach ($data as $property => $value) {
            if ($reflectionClass->hasProperty($property)) {
                $property = $reflectionClass->getProperty($property);
                $property->setAccessible(true);
                $property->setValue($object, $value);
            }
        }
    }

    public function getObject(): object
    {
        return $this->object;
    }
}