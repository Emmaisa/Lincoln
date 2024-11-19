
<!-- Content Wrapper. Contains page content -->
<script>
shortcut.add("f1",function() {
     var option = document.getElementById("btnsave").focus();
});

</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Proveedor
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>mantenimiento/proveedores/update" method="POST">
                            <input type="hidden" name="idproveedor" value="<?php echo $proveedor->id;?>">
                           
                            <div class="form-group <?php echo form_error("nombre") != false ? 'has-error':'';?>">
                                <div class="col-md-6">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo form_error("nombre") !=false ? set_value("nombre") : $proveedor->nombre;?>">
                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                             </div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-3 <?php echo form_error("dui") != false ? 'has-error':'';?>">
                                <label for="numero">DUI:</label>
                                <input type="text" class="form-control" id="dui" name="dui" value="<?php echo form_error("dui") !=false ? set_value("dui") : $proveedor->dui;?>">
                                <?php echo form_error("dui","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="col-md-3">
                                <label for="telefono">NIT:</label>
                                <input type="text" class="form-control" id="nit" name="nit" value="<?php echo $proveedor->nit;?>">
                            </div>
                            <div class="col-md-3">
                                <label for="telefono">NRC:</label>
                                <input type="text" class="form-control" id="nrc" name="nrc" value="<?php echo $proveedor->nrc;?>">
                            </div>
                            <div class="col-md-3">
                                <label for="telefono">Telefono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $proveedor->telefono;?>">
                            </div>
                              </div>
                            <div class="col-md-6">
                                <label for="direccion">Direccion:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $proveedor->direccion;?>">
                            </div>
                         
                            <div class="col-md-3">
                                <label for="direccion">Departamento:</label>
                                <input type="text" class="form-control" id="depart" name="depart" value="<?php echo $proveedor->departamento;?>">
                            </div> 
                            <div class="col-md-3">
                                <label for="direccion">Municipio:</label>
                                <input type="text" class="form-control" id="municipio" name="municipio" value="<?php echo $proveedor->municipio;?>">
                            </div>
                            <div class="form-group">
                            <div class="col-md-3">
                                <label for="direccion">Giro:</label>
                                <input type="text" class="form-control" id="giro" name="giro" value="<?php echo $cliente->giro;?>">
                            

                            </div>

                            <div class="col-md-3 <?php echo form_error("tipoproveedor") != false ? 'has-error':'';?>">
                                <label for="tipoproveedor">Tipo de Proveedor</label>
                                <select name="tipoproveedor" id="tipoproveedor" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php if(form_error("tipoproveedor")!=false || set_value("tipoproveedor") != false): ?>
                                        <?php foreach ($tipoproveedor as $tipoproveedor) :?>
                                            <option value="<?php echo $tipoproveedor->id;?>" <?php echo set_select("tipoprovedor",$tipoproveedor->id);?>><?php echo $tipoproveedor->nombre ?></option>
                                        <?php endforeach;?>
                                    <?php else: ?>
                                        <?php foreach ($tipoproveedor as $tipoproveedor) :?>
                                            <option value="<?php echo $tipoproveedor->id;?>" <?php echo $tipoproveedor->id == $proveedor->tipo_proveedor_id ? 'selected':'';?>><?php echo $tipoproveedor->nombre ?></option>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </select>
                                <?php echo form_error("tipoproveedor","<span class='help-block'>","</span>");?>
                            </div>
                                                        
                            <div class="form-group">
                            <div class="col-md-3">
                            
                                <label for="credit">CREDITO:</label>
                                <select name="cred_stat" id="cred_stat" class="form-control">
                                    <option value="1">ACTIVO</option>
                                    <option value="2">INACTIVO</option>
                             </select>
                             </div>
                             <div class="col-md-3">
                            
                                <label for="direccion">LIMITE CREDITO:</label>
                                <input type="text" class="form-control" id="limit_cred" name="limit_cred" value="<?php echo $proveedor->limit_cred;?>">
                            </div>
                            </div>
                              <div class="col-md-3">
                                <label for="credit">CLIENTE STATUS:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">ACTIVO</option>
                                    <option value="2">INACTIVO</option>
                             </select>
                             </div>
                             </div>
                           <div class="col-md-3">
                                <label for="credit">CODIGO CDE:</label>
                              <input type="text" class="form-control" id="ce_cod" name="ce_cod" value="<?php echo $proveedor->ce_cod;?>">
                             </div>
                             </div>
                             
                            
                       <div class="form-group">
                            <div class="col-md-12">
                                <label for="">&nbsp;</label>
                             </div>
                             </div>
                            <div class="form-group">
                            <div class="col-md-12">                        
                                <button id="btnsave" type="submit" class="btn btn-success btn-flat">Guardar <kbd>F1</kbd></button>
                            </div>
                            </div>
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
