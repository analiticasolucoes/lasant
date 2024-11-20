<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\{Cliente, Local, Contrato};
use DateTime;
use \Exception;

class ContratoRepository
{

    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_contrato';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um banco específico após consulta
     * @var Contrato
     */
    private Contrato $contrato;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getContrato(): Contrato
    {
        return $this->contrato;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table ORDER BY ds_contrato ASC";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generateContratosArray($result);
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
            'ds_contrato' => $data['descricao-contrato'],
            'dt_inicio' => $data['data-inicio-contrato'],
            'dt_fim' => $data['data-encerramento-contrato'],
            'valor_base' => $data['valor-base-1-contrato'],
            'valor_base2' => $data['valor-base-2-contrato'],
            'valor_base3' => $data['valor-base-3-contrato'],
            'BDI' => $data['bdi-contrato'],
            'numero' => $data['numero-contrato'],
            'mes_sco' => $data['mes-sco-contrato'],
            'ano_sco' => $data['ano-sco-contrato'],
            'status' => 0,
            'processo' => "",
            'valor_corretiva' => 0.0,
            'valor_preventiva' => 0.0,
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $this->contrato = $this->find($this->db->getLastInsertId());
            return true;
        }
        return false;
    }

    public function update(Contrato $contrato): bool
    {
        try {
            $dados = [
                'ds_contrato' => $contrato->getDescricao(),
                'dt_inicio' => $contrato->getDataInicio()->format('Y-m-d'),
                'dt_fim' => $contrato->getDataEncerramento()->format('Y-m-d'),
                'valor_base' => $contrato->getValorBase(),
                'valor_base2' => $contrato->getValorBase2(),
                'valor_base3' => $contrato->getValorBase3(),
                'BDI' => $contrato->getBdi(),
                'numero' => $contrato->getNumero(),
                'mes_sco' => $contrato->getMesSco(),
                'ano_sco' => $contrato->getAnoSco(),
                'status' => $contrato->getStatus(),
                'processo' => $contrato->getProcesso(),
                'valor_corretiva' => $contrato->getValorCorretiva(),
                'valor_preventiva' => $contrato->getValorPreventiva(),
            ];

            $condicao = ['id' => $contrato->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar Contrato: " . $e->getMessage());
        }
    }

    public function delete(Contrato $contrato): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $contrato->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir Contrato: " . $e->getMessage());
        }
    }

    public function find(int $id): Contrato
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generateContrato($resultado[0]);
            } else {
                return new Contrato();
            }
        } catch (Exception $e) {
            throw new Exception("Nenhum Contrato encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column} ORDER BY ds_contrato ASC";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generateContratosArray($resultado);
        } else {
            return [];
        }
    }

    private function generateContratosArray(array $contratosList): array
    {
        $locais = [];
        foreach ($contratosList as $contrato) {
            $locais[] = $this->generateContrato($contrato);
        }
        return $locais;
    }

    private function generateContrato(array $contratoReg): Contrato
    {
        $contrato = new Contrato();
        $this->setAttributes($contrato, $contratoReg);
        return $contrato;
    }

    /**
     * @throws \DateMalformedStringException
     */
    private function setAttributes(Contrato $contrato, array $data): void
    {
        $clienteRepository = new ClienteRepository($this->db);
        $cliente = $clienteRepository->find($data['id_cliente']) ?? new Cliente(0, "", "");

        foreach($data as $key => $value)
            if(!$value) $data[$key] = "";

        $contrato->setId((int) $data['id']);
        $contrato->setCliente($cliente);
        $contrato->setDescricao($data['ds_contrato']);
        $contrato->setDataInicio(new DateTime($data['dt_inicio']));
        $contrato->setDataEncerramento(new DateTime($data['dt_fim']));
        $contrato->setValorBase((float) $data['valor_base']);
        $contrato->setValorBase2((float) $data['valor_base2']);
        $contrato->setValorBase3((float) $data['valor_base3']);
        $contrato->setBdi((float) $data['BDI']);
        $contrato->setNumero($data['numero']);
        $contrato->setMesSco($data['mes_sco']);
        $contrato->setAnoSco($data['ano_sco']);
        $contrato->setStatus((int) $data['status']);
        $contrato->setProcesso($data['processo']);
        $contrato->setValorCorretiva((float) $data['valor_corretiva']);
        $contrato->setValorPreventiva((float) $data['valor_preventiva']);
    }
}