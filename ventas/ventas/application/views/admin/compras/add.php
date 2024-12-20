
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Compras
        <small>Nuevo</small>
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
                        <form action="<?php echo base_url();?>mantenimiento/compras/store" method="POST">
                            <div class="form-group <?php echo form_error("nombre") != false ? 'has-error':'';?>">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value("nombre");?>">
                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo form_error("dui") != false ? 'has-error':'';?>">
                                <label for="numero">DUI:</label>
                                <input type="text" class="form-control" id="dui" name="dui" value="<?php echo set_value("dui");?>">
                                <?php echo form_error("dui","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group">
                                <label for="telefono">NIT:</label>
                                <input type="text" class="form-control" id="nit" name="nit">
                            </div>
                            <div class="form-group">
                                <label for="telefono">NRC:</label>
                                <input type="text" class="form-control" id="nrc" name="nrc">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Direccion:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion">
                            </div>
                            <?php /*
                            <div class="form-group">
                                <label for="direccion">Departamento:</label>
                                <input type="text" class="form-control" id="depart" name="depart">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Municipio:</label>
                                <input type="text" class="form-control" id="municipio" name="municipio">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Giro:</label>
                                <input type="text" class="form-control" id="giro" name="giro">
                            </div>
                           <div class="form-group <?php echo form_error("tipocliente") != false ? 'has-error':'';?>">
                                <label for="tipocliente">Tipo de Cliente</label>
                                <select name="tipocliente" id="tipocliente" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($tipoclientes as $tipocliente) :?>
                                        <option value="<?php echo $tipocliente->id;?>" <?php echo set_select("tipocliente",$tipocliente->id);?>><?php echo $tipocliente->nombre ?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php echo form_error("tipocliente","<span class='help-block'>","</span>");?>
                            </div>
                              */ ?>                         
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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
