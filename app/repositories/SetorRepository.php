<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\{Cliente, Pavimento, Setor};
use \Exception;

class SetorRepository
{

    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_cliente_setor';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um banco específico após consulta
     * @var setor
     */
    private Setor $setor;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getSetor(): Setor
    {
        return $this->setor;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generateSetoresArray($result);
        } else {
            return [];
        }
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): bool
    {
        $parametros = [
            'id_cliente' => $data['cliente-id'],
            'id_clientePavimento' => $data['cliente-pavimento-setor'],
            'ds_clienteSetor' => $data['descricao-setor'],
            'status' => true,
            'ocupantes_fixos' => (int) $data['ocupantes-fixos-setor'],
            'ocupantes_flutuantes' => (int) $data['ocupantes-flutuantes-setor'],
            'largura' => (int) $data['largura-setor'],
            'comprimento' => (int) $data['comprimento-setor'],
            'altura' => (int) $data['altura-setor']
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $this->setor = $this->find($this->db->getLastInsertId());
            return true;
        }
        return false;
    }

    public function update(Setor $setor): bool
    {
        try {
            $dados = [
                'id_clientePavimento' => $setor->getPavimento()->getId(),
                'ds_clienteSetor' => $setor->getDescricao(),
                'status' => (int) $setor->isStatus(),
                'ocupantes_fixos' => $setor->getOcupantesFixos(),
                'ocupantes_flutuantes' => $setor->getOcupantesFlutuantes(),
                'largura' => $setor->getLargura(),
                'comprimento' => $setor->getComprimento(),
                'altura' => $setor->getAltura()
            ];

            $condicao = ['id' => $setor->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar Setor: " . $e->getMessage());
        }
    }

    public function delete(Setor $setor): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $setor->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir Setor: " . $e->getMessage());
        }
    }

    public function find(int $id): Setor
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generateSetor($resultado[0]);
            } else {
                return new Setor();
            }
        } catch (Exception $e) {
            throw new Exception("Nenhum setor encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column} ORDER BY ds_clientesetor";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generateSetoresArray($resultado);
        } else {
            return [];
        }
    }

    private function generateSetoresArray(array $setorsList): array
    {
        $locais = [];
        foreach ($setorsList as $setor) {
            $locais[] = $this->generateSetor($setor);
        }
        return $locais;
    }

    private function generateSetor(array $setorReg): Setor
    {
        $setor = new Setor();
        $this->setAttributes($setor, $setorReg);
        return $setor;
    }

    private function setAttributes(Setor $setor, array $data): void
    {
        $clienteRepository = new ClienteRepository($this->db);
        $cliente = $clienteRepository->find($data['id_cliente']) ?? new Cliente(0, "", "");

        $pavimentoRepository = new PavimentoRepository($this->db);
        $pavimento = $pavimentoRepository->find($data['id_clientePavimento']) ?? new Pavimento();

        foreach($data as $key => $value)
            if(!$value) $data[$key] = "";

        $setor->setId($data['id']);
        $setor->setCliente($cliente);
        $setor->setPavimento($pavimento);
        $setor->setDescricao($data['ds_clienteSetor']);
        $setor->setStatus($data['status']);
        $setor->setOcupantesFixos((int) $data['ocupantes_fixos']);
        $setor->setOcupantesFlutuantes((int) $data['ocupantes_flutuantes']);
        $setor->setLargura((float) $data['largura']);
        $setor->setComprimento((float) $data['comprimento']);
        $setor->setAltura((float) $data['altura']);
    }
}