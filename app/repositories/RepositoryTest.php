<?php

namespace App\Repositories;

use App\Models\Endereco;
use App\Models\Teste;
use App\Repositories\Repository;
use App\Database\Database;
use Exception;

class RepositoryTest
{
    private $repository;
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
        $this->repository = new Repository($this->db, 'Teste');
    }

    public function testCreate()
    {
        $endereco = new Endereco();
        $endereco->setLogradouro('Rua Teste');
        $endereco->setNumero('123');

        $teste = new Teste();
        $teste->setDescricao('Teste 1');
        $teste->setEndereco($endereco);
        $teste->setCreatedAt(new \DateTime('now'));

        $result = $this->repository->create($teste);
        $this->repository->create($teste);
        $teste = $this->repository->getObject();
        $this->assertTrue($result, "Erro ao criar registro.");

        // Limpar o registro criado para o próximo teste
        $this->repository->delete($teste);
    }

    public function testUpdate()
    {
        // Criar um registro para atualizar
        $endereco = new Endereco();
        $endereco->setLogradouro('Rua Teste');
        $endereco->setNumero('123');

        $teste = new Teste();
        $teste->setDescricao('Teste Inicial');
        $teste->setEndereco($endereco);
        $teste->setCreatedAt(new \DateTime('now'));
        $this->repository->create($teste);
        $teste = $this->repository->getObject();

        // Atualizar o registro
        $teste->setDescricao('Teste Atualizado');
        $result = $this->repository->update($teste);
        $this->assertTrue($result, "Erro ao atualizar registro.");

        // Limpar o registro criado para o próximo teste
        $this->repository->delete($teste);
    }

    public function testDelete()
    {
        // Criar um registro para excluir
        $endereco = new Endereco();
        $endereco->setLogradouro('Rua Teste');
        $endereco->setNumero('123');

        $teste = new Teste();
        $teste->setDescricao('Teste para Exclusão');
        $teste->setEndereco($endereco);
        $teste->setCreatedAt(new \DateTime('now'));
        $this->repository->create($teste);
        $teste = $this->repository->getObject();

        $result = $this->repository->delete($teste);
        $this->assertTrue($result, "Erro ao excluir registro.");
    }

    public function testFind()
    {
        // Criar um registro para buscar
        $endereco = new Endereco();
        $endereco->setLogradouro('Rua Teste');
        $endereco->setNumero('123');

        $teste = new Teste();
        $teste->setDescricao('Teste para Busca');
        $teste->setEndereco($endereco);
        $teste->setCreatedAt(new \DateTime('now'));
        $this->repository->create($teste);
        $teste = $this->repository->getObject();

        $testeEncontrado = $this->repository->find('App\Models\Teste', $teste->getId());
        $this->assertEquals($teste->getDescricao(), $testeEncontrado->getDescricao(), "Descrição não corresponde.");

        // Limpar o registro criado para o próximo teste
        $this->repository->delete($teste);
    }

    public function testFindBy()
    {
        // Criar um registro para buscar
        $endereco = new Endereco();
        $endereco->setLogradouro('Rua Teste');
        $endereco->setNumero('123');

        $teste = new Teste();
        $teste->setDescricao('Teste para Busca');
        $teste->setEndereco($endereco);
        $teste->setCreatedAt(new \DateTime('now'));
        $this->repository->create($teste);
        $teste = $this->repository->getObject();

        $resultados = $this->repository->findBy('App\Models\Teste', 'descricao', 'Teste para Busca');
        $this->assertCount(1, $resultados, "Deveria encontrar apenas um registro.");
        $this->assertEquals($teste->getDescricao(), $resultados[0]->getDescricao());

        // Limpar o registro criado para o próximo teste
        $this->repository->delete($teste);
    }

    public function testAll()
    {
        // Criar dois registros para buscar
        $endereco1 = new Endereco();
        $endereco1->setLogradouro('Rua Teste 1');
        $endereco1->setNumero('123');

        $teste1 = new Teste();
        $teste1->setDescricao('Teste 1');
        $teste1->setEndereco($endereco1);
        $teste1->setCreatedAt(new \DateTime('now'));
        $this->repository->create($teste1);
        $teste1 = $this->repository->getObject();

        $endereco2 = new Endereco();
        $endereco2->setLogradouro('Rua Teste 2');
        $endereco2->setNumero('456');

        $teste2 = new Teste();
        $teste2->setDescricao('Teste 2');
        $teste2->setEndereco($endereco2);
        $teste2->setCreatedAt(new \DateTime('now'));
        $this->repository->create($teste2);
        $teste2 = $this->repository->getObject();

        $resultados = $this->repository->all();
        $this->assertCount(2, $resultados, "Deveria encontrar dois registros.");

        // Limpar os registros criados para o próximo teste
        $this->repository->delete($teste1);
        $this->repository->delete($teste2);
    }

    private function assertTrue($condition, $message = '') {
        if (!$condition) {
            throw new Exception("Assertion failed: $message");
        }
    }

    private function assertEquals($expected, $actual, $message = '') {
        if ($expected !== $actual) {
            throw new Exception("Assertion failed: $message. Expected: " . var_export($expected, true) . ", Actual: " . var_export($actual, true));
        }
    }

    private function assertCount($expectedCount, $array, $message = '') {
        if (count($array) !== $expectedCount) {
            throw new Exception("Assertion failed: $message. Expected count: $expectedCount, Actual count: " . count($array));
        }
    }
}