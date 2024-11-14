<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\{Profissional, Cargo};
use \Exception;

class ProfissionalRepository
{
    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_profissional';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um profissional específico após consulta
     * @var Profissional
     */
    private Profissional $profissional;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getProfissional(): Profissional
    {
        return $this->profissional;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table ORDER BY nm_profissional";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generateObjectsList($result);
        } else {
            return [];
        }
    }

    public function actives(): array
    {
        $sql = "SELECT * FROM $this->table WHERE status=\"Ativo\" ORDER BY nm_profissional";
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
            'folha' => "",
            'id_avaliacao_profissional' => 0,
            'nm_profissional' => $data['nome'],
            'cpf' => $data['cpf'],
            'dt_nascimento' => $data['dt-nascimento'],
            'telefone' => $data['telefone'],
            'id_cargo' => $data['cargo'],
            'status' => "Ativo",
            'tamanho_pe' => $data['tamanho-calcado'],
            'tamanho_calca' => $data['tamanho-calca'],
            'tamanho_camisa' => $data['tamanho-camisa'],
            'valor_passagem' => $data['valor-passagem'],
            'valor_passagem1' => $data['valor-passagem1'],
            'valor_passagem2' => $data['valor-passagem2'],
            'valor_passagem3' => $data['valor-passagem3'],
            'qtd_passagem1' => $data['qtd-passagem1'],
            'qtd_passagem' => $data['qtd-passagem'],
            'qtd_passagem2' => $data['qtd-passagem2'],
            'qtd_passagem3' => $data['qtd-passagem3']
        ];

        $cargoRepository = new CargoRepository($this->db);
        $cargo = $cargoRepository->find($data['cargo']);

        if ($this->db->inserir($this->table, $parametros)) {
            $profissional = new Profissional(
                $this->db->getLastInsertId(),
                "",
                0,
                $data['nome'],
                $data['cpf'],
                $data['dt-nascimento'],
                $data['telefone'],
                "Ativo",
                $cargo,
                $data['tamanho-calcado'],
                $data['tamanho-calca'],
                $data['tamanho-camisa'],
                $data['valor-passagem'],
                $data['valor-passagem1'],
                $data['valor-passagem2'],
                $data['valor-passagem3'],
                $data['qtd-passagem1'],
                $data['qtd-passagem'],
                $data['qtd-passagem2'],
                $data['qtd-passagem3']
            );
            $this->profissional = $profissional;
            return true;
        }
        return false;
    }

    public function update(Profissional $profissional): bool
    {
        try {
            $dados = [
                'folha' => $profissional->getFolha(),
                'id_avaliacao_profissional' => $profissional->getIdAvaliacaoProfissional(),
                'nm_profissional' => $profissional->getNome(),
                'cpf' => $profissional->getCPF(),
                'dt_nascimento' => $profissional->getDtNascimento(),
                'telefone' => $profissional->getTelefone(),
                'id_cargo' => $profissional->getCargo()->getId(),
                'status' => $profissional->getStatus(),
                'tamanho_pe' => $profissional->getTamanhoCalcado(),
                'tamanho_calca' => $profissional->getTamanhoCalca(),
                'tamanho_camisa' => $profissional->getTamanhoCamisa(),
                'valor_passagem' => $profissional->getValorPassagem(),
                'valor_passagem1' => $profissional->getValorPassagem1(),
                'valor_passagem2' => $profissional->getValorPassagem2(),
                'valor_passagem3' => $profissional->getValorPassagem3(),
                'qtd_passagem1' => $profissional->getQtdPassagem1(),
                'qtd_passagem' => $profissional->getQtdPassagem(),
                'qtd_passagem2' => $profissional->getQtdPassagem2(),
                'qtd_passagem3' => $profissional->getQtdPassagem3()
            ];

            $condicao = ['id' => $profissional->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar profissional: " . $e->getMessage());
        }
    }

    public function delete(Profissional $profissional): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $profissional->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir profissional: " . $e->getMessage());
        }
    }

    public function find(int $id): ?Profissional
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
            throw new Exception("Nenhum profissional encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generateObjectsList($resultado);
        } else {
            return [];
        }
    }

    public function count(): int
    {
        return sizeof($this->all());
    }

    private function generateObjectsList(array $profissionaisList): array
    {
        $profissionais = [];
        foreach ($profissionaisList as $profissional) {
            $profissionais[] = $this->generateObject($profissional);
        }
        return $profissionais;
    }

    private function generateObject(array $profissionalReg): Profissional
    {
        $cargoRepository = new CargoRepository($this->db);
        $cargo = $cargoRepository->find($profissionalReg['id_cargo']);
        if(!$cargo) $cargo = new Cargo(0, "");

        return new Profissional(
            $profissionalReg['id'],
            $profissionalReg['folha'],
            $profissionalReg['id_avaliacao_profissional'],
            $profissionalReg['nm_profissional'],
            $profissionalReg['cpf'],
            $profissionalReg['dt_nascimento'],
            $profissionalReg['telefone'],
            $profissionalReg['status'],
            $cargo,
            $profissionalReg['tamanho_pe'],
            $profissionalReg['tamanho_calca'],
            $profissionalReg['tamanho_camisa'],
            $profissionalReg['valor_passagem'],
            $profissionalReg['valor_passagem1'],
            $profissionalReg['valor_passagem2'],
            $profissionalReg['valor_passagem3'],
            $profissionalReg['qtd_passagem1'],
            $profissionalReg['qtd_passagem'],
            $profissionalReg['qtd_passagem2'],
            $profissionalReg['qtd_passagem3']
        );
    }
}