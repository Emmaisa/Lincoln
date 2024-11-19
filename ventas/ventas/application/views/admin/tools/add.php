<!-- Content Wrapper. Contains page content -->
<script>
shortcut.add("f2",function() {
     var option = document.getElementById("product").focus();
});
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        CONSOLIDACION DE PRODUCTOS
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                        <?php if (empty($clientes)): ?>
                        <div class="col-md-6">
                            
                                <label for="">Cliente: <kbd>F2</kbd></label>
                                    <input type="text" autocomplete="off" class="form-control" id="customer" placeholder="Buscar Clientes por Nombre"  name="scanner" autofocus>
                               </div>
                                  
                        <table id="tbcustomer" class="table table-bordered table-striped display nowrap">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>DUI/NIT</th>                                
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                        </table>
                         
    <!-- /.box -->
    <div class="col-md-12">
                        <input type="submit" name="revisar" id="revisar" value="Revisar Productos" class="btn bg-orange">
                    </div>

                    <?php endif ?>

                      <!-- Mostrar nombre del cliente-->
                     <?php if (!empty($clientes)): ?>
                            <div class="col-md-5">
                                <label for="" class="control-label">Nombre de Cliente:</label>
                                <input type="text" class="form-control" id="pnombre" name="pnombre" value="<?php echo $clientes->nombre;?>" readonly="readonly">
                            </div>
                            
                            <div class="col-md-2">
                                <label for="" class="control-label">DUI/CODIGO:</label>
                                <input type="text" class="form-control" id="dn" name="dn" value="<?php echo $clientes->dui;?>"  readonly="readonly">
                            </div>
                            <div class="col-md-2">
                                <label for="" class="control-label">TOTAL:</label>
                                <input type="text" class="form-control" id="ctotal" name="ctotal" readonly="readonly">
                            </div>
                        
                            <div class="col-md-1">
                            <label for="" class="control-label">&nbsp;</label>
                        <input type="submit" name="revisar" id="revisar" value="Volver" class="btn bg-orange    ">
                    </div>
                    <div class="col-md-1">
                            <label for="" class="control-label">&nbsp;</label>
                        <input type="button" name="next" id="next" value="Siguiente" class="btn bg-blue">
                        </div>                
              
                    <div class="col-md-12">
                    <br>
                        <table id="tbconsolid" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"/></th>
                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Info Venta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($producto)): ?>
                                    <?php foreach($producto as $producto):?>
                                        <tr>
                                            <td>
                                            <input type="checkbox"/>                  
                                            </td>
                                            <td><?php echo $producto->quantity;?></td>
                                            <td><?php echo $producto->nombre;?>
                                            <input type="hidden" name="idproducto" value="<?php echo $producto->idv;?>"></td>
                                            <td><?php echo $producto->precio;?></td>
                                            <td><?php echo number_format($producto->total1,2);?></td>
                                            <td>
                                              <!-- <button type="button" class="btn btn-info btn-view-venta1" value=">" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button> -->
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    <?php endif ?>
                    </div>
                    </div>
            </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de Clientes</h4>
            </div>
            <!--
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($clientes)):?>
                            <?php foreach($clientes as $cliente):?>
                                <tr>
                                    <td><?php echo $cliente->id;?></td>
                                    <td><?php echo $cliente->nombre;?></td>
                                    <td><?php echo $cliente->nrc;?></td>
                                    <?php $datacliente = $cliente->id."*".$cliente->nombre."*".$cliente->tipocliente."*".$cliente->dui."*".$cliente->telefono."*".$cliente->direccion;?>
                                    <td>
                                    <button type="button" class="btn btn-success btn-check" value="<?php echo $datacliente;?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
