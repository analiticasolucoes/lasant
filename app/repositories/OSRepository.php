<?php

namespace App\repositories;

use App\Database\Database;

class OSRepository
{
    /*
     * Nome da tabela associada ao modelo
     * @var string
     */
    protected string $table = 'tb_ordem_servico';
    /**
     * Instancia da classe Database para manipulacao do banco de dados
     * @var Database
     */
    private Database $db;
    /**
     * Objeto acessorio para recuperacao de um usuario especifico apos consulta
     * @var OS
     */
    private OS $user;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getOS(): OS
    {
        return $this->user;
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
            'nome' => $data['nome'],
            'email' => $data['email'],
            'senha' => password_hash($data['senha'], PASSWORD_DEFAULT),
            'ativo' => $data['ativo'] ? true : false,
            'perfil' => $data['perfil'],
            'token' => bin2hex(random_bytes(32))
        ];

        if ($this->db->inserir("$this->table", $parametros)) {
            $user = new User();
            $user->setId($this->db->getLastInsertId());
            $user->setNome($data['nome']);
            $user->setEmail($data['email']);
            $user->setSenha($data['senha']);
            $user->setAtivo($data['ativo']);
            $user->setPerfil($data['perfil']);
            $user->setToken($parametros['token']);
            $this->user = $user;
            return true;
        }
        return false;
    }

    public function update($user): bool
    {
        if (!$user instanceof User) {
            throw new Exception("O objeto fornecido não é uma instância de Usuario.");
        }

        try {
            $dados = [
                'nome' => $user->getNome(),
                'email' => $user->getEmail(),
                'senha' => $user->getSenha(),
                'ativo' => $user->getAtivo(),
                'perfil' => $user->getPerfil(),
                'token' => bin2hex(random_bytes(32))
            ];

            $condicao = [
                "id" => $user->getId()
            ];
            return $this->db->atualizar('$this->table', $dados, $condicao);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar usuário: " . $e->getMessage());
        }
    }

    public function delete($object): bool
    {
        if (!$object instanceof User) {
            throw new Exception("O objeto fornecido não é uma instância de Usuario.");
        }

        try {
            $condicao = "id = :id";
            $parametros = ['id' => $object->getId()];
            return (bool)$this->db->excluir('$this->table', $condicao, $parametros);
        } catch (Exception $e) {
            throw new Exception("Erro ao excluir usuário: " . $e->getMessage());
        }
    }

    public function find(int $id): ?User
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
            throw new Exception("Nenhum usuário encontrado com o ID fornecido.");
        }
    }

    public function findBy(string $column, $value)
    {
        $query = "SELECT * FROM $this->table WHERE $column = :{$column}";
        $parametros = [$column => $value];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) == 1) {
            return $this->generateObject($resultado[0]);
        } else {
            return null;
        }
    }

    public function updateToken($user, $token)
    {
        $dados = [
            'token' => $token
        ];

        $condicao = [
            'id' => $user->getId()
        ];

        if ($this->db->atualizar('$this->table', $dados, $condicao)) {
            $user->setToken($token);
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($user, $newPassword)
    {
        $dados = [
            'senha' => password_hash($newPassword, PASSWORD_DEFAULT)
        ];

        $condicao = [
            "id" => $user->getId()
        ];

        return $this->db->atualizar('$this->table', $dados, $condicao);
    }

    public function checkPassword($user, $password)
    {
        return password_verify($password, $user->getSenha());
    }

    public function updateEmail($user, $newEmail)
    {
        $dados = [
            'email' => strtolower($newEmail)
        ];

        $condicao = [
            "id" => $user->getId()
        ];

        return $this->db->atualizar('$this->table', $dados, $condicao) ? true : false;
    }

    public function checkEmail($user, $password)
    {
        return strcasecmp($password, $user->getSenha()) ? false : true;
    }

    public function getUserByNome($nome)
    {
        $query = "SELECT * FROM $this->table WHERE nome = :nome";
        $parametros = ['nome' => $nome];
        $resultado = $this->db->consultar($query, $parametros);

        if (count($resultado) == 1) {
            return $this->generateObject($resultado[0]);
        } else {
            return null;
        }
    }

    public function count()
    {
        return sizeof($this->all());
    }

    private function generateObjectsList($userList)
    {
        $users = [];
        foreach ($userList as $user) {
            $users[] = $this->generateObject($user);
        }
        return $users;
    }

    private function generateObject($userReg)
    {
        $user = new User();

        $user->setId($userReg['id']);
        $user->setNome($userReg['nome']);
        $user->setEmail($userReg['email']);
        $user->setSenha($userReg['senha']);
        $user->setAtivo($userReg['ativo']);
        $user->setPerfil($userReg['perfil']);
        $user->setToken($userReg['token']);
        $user->setResetToken($userReg['reset_token']);
        $user->setResetTokenExpires($userReg['reset_token_expires']);

        return $user;
    }
}