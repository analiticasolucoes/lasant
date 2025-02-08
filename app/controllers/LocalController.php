<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\LocalRepository;
use App\views\ViewController;

class LocalController
{
    private LocalRepository $localRepository;
    private ViewController $view;
    private Database $conn;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->localRepository = new LocalRepository($conn);
        $this->view = new ViewController();
    }

    /**
     * @inheritDoc
     */
    public function index(array $args = []): void
    {
        // TODO: Implement index() method.
    }

    /**
     * @inheritDoc
     */
    public function new(array $args = []): void
    {
        // TODO: Implement new() method.
    }

    /**
     * @inheritDoc
     */
    public function add(array $args = []): void
    {
        if($this->localRepository->create($args)) {
            header("Location: /clientes/detalhe?id={$args['cliente-id']}");
            exit;
        } else
            $this->view->render("error");
    }

    /**
     * @inheritDoc
     */
    public function show(array $args = []): void
    {
        // TODO: Implement show() method.
    }

    /**
     * @inheritDoc
     */
    public function alter(array $args = []): void
    {
        $local = $this->localRepository->find($args["id-local-modal"]);
        $clienteId = $local->getCliente()->getId();

        $local->setDescricao($args['descricao-local-modal']);
        $local->setCep($args['cep-local-modal']);
        $local->setLogradouro($args['logradouro-local-modal']);
        $local->setNumero($args['numero-local-modal']);
        $local->setComplemento($args['complemento-endereco-local-modal']);
        $local->setBairro($args['bairro-local-modal']);
        $local->setCidade($args['cidade-local-modal']);
        $local->setUf($args['uf-local-modal']);
        $local->setLatitude($args['latitude-local-modal']);
        $local->setLongitude($args['longitude-local-modal']);
        $local->setAreaTotal((float) $args['area-total-local-modal']);
        $local->setAreaConstruida((float) $args['area-construida-local-modal']);
        $local->setContato($args['contato-local-modal']);
        $local->setTelefone($args['tel-contato-local-modal']);

        if ($this->localRepository->update($local)) {
            header("Location: /clientes/detalhe?id={$clienteId}");
            exit;
        } else
            $this->view->render("error");
    }

    /**
     * @inheritDoc
     */
    public function remove(array $args = []): void
    {
        $local = $this->localRepository->find($args["id"]);
        $clienteId = $local->getCliente()->getId();
        if($this->localRepository->delete($local)) {
            header("Location: /clientes/detalhe?id={$clienteId}");
            exit;
        } else
            $this->view->render("error");
    }

    /**
     * @inheritDoc
     */
    public function search(array $args = []): void
    {
        // TODO: Implement search() method.
    }

    /**
     * @inheritDoc
     */
    public function list(array $args = []): void
    {

    }

    public function listByCliente(array $args): void
    {
        $locais = $this->localRepository->findBy('id_cliente', $args['cliente']);

        // Iterar sobre os objetos e extrair os dados
        $resultado = array_map([$this, 'extractLocal'], $locais);

        // Converter o array associativo em JSON
        $json = json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        header('Content-Type: application/json');
        echo $json;
    }

    private function extractLocal($locais): array
    {
        return [
            'id' => $locais->getId(),
            'cliente' => [
                'id' => $locais->getCliente()->getId(),
                'nome' => $locais->getCliente()->getNomeEmpresa(),
                'descricao' => $locais->getDescricao()
            ],
            'descricao' => $locais->getDescricao()
        ];
    }
}