
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
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
                        <form action="<?php echo base_url();?>mantenimiento/productos/store" method="POST">
                            <div class="col-md-3 <?php echo !empty(form_error('codigo')) ? 'has-error':'';?>">
                                <label for="codigo">Codigo:</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo set_value('codigo');?>">
                                <?php echo form_error("codigo","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="col-md-6 <?php echo !empty(form_error('nombre')) ? 'has-error':'';?>">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre');?>">
                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="col-md-3">
                                <label for="tipo">TIPO:</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="G">GRAVADO</option>
                                    <option value="E">EXENTO</option>
                             </select>
                             </div>
                            <div class="col-md-12 ">
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                             <div class="form-group">
                            <div class="col-md-3 <?php echo !empty(form_error('costo')) ? 'has-error':'';?>">
                                <label for="costo">COSTO:</label>
                                <input type="text" class="form-control" onkeyup="generarprecio(this)" id="costo" name="costo" value="<?php echo set_value('costo');?>">
                                <?php echo form_error("costo","<span class='help-block'>","</span>");?>
                            </div>
                              <div class="col-md-3 <?php echo !empty(form_error('precio')) ? 'has-error':'';?>">
                                <label for="precio">P.PUBLICO:</label>
                                <input type="text" class="form-control" id="precio" name="precio" value="<?php echo set_value('precio');?>">
                                <?php echo form_error("precio","<span class='help-block'>","</span>");?>
                            </div>
                              <div class="col-md-3 <?php echo !empty(form_error('precio1')) ? 'has-error':'';?>">
                                <label for="precio1">P.TIENDA:</label>
                                <input type="text" class="form-control" id="precio1" name="precio1" value="<?php echo set_value('precio1');?>">
                                <?php echo form_error("precio1","<span class='help-block'>","</span>");?>
                            </div>
                              <div class="col-md-3 <?php echo !empty(form_error('precio2')) ? 'has-error':'';?>">
                                <label for="precio2">P.BONO:</label>
                                <input type="text" class="form-control" id="precio2" name="precio2" value="<?php echo set_value('precio2');?>">
                                <?php echo form_error("precio2","<span class='help-block'>","</span>");?>
                            </div>
                              <div class="col-md-3 <?php echo !empty(form_error('precio3')) ? 'has-error':'';?>">
                                <label for="precio3">P.COLEGIO:</label>
                                <input type="text" class="form-control" id="precio3" name="precio3" value="<?php echo set_value('precio3');?>">
                                <?php echo form_error("precio3","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="col-md-3 <?php echo !empty(form_error('stock')) ? 'has-error':'';?>">
                                <label for="stock">Existencias:</label>
                                <input type="text" class="form-control" id="stock" name="stock" value="<?php echo set_value('stock');?>">
                                <?php echo form_error("stock","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="col-md-3 <?php echo !empty(form_error('unidad')) ? 'has-error':'';?>">
                                <label for="unidad">Unidad de Medida:</label>
                                <input type="text" class="form-control" id="unidad" name="unidad" value="<?php echo set_value('unidad');?>">
                                <?php echo form_error("unidad","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="col-md-3">
                                <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <?php foreach($categorias as $categoria):?>
                                        <option value="<?php echo $categoria->id?>"><?php echo $categoria->nombre;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                            <div class="col-md-12">
                                <label for="">&nbsp;</label>
                             </div>
                             </div>
                            <div class="col-md-3">
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
