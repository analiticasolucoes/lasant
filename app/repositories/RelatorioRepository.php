<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\Relatorio;
use Exception;

class RelatorioRepository
{
    protected string $table = 'ta_relatorios';
    private Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generateObjectsList($result);
        }
        return [];
    }

    public function create(array $data): bool
    {
        $parametros = [
            'nome_relatorio' => $data['nome_relatorio'],
            'tipo_rel' => $data['tipo_rel'],
            'caminho' => $data['caminho'],
            'p1' => $data['p1'],
            'tipo1' => $data['tipo1'],
            'tabela1' => $data['tabela1'],
            'coluna1' => $data['coluna1'],
            'nome1' => $data['nome1'],
            'p2' => $data['p2'],
            'tipo2' => $data['tipo2'],
            'tabela2' => $data['tabela2'],
            'coluna2' => $data['coluna2'],
            'nome2' => $data['nome2'],
            'p3' => $data['p3'],
            'tipo3' => $data['tipo3'],
            'tabela3' => $data['tabela3'],
            'coluna3' => $data['coluna3'],
            'nome3' => $data['nome3'],
            'p4' => $data['p4'],
            'tipo4' => $data['tipo4'],
            'tabela4' => $data['tabela4'],
            'coluna4' => $data['coluna4'],
            'nome4' => $data['nome4'],
            'p5' => $data['p5'],
            'tipo5' => $data['tipo5'],
            'tabela5' => $data['tabela5'],
            'coluna5' => $data['coluna5'],
            'nome5' => $data['nome5'],
            'p6' => $data['p6'],
            'tipo6' => $data['tipo6'],
            'tabela6' => $data['tabela6'],
            'coluna6' => $data['coluna6'],
            'nome6' => $data['nome6']
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            return true;
        }
        return false;
    }

    public function update(Relatorio $relatorio): bool
    {
        try {
            $dados = [
                'nome_relatorio' => $relatorio->getNome(),
                'tipo_rel' => $relatorio->getTipo(),
                'caminho' => $relatorio->getCaminho(),
                'p1' => $relatorio->getP1(),
                'tipo1' => $relatorio->getTipo1(),
                'tabela1' => $relatorio->getTabela1(),
                'coluna1' => $relatorio->getColuna1(),
                'nome1' => $relatorio->getNome1(),
                'p2' => $relatorio->getP2(),
                'tipo2' => $relatorio->getTipo2(),
                'tabela2' => $relatorio->getTabela2(),
                'coluna2' => $relatorio->getColuna2(),
                'nome2' => $relatorio->getNome2(),
                'p3' => $relatorio->getP3(),
                'tipo3' => $relatorio->getTipo3(),
                'tabela3' => $relatorio->getTabela3(),
                'coluna3' => $relatorio->getColuna3(),
                'nome3' => $relatorio->getNome3(),
                'p4' => $relatorio->getP4(),
                'tipo4' => $relatorio->getTipo4(),
                'tabela4' => $relatorio->getTabela4(),
                'coluna4' => $relatorio->getColuna4(),
                'nome4' => $relatorio->getNome4(),
                'p5' => $relatorio->getP5(),
                'tipo5' => $relatorio->getTipo5(),
                'tabela5' => $relatorio->getTabela5(),
                'coluna5' => $relatorio->getColuna5(),
                'nome5' => $relatorio->getNome5(),
                'p6' => $relatorio->getP6(),
                'tipo6' => $relatorio->getTipo6(),
                'tabela6' => $relatorio->getTabela6(),
                'coluna6' => $relatorio->getColuna6(),
                'nome6' => $relatorio->getNome6(),
            ];

            $condicao = ['id' => $relatorio->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar o relatório: " . $e->getMessage());
        }
    }

    public function delete(Relatorio $relatorio): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $relatorio->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir o relatório: " . $e->getMessage());
        }
    }

    public function find(int $id): ?Relatorio
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
            throw new Exception("Nenhum relatório encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);
        if (count($resultado) > 0) {
            return $this->generateObjectsList($resultado);
        } else {
            return [];
        }
    }

    private function generateObjectsList(array $relatoriosList): array
    {
        $relatorios = [];
        foreach ($relatoriosList as $relatorio) {
            $relatorios[] = $this->generateObject($relatorio);
        }
        return $relatorios;
    }

    private function generateObject(array $relatorioReg): Relatorio
    {
        return new Relatorio(
            $relatorioReg['id'],
            $relatorioReg['nome_relatorio'],
            $relatorioReg['tipo_rel'],
            $relatorioReg['caminho'],
            $relatorioReg['p1'],
            $relatorioReg['tipo1'],
            $relatorioReg['tabela1'],
            $relatorioReg['coluna1'],
            $relatorioReg['nome1'],
            $relatorioReg['p2'],
            $relatorioReg['tipo2'],
            $relatorioReg['tabela2'],
            $relatorioReg['coluna2'],
            $relatorioReg['nome2'],
            $relatorioReg['p3'],
            $relatorioReg['tipo3'],
            $relatorioReg['tabela3'],
            $relatorioReg['coluna3'],
            $relatorioReg['nome3'],
            $relatorioReg['p4'],
            $relatorioReg['tipo4'],
            $relatorioReg['tabela4'],
            $relatorioReg['coluna4'],
            $relatorioReg['nome4'],
            $relatorioReg['p5'],
            $relatorioReg['tipo5'],
            $relatorioReg['tabela5'],
            $relatorioReg['coluna5'],
            $relatorioReg['nome5'],
            $relatorioReg['p6'],
            $relatorioReg['tipo6'],
            $relatorioReg['tabela6'],
            $relatorioReg['coluna6'],
            $relatorioReg['nome6']
        );
    }
}