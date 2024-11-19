
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Reportes
        <small>UTILIDAD BRUTA</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                        <div class="col-md-6">
                                    <label for="">Producto:  <kbd>F2</kbd></label>
                                    <input type="text" autocomplete="off" class="form-control" id="product" placeholder="Buscar el producto por nombre o escanee el codigo"  name="scanner" autofocus>
                               </div>
                        <table id="tbventas" class="table table-bordered table-striped display nowrap">
                            <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Existencia</th>                                
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">Desde:</label>
                            <div class="col-md-3">
                             <input type="date" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio:'';?>">
                            </div>
                            <label for="" class="col-md-1 control-label">Hasta:</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="fechafin" value="<?php  echo !empty($fechafin) ? $fechafin:'';?>">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                                <a href="<?php echo base_url(); ?>reportes/ventas" class="btn btn-danger">Restablecer</a>
                            </div>
                            <tbody>
                                
                                </tbody>
                            </table>
                        </div>
                       
                        
                         
                            <?php if (!empty($producto)): ?>
                            <div class="col-md-5">
                                <label for="" class="control-label">Nombre Producto:</label>
                                <input type="text" class="form-control" id="pnombre" name="pnombre" value="<?php echo $producto->nombre;?>" readonly="readonly">
                            </div>
                            
                            <div class="col-md-2">
                                <label for="" class="control-label">Costo Unitario:</label>
                                <input type="text" class="form-control" id="costo" name="costo" value="<?php echo $producto->costo;?>"  readonly="readonly">
                            </div>
                            <div class="col-md-2">
                                <label for="" class="control-label">Existencia:</label>
                                <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $producto->stock;?>" readonly="readonly">
                            </div>
                            
                            <div class="col-md-2">
                                <label for="" class="control-label">Cantidad Total:</label>
                                <input type="text" class="form-control" id="tcant" name="tcant" readonly="readonly">
                            </div>
                            
                                                     
                            
                            <div class="col-md-2">
                                <label for="" class="control-label">Total$ Vendido:</label>
                                <input type="text" class="form-control" id="vendido" name="vendido" readonly="readonly">
                            </div>
                            
                            <div class="col-md-2">
                                <label for="" class="control-label">Total Costo:</label>
                                <input type="text" class="form-control" id="costos" name="costos"  readonly="readonly">
                            </div>
                            
                            <div class="col-md-2">
                                <label for="" class="control-label">Utilidad Bruta Total:</label>
                                <input type="text" class="form-control" id="bruta" name="bruta" readonly="readonly">
                           
                            </div>
                            <div class="col-md-2">

                               <button type="button" class="btn btn-primary btn-sum-mov"><span class="fa  fa-arrow-circle-down">Calcular</span></button>
                                
                           </div>
                            </div>
                            
               
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <table id="utility" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nombre Producto</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Info Venta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($detalle)): ?>
                                    <?php foreach($detalle as $detalle):?>
                                        <tr>
                                            <td><?php echo $detalle->fecha;?></td>
                                            <td><?php echo $detalle->nombre;?></td>
                                            <td><?php echo $detalle->cantidad;?></td>
                                            <td><?php echo $detalle->total;?></td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-view-venta1" value="<?php echo $detalle->idventa;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif ?>
                            </tbody>
                        </table>
                         <?php endif ?>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
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
        <h4 class="modal-title">Informacion de la venta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
