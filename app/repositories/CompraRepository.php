<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\{Cliente,
    CotacaoFase,
    GrupoMaterial,
    Local,
    Compra,
    LocalEntrega,
    PrioridadeCompra,
    SituacaoCotacao,
    Usuario};
use DateTime;
use \Exception;

class CompraRepository
{

    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'tb_cotacao';

    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um banco específico após consulta
     * @var Compra
     */
    private Compra $compra;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getCompra(): Compra
    {
        return $this->compra;
    }

    /**
     * @throws Exception
     */
    public function all(): array
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generateComprasArray($result);
        } else {
            return [];
        }
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function create(Compra $compra): bool
    {
        $parametros = [
            'id_cliente' => $compra->getCliente()->getId(),
            'id_clienteLocal' => $compra->getLocal()->getId(),
            'dt_solicitacao' => $compra->getDtSolicitacao()->format('Y-m-d H:i:s'),
            'id_operador' => $compra->getIdOperador(),
            'id_situacao' => $compra->getSituacao()->getId(),
            'id_prioridade' => $compra->getPrioridade()->getId(),
            'id_materialGrupo' => $compra->getGrupoMaterial()->getId(),
            'tipo' => $compra->getTipo(),
            'observacoes' => $compra->getObservacoes(),
            'id_local_entrega' => $compra->getLocalEntrega()->getId()
        ];

        if (!$this->db->inserir($this->table, $parametros)) return false;

        $this->compra = $this->find($this->db->getLastInsertId());

        $cotacaoFase = new CotacaoFase();

        $cotacaoFase->setCotacao($compra->getId());
        $cotacaoFase->setSituacao($compra->getSituacao()->getId());
        $cotacaoFase->setDtSituacao($compra->getDtSolicitacao());
        $cotacaoFase->setOperador($compra->getIdOperador());

        $cotacaoFasesRepository = new CotacaoFasesRepository($this->db);

        return $cotacaoFasesRepository->create($cotacaoFase);
    }

    /**
     * @throws Exception
     */
    public function update(Compra $compra): bool
    {
        try {
            $dados = [
                'id_cliente' => $compra->getCliente()->getId(),
                'id_clienteLocal' => $compra->getLocal()->getId(),
                'dt_solicitacao' => $compra->getDtSolicitacao()->format('Y-m-d H:i:s'),
                'id_operador' => $compra->getIdOperador(),
                'id_prioridade' => $compra->getPrioridade()->getId(),
                'id_materialGrupo' => $compra->getGrupoMaterial()->getId(),
                'tipo' => $compra->getTipo(),
                'observacoes' => $compra->getObservacoes(),
                'id_local_entrega' => $compra->getLocalEntrega()->getId()
            ];

            $condicao = ['id' => $compra->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar Compra: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function delete(Compra $compra): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $compra->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir Compra: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function find(int $id): Compra
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generateCompra($resultado[0]);
            } else {
                return new Compra();
            }
        } catch (Exception $e) {
            throw new Exception("Nenhuma Compra encontrado com o ID fornecido.");
        }
    }

    /**
     * @throws Exception
     * $@return array
     */
    public function findBy(string $column, $value): array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generateComprasArray($resultado);
        } else {
            return [];
        }
    }

    /**
     * @throws Exception
     */
    private function generateComprasArray(array $comprasList): array
    {
        $compras = [];
        foreach ($comprasList as $compraReg) {
            $compras[] = $this->generateCompra($compraReg);
        }
        return $compras;
    }

    /**
     * @throws Exception
     */
    private function generateCompra(array $compraReg): Compra
    {
        $compra = new Compra();
        $this->setAttributes($compra, $compraReg);
        return $compra;
    }

    /**
     * @throws Exception
     */
    private function setAttributes(Compra $compra, array $data): void
    {
        foreach($data as $key => $value)
            if(!$value) $data[$key] = "";

        $clienteRepository = new ClienteRepository($this->db);
        $cliente = $clienteRepository->find((int) $data['id_cliente']) ?? new Cliente();

        $localRepository = new LocalRepository($this->db);
        $local = $localRepository->find((int) $data['id_clienteLocal']) ?? new Local();

        $situacaoCotacaoRepository = new SituacaoCotacaoRepository($this->db);
        $situacao = $situacaoCotacaoRepository->find((int) $data['id_situacao']) ?? new SituacaoCotacao();

        $prioridadeCompraRepository = new PrioridadeCompraRepository($this->db);
        $prioridade = $prioridadeCompraRepository->find((int) $data['id_prioridade']) ?? new PrioridadeCompra();

        $grupoMaterialRepository = new GrupoMaterialRepository($this->db);
        $grupoMaterial = $grupoMaterialRepository->find((int) $data['id_materialGrupo']) ?? new GrupoMaterial();

        $localEntregaRepository = new LocalEntregaRepository($this->db);
        $localEntrega = $localEntregaRepository->find((int) $data['id_local_entrega']) ?? new LocalEntrega();

        $compra->setId((int) $data['id']);
        $compra->setCliente($cliente);
        $compra->setLocal($local);
        $compra->setDtSolicitacao(new DateTime($data['dt_solicitacao']));
        $compra->setIdOperador((int) $data['id_operador']);
        $compra->setSituacao($situacao);
        $compra->setPrioridade($prioridade);
        $compra->setGrupoMaterial($grupoMaterial);
        $compra->setTipo((int) $data['tipo']);
        $compra->setObservacoesReprovacao($data['observacoes_reprovacao']);
        $compra->setObservacoes($data['observacoes']);
        $compra->setLocalEntrega($localEntrega);
        $compra->setObservacoesEntrega($data['observacoes_entrega']);
    }
}