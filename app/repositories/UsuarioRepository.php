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
        $sql = "SELECT * FROM $this->table";
        $result = $this->db->consultar($sql, []);
        return count($result) > 0 ? $this->generateObjectsList($result) : [];
    }

    public function create(array $data): bool
    {
        $parametros = [
            'nome' => $data['nome'],
            'usuario' => $data['usuario'],
            'senha' => $data['senha'],
            'codigo' => $data['codigo'],
            'id_cliente' => $data['id_cliente'],
            'aprovador' => $data['aprovador'],
            'foto' => $data['foto'],
            'limite' => $data['limite'],
        ];

        if ($this->db->inserir($this->table, $parametros)) {
            $usuario = new Usuario(
                $this->db->getLastInsertId(),
                $data['nome'],
                $data['usuario'],
                $data['senha'],
                $data['codigo'],
                $data['id_cliente'],
                $data['aprovador'],
                $data['foto'],
                $data['limite']
            );
            $this->usuario = $usuario;
            return true;
        }
        return false;
    }

    public function update(Usuario $usuario): bool
    {
        try {
            $dados = [
                'nome' => $usuario->getNome(),
                'usuario' => $usuario->getUsuario(),
                'senha' => $usuario->getSenha(),
                'codigo' => $usuario->getCodigo(),
                'id_cliente' => $this->idClienteToString($usuario->getIdCliente()),
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

    public function findBy(string $column, $value): ?Usuario
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);
        return count($resultado) == 1 ? $this->generateObject($resultado[0]) : null;
    }

    private function generateObjectsList(array $usuariosList): array
    {
        $usuarios = [];
        foreach ($usuariosList as $usuario) {
            $usuarios[] = $this->generateObject($usuario);
        }
        return $usuarios;
    }

    private function generateObject(array $usuarioReg): Usuario
    {
        $arrayIDCliente = $this->idClienteToArray($usuarioReg['id_cliente']);
        return new Usuario(
            $usuarioReg['id'],
            $usuarioReg['nome'],
            $usuarioReg['usuario'],
            $usuarioReg['senha'],
            $usuarioReg['codigo'] ?? null,
            $arrayIDCliente,
            $usuarioReg['aprovador'] ?? null,
            $usuarioReg['foto'] ?? null,
            $usuarioReg['limite'] ?? null
        );
    }

    private function idClienteToArray(string $idClientes = ""): array
    {
        $array = [];

        if($idClientes !== "") {
            $array = explode(", ", $idClientes);

            $array = array_map('intval', $array);
            sort($array);
        }

        return $array;
    }

    private function idClienteToString(array $idClientes = []): string
    {
        return implode(", ", $idClientes);
    }
}