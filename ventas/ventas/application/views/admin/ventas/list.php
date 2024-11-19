
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <span class="fa fa-cart-arrow-down">  Ventas</span>
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                <?php if ($permisos->insert == 1):?>
                    <div class="col-md-12">
                        <button href="#" class="btn btn-app btn-flat" data-toggle="dropdown"><span class="fa fa-plus"></span> Agregar Venta</button>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo base_url();?>movimientos/ventas/add">Público</a></li>
                          <li><a href="<?php echo base_url();?>movimientos/ventas/add2">Tienda</a></li>
                          <li><a href="<?php echo base_url();?>movimientos/ventas/add3">Colegios</a></li>
                        </ul>
                    </div>
                    <?php endif;?>
                </div>

                <hr>
                <?php if ($permisos->update == 1):?>
                <div class="row">
                    <div class="col-md-12" >
                <a class="btn bg-maroon btn-app btn-abrircaja">
                <span class="badge bg-teal"></span>
                <i class="fa fa-key"></i> Abrir Caja
              </a>
               <a class="btn bg-orange btn-app">
                <span class="badge bg-teal"></span>
                <i class="fa  fa-shopping-cart"></i> Gasto
              </a>
                <a class="btn bg-olive btn-app">
                <span class="badge bg-teal"></span>
                <i class="fa fa-dollar"></i> Salida Efectivo
              </a>
                <a class="btn bg-gray btn-app btn-refresh">
                <span class="badge bg-teal"></span>
                <i class="fa fa-refresh"></i> Actualizar
              </a>
                    </div>
                </div>
                <?php endif;?>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Cliente</th>
                                    <th>Tipo Comprobante</th>
                                    <th>#Comprobante</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Opc_Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($ventas1)): ?>
                                    <?php foreach($ventas1 as $venta1):?>
                                        <tr>
                                            <td><?php echo $venta1->id;?></td>
                                            <td><?php echo $venta1->nombre;?></td>
                                            <td><?php echo $venta1->tipocomprobante;?></td>
                                            <td><?php echo $venta1->num_documento;?></td>
                                            <td><?php echo $venta1->fecha;?></td>
                                            <td><?php echo $venta1->total;?></td>
                                            <td>
                                            <?php if ($permisos->update == 1):?>
                                                <button type="button" class="btn btn-success btn-view-venta" value="<?php echo $venta1->id;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-dollar"> Cobrar</span></button>
                                                <?php endif ?>
                                            </td>
                                           
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif ?>
                            
                                <?php if (!empty($ventas2)): ?>
                                    <?php foreach($ventas2 as $venta2):?>
                                        <tr>
                                            <td><?php echo $venta2->id;?></td>
                                            <td><?php echo $venta2->nombre;?></td>
                                            <td><?php echo $venta2->tipocomprobante;?></td>
                                            <td><?php echo $venta2->num_documento;?></td>
                                            <td><?php echo $venta2->fecha;?></td>
                                            <td><?php echo $venta2->total;?></td>
                                            <td><?php if ($permisos->update == 1):?>
                                                <button type="button" class="btn btn-info btn-reg_check" value="<?php echo $venta2->id;?>" data-toggle="modal" data-target="#modal-check"><span class="fa fa-money"> Cheque</span></button><?php endif ?>
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
        <button type="button" id="salir" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
       


      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-check">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">REGISTRAR CHEQUE</h4>
      
      </div>
       
      <div class="modal-body">
      
      
  
    
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-save_ch" data-toggle="modal" data-target="#modal-default">Guardar</button>
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

