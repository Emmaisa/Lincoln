<div class="box-body">
      
<form method="post" id="formcheck">
                <div class="col-xs-5">
                <input id="id" value="<?php echo $venta1->id;?>" name="id" type="hidden">
                    <label>Banco:</label>
                    <select name="banco" id="banco" class="form-control select2" style="width: 100%;" required="true">
                    <option value="">Seleccione...</option>
                    <?php foreach ($bancos as $banco) :?>
                    <option value="<?php echo $banco->id;?>"><?php echo $banco->name ?></option>
                    <?php endforeach;?>
                    </select>
                    <?php echo form_error("banco","<span class='help-block'>","</span>");?>
                    </select>
                </div>
                 <div class="col-xs-5">
                    <label>Fecha:</label>
                    <input id="fecha" name="fecha" type="date" class="form-control" step="1" min="2018-01-01" max="2030-12-31" value="<?php echo date("Y-m-d");?>">
                </div>

                 <div id="numero1"class="col-xs-5">
                    <label>Numero CH:</label>
                    <input id="numero" name="numero" type="text" class="form-control" placeholder="00000">
                </div>
                 <div class="col-xs-5">
                    <label>Valor:</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                    <input id="valor" name="valor" value="<?php echo $venta1->total;?>" type="text" class="form-control">
                    </div>
                </div>
                 
    </form>

    </div>