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
        IMPRESION ANEXOS/FACTURAS CDE
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
                            
                                <label for="">VENTA#: <kbd>F2</kbd></label>
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
                                    <th>ID</th>
                                    <th>FECHA</th>
                                    <th>NOMBRE</th>
                                    <th>TOTAL</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($ventas)): ?>
                                    <?php foreach($ventas as $venta):?>
                                        <tr>
                                           <td><?php echo $venta->id;?></td>        
                                            <td><?php echo $venta->fecha;?></td>
                                            <td><?php echo $venta->nombre;?>
                                               <td><?php echo number_format($venta->total,2);?>
                                            <td>
                                              <button type="button" class="btn btn-info btn-view-venta1" value="<?php echo $venta->id;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                              <a target="_blank" href="<?php echo base_url()?>tools/anexos/anexoscde/<?php echo $venta->id;?>" class="btn bg-navy"><span class="fa fa-file-pdf-o"></span></a>
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
                <h4 class="modal-title">Detalles de Venta</h4>
            </div>
           
            <div class="modal-body">
            
            
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
