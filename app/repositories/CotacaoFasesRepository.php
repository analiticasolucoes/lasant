<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\CotacaoFase;
use \Exception;

class CotacaoFasesRepository
{
    /**
     * Nome da tabela associada ao modelo.
     * @var string
     */
    protected string $table = 'tb_fases_cotacao';

    /**
     * Instância da classe Database para manipulação do banco de dados.
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de uma fase de cotação específica após consulta.
     * @var CotacaoFase
     */
    private CotacaoFase $cotacaoFase;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getCotacaoFase(): CotacaoFase
    {
        return $this->cotacaoFase;
    }

    /**
     * @throws Exception
     */
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

    /**
     * @throws Exception
     */
    public function create(CotacaoFase $cotacaoFase): bool
    {
        $parametros = [
            'id_cotacao' => $cotacaoFase->getCotacao(),
            'id_situacao' => $cotacaoFase->getSituacao(),
            'dt_situacao' => $cotacaoFase->getDtSituacao(),
            'id_operador' => $cotacaoFase->getOperador(),
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $this->cotacaoFase = $this->find($this->db->getLastInsertId());
            return true;
        }
        return false;
    }

    /**
     * @throws Exception
     */
    public function update(CotacaoFase $cotacaoFase): bool
    {
        try {
            $dados = [
                'id_cotacao' => $cotacaoFase->getId(),
                'id_situacao' => $cotacaoFase->getSituacao(),
                'dt_situacao' => $cotacaoFase->getDtSituacao(),
                'id_operador' => $cotacaoFase->getOperador(),
            ];

            $condicao = ['id' => $cotacaoFase->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar fase de cotação: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function delete(CotacaoFase $cotacaoFase): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $cotacaoFase->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir fase de cotação: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function find(int $id): ?CotacaoFase
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
            throw new Exception("Nenhuma fase de cotação encontrada com o ID fornecido.");
        }
    }

    /**
     * @throws Exception
     */
    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column} ORDER BY 'dt_situacao' ASC";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado)) {
            return $this->generateObjectsList($resultado);
        } else {
            return [];
        }
    }

    /**
     * @throws Exception
     */
    public function count(): int
    {
        return sizeof($this->all());
    }

    /**
     * @throws Exception
     */
    private function generateObjectsList(array $fasesList): array
    {
        $fases = [];
        foreach ($fasesList as $fase) {
            $fases[] = $this->generateObject($fase);
        }
        return $fases;
    }

    /**
     * @throws Exception
     */
    private function generateObject(array $faseReg): CotacaoFase
    {
        $cotacaoFase = new CotacaoFase();

        $cotacaoFase->setId($faseReg['id']);
        $cotacaoFase->setCotacao($faseReg['id_cotacao']);
        $cotacaoFase->setSituacao($faseReg['id_situacao']);
        $cotacaoFase->setDtSituacao(new \DateTime($faseReg['dt_situacao']));
        $cotacaoFase->setOperador($faseReg['id_operador']);

        return $cotacaoFase;
    }

    /**
     * Retorna o histórico de workflow de uma cotação específica.
     *
     * @param int $cotacaoId ID da cotação.
     * @return array Array com o workflow ordenado pela data da situação em ordem decrescente.
     * @throws Exception Caso ocorra um erro ao recuperar os dados.
     */
    public function workflow(int $cotacaoId): array
    {
        // Recupera todas as fases relacionadas à cotação usando o método findBy
        $fases = $this->findBy('id_cotacao', $cotacaoId);

        if (!$fases || !is_array($fases)) {
            return [];
        }

        // Ordena as fases pela data da situação em ordem decrescente
        usort($fases, function (CotacaoFase $a, CotacaoFase $b) {
            return $b->getDtSituacao() <=> $a->getDtSituacao();
        });

        // Instancia os repositórios para buscar dados adicionais
        $situacaoRepository = new SituacaoCotacaoRepository($this->db);
        $usuarioRepository = new UsuarioRepository($this->db);

        $workflow = [];

        // Monta o array com os dados estruturados
        foreach ($fases as $fase) {
            $situacao = $situacaoRepository->find($fase->getSituacao());
            $operador = $usuarioRepository->find($fase->getOperador());

            $workflow[] = [
                "data" => $fase->getDtSituacao()->format('d/m/Y H:i'),
                "situacao" => $situacao ? $situacao->getSituacao() : "Desconhecida",
                "operador" => $operador ? $operador->getNome() : "Desconhecido",
            ];
        }

        return $workflow;
    }
}