<?php

namespace App\Controllers;

use App\Database\Database;
use App\Models\Compra;
use App\Models\SituacaoCotacao;
use App\Repositories\ClienteRepository;
use App\Repositories\CompraRepository;
use App\Repositories\CotacaoFasesRepository;
use App\Repositories\FornecedorRepository;
use App\Repositories\GrupoMaterialRepository;
use App\Repositories\LocalEntregaRepository;
use App\Repositories\LocalRepository;
use App\Repositories\PrioridadeCompraRepository;
use App\Repositories\SituacaoCotacaoRepository;
use App\Repositories\UsuarioRepository;
use App\Views\ViewController;
use DateTime;

class CompraController
{
    private Database $conn;
    private ViewController $view;
    private GrupoMaterialRepository $grupoMaterialRepository;
    private PrioridadeCompraRepository $prioridadeCompraRepository;
    private CompraRepository $compraRepository;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->view = new ViewController();
        $this->grupoMaterialRepository = new GrupoMaterialRepository($conn);
        $this->prioridadeCompraRepository = new PrioridadeCompraRepository($conn);
        $this->compraRepository = new CompraRepository($conn);
    }
    public function compras(array $args = []): void
    {
        if($_SERVER['REQUEST_METHOD'] === "GET")
            $this->view->render('dashboard/compras');
        if($_SERVER['REQUEST_METHOD'] === "POST")
            $this->view->render('dashboard/compras/');
    }

    public function new(): void
    {
        $clienteRepository = new ClienteRepository($this->conn);

        $clientes = [];

        foreach($_SESSION['usuario']['clientes'] as $idCliente) {
            $clientes[] = $clienteRepository->find($idCliente);
        }

        usort($clientes, function($a, $b) {
            return strcmp($a->getNomeEmpresa(), $b->getNomeEmpresa());
        });

        $grupos = $this->grupoMaterialRepository->all();
        $prioridades = $this->prioridadeCompraRepository->all();

        $this->view->render('dashboard/compras/novo', [
            'gruposMaterial' => $grupos,
            'prioridades' => $prioridades,
            'clientes' => $clientes]);
    }

    /**
     * @inheritDoc
     */
    public function add(array $args = []): void
    {
        $novaCompra = new Compra();

        $clienteRepository = new ClienteRepository($this->conn);
        $cliente = $clienteRepository->find($args['cliente']);

        $localRepository = new LocalRepository($this->conn);
        $local = $localRepository->find($args['local']);

        $grupo = $this->grupoMaterialRepository->find($args['grupo']);

        $prioridade = $this->prioridadeCompraRepository->find($args['prioridade']);

        $situacaoRepository = new SituacaoCotacaoRepository($this->conn);
        $situacao = $situacaoRepository->find(1);

        $novaCompra->setIdOperador($_SESSION['usuario']['id']);
        $novaCompra->setCliente($cliente);
        $novaCompra->setLocal($local);
        $novaCompra->setGrupoMaterial($grupo);
        $novaCompra->setDtSolicitacao(new \DateTime('now'));
        $novaCompra->setPrioridade($prioridade);
        $novaCompra->setObservacoes($args['observacoes']);
        $novaCompra->setSituacao($situacao);

        $sucess = $this->compraRepository->create($novaCompra);
        if($sucess)
            $id = $this->compraRepository->getCompra()->getId();
        else
            $id = 0;

        // Converter o array associativo em JSON
        $json = json_encode(['sucess' => $sucess, 'id' => $id], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        header('Content-Type: application/json');
        echo $json;
    }

    /**
     * @inheritDoc
     */
    public function show(array $args = []): void
    {
        $compra = $this->compraRepository->find($args['id']);

        $userRepository = new UsuarioRepository($this->conn);
        $operador = $userRepository->find($compra->getIdOperador());

        $fornecedorRepository = new FornecedorRepository($this->conn);
        $fornecedores = $fornecedorRepository->findBy("tipo", 2);

        $localEntregaRepository = new LocalEntregaRepository($this->conn);
        $locaisEntrega = $localEntregaRepository->findBy("id_cliente", $compra->getCliente()->getId());

        $cotacaoFasesRepository = new CotacaoFasesRepository($this->conn);
        $workflow = $cotacaoFasesRepository->workflow($compra->getId());

        $this->view->render('dashboard/compras/detalhe', [
            'compra' => $compra,
            'nomeOperador' => $operador->getNome(),
            'fornecedores' => $fornecedores,
            'locaisEntrega' => $locaisEntrega,
            'workflow' => $workflow
        ]);
    }

    /**
     * @throws \Exception
     */
    public function list(): void
    {
        $clienteRepository = new ClienteRepository($this->conn);
        $situacaoCotacaoReposity = new SituacaoCotacaoRepository($this->conn);

        $clientes = [];

        foreach($_SESSION['usuario']['clientes'] as $idCliente) {
            $clientes[] = $clienteRepository->find($idCliente);
        }

        usort($clientes, function($a, $b) {
            return strcmp($a->getNomeEmpresa(), $b->getNomeEmpresa());
        });

        $situacoes = $situacaoCotacaoReposity->all();

        $this->view->render('dashboard/compras/solicitacoes', [
            "clientes" => $clientes,
            "situacoes" => $situacoes
        ]);
    }

    public function print(array $args = []): void
    {
        $compra = $this->compraRepository->find($args['id']);

        $localEntregaRepository = new LocalEntregaRepository($this->conn);
        $localEntrega = $localEntregaRepository->findBy("id_cliente", $compra->getCliente()->getId());

        $this->view->render('dashboard/compras/impressao', [
            "compra" => $compra,
            "materiais" => [],
            "localEntrega", $localEntrega,
        ]);
    }

    /**
     * @throws \Exception
     */
    public function search(array $args = []): void
    {
        $solicitacoes = [];

        if ($args['cliente'] === "") {
            foreach($_SESSION['usuario']['clientes'] as $idCliente) {
                $solicitacoes = array_merge($solicitacoes, $this->compraRepository->findBy('id_cliente', $idCliente));
            }
        } else {
            $solicitacoes = $this->compraRepository->findBy('id_cliente', $args['cliente']);
        }

        foreach ($solicitacoes as $key => $solicitacao) {
            // Verifica se a condição de data inicial é atendida
            if ($args['data_inicial'] !== "" && $solicitacao->getDtSolicitacao()->format('Y-m-d') < ((new DateTime($args['data_inicial']))->format('Y-m-d'))) {
                unset($solicitacoes[$key]); // Remove o elemento
                continue; // Pula para a próxima iteração
            }

            // Verifica se a condição de data final é atendida
            if ($args['data_final'] !== "" && $solicitacao->getDtSolicitacao()->format('Y-m-d') > ((new DateTime($args['data_final']))->format('Y-m-d'))) {
                unset($solicitacoes[$key]);
                continue;
            }

            // Verifica se a condição de situação é atendida
            if ($args['situacao'] !== "" && $solicitacao->getSituacao()->getSituacao() !== $args['situacao']) {
                unset($solicitacoes[$key]);
            }
        }

        // Reorganiza os índices do array, se necessário
        $solicitacoes = array_values($solicitacoes);

        // Iterar sobre os objetos e extrair os dados
        $resultado = array_map([$this, 'extractCompra'], $solicitacoes);

        // Converter o array associativo em JSON
        $json = json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        header('Content-Type: application/json');
        echo $json;
    }

    private function extractCompra($compras): array
    {
        $usuarioRepository = new UsuarioRepository($this->conn);
        $usuario = $usuarioRepository->find((int) $compras->getIdOperador());
        if($usuario) $nomeOperador = $usuario->getNome(); else $nomeOperador = "";
        return [
            'numero' => $compras->getId(),
            'data' => $compras->getDtSolicitacao()->format('d/m/Y H:m'),
            'cliente' => $compras->getCliente()->getNomeEmpresa(),
            'local' => $compras->getLocal()->getDescricao(),
            'operador' => $nomeOperador,
            'prioridade' => $compras->getPrioridade()->getPrioridade(),
            'situacao' => $compras->getSituacao()->getSituacao(),
            'idSituacao' => $compras->getSituacao()->getId()
        ];
    }
}