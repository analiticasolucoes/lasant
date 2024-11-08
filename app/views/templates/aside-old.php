<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <div class="user-panel">
            <div class="pull-left image" onClick="window.location='mudar_avatar.php';" style="cursor:pointer;">
                <!--<img src="../perfil/avatar_user.php?foto=<?php /* echo $avatar */ ?>" class="img-circle" alt="User Image">-->
                <img src="assets/dist/img/avatar.png" class="img-circle" alt="User Image">7
            </div>
            <div class="pull-left info">
                <!--<p><?php /* echo $_SESSION['usuarioNome'] */ ?></p>-->
                <p><?= "Leandro Souza Ferreira" ?></p>
                <span class="user-status">Online</span>
            </div>
        </div>

        <ul class="sidebar-menu">
            <?php /* if($row_privi['compras_visualizacao'] == '1') : */ ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i><span> Compras</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <?php /* if($row_privi['compras_cadastro'] == '1') : */ ?>
                    <li><a href="compra/novo"><i class="fa fa-cart-plus"></i> Solicitar Compras</a></li>
                    <?php /* endif; */ ?>
                    <?php /* if($row_privi['compras_visualizacao'] == '1') : */ ?>
                    <li><a href="compra/consultar"><i class="fa fa-search"></i> Verificar Solicitações</a></li>
                    <?php /* endif; */ ?>
                    <?php /* if($row_privi['compras_cadastro'] == '1') : */ ?>
                    <li><a href="compra/levantamento/novo"><i class="fa fa-plus"></i> Cadastro Levantamento</a></li>
                    <?php /* endif; */ ?>
                    <?php /* if($row_privi['compras_visualizacao'] == '1') : */ ?>
                    <li><a href="compra/levantamento/consultar"><i class="fa fa-search"></i> Levantamentos Realizados</a></li>
                    <?php /* endif; */ ?>
                </ul>
            </li>
            <?php /* endif; */ ?>

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
                    <li><a href="materiais/materiais"><i class="fa fa-trowel-bricks"></i> Materiais</a></li>
                    <li><a href="materiais/materiais-sco"><i class="fa fa-search"></i> Materiais SCO</a></li>
                    <li><a href="materiais/materiais-sco/valor/atualizar"><i class="fa fa-repeat"></i> Atualizar Valor SCO</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-screwdriver-wrench"></i> <span>Ferramentas</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <?php /* if($row_privi['profissional_cadastro'] == '1') : */ ?>
                    <li><a href="ferramentas/novo"><i class="fa fa-plus"></i> Adicionar Ferramenta</a></li>
                    <?php /* endif; */ ?>
                    <?php /* if($row_privi['profissional_visualizacao'] == '1') : */ ?>
                    <li><a href="ferramentas"><i class="fa fa-search"></i> Verificar Ferramentas</a></li>
                    <?php /* endif; */ ?>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-helmet-safety"></i> <span>Equipamentos</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-folder-open"></i> <span>Cadastros</span></a>
                        <ul class="treeview-menu">
                            <li><a href="grupos_manutencao.php"><i class="fa fa-square"></i> Grupos</a></li>
                            <li><a href="subgrupos_manutencao.php"><i class="fa fa-square"></i> SubGrupos</a></li>
                            <li><a href="classe_manutencao.php"><i class="fa fa-square"></i> Classes</a></li>
                            <li><a href="situacoes_equipamento.php"><i class="fa fa-square"></i> Situações</a></li>
                            <li><a href="marcas.php"><i class="fa fa-square"></i> Marcas</a></li>
                            <li><a href="modelos.php"><i class="fa fa-square"></i> Modelos</a></li>
                            <?php /* if($row_privi['equipamento_cadastro'] == '1') : */ ?>
                            <li><a href="cadastro_equipamento.php"><i class="fa fa-square"></i> Adicionar Equipamento</a></li>
                            <?php /* endif; */ ?>
                        </ul>
                    </li>

                    <li><a href="#"><i class="fa fa-cog"></i> <span>Operacional</span></a>
                        <ul class="treeview-menu">
                            <?php /* if($row_privi['equipamento_visualizacao'] == '1') : */ ?>
                            <li><a href="equipamentos.php"><i class="fa fa-search"></i> Verificar Equipamentos</a></li>
                            <?php /* endif; */ ?>
                            <li><a href="solicitacoes_servico.php"><i class="fa fa-search"></i> Verificar Solicitações</a></li>
                            <li><a href="ordens_servico.php"><i class="fa fa-search"></i> Verificar OS</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Planos de Manutenção</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <?php /* if($row_privi['equipamento_cadastro'] == '1') : */ ?>
                    <li><a href="planos-manutencao/novo"><i class="fa fa-plus"></i> Adicionar Plano</a></li>
                    <?php /* endif; */ ?>
                    <?php /* if($row_privi['equipamento_visualizacao'] == '1') : */ ?>
                    <li><a href="/planos-manutencao"><i class="fa fa-search"></i> Verificar Plano</a></li>
                    <?php /* endif; */ ?>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-tie"></i> <span>Profissionais</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <?php /* if($row_privi['profissional_cadastro'] == '1') : */ ?>
                    <li><a href="profissionais/novo"><i class="fa fa-plus"></i> Adicionar Profissional</a></li>
                    <?php /* endif; */ ?>
                    <?php /* if($row_privi['profissional_visualizacao'] == '1') : */ ?>
                    <li><a href="/profissionais"><i class="fa fa-search"></i> Verificar Profissionais</a></li>
                    <?php /* endif; */ ?>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Clientes</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <?php /* if($row_privi['clientes_cadastro'] == '1') : */ ?>
                    <li><a href="clientes/novo"><i class="fa fa-plus"></i> Adicionar Cliente</a></li>
                    <?php /* endif; */ ?>
                    <?php /* if($row_privi['clientes_visualizacao'] == '1') : */ ?>
                    <li><a href="/clientes"><i class="fa fa-search"></i> Verificar Clientes</a></li>
                    <li><a href="clientes/fornecedores"><i class="fa fa-search"></i> Verificar Fornecedores</a></li>
                    <?php /* endif; */ ?>
                    <li><a href="#"><i class="fa fa-folder-open"></i> <span>Estoque</span></a>
                        <ul class="treeview-menu">
                            <li><a href="clientes/estoque/novo"><i class="fa fa-plus"></i> Inserir Entrada</a></li>
                            <li><a href="clientes/estoques"><i class="fa fa-search"></i> Verificar Entradas</a></li>
                        </ul>
                    </li>
                    <!--	    <li><a href="estoque_cliente.php"><i class="fa fa-legal"></i> Estoque por Cliente</a></li>-->
                </ul>
            </li>

            <?php /* if($row_privi['ss_visualizacao'] == '1') : */ ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-file-invoice"></i> <span>Solicitações de Serviço</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="solicitacoes_servico.php"><i class="fa fa-search"></i> Verificar Solicitações</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="concluir_ss_lote_form.php"><i class="fa fa-check"></i> Concluir SS em Lote</a></li>
                </ul>
            </li>
            <?php /* endif; */ ?>

            <?php /* if($row_privi['os_visualizacao'] == '1') : */ ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Ordens de Serviço</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="ordens_servico.php"><i class="fa fa-search"></i> Verificar OS</a></li>
                </ul>
            </li>
            <?php /* endif; */ ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-building"></i> <span>Obras</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="responsaveis_tecnicos.php"><i class="fa-solid fa-user-graduate"></i></i> Responsáveis Técnicos</a></li>
                    <?php /* if($row_privi['obras_cadastro'] == '1') : */ ?>
                    <li><a href="cadastro_obra.php"><i class="fa fa-plus"></i> Cadastro Obra</a></li>
                    <?php /* endif; */ ?>
                    <?php /* if($row_privi['obras_visualizacao'] == '1') : */ ?>
                    <li><a href="obras.php"><i class="fa fa-search"></i> Verificar Obras</a></li>
                    <?php /* endif; */ ?>
                    <?php /* if($row_privi['bordero_visualizacao'] == '1') : */ ?>
                    <li><a href="borderos.php"><i class="fa fa-file-contract"></i> Borderôs</a></li>
                    <?php /* endif; */ ?>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i> <span>Estoque</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="estoque_cliente.php"><i class="fa fa-legal"></i> Estoque por Cliente</a></li>
                    <li><a href="movimentar_estoque.php"><i class="fa fa-truck"></i> Movimentar Material</a></li>
                </ul>
            </li>

            <?php /* if($row_privi['relatorios_visualizacao'] == '1') : */ ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-lines"></i> <span>Relatórios</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="relatorios.php?tipo_rel=1"><i class="fa fa-briefcase"></i> Administração</a></li>
                    <li><a href="relatorios.php?tipo_rel=2"><i class="fa fa-compass-drafting"></i> Engenharia</a></li>
                    <li><a href="relatorios.php?tipo_rel=3"><i class="fa fa-file-invoice-dollar"></i> Faturamento</a></li>
                    <li><a href="relatorios.php?tipo_rel=5"><i class="fa fa-snowflake"></i> Refrigeração</a></li>
                </ul>
            </li>
            <?php /* endif; */ ?>

            <?php /* if($row_privi['master'] == '1') : */ ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Acessos</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/usuarios"><i class="fa fa-user"></i> Usuários</a></li>
                    <li><a href="/operadores"><i class="fa fa-user-tie"></i> Operadores</a></li>
                </ul>
            </li>
            <?php /* endif; */ ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-usd"></i> <span>Caixinha</span><i class="fa fa-angle-left pull-right" width="12" height="12"></i>
                </a>
                <ul class="treeview-menu">
                    <?php /* if($row_privi['master'] == '1') { */ ?>
                    <li><a href="caixinhas/novo"><i class="fa fa-piggy-bank"></i> Inserir Caixinha</a></li>
                    <?php /* } */ ?>
                    <li><a href="/caixinhas"><i class="fa fa-magnifying-glass-dollar"></i> Verificar Caixinha</a></li>
                </ul>
            </li>
            <!-- Ordens de Serviço -->
            <?php /* if($row_privi['os_visualizacao'] == '1') : */ ?>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>Ordens de Serviço<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="ordens_servico.php" class="nav-link">
                            <i class="fas fa-search nav-icon"></i>
                            <p>Verificar OS</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php /* endif; */ ?>

            <!-- Obras -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>Obras<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="responsaveis_tecnicos.php" class="nav-link">
                            <i class="fas fa-user-graduate nav-icon"></i>
                            <p>Responsáveis Técnicos</p>
                        </a>
                    </li>
                    <?php /* if($row_privi['obras_cadastro'] == '1') : */ ?>
                    <li class="nav-item">
                        <a href="cadastro_obra.php" class="nav-link">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>Cadastro Obra</p>
                        </a>
                    </li>
                    <?php /* endif; */ ?>
                    <?php /* if($row_privi['obras_visualizacao'] == '1') : */ ?>
                    <li class="nav-item">
                        <a href="obras.php" class="nav-link">
                            <i class="fas fa-search nav-icon"></i>
                            <p>Verificar Obras</p>
                        </a>
                    </li>
                    <?php /* endif; */ ?>
                    <?php /* if($row_privi['bordero_visualizacao'] == '1') : */ ?>
                    <li class="nav-item">
                        <a href="borderos.php" class="nav-link">
                            <i class="fas fa-file-contract nav-icon"></i>
                            <p>Borderôs</p>
                        </a>
                    </li>
                    <?php /* endif; */ ?>
                </ul>
            </li>

            <!-- Estoque -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-archive"></i>
                    <p>Estoque<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="estoque_cliente.php" class="nav-link">
                            <i class="fas fa-legal nav-icon"></i>
                            <p>Estoque por Cliente</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="movimentar_estoque.php" class="nav-link">
                            <i class="fas fa-truck nav-icon"></i>
                            <p>Movimentar Material</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Relatórios -->
            <?php /* if($row_privi['relatorios_visualizacao'] == '1') : */ ?>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file-lines"></i>
                    <p>Relatórios<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="relatorios.php?tipo_rel=1" class="nav-link">
                            <i class="fas fa-briefcase nav-icon"></i>
                            <p>Administração</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="relatorios.php?tipo_rel=2" class="nav-link">
                            <i class="fas fa-compass-drafting nav-icon"></i>
                            <p>Engenharia</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="relatorios.php?tipo_rel=3" class="nav-link">
                            <i class="fas fa-file-invoice-dollar nav-icon"></i>
                            <p>Faturamento</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="relatorios.php?tipo_rel=5" class="nav-link">
                            <i class="fas fa-snowflake nav-icon"></i>
                            <p>Refrigeração</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php /* endif; */ ?>

            <!-- Acessos -->
            <?php /* if($row_privi['master'] == '1') : */ ?>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Acessos<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/usuarios" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Usuários</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/operadores" class="nav-link">
                            <i class="fas fa-user-tie nav-icon"></i>
                            <p>Operadores</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php /* endif; */ ?>

            <!-- Caixinha -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Caixinha<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <?php /* if($row_privi['master'] == '1') : */ ?>
                    <li class="nav-item">
                        <a href="caixinhas/novo" class="nav-link">
                            <i class="fas fa-piggy-bank nav-icon"></i>
                            <p>Inserir Caixinha</p>
                        </a>
                    </li>
                    <?php /* endif; */ ?>
                    <li class="nav-item">
                        <a href="/caixinhas" class="nav-link">
                            <i class="fas fa-search-dollar nav-icon"></i>
                            <p>Verificar Caixinha</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>