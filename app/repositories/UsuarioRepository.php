<?php

namespace App\Repositories;

use App\Database\Database;
use App\Models\Usuario;
use \Exception;

class UsuarioRepository
{
    protected string $table = 'tb_usuario';
    private Database $db;
    private Usuario $usuario;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM $this->table ORDER BY nome ASC";
        $result = $this->db->consultar($sql, []);
        return count($result) > 0 ? $this->generateObjectsList($result) : [];
    }

    /**
     * @throws Exception
     */
    public function create(Usuario $usuario): bool
    {
        $parametros = [
            'nome' => $usuario->getNome(),
            'usuario' => $usuario->getUsuario(),
            'senha' => $usuario->getSenha(),
            'codigo' => $usuario->getCodigo(),
            'id_cliente' => $this->listToString(array_merge($usuario->getClientes(), $usuario->getFornecedores())),
            'aprovador' => $usuario->getAprovador(),
            'foto' => $usuario->getFoto(),
            'limite' => $usuario->getLimite(),
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $usuario->setId($this->db->getLastInsertId());
            $this->usuario = $usuario;
            return true;
        }
        return false;
    }

    /**
     * @throws Exception
     */
    public function update(Usuario $usuario): bool
    {
        try {
            $dados = [
                'nome' => $usuario->getNome(),
                'usuario' => $usuario->getUsuario(),
                'senha' => $usuario->getSenha(),
                'codigo' => $usuario->getCodigo(),
                'id_cliente' => $this->listToString(array_merge($usuario->getClientes(), $usuario->getFornecedores())),
                'aprovador' => $usuario->getAprovador(),
                'foto' => $usuario->getFoto(),
                'limite' => $usuario->getLimite(),
            ];

            $condicao = ['id' => $usuario->getId()];
            return $this->db->atualizar($this->table, $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar usuário: " . $e->getMessage());
        }
    }

    public function delete(Usuario $usuario): bool
    {
        try {
            $condicao = "id = :id";
            $parametros = ['id' => $usuario->getId()];
            return (bool) $this->db->excluir($this->table, $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir usuário: " . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function find(int $id): ?Usuario
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        try {
            $parametros = ['id' => $id];
            $resultado = $this->db->consultar($query, $parametros);
            return count($resultado) == 1 ? $this->generateObject($resultado[0]) : null;
        } catch (Exception $e) {
            throw new Exception("Nenhum usuário encontrado com o ID fornecido.");
        }
    }

    /**
     * @throws Exception
     */
    public function findBy(string $column, $value): ?Usuario
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);
        return count($resultado) == 1 ? $this->generateObject($resultado[0]) : null;
    }

    /**
     * @throws Exception
     */
    private function generateObjectsList(array $usuariosList): array
    {
        $usuarios = [];
        foreach ($usuariosList as $usuario) {
            $usuarios[] = $this->generateObject($usuario);
        }
        return $usuarios;
    }

    /**
     * @throws Exception
     */
    private function generateObject(array $usuarioReg): Usuario
    {
        $stringListaClientesEFornecedores = $usuarioReg['id_cliente'] ?? "";
        $arrayListaClientesEFornecedores = $this->listToArray($stringListaClientesEFornecedores);

        $arrayListaClientes = [];
        $arrayListaFornecedores = [];

        $clienteRepository = new ClienteRepository($this->db);
        $fornecedorRepository = new FornecedorRepository($this->db);

        foreach($arrayListaClientesEFornecedores as $item){
            if($clienteRepository->find($item)) $arrayListaClientes[] = $item;
            if($fornecedorRepository->find($item)) $arrayListaFornecedores[] = $item;
        }

        return new Usuario(
            $usuarioReg['id'],
            $usuarioReg['nome'],
            $usuarioReg['usuario'],
            $usuarioReg['senha'],
            $usuarioReg['codigo'] ?? null,
            array_unique($arrayListaClientes),
            array_unique($arrayListaFornecedores),
            $usuarioReg['aprovador'] ?? null,
            $usuarioReg['foto'] ?? null,
            $usuarioReg['limite'] ?? null
        );
    }

    private function listToArray(string $lista = ""): array
    {
        // Remover espaços em branco
        $lista = str_replace(" ", "", $lista);

        // Verificar se a string não está vazia
        if ($lista === "") {
            return [];
        }

        // Separar os IDs por vírgula e converter para inteiros
        $array = explode(",", $lista);
        $array = array_map('intval', $array);

        // Ordenar os IDs em ordem crescente
        sort($array);

        return $array;
    }

    private function listToString(array $lista = []): string
    {
        return implode(", ", $lista);
    }
}