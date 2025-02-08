<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\{
    CargoRepository,
    CategoriaRepository,
    CategoriaServicoRepository,
    ClasseMaterialRepository,
    EsferaRepository,
    FeriadoRepository,
    FormaPagamentoRepository,
    GrupoMaterialRepository,
    MarcaMaterialRepository,
    MaterialRepository,
    MaterialSCORepository,
    ModeloImpressaoRepository,
    PrioridadeOSRepository,
    ProfissionalRepository,
    RelatorioRepository,
    SituacaoOSRepository,
    SituacaoSSRepository,
    SubGrupoMaterialRepository,
    TipoOSRepository,
    UnidadeRepository,
    UsuarioRepository
};
use App\Views\ViewController;

class DashboardController
{
    private Database $conn;
    private ViewController $view;
    private CargoRepository $cargoRepository;
    private CategoriaRepository $categoriaRepository;
    private CategoriaServicoRepository $categoriaServicoRepository;
    private EsferaRepository $esferaRepository;
    private FeriadoRepository $feriadoRepository;
    private TipoOSRepository $tipoOSRepository;
    private SituacaoSSRepository $situacaoSSRepository;
    private SituacaoOSRepository $situacaoOSRepository;
    private PrioridadeOSRepository $prioridadeOSRepository;
    private RelatorioRepository $relatorioRepository;
    private ModeloImpressaoRepository $modeloImpressaoRepository;
    private FormaPagamentoRepository $formaPagamentoRepository;
    private UnidadeRepository $unidadesRepository;
    private GrupoMaterialRepository $grupoMaterialRepository;
    private SubGrupoMaterialRepository $subGruposMaterialRepository;
    private ClasseMaterialRepository $classeMaterialRepository;
    private MarcaMaterialRepository $marcaMaterialRepository;
    private MaterialRepository $materiaisRepository;
    private ProfissionalRepository $profissionaisRepository;
    private UsuarioRepository $usuarioRepository;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        $this->view = new ViewController();
        $this->cargoRepository = new CargoRepository($conn);
        $this->categoriaRepository = new CategoriaRepository($conn);
        $this->categoriaServicoRepository = new CategoriaServicoRepository($conn);
        $this->esferaRepository = new EsferaRepository($conn);
        $this->feriadoRepository = new FeriadoRepository($conn);
        $this->tipoOSRepository = new TipoOSRepository($conn);
        $this->situacaoSSRepository = new SituacaoSSRepository($conn);
        $this->situacaoOSRepository = new SituacaoOSRepository($conn);
        $this->prioridadeOSRepository = new PrioridadeOSRepository($conn);
        $this->relatorioRepository = new RelatorioRepository($conn);
        $this->modeloImpressaoRepository = new ModeloImpressaoRepository($conn);
        $this->formaPagamentoRepository = new FormaPagamentoRepository($conn);
        $this->unidadesRepository = new UnidadeRepository($conn);
        $this->grupoMaterialRepository = new GrupoMaterialRepository($conn);
        $this->subGruposMaterialRepository = new SubGrupoMaterialRepository($conn);
        $this->classeMaterialRepository = new ClasseMaterialRepository($conn);
        $this->marcaMaterialRepository = new MarcaMaterialRepository($conn);
        $this->materiaisRepository = new MaterialRepository($conn);
        $this->profissionaisRepository = new ProfissionalRepository($conn);
        $this->usuarioRepository = new UsuarioRepository($conn);
    }

    public function index(array $arg = []): void
    {
        // Gera a URL para exibir a foto do perfil
        $fotoUrl = "/perfil/foto?file=" . urlencode($_SESSION['usuario']['foto']);

        /*if($arg['nivel'] === "cliente")
            $this->view->render("dashboard/home/cliente");
        if($arg['nivel'] === "administrador")*/
            $this->view->render("dashboard/home/admin", ["foto" => $fotoUrl]);
    }

    public function perfil(array $args = []): void
    {
        $fotoUrl = "/perfil/foto?file=" . urlencode($_SESSION['usuario']['foto']);
        $this->view->render("dashboard/perfil/perfil", ["foto" => $fotoUrl]);
    }

    public function fotoPerfil(array $args = []): void
    {
        $this->view->render("dashboard/perfil/mudar_foto");
    }

    public function solicitacaoEquipamento()
    {
        $this->view->render("dashboard/solicitacao/equipamento/nova");
    }

    public function solicitacaoLista()
    {
        $this->view->render("dashboard/solicitacao/lista");
    }

    public function solicitacaoServico()
    {
        $this->view->render("dashboard/solicitacao/servico/nova");
    }

    public function solicitacaoServicoAutorizar()
    {
        $this->view->render("dashboard/solicitacao/servico/autorizar");
    }

    public function ordemServicoLista()
    {
        $this->view->render("dashboard/ordem-servico/lista");
    }

    public function senha()
    {
        $this->view->render("dashboard/perfil/senha");
    }

    public function foto()
    {
        $this->view->render("dashboard/perfil/foto");
    }

    public function obras()
    {
        $this->view->render("dashboard/obras/obras");
    }
    public function relatorios(): void
    {
        $this->view->render('dashboard/relatorios');
    }

    public function pmoc(): void
    {
        $this->view->render('dashboard/pmoc');
    }

    public function usuarios(): void
    {
        $usuarios = $this->usuarioRepository->all();
        $this->view->render('dashboard/acessos/usuarios', ["usuarios" => $usuarios]);
    }

    public function operadores(): void
    {
        $this->view->render('dashboard/acessos/operadores');
    }

    public function operadorAdd(): void
    {
        $this->view->render('dashboard/acessos/operadores_add');
    }

    public function cargos(): void
    {
        $cargos = $this->cargoRepository->all();
        $this->view->render('dashboard/cadastros-gerais/cargos', ['cargos' => $cargos]);
    }

    public function categorias(): void
    {
        $categorias = $this->categoriaRepository->all();
        $this->view->render('dashboard/cadastros-gerais/categorias', ['categorias' => $categorias]);
    }

    public function categoriasServicos(): void
    {
        $categorias = $this->categoriaRepository->all();
        $categoriasServico = $this->categoriaServicoRepository->all();
        $this->view->render('dashboard/cadastros-gerais/categorias-servicos', [
            "categorias" => $categorias,
            "categoriasServicos" => $categoriasServico
        ]);
    }

    public function esferas():void
    {
        $esferas = $this->esferaRepository->all();
        $this->view->render('dashboard/cadastros-gerais/esferas', ["esferas" => $esferas]);
    }

    public function feriados(): void
    {
        $feriados = $this->feriadoRepository->all();
        $this->view->render('dashboard/cadastros-gerais/feriados', ["feriados" => $feriados]);
    }

    public function tiposOS(): void
    {
        $tiposOS = $this->tipoOSRepository->all();
        $this->view->render('dashboard/cadastros-gerais/tipos-os', ["tiposOS" => $tiposOS]);
    }

    public function situacoesSS(): void
    {
        $situacoesSS = $this->situacaoSSRepository->all();
        $this->view->render('dashboard/cadastros-gerais/situacoes-ss', ["situacoesSS" => $situacoesSS]);
    }

    public function situacoesOS(): void
    {
        $situacoesOS = $this->situacaoOSRepository->all();
        $this->view->render('dashboard/cadastros-gerais/situacoes-os', ["situacoesOS" => $situacoesOS]);
    }

    public function prioridadesOS(): void
    {
        $prioridadesOS = $this->prioridadeOSRepository->all();
        $this->view->render('dashboard/cadastros-gerais/prioridades-os', ["prioridadesOS" => $prioridadesOS]);
    }

    public function relatoriosCadastro(): void
    {
        $relatorios = $this->relatorioRepository->all();
        $this->view->render('dashboard/cadastros-gerais/relatorios', ["relatorios" => $relatorios]);
    }

    public function modelosImpressao(): void
    {
        $modelosImpressao = $this->modeloImpressaoRepository->all();
        $this->view->render('dashboard/cadastros-gerais/modelos-impressao', ["modelosImpressao" => $modelosImpressao]);
    }

    public function formasPagamento(): void
    {
        $formasPagamento = $this->formaPagamentoRepository->all();
        $this->view->render('dashboard/cadastros-gerais/formas-pagamento', ["formasPagamento" => $formasPagamento]);
    }

    public function unidades(): void
    {
        $unidades = $this->unidadesRepository->all();
        $this->view->render('dashboard/materiais/unidades', ["unidades" => $unidades]);
    }

    public function gruposMaterial(): void
    {
        $gruposMaterial = $this->grupoMaterialRepository->all();
        $this->view->render('dashboard/materiais/grupos-material', ["gruposMaterial" => $gruposMaterial]);
    }

    public function subGruposMaterial(): void
    {
        $gruposMaterial = $this->grupoMaterialRepository->all();
        $subGruposMaterial = $this->subGruposMaterialRepository->all();
        $this->view->render('dashboard/materiais/subgrupos-material', [
            "subGruposMaterial" => $subGruposMaterial,
            "gruposMaterial" => $gruposMaterial
        ]);
    }

    public function classesMaterial(): void
    {
        $gruposMaterial = $this->grupoMaterialRepository->all();
        $classesMaterial = $this->classeMaterialRepository->all();
        $this->view->render('dashboard/materiais/classes-material', [
            "gruposMaterial" => $gruposMaterial,
            "classesMaterial" => $classesMaterial
        ]);
    }

    public function marcasMaterial(): void
    {
        $gruposMaterial = $this->grupoMaterialRepository->all();
        $marcasMaterial = $this->marcaMaterialRepository->all();
        $this->view->render('dashboard/materiais/marcas-material', [
            "gruposMaterial" => $gruposMaterial,
            "marcasMaterial" => $marcasMaterial
        ]);
    }

    public function materiais(): void
    {
        $gruposMaterial = $this->grupoMaterialRepository->all();
        $marcasMaterial = $this->marcaMaterialRepository->all();
        $unidades = $this->unidadesRepository->all();
        $materiais = $this->materiaisRepository->all();

        $this->view->render('dashboard/materiais/materiais', [
            "gruposMaterial" => $gruposMaterial,
            "unidades" => $unidades,
            "marcasMaterial" => $marcasMaterial,
            "materiais" => $materiais,
        ]);
    }

    public function materiaisSCO(array $args = []): void
    {
        $args["page-search"] = "materiais-sco";
        if(!isset($args['acao']))
            $this->view->render('dashboard/materiais/materiais-sco', ["acao" => "pesquisa"]);
        if(isset($args['acao']) && $args['acao'] === "pesquisa") {
            $materialSCOController = new MaterialSCOController($this->conn);
            $materialSCOController->search($args);
        }
        if(isset($args['acao']) && $args['acao'] === "resultado")
            $this->view->render('dashboard/materiais/materiais-sco', ["acao" => "resultado"]);
    }

    public function materiaisSCOAtualizar(array $args = []): void
    {
        $args["page-search"] = "materiais-sco-atualizar-valor";
        if(!isset($args['acao']))
            $this->view->render('dashboard/materiais/materiais-sco-atualizar-valor', ["acao" => "pesquisa"]);
        if(isset($args['acao']) && $args['acao'] === "pesquisa") {
            $materialSCOController = new MaterialSCOController($this->conn);
            $materialSCOController->search($args);
        }
        if(isset($args['acao']) && $args['acao'] === "resultado")
            $this->view->render('dashboard/materiais/materiais-sco-atualizar-valor', ["acao" => "resultado"]);
    }

    public function ferramentas(): void
    {
        //$gruposMaterial = $this->grupoMaterialRepository->all();
        $this->view->render('dashboard/ferramentas/ferramentas', ["ferramentas" => []]);
    }

    public function profissionais(): void
    {
        $profissionais = $this->profissionaisRepository->all();
        $cargos = $this->cargoRepository->all();

        $this->view->render('dashboard/profissionais/profissionais', [
            "profissionais" => $profissionais,
            "cargos" => $cargos
        ]);
    }

    public function clientes(): void
    {
        $clienteController = new ClienteController($this->conn);
        $clienteController->list();
    }

    public function fornecedores(): void
    {
        $this->view->render('dashboard/clientes/fornecedores');
    }

    public function caixinhas(): void
    {
        $this->view->render('dashboard/caixinha/caixinhas', ["caixinhas" => []]);
    }

    public function caixinhasDetalhes(): void
    {
        $this->view->render('dashboard/caixinha/ficha-caixinha', []);
    }
}