<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\PrivilegioAcesso;
use Exception;

class PrivilegioAcessoRepository
{
    /**
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'ta_privilegios_acesso';

    private array $map;
    /**
     * Instância da classe Database para manipulação do banco de dados
     * @var Database
     */
    private Database $db;

    /**
     * Objeto acessório para recuperação de um registro específico após consulta
     * @var PrivilegioAcesso
     */
    private PrivilegioAcesso $privilegioAcesso;

    public function __construct(Database $db)
    {
        $this->map = [
            'cargos' => ['cargo_visualizacao', 'cargo_cadastro', 'cargo_edicao', 'cargo_exclusao'],
            'clientes' => ['clientes_visualizacao', 'clientes_cadastro', 'clientes_edicao', 'clientes_exclusao'],
            'categorias' => ['categorias_visualizacao', 'categorias_cadastro', 'categorias_edicao', 'categorias_exclusao'],
            'cateservico' => ['cateservico_visualizacao', 'cateservico_cadastro', 'cateservico_edicao', 'cateservico_exclusao'],
            'esferas' => ['esferas_visualizacao', 'esferas_cadastro', 'esferas_edicao', 'esferas_exclusao'],
            'feriados' => ['feriados_visualizacao', 'feriados_cadastro', 'feriados_edicao', 'feriados_exclusao'],
            'unidades' => ['unidades_visualizacao', 'unidades_cadastro', 'unidades_edicao', 'unidades_exclusao'],
            'grupos_material' => ['grupos_material_visualizacao', 'grupos_material_cadastro', 'grupos_material_edicao', 'grupos_material_exclusao'],
            'material' => ['material_visualizacao', 'material_cadastro', 'material_edicao', 'material_exclusao'],
            'tipo_os' => ['tipo_os_visualizacao', 'tipo_os_cadastro', 'tipo_os_edicao', 'tipo_os_exclusao'],
            'situacao_ss' => ['situacao_ss_visualizacao', 'situacao_ss_cadastro', 'situacao_ss_edicao', 'situacao_ss_exclusao'],
            'situacao_os' => ['situacao_os_visualizacao', 'situacao_os_cadastro', 'situacao_os_edicao', 'situacao_os_exclusao'],
            'prioridade_os' => ['prioridade_os_visualizacao', 'prioridade_os_cadastro', 'prioridade_os_edicao', 'prioridade_os_exclusao'],
            'cad_rel' => ['cad_rel_visualizacao', 'cad_rel_cadastro', 'cad_rel_edicao', 'cad_rel_exclusao'],
            'grupos_equipamento' => ['grupos_equipamento_visualizacao', 'grupos_equipamento_cadastro', 'grupos_equipamento_edicao', 'grupos_equipamento_exclusao'],
            'subgrupos_equipamento' => ['subgrupos_equipamento_visualizacao', 'subgrupos_equipamento_cadastro', 'subgrupos_equipamento_edicao', 'subgrupos_equipamento_exclusao'],
            'classes_equipamento' => ['classes_equipamento_visualizacao', 'classes_equipamento_cadastro', 'classes_equipamento_edicao', 'classes_equipamento_exclusao'],
            'situacao_equipamento' => ['situacao_equipamento_visualizacao', 'situacao_equipamento_cadastro', 'situacao_equipamento_edicao', 'situacao_equipamento_exclusao'],
            'marcas_equipamento' => ['marcas_equipamento_visualizacao', 'marcas_equipamento_cadastro', 'marcas_equipamento_edicao', 'marcas_equipamento_exclusao'],
            'modelos_equipamento' => ['modelos_equipamento_visualizacao', 'modelos_equipamento_cadastro', 'modelos_equipamento_edicao', 'modelos_equipamento_exclusao'],
            'equipamento' => ['equipamento_visualizacao', 'equipamento_cadastro', 'equipamento_edicao', 'equipamento_exclusao'],
            'profissional' => ['profissional_visualizacao', 'profissional_cadastro', 'profissional_edicao', 'profissional_exclusao'],
            'estoque' => ['estoque_visualizacao', 'estoque_cadastro', 'estoque_edicao', 'estoque_exclusao'],
            'ss' => ['ss_visualizacao', 'ss_exclusao', 'ss_orcar'],
            'os' => ['os_visualizacao', 'os_cadastro', 'os_edicao', 'os_exclusao', 'os_cancelar', 'os_validar', 'os_finalizar'],
            'resp_tec' => ['resp_tec_visualizacao', 'resp_tec_cadastro', 'resp_tec_edicao', 'resp_tec_exclusao'],
            'obras' => ['obras_visualizacao', 'obras_cadastro', 'obras_edicao', 'obras_exclusao', 'obras_data'],
            'relatorios' => ['relatorios_visualizacao', 'validar_manutencao'],
            'obras_diario' => ['obras_diario'],
            'bordero' => ['bordero_visualizacao', 'bordero_cadastro', 'bordero_edicao', 'bordero_exclusao'],
            'compras' => ['compras_visualizacao', 'compras_cadastro', 'compras_edicao', 'compras_exclusao'],
            'status_compra' => ['status_compra']
        ];

        $this->db = $db;
    }

    public function getPrivilegioAcesso(): PrivilegioAcesso
    {
        return $this->privilegioAcesso;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->db->consultar($sql, []);
        if (count($result) > 0) {
            return $this->generatePrivilegiosArray($result);
        }
        return [];
    }

    public function create(array $data): bool
    {
        $parametros = [
            'idUsuario' => $data['idUsuario'],
            'master' => $data['master'],
            // Adicionar os demais campos conforme necessário
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $this->privilegioAcesso = $this->find($this->db->getLastInsertId());
            return true;
        }
        return false;
    }

    public function update(PrivilegioAcesso $privilegioAcesso): bool
    {
        try {
            $dados = [
                'idUsuario' => $privilegioAcesso->getIdUsuario(),
                'master' => $privilegioAcesso->getMaster(),
                // Adicionar os demais campos conforme necessário
            ];

            $condicao = ['id' => $privilegioAcesso->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar PrivilegioAcesso: " . $e->getMessage());
        }
    }

    public function delete(PrivilegioAcesso $privilegioAcesso): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $privilegioAcesso->getId()];
            return (bool)$this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir PrivilegioAcesso: " . $e->getMessage());
        }
    }

    public function find(int $id): PrivilegioAcesso
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";

        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);

            if (count($resultado) == 1) {
                return $this->generatePrivilegio($resultado[0]);
            }
            return new PrivilegioAcesso();
        } catch (Exception $e) {
            throw new Exception("Nenhum PrivilegioAcesso encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value): ?array
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) >= 1) {
            return $this->generatePrivilegiosArray($resultado);
        }
        return [];
    }

    private function generatePrivilegiosArray(array $privilegiosList): array
    {
        $privilegios = [];
        foreach ($privilegiosList as $privilegio) {
            $privilegios[] = $this->generatePrivilegio($privilegio);
        }
        return $privilegios;
    }

    private function generatePrivilegio(array $privilegioReg): PrivilegioAcesso
    {
        $privilegio = new PrivilegioAcesso();
        $this->setAttributes($privilegio, $privilegioReg);
        return $privilegio;
    }

    private function setAttributes(PrivilegioAcesso $privilegio, array $data): void
    {
        foreach ($data as $key => $value) {
            if (method_exists($privilegio, $method = 'set' . ucfirst($key))) {
                $privilegio->$method($value);
            }
        }
    }
}