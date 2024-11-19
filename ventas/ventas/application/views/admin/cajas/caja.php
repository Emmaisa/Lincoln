
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        MOVIMIENTOS
        <small>Ventas</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                   
                    
                    
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">Entradas:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="entradas" name="entradas" value="<?php echo number_format($entradas->entradas,2);?>" readonly="readonly">
                            </div>
                            <label for="" class="col-md-1 control-label">Salidas:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="salidas" name="salidas" value="<?php echo number_format($salidas->salidas,2);?>" readonly="readonly">
                            </div>
                            <div class="col-md-4">
                               <button type="button" class="btn btn-primary btn-sum-mov"><span class="fa  fa-arrow-circle-down"> Mostrar</span></button>
                                
                            </div>
                        </div>
                        
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="tbmove" class="table table-bordered table-hover" style="width:60%">
                            <thead>
                                <tr>
                                    <th style="width:20%">Fecha</th>
                                    <th>Hora</th>
                                    <th>Concepto</th>
                                    <th>Entrada</th>
                                    <th>Salida</th>
                                    <th>Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($movimientos)): ?>
                                    <?php foreach($movimientos as $movimiento):?>
                                        <tr>
                                            <td><?php echo $movimiento->fecha_mov;?></td>
                                            <td><?php echo $movimiento->hora_mov;?></td>
                                            <td><?php echo $movimiento->concepto;?></td>
                                            <td><?php echo $movimiento->importe_mov;?></td>
                                            <td><?php echo $movimiento->retiro_mov;?></td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-view-venta1" value="<?php echo $movimiento->ref_mov;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif ?>
                            </tbody>
                        </table>
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
