<script>
shortcut.add("f7",function() {
     var option = document.getElementById("btn-print").click();
});
shortcut.add("f8",function() {
     var option = document.getElementById("btn-print-fact1").click();
});
shortcut.add("f9",function() {
     var option = document.getElementById("btn-print-fact2").click();
});
shortcut.add("ESC",function() {
     var option = document.getElementById("salir").click();
});
</script>

<button type="button" id ="btn-print" class="btn btn-primary btn-ticket" value="<?php echo $venta1->id;?>"><span class="fa fa-print">TICKET<kbd>F7</kbd></span></button>
      <button type="button" id ="btn-print-fact1" class="btn btn-primary btn-print-fact1" value="<?php echo $venta1->id;?>"><span class="fa fa-print"> CONS.FINAL<kbd>F8</kbd></span></button>
      <button type="button" id ="btn-print-fact2" class="btn btn-primary btn-print-fact2" value="<?php echo $venta1->id;?>"><span class="fa fa-print"> CRED.FISCAL<kbd>F9</kbd></span></button>
<div class="row">
	<div class="col-xs-12 text-center">
		<?php
		$efectivo= $_POST['efectivo'];
		$cambio= number_format($venta->total-$efectivo,2);
		?>
		<h1>CAMBIO: $  <?php echo $cambio;?></h1>
		<h2><?php echo $venta->tipocomprobante;?></h2>
		<h3>Atendió:  <?php echo $venta->usuario_v;?></h3>
	</div>
	
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>CLIENTE</b><br>
		<b>Nombre:</b> <?php echo $venta->nombre;?> <br>
		<b>Nro Documento:</b> <?php echo $venta->documento;?><br>
		<b>Telefono:</b> <?php echo $venta->telefono;?> <br>
		<b>Direccion</b> <?php echo $venta->direccion;?><br>
	</div>	
	<div class="col-xs-6">	
		<b>COMPROBANTE</b> <br>
		<b>Tipo de Comprobante:</b> <?php echo $venta->tipocomprobante;?><br>
		<b>Serie:</b> <?php echo $venta->serie;?><br>
		<b>Nro de Comprobante:</b><?php echo $venta->num_documento;?><br>
		<b>Fecha</b> <?php echo $venta->fecha;?>
	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles as $detalle):?>
				<tr>
					<td><?php echo $detalle->codigo;?></td>
					<td><?php echo $detalle->nombre;?></td>
					<td><?php echo $detalle->precio;?></td>
					<td><?php echo $detalle->cantidad;?></td>
					<td><?php echo $detalle->importe;?></td>
				</tr>
				<?php endforeach;?>
				
				<?php foreach($detalles1 as $detalle1):?>
				<tr>
					<td><?php echo $detalle1->codigo;?></td>
					<td><?php echo $detalle1->nombre;?></td>
					<td><?php echo $detalle1->precio;?></td>
					<td><?php echo $detalle1->cantidad;?></td>
					<td><?php echo $detalle1->importe;?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $venta->subtotal;?></td>
				</tr>
				<tr>
					<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $venta->total;?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

