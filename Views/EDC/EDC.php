 <table class="table">
 	<tr>
		<th>Codigo SAP</th>
		<th>Nombre</th>
		<th>Direccion</th>
		<th>Telefono</th>
		<th>Correo</th>
		<th>Opciones</th>
	</tr>
	<?php  foreach ($array as $key => $value) {?>

	<tr>
		<td> <?php echo $value["CodigoSAP"] ?> </td>
		<td> <?php echo $value["NombreEDC"] ?> </td>
		<td> <?php echo $value["TelefonoEDC"] ?> </td>
		<td> <?php echo $value["CorreoEDC"] ?> </td>
		<td>
			<a href=" <?php echo URL.'edit/edit/'.$value["iduser"] ?> ">Editar</a> 
			<a href=" <?php echo URL.'details/details/'.$value["iduser"] ?> ">Detalle</a> 
			<a href=" <?php echo URL.'delete/delete/'.$value["iduser"] ?> ">Borrar</a> 


		</td>

	</tr>
	<?php } ?>	
</table>