<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class DashboardRoutes implements RoutesInterface
{
    public static function load(): array
    {
        return [
            '/dashboard' => [
                'controller' => 'DashboardController',
                'method' => 'index',
                'public' => true
            ],
            '/cadastros-gerais/cargos' => [
                'controller' => 'DashboardController',
                'method' => 'cargos',
                'public' => true
            ],
            '/cadastros-gerais/categorias' => [
                'controller' => 'DashboardController',
                'method' => 'categorias',
                'public' => true
            ],
            '/cadastros-gerais/categorias-servicos' => [
                'controller' => 'DashboardController',
                'method' => 'categoriasServicos',
                'public' => true
            ],
            '/cadastros-gerais/esferas' => [
                'controller' => 'DashboardController',
                'method' => 'esferas',
                'public' => true
            ],
            '/cadastros-gerais/feriados' => [
                'controller' => 'DashboardController',
                'method' => 'feriados',
                'public' => true
            ],
            '/cadastros-gerais/tipos-os' => [
                'controller' => 'DashboardController',
                'method' => 'tiposOS',
                'public' => true
            ],
            '/cadastros-gerais/situacoes-ss' => [
                'controller' => 'DashboardController',
                'method' => 'situacoesSS',
                'public' => true
            ],
            '/cadastros-gerais/situacoes-os' => [
                'controller' => 'DashboardController',
                'method' => 'situacoesOS',
                'public' => true
            ],
            '/cadastros-gerais/prioridades-os' => [
                'controller' => 'DashboardController',
                'method' => 'prioridadesOS',
                'public' => true
            ],
            '/cadastros-gerais/relatorios' => [
                'controller' => 'DashboardController',
                'method' => 'relatoriosCadastro',
                'public' => true
            ],
            '/cadastros-gerais/modelos-impressao' => [
                'controller' => 'DashboardController',
                'method' => 'modelosImpressao',
                'public' => true
            ],
            '/cadastros-gerais/formas-pagamento' => [
                'controller' => 'DashboardController',
                'method' => 'formasPagamento',
                'public' => true
            ],
            '/materiais/unidades' => [
                'controller' => 'DashboardController',
                'method' => 'unidades',
                'public' => true
            ],
            '/materiais/grupos-material' => [
                'controller' => 'DashboardController',
                'method' => 'gruposMaterial',
                'public' => true
            ],
            '/materiais/subgrupos-material' => [
                'controller' => 'DashboardController',
                'method' => 'subGruposMaterial',
                'public' => true
            ],
            '/materiais/classes-material' => [
                'controller' => 'DashboardController',
                'method' => 'classesMaterial',
                'public' => true
            ],
            '/materiais/marcas-material' => [
                'controller' => 'DashboardController',
                'method' => 'marcasMaterial',
                'public' => true
            ],
            '/materiais' => [
                'controller' => 'DashboardController',
                'method' => 'materiais',
                'public' => true
            ],
            '/materiais/materiais-sco' => [
                'controller' => 'DashboardController',
                'method' => 'materiaisSCO',
                'public' => true
            ],
            '/ferramentas' => [
                'controller' => 'DashboardController',
                'method' => 'ferramentas',
                'public' => true
            ],
            '/profissionais' => [
                'controller' => 'DashboardController',
                'method' => 'profissionais',
                'public' => true
            ],
            '/clientes' => [
                'controller' => 'DashboardController',
                'method' => 'clientes',
                'public' => true
            ],
            '/fornecedores' => [
                'controller' => 'DashboardController',
                'method' => 'fornecedores',
                'public' => true
            ],
            '/solicitacao/equipamento/nova' => [
                'controller' => 'DashboardController',
                'method' => 'solicitacaoEquipamento',
                'public' => true
            ],
            '/solicitacao/lista' => [
                'controller' => 'DashboardController',
                'method' => 'solicitacaoLista',
                'public' => true
            ],
            '/solicitacao/servico/nova' => [
                'controller' => 'DashboardController',
                'method' => 'solicitacaoServico',
                'public' => true
            ],
            '/solicitacao/servico/autorizar' => [
                'controller' => 'DashboardController',
                'method' => 'solicitacaoServicoAutorizar',
                'public' => true
            ],
            '/ordem-servico/lista' => [
                'controller' => 'DashboardController',
                'method' => 'ordemServicoLista',
                'public' => true
            ],
            '/relatorios' => [
                'controller' => 'DashboardController',
                'method' => 'relatorios',
                'public' => true
            ],
            '/obras' => [
                'controller' => 'DashboardController',
                'method' => 'obras',
                'public' => true
            ],
            '/pmoc' => [
                'controller' => 'DashboardController',
                'method' => 'pmoc',
                'public' => true
            ],
            '/operadores' => [
                'controller' => 'DashboardController',
                'method' => 'operadores',
                'public' => true
            ],
            '/operador/add' => [
                'controller' => 'DashboardController',
                'method' => 'operadorAdd',
                'public' => true
            ],
        ];
    }
}