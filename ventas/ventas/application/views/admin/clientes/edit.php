
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
        Clientes
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
                        <form action="<?php echo base_url();?>mantenimiento/clientes/update" method="POST">
                            <input type="hidden" name="idcliente" value="<?php echo $cliente->id;?>">
                           
                            <div class="form-group <?php echo form_error("nombre") != false ? 'has-error':'';?>">
                                <div class="col-md-6">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo form_error("nombre") !=false ? set_value("nombre") : $cliente->nombre;?>">
                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                             </div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-3 <?php echo form_error("dui") != false ? 'has-error':'';?>">
                                <label for="numero">DUI:</label>
                                <input type="text" class="form-control" id="dui" name="dui" value="<?php echo form_error("dui") !=false ? set_value("dui") : $cliente->dui;?>">
                                <?php echo form_error("dui","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="col-md-3">
                                <label for="telefono">NIT:</label>
                                <input type="text" class="form-control" id="nit" name="nit" value="<?php echo $cliente->nit;?>">
                            </div>
                            <div class="col-md-3">
                                <label for="telefono">NRC:</label>
                                <input type="text" class="form-control" id="nrc" name="nrc" value="<?php echo $cliente->nrc;?>">
                            </div>
                            <div class="col-md-3">
                                <label for="telefono">Telefono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $cliente->telefono;?>">
                            </div>
                              </div>
                            <div class="col-md-6">
                                <label for="direccion">Direccion:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $cliente->direccion;?>">
                            </div>
                            <div class="col-md-3">
                                <label for="direccion">Departamento:</label>
                                <input type="text" class="form-control" id="depart" name="depart" value="<?php echo $cliente->departamento;?>">
                            </div>
                            <div class="col-md-3">
                                <label for="direccion">Municipio:</label>
                                <input type="text" class="form-control" id="municipio" name="municipio" value="<?php echo $cliente->municipio;?>">
                            </div>
                            <div class="form-group">
                            <div class="col-md-3">
                                <label for="direccion">Giro:</label>
                                <input type="text" class="form-control" id="giro" name="giro" value="<?php echo $cliente->giro;?>">
                           
                            </div>
                            <div class="col-md-3 <?php echo form_error("tipocliente") != false ? 'has-error':'';?>">
                                <label for="tipocliente">Tipo de Cliente</label>
                                <select name="tipocliente" id="tipocliente" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php if(form_error("tipocliente")!=false || set_value("tipocliente") != false): ?>
                                        <?php foreach ($tipoclientes as $tipocliente) :?>
                                            <option value="<?php echo $tipocliente->id;?>" <?php echo set_select("tipocliente",$tipocliente->id);?>><?php echo $tipocliente->nombre ?></option>
                                        <?php endforeach;?>
                                    <?php else: ?>
                                        <?php foreach ($tipoclientes as $tipocliente) :?>
                                            <option value="<?php echo $tipocliente->id;?>" <?php echo $tipocliente->id == $cliente->tipo_cliente_id ? 'selected':'';?>><?php echo $tipocliente->nombre ?></option>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </select>
                                <?php echo form_error("tipocliente","<span class='help-block'>","</span>");?>
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
                                <input type="text" class="form-control" id="limit_cred" name="limit_cred" value="<?php echo $cliente->limit_cred;?>">
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
                              <input type="text" class="form-control" id="ce_cod" name="ce_cod" value="<?php echo $cliente->ce_cod;?>">
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
