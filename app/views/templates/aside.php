<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <div class="user-panel">
            <div class="pull-left image" onClick="window.location='/perfil';" style="cursor:pointer;">
                <img src="<?= "/perfil/foto?file=" . urlencode($_SESSION['usuario']['foto']); ?>" class="img-circle" title="Meu Perfil" alt="Imagem de Perfil">
            </div>
            <div class="pull-left info">
                <p class="user-name"><?= $_SESSION['usuario']['nome'] ?></p>
                <span class="user-status">Online</span>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart mr-2"></i><span>Compras</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="compras/novo"><i class="fa fa-cart-plus mr-2"></i>Solicitar Compras</a></li>
                    <li><a href="/compras"><i class="fa fa-search mr-2"></i>Verificar Solicitações</a></li>
                    <li><a href="compras/levantamentos/novo"><i class="fa fa-plus mr-2"></i>Cadastro Levantamento</a></li>
                    <li><a href="compras/levantamentos"><i class="fa fa-search mr-2"></i>Levantamentos Realizados</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder mr-2"></i><span>Cadastros Gerais</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="cadastros-gerais/cargos"><i class="fa fa-user-nurse mr-2"></i>Cargos</a></li>
                    <li><a href="cadastros-gerais/categorias"><i class="fa fa-tag mr-2"></i>Categorias</a></li>
                    <li><a href="cadastros-gerais/categorias-servicos"><i class="fa fa-bookmark mr-2"></i>Categorias Serviços</a></li>
                    <li><a href="cadastros-gerais/esferas"><i class="fa fa-circle mr-2"></i>Esferas</a></li>
                    <li><a href="cadastros-gerais/feriados"><i class="fa fa-calendar-days mr-2"></i>Feriados</a></li>
                    <li><a href="cadastros-gerais/tipos-os"><i class="fa fa-scroll mr-2"></i>Tipos de OS</a></li>
                    <li><a href="cadastros-gerais/situacoes-ss"><i class="fa fa-window-restore mr-2"></i>Situações SS</a></li>
                    <li><a href="cadastros-gerais/situacoes-os"><i class="fa fa-square-poll-horizontal mr-2"></i>Situações OS</a></li>
                    <li><a href="cadastros-gerais/prioridades-os"><i class="fa fa-circle-exclamation mr-2"></i>Prioridades de OS</a></li>
                    <li><a href="cadastros-gerais/relatorios"><i class="fa fa-file-lines mr-2"></i>Relatórios</a></li>
                    <li><a href="cadastros-gerais/modelos-impressao"><i class="fa fa-print mr-2"></i>Modelos de Impressão</a></li>
                    <li><a href="cadastros-gerais/formas-pagamento"><i class="fa fa-cash-register mr-2"></i>Formas de Pagamento</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes mr-2"></i><span>Materiais</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="materiais/unidades"><i class="fa fa-scale-balanced mr-2"></i>Unidades</a></li>
                    <li><a href="materiais/grupos-material"><i class="fa fa-layer-group mr-2"></i>Grupos de Material</a></li>
                    <li><a href="materiais/subgrupos-material"><i class="fa fa-object-ungroup mr-2"></i>Subgrupos de Material</a></li>
                    <li><a href="materiais/classes-material"><i class="fa fa-bars-staggered mr-2"></i>Classes de Material</a></li>
                    <li><a href="materiais/marcas-material"><i class="fa fa-registered mr-2"></i>Marcas</a></li>
                    <li><a href="/materiais"><i class="fa fa-trowel-bricks mr-2"></i>Materiais</a></li>
                    <li><a href="materiais/materiais-sco"><i class="fa fa-search mr-2"></i>Materiais SCO</a></li>
                    <li><a href="materiais/materiais-sco/valor/atualizar"><i class="fa fa-repeat mr-2"></i>Atualizar Valor SCO</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-screwdriver-wrench mr-2"></i><span>Ferramentas</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="ferramentas/novo"><i class="fa fa-plus mr-2"></i>Adicionar Ferramenta</a></li>
                    <li><a href="/ferramentas"><i class="fa fa-search mr-2"></i>Verificar Ferramentas</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-helmet-safety mr-2"></i><span>Equipamentos</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-folder-open mr-2"></i><span>Cadastros</span></a>
                        <ul class="treeview-menu">
                            <li><a href="equipamentos/cadastros/grupos"><i class="fa fa-layer-group mr-2"></i>Grupos</a></li>
                            <li><a href="equipamentos/cadastros/subgrupos"><i class="fa fa-object-ungroup mr-2"></i>SubGrupos</a></li>
                            <li><a href="equipamentos/cadastros/classes"><i class="fa fa-bars-staggered mr-2"></i>Classes</a></li>
                            <li><a href="equipamentos/cadastros/situacoes"><i class="fa fa-diagram-project mr-2"></i>Situações</a></li>
                            <li><a href="equipamentos/cadastros/marcas"><i class="fa fa-registered mr-2"></i>Marcas</a></li>
                            <li><a href="equipamentos/cadastros/modelos"><i class="fa fa-trademark mr-2"></i>Modelos</a></li>
                            <li><a href="equipamentos/novo"><i class="fa fa-plus mr-2"></i>Adicionar Equipamento</a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="fa fa-cog mr-2"></i><span>Operacional</span></a>
                        <ul class="treeview-menu">
                            <li><a href="/equipamentos"><i class="fa fa-search mr-2"></i>Verificar Equipamentos</a></li>
                            <li><a href="/solicitacoes-servico"><i class="fa fa-search mr-2"></i>Verificar Solicitações</a></li>
                            <li><a href="/ordens-servico"><i class="fa fa-search mr-2"></i>Verificar OS</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar mr-2"></i><span>Planos de Manutenção</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="planos-manutencao/novo"><i class="fa fa-plus mr-2"></i>Adicionar Plano</a></li>
                    <li><a href="/planos-manutencao"><i class="fa fa-search mr-2"></i>Verificar Plano</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-tie mr-2"></i><span>Profissionais</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="profissionais/novo"><i class="fa fa-plus mr-2"></i>Adicionar Profissional</a></li>
                    <li><a href="/profissionais"><i class="fa fa-search mr-2"></i>Verificar Profissionais</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user mr-2"></i><span>Clientes</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="clientes/novo"><i class="fa fa-plus mr-2"></i>Adicionar Cliente</a></li>
                    <li><a href="/clientes"><i class="fa fa-search mr-2"></i>Verificar Clientes</a></li>
                    <li><a href="/fornecedores"><i class="fa fa-search mr-2"></i>Verificar Fornecedores</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-file-invoice mr-2"></i><span>Solicitações de Serviço</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/solicitacoes-servico"><i class="fa fa-search mr-2"></i>Verificar Solicitações</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="solicitacoes-servico/lote"><i class="fa fa-check mr-2"></i>Concluir SS em Lote</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs mr-2"></i><span>Ordens de Serviço</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/ordens-servico"><i class="fa fa-search mr-2"></i>Verificar OS</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building mr-2"></i><span>Obras</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="obras/responsaveis-tecnicos"><i class="fa-solid fa-user-graduate mr-2"></i>Responsáveis Técnicos</a></li>
                    <li><a href="/obras/novo"><i class="fa fa-plus mr-2"></i>Adicionar Obra</a></li>
                    <li><a href="/obras"><i class="fa fa-search mr-2"></i>Verificar Obras</a></li>
                    <li><a href="obras/borderos"><i class="fa fa-file-contract mr-2"></i>Borderôs</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-boxes-stacked mr-2"></i><span>Estoque</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="estoques/entradas/novo"><i class="fa fa-plus mr-2"></i>Adicionar Entrada</a></li>
                    <li><a href="estoques/entradas"><i class="fa fa-search mr-2"></i>Verificar Entradas</a></li>
                    <li><a href="/estoques"><i class="fa fa-archive mr-2"></i>Estoque por Cliente</a></li>
                    <li><a href="estoques/movimentar"><i class="fa fa-boxes-packing mr-2"></i>Movimentar Material</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-lines mr-2"></i><span>Relatórios</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/relatorios/administracao"><i class="fa fa-briefcase mr-2"></i>Administração</a></li>
                    <li><a href="/relatorios/engenharia"><i class="fa fa-compass-drafting mr-2"></i>Engenharia</a></li>
                    <li><a href="/relatorios/faturamento"><i class="fa fa-file-invoice-dollar mr-2"></i>Faturamento</a></li>
                    <li><a href="/relatorios/refrigeracao"><i class="fa fa-snowflake mr-2"></i>Refrigeração</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users mr-2"></i><span>Acessos</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-user mr-2"></i><span>Usuários</span></a>
                        <ul class="treeview-menu">
                            <li><a href="/usuarios/novo"><i class="fa fa-plus mr-2"></i>Inserir Usuário</a></li>
                            <li><a href="/usuarios"><i class="fa fa-search mr-2"></i>Verificar Usuários</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-user-tie mr-2"></i><span>Operadores</span></a>
                        <ul class="treeview-menu">
                            <li><a href="/operadores/novo"><i class="fa fa-plus mr-2"></i>Inserir Operador</a></li>
                            <li><a href="/operadores"><i class="fa fa-search mr-2"></i>Verificar Operadores</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php /* endif; */ ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-usd mr-2"></i><span>Caixinhas</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <?php /* if($row_privi['master'] == '1') { */ ?>
                    <li><a href="caixinhas/novo"><i class="fa fa-piggy-bank mr-2"></i>Inserir Caixinha</a></li>
                    <?php /* } */ ?>
                    <li><a href="/caixinhas"><i class="fa fa-magnifying-glass-dollar mr-2"></i>Verificar Caixinha</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>