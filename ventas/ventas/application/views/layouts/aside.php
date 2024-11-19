        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU OPCIONES</li>
                    <li>
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Mantenimiento</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/categorias"><i class="fa fa-bars"></i> Categorias</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/clientes"><i class="fa fa-group"></i> Clientes</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/productos"><i class="fa fa-truck"></i> Productos</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-share-alt"></i> <span>Movimientos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>movimientos/ventas"><i class="fa fa-cart-arrow-down"></i>Ventas</a></li>
                            <li><a href="<?php echo base_url();?>movimientos/creditos"><i class="fa  fa-cart-plus"></i>Creditos</a></li>
                            
                        </ul>
                    </li>
		<li class="treeview">
                        <a href="#">
                            <i class="fa fa-share-alt"></i> <span>Herramientas</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                        <li><a href="<?php echo base_url();?>tools/consolidar"><i class="fa fa-archive"></i>Consolidar</a></li>
                            <li><a href="<?php echo base_url();?>tools/anexos"><i class="fa  fa-edit"></i>Modificar Doc</a></li>
                            <li><a href="<?php echo base_url();?>tools/anexos"><i class="fa  fa-clone"></i>Anexos Facturas</a></li>
                            
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-print"></i> <span>Reportes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <!--li><a href="../../index.html"><i class="fa fa-circle-o"></i> Categorias</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Clientes</a></li>-->
                            <li><a href="<?php echo base_url();?>reportes/utilidad"><i class="fa fa-circle-o"></i>Utilidad</a></li>
                            <li><a href="<?php echo base_url();?>reportes/ventas"><i class="fa fa-bar-chart-o"></i> Ventas</a></li>
                             <li><a href="<?php echo base_url();?>reportes/cajas"><i class="fa fa-file-text-o"></i>Corte Caja</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <!-- li><a href="../../index.html"><i class="fa fa-circle-o"></i> Tipo Documentos</a></li--> 
                            <li><a href="<?php echo base_url();?>administrador/usuarios"><i class="fa fa-user"></i>Usuarios</a></li>
                            <li><a href="<?php echo base_url();?>administrador/permisos"><i class="fa fa-lock"></i>Permisos</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->
