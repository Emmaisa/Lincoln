<script>
shortcut.add("f2",function() {
     var option = document.getElementById("cotizador").focus();
});
</script>
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Dashboard
                <small></small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid">
                    <div class="box-body">
                    <div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h2>VENTAS</h2>

                <p>Nueva Venta</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url();?>movimientos/ventas/add" class="small-box-footer">Agregar<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- BOTONES --> 
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h2>PRODUCTOS</h2>

                <p>Nuevo Producto</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url();?>mantenimiento/productos/add" class="small-box-footer">Agregar<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h2>CLIENTES</h2>

                <p>Nuevo Cliente</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url();?>mantenimiento/clientes/add" class="small-box-footer">Agregar<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <!-- proveedores -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <h2>PROVEEDORES</h2>

                <p>Nuevo Proveedor</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url();?>mantenimiento/proveedores/add" class="small-box-footer">Agregar<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <!-- proveedores -->
     
    <!-- ./col -->
    <!-- compras -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h2>COMPRAS</h2>

                <p>Nueva Compra</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url();?>mantenimiento/compras/add" class="small-box-footer">Agregar<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <!-- compras -->

    <!-- FIN DE BOTONES --> 
   
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 >COTIZADOR</h3>

                <div class="box-tools pull-right">

    
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="grafico">
                                                 <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                        <div class="col-md-6">
                                    <label for="">Producto:  <kbd>F2</kbd></label>
                                    <input type="text" autocomplete="off" class="form-control" id="cotizador" placeholder="Buscar el producto por nombre o escanee el codigo"  name="scanner" autofocus>
                        </div>
                        <table id="tbventas" class="table table-bordered table-striped display nowrap">
                            <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Barcode</th>
                                        <th>Nombre</th>
                                        <th>Publico</th>
                                        <th>Tienda</th>
                                        <th>Bono</th>
                                        <th>Colegio</th> 
                                        <th>Existencia</th>                                 
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                      
                         </div>
                         </div>
            <!-- /.box-body -->
            
            
            
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 >CLIENTES</h3>

                <div class="box-tools pull-right">

    
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="grafico">
                                                 <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                        <div class="col-md-6">
                                    <label for="">Cliente: </label>
                                    <input type="text" autocomplete="off" class="form-control" id="clientest" placeholder="Buscar el cliente"  name="scanner" autofocus>
                        </div>
                        <table id="tbclientes" class="table table-bordered table-striped display nowrap">
                            <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Codigo</th>
                                        <th>Nombre</th>                               
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                      
                         </div>
                         </div>
            <!-- /.box-body -->
            
            
            
                        </div>
                    </div>
                </div>               
                
                
                
            </div>
            <!-- ./box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
