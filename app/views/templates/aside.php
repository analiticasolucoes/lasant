<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <div class="user-panel">
            <div class="pull-left image" onClick="window.location='/perfil';" style="cursor:pointer;">
                <img src="<?= "/perfil/foto?foto=" . urlencode($_SESSION['foto']); ?>" class="img-circle" title="Meu Perfil" alt="Imagem de Perfil">
            </div>
            <div class="pull-left info">
                <p class="user-name"><?= $_SESSION['usuarioNome'] ?></p>
                <span class="user-status">Online</span>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i><span> Compras</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="compras/novo"><i class="fa fa-cart-plus"></i> Solicitar Compras</a></li>
                    <li><a href="/compras"><i class="fa fa-search"></i> Verificar Solicitações</a></li>
                    <li><a href="compras/levantamentos/novo"><i class="fa fa-plus"></i> Cadastro Levantamento</a></li>
                    <li><a href="compras/levantamentos"><i class="fa fa-search"></i> Levantamentos Realizados</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Cadastros Gerais</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="cadastros-gerais/cargos"><i class="fa fa-user-nurse"></i> Cargos</a></li>
                    <li><a href="cadastros-gerais/categorias"><i class="fa fa-tag"></i> Categorias</a></li>
                    <li><a href="cadastros-gerais/categorias-servicos"><i class="fa fa-bookmark"></i> Categorias Serviços</a></li>
                    <li><a href="cadastros-gerais/esferas"><i class="fa fa-circle"></i> Esferas</a></li>
                    <li><a href="cadastros-gerais/feriados"><i class="fa fa-calendar-days"></i> Feriados</a></li>
                    <li><a href="cadastros-gerais/tipos-os"><i class="fa fa-scroll"></i> Tipos de OS</a></li>
                    <li><a href="cadastros-gerais/situacoes-ss"><i class="fa fa-window-restore"></i> Situações SS</a></li>
                    <li><a href="cadastros-gerais/situacoes-os"><i class="fa fa-square-poll-horizontal"></i> Situações OS</a></li>
                    <li><a href="cadastros-gerais/prioridades-os"><i class="fa fa-circle-exclamation"></i> Prioridades de OS</a></li>
                    <li><a href="cadastros-gerais/relatorios"><i class="fa fa-file-lines"></i> Relatórios</a></li>
                    <li><a href="cadastros-gerais/modelos-impressao"><i class="fa fa-print"></i> Modelos de Impressão</a></li>
                    <li><a href="cadastros-gerais/formas-pagamento"><i class="fa fa-cash-register"></i> Formas de Pagamento</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Materiais</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="materiais/unidades"><i class="fa fa-scale-balanced"></i> Unidades</a></li>
                    <li><a href="materiais/grupos-material"><i class="fa fa-layer-group"></i> Grupos de Material</a></li>
                    <li><a href="materiais/subgrupos-material"><i class="fa fa-object-ungroup"></i> Subgrupos de Material</a></li>
                    <li><a href="materiais/classes-material"><i class="fa fa-bars-staggered"></i> Classes de Material</a></li>
                    <li><a href="materiais/marcas-material"><i class="fa fa-registered"></i> Marcas</a></li>
                    <li><a href="/materiais"><i class="fa fa-trowel-bricks"></i> Materiais</a></li>
                    <li><a href="materiais/materiais-sco"><i class="fa fa-search"></i> Materiais SCO</a></li>
                    <li><a href="materiais/materiais-sco/valor/atualizar"><i class="fa fa-repeat"></i> Atualizar Valor SCO</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-screwdriver-wrench"></i> <span>Ferramentas</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="ferramentas/novo"><i class="fa fa-plus"></i> Adicionar Ferramenta</a></li>
                    <li><a href="/ferramentas"><i class="fa fa-search"></i> Verificar Ferramentas</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-helmet-safety"></i> <span>Equipamentos</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-folder-open"></i> <span>Cadastros</span></a>
                        <ul class="treeview-menu">
                            <li><a href="equipamentos/cadastros/grupos"><i class="fa fa-layer-group"></i> Grupos</a></li>
                            <li><a href="equipamentos/cadastros/subgrupos"><i class="fa fa-object-ungroup"></i> SubGrupos</a></li>
                            <li><a href="equipamentos/cadastros/classes"><i class="fa fa-bars-staggered"></i> Classes</a></li>
                            <li><a href="equipamentos/cadastros/situacoes"><i class="fa fa-diagram-project"></i> Situações</a></li>
                            <li><a href="equipamentos/cadastros/marcas"><i class="fa fa-registered"></i> Marcas</a></li>
                            <li><a href="equipamentos/cadastros/modelos"><i class="fa fa-trademark"></i> Modelos</a></li>
                            <li><a href="equipamentos/novo"><i class="fa fa-plus"></i> Adicionar Equipamento</a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="fa fa-cog"></i> <span>Operacional</span></a>
                        <ul class="treeview-menu">
                            <li><a href="/equipamentos"><i class="fa fa-search"></i> Verificar Equipamentos</a></li>
                            <li><a href="/solicitacoes-servico"><i class="fa fa-search"></i> Verificar Solicitações</a></li>
                            <li><a href="/ordens-servico"><i class="fa fa-search"></i> Verificar OS</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Planos de Manutenção</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="planos-manutencao/novo"><i class="fa fa-plus"></i> Adicionar Plano</a></li>
                    <li><a href="/planos-manutencao"><i class="fa fa-search"></i> Verificar Plano</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-tie"></i> <span>Profissionais</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="profissionais/novo"><i class="fa fa-plus"></i> Adicionar Profissional</a></li>
                    <li><a href="/profissionais"><i class="fa fa-search"></i> Verificar Profissionais</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Clientes</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="clientes/novo"><i class="fa fa-plus"></i> Adicionar Cliente</a></li>
                    <li><a href="/clientes"><i class="fa fa-search"></i> Verificar Clientes</a></li>
                    <li><a href="/fornecedores"><i class="fa fa-search"></i> Verificar Fornecedores</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-file-invoice"></i> <span>Solicitações de Serviço</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/solicitacoes-servico"><i class="fa fa-search"></i> Verificar Solicitações</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="solicitacoes-servico/lote"><i class="fa fa-check"></i> Concluir SS em Lote</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Ordens de Serviço</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/ordens-servico"><i class="fa fa-search"></i> Verificar OS</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building"></i> <span>Obras</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="obras/responsaveis-tecnicos"><i class="fa-solid fa-user-graduate"></i> Responsáveis Técnicos</a></li>
                    <li><a href="/obras/novo"><i class="fa fa-plus"></i> Adicionar Obra</a></li>
                    <li><a href="/obras"><i class="fa fa-search"></i> Verificar Obras</a></li>
                    <li><a href="obras/borderos"><i class="fa fa-file-contract"></i> Borderôs</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-boxes-stacked"></i> <span>Estoque</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="estoques/entradas/novo"><i class="fa fa-plus"></i> Adicionar Entrada</a></li>
                    <li><a href="estoques/entradas"><i class="fa fa-search"></i> Verificar Entradas</a></li>
                    <li><a href="/estoques"><i class="fa fa-archive"></i> Estoque por Cliente</a></li>
                    <li><a href="estoques/movimentar"><i class="fa fa-boxes-packing"></i> Movimentar Material</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-lines"></i> <span>Relatórios</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/relatorios/administracao"><i class="fa fa-briefcase"></i> Administração</a></li>
                    <li><a href="/relatorios/engenharia"><i class="fa fa-compass-drafting"></i> Engenharia</a></li>
                    <li><a href="/relatorios/faturamento"><i class="fa fa-file-invoice-dollar"></i> Faturamento</a></li>
                    <li><a href="/relatorios/refrigeracao"><i class="fa fa-snowflake"></i> Refrigeração</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Acessos</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-user"></i> <span>Usuários</span></a>
                        <ul class="treeview-menu">
                            <li><a href="/usuarios/novo"><i class="fa fa-plus"></i> Inserir Usuário</a></li>
                            <li><a href="/usuarios"><i class="fa fa-search"></i> Verificar Usuários</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-user-tie"></i> <span>Operadores</span></a>
                        <ul class="treeview-menu">
                            <li><a href="/operadores/novo"><i class="fa fa-plus"></i> Inserir Operador</a></li>
                            <li><a href="/operadores"><i class="fa fa-search"></i> Verificar Operadores</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php /* endif; */ ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-usd"></i> <span>Caixinhas</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <?php /* if($row_privi['master'] == '1') { */ ?>
                    <li><a href="caixinhas/novo"><i class="fa fa-piggy-bank"></i> Inserir Caixinha</a></li>
                    <?php /* } */ ?>
                    <li><a href="/caixinhas"><i class="fa fa-magnifying-glass-dollar"></i> Verificar Caixinha</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>