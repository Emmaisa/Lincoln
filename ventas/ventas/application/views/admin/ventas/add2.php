<!-- Content Wrapper. Contains page content -->
<script>
shortcut.add("f2",function() {
     var option = document.getElementById("producto2").focus();
});
shortcut.add("f1",function() {
     var option = document.getElementById("btnguardar").click();
});
shortcut.add("f6",function() {
     var option = document.getElementById("c.price").click();
});
shortcut.add("f5",function() {
     var option = document.getElementById("producto2").focus();
});
shortcut.add("f9",function() {
     var option = document.getElementById("buscar").click();
});
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ventas MAYOREO
        <small>Nueva</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <form action="<?php echo base_url();?>movimientos/ventas/store" method="POST" class="form-horizontal">
                            <div class="form-group">
                            
                                <div class="col-md-3">
                                    <label for="">Comprobante:</label>
                                    <select name="comprobantes" id="comprobantes" class="form-control" required>
                                        <option id="comprobant" value="">Seleccione...</option>
                                        <?php foreach($tipocomprobantes as $tipocomprobante):?> 
                                            <?php $datacomprobante = $tipocomprobante->id."*".$tipocomprobante->cantidad."*".$tipocomprobante->igv."*".$tipocomprobante->serie;?>
                                            <option value="<?php echo $datacomprobante;?>"><?php echo $tipocomprobante->nombre?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <input type="hidden" id="idcomprobante" name="idcomprobante">
                                    <input type="hidden" id="igv">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Serie:</label>
                                    <input type="text" class="form-control" id="serie" name="serie" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="">Numero:</label>
                                    <input type="text" class="form-control" id="numero" name="numero" readonly>
                                </div>

                                <div class="col-md-2">
                           
                                    <button type="submit" action id ="btnguardar" class="btn bg-green btn-app btn-flat">Guardar <kbd>F1</kbd> </button>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Comentario:</label>
                                    <input type="text" class="form-control" id="comentario" name="comentario" >
                                </div>
                                   
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Cliente:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="idcliente" id="idcliente">
                                        <input type="text" class="form-control" disabled="disabled" id="cliente">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" id ="buscar" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar <kbd>F9</kbd></button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div> 
                                <div class="col-md-3">
                                    <label for="">Fecha:</label>
                    <input type="text" class="form-control" value ="<?php setlocale(LC_ALL,"es_ES");

$fecha= date ("Y-m-d");
echo ("$fecha");


?> 
" name="fecha" readonly="readonly" required> <input type="hidden" class="form-control" value ="<?php setlocale(LC_ALL,"es_ES");

$hora= date ("h:i:s a");
echo ("$hora");

?>" name="hora" id="hora">
                            </div>
                            <div class="col-md-3">
                                    <label for="">Forma de Pago:</label>
                                   <select name="tipopago" id="tipopago" class="form-control" required>
                                     <option id="tipopago" value="">Seleccione...</option>
                                        
                                    <?php foreach ($tipopagos as $tipopago) :?>
                                        <option value="<?php echo $tipopago->id;?>" <?php echo set_select("tipopago",$tipopago->id);?>><?php echo $tipopago->nombre ?></option>
                                    <?php endforeach;?>
                                    </select>
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Subtotal:</span>
                                        <input type="text" class="form-control" placeholder="0.00" name="subtotal" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">IVA:</span>
                                        <input type="text" class="form-control" placeholder="0.00" name="igv" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Descuento:</span>
                                        <input type="text" class="form-control" placeholder="0.00" name="descuento" value="0.00" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Total:</span>
                                        <input type="text" class="form-control" placeholder="0.00" name="total" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Producto:  <kbd>F2</kbd></label>
                                    <input type="text" autocomplete="off" class="form-control" id="producto2" placeholder="Buscar el producto por nombre o escanee el codigo"  name="scanner" autofocus>
                               </div>
                               <!--?php if ($permisos->update == 1):?-->
                               <div class="col-md-1">
                                    <label for=""></label>
                                    <button type="button"  class="form-control btn bg-orange btn-success btn-updateprice" id="c.price"><span class="fa fa-exchange"></span><kbd>F6</kbd></button>
                               </div>
                               <!--?php endif;?-->

                                <div class="col-md-2">

                                    <label for="">&nbsp;</label>
                                  
                                </div>
                            </div>
                            <table id="tbventas" class="table table-bordered table-striped table-hover">
                            <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Existencia</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>

                            
                        </form>
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
                <h4 class="modal-title">Lista de Clientes</h4>
            </div>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
