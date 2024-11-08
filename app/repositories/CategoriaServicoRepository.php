<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\CategoriaServico;
use \Exception;

class CategoriaServicoRepository
{
    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_categoria_servico';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um serviço de categoria específico após consulta
     * @var CategoriaServico
     */
    private CategoriaServico $categoriaServico;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getCategoriaServico(): CategoriaServico
    {
        return $this->categoriaServico;
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
        $parametros = [
            'id_categoria' => $data['categoria']->getId(),
            'ds_categoriaServico' => $data['dsCategoriaServico'],
            'ativo' => $data['ativo']
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $categoriaServico = new CategoriaServico(
                $this->db->getLastInsertId(),
                $data['categoria'],
                $data['dsCategoriaServico'],
                $data['ativo']
            );
            $this->categoriaServico = $categoriaServico;
            return true;
        }
        return false;
    }

    public function update(CategoriaServico $categoriaServico): bool
    {
        try {
            $dados = [
                'id_categoria' => $categoriaServico->getCategoria()->getId(),
                'ds_categoriaServico' => $categoriaServico->getDescricao(),
                'ativo' => $categoriaServico->isAtivo()
            ];

            $condicao = ['id' => $categoriaServico->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar categoria de serviço: " . $e->getMessage());
        }
    }

    public function delete(CategoriaServico $categoriaServico): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $categoriaServico->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir categoria de serviço: " . $e->getMessage());
        }
    }

    public function find(int $id): ?CategoriaServico
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
            throw new Exception("Nenhuma categoria de serviço encontrada com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) > 1) {
            return $this->generateObjectsList($resultado);
        } else {
            return [];
        }
    }

    public function count(): int
    {
        return sizeof($this->all());
    }

    private function generateObjectsList(array $categoriaServicoList): array
    {
        $categoriaServicos = [];
        foreach ($categoriaServicoList as $categoriaServico) {
            $categoriaServicos[] = $this->generateObject($categoriaServico);
        }
        return $categoriaServicos;
    }

    private function generateObject(array $categoriaServicoReg): CategoriaServico
    {
        $categoriaRepository = new CategoriaRepository($this->db);
        $categoria = $categoriaRepository->find($categoriaServicoReg['id_categoria']);

        return new CategoriaServico(
            $categoriaServicoReg['id'],
            $categoria,
            $categoriaServicoReg['ds_categoriaServico'],
            $categoriaServicoReg['ativo']
        );
    }
}