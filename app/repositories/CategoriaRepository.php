<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\Categoria;
use \Exception;

class CategoriaRepository
{
    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_categoria';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de uma categoria específica após consulta
     * @var Categoria
     */
    private Categoria $categoria;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->db->consultar($sql, []);

        if (count($result) > 0) {
            return $this->generateObjectsList($result);
        } else {
            return [];
        }
    }

    public function create(array $data): bool
    {
        $data['ativo'] = true;
        //echo"<pre>";var_dump($data);
        $parametros = [
            'ds_categoria' => $data['descricao'],
            'tipo' => $data['tipo'],
            'cod_categoria' => $data['codigo'],
            'ativo' => $data['ativo']
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $categoria = new Categoria(
                $this->db->getLastInsertId(),
                $data['descricao'],
                $data['tipo'],
                $data['codigo'],
                $data['ativo']
            );
            $this->categoria = $categoria;
            return true;
        }
        return false;
    }

    public function update(Categoria $categoria): bool
    {
        try {
            $dados = [
                'ds_categoria' => $categoria->getDescricao(),
                'tipo' => $categoria->getTipo(),
                'cod_categoria' => $categoria->getCodCategoria(),
                'ativo' => $categoria->isAtivo()
            ];

            $condicao = ['id' => $categoria->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar categoria: " . $e->getMessage());
        }
    }

    public function delete(Categoria $categoria): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $categoria->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir categoria: " . $e->getMessage());
        }
    }

    public function find(int $id): ?Categoria
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generateObject($resultado[0]);
            } else {
                return null;
            }
        } catch (Exception $e) {
            throw new Exception("Nenhuma categoria encontrada com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?Categoria
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) == 1) {
            return $this->generateObject($resultado[0]);
        } else {
            return null;
        }
    }

    public function count(): int
    {
        return sizeof($this->all());
    }

    private function generateObjectsList(array $categoriasList): array
    {
        $categorias = [];
        foreach ($categoriasList as $categoria) {
            $categorias[] = $this->generateObject($categoria);
        }
        return $categorias;
    }

    private function generateObject(array $categoriaReg): Categoria
    {
        $codigo = $categoriaReg['cod_categoria'] == null ? "" : $categoriaReg['cod_categoria'];
        return new Categoria(
            $categoriaReg['id'],
            $categoriaReg['ds_categoria'],
            $categoriaReg['tipo'],
            $codigo,
            (int) $categoriaReg['ativo']
        );
    }
}