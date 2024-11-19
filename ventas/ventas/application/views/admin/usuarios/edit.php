
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        USUARIOS
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
                        <form action="<?php echo base_url();?>administrador/usuarios/update" method="POST">
                            <input type="hidden" name="idusuario" value="<?php echo $usuario->id ?>">
                           <div class="form-group <?php echo form_error('nombres') == true ? 'has-error':''?>">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario->nombres?>">
                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo form_error('apellidos') == true ? 'has-error':''?>">
                                <label for="nombre">Apellido:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuario->apellidos?>">
                                <?php echo form_error("apellidos","<span class='help-block'>","</span>");?>
                            </div>
                              <div class="form-group">
                                <label for="descripcion">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $usuario->telefono?>">
                            </div>
                              <div class="form-group">
                                <label for="descripcion">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $usuario->email?>">
                            </div>
                            <div class="form-group <?php echo form_error('telefono') == true ? 'has-error':''?>">
                                <label for="nombre">Usuario:</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $usuario->username?>">
                                <?php echo form_error("username","<span class='help-block'>","</span>");?>
                            </div>
                                                      <div class="form-group <?php echo form_error("rol") != false ? 'has-error':'';?>">
                                <label for="rol">ROLES</label>
                                <select name="rol" id="rol" class="form-control">
                                    <option value="<?php echo $usuario->rol_id?>">Seleccione...</option>
                                    <?php foreach ($roles as $rol) :?>
                                        <option value="<?php echo $rol->id;?>" <?php echo $rol->id==$usuario->rol_id ? "selected":"";?>><?php echo $rol->nombre ?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php echo form_error("rol","<span class='help-block'>","</span>");?>
                            </div>
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