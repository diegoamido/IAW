<?php 
$nomProv= array(
	'CO' => "A Coruña" ,
	'LU' => "Lugo" ,
	'OU' => "Ourense" ,
	'PO' => "Pontevedra");

$nomDep=array(
	'F' => "Fútbol" , 
	'T' => "Ténis" , 
	'N' => "Natación");

$c=conectarBaseDatos();	
$sql="SELECT * FROM alumnos ORDER BY apellidos, nombre;";
$result=enviarConsulta($c,$sql);		

?>
<table class='table table-striped table-bordered'>
	<tr>
		<th>Apellidos</th>
		<th>Nombre</th>
		<th class="text-center">Sexo</th>
		<th class="text-center">Nif</th>
		<th class="text-center">Deportes</th>
		<th class="text-center">Provincia</th>
		<th class="text-center" colspan="2">Acciones</th>
	</tr>

<?php 

while($fila=mysqli_fetch_array($result)) {
	echo "\n<tr>";
	echo "\n\t<td>".$fila["apellidos"]."</td>";
	echo "\n\t<td>".$fila["nombre"]."</td>";
	echo "\n\t<td class='text-center'>".$fila["sexo"]."</td>";
	echo "\n\t<td class='text-center'>".$fila["nif"]."</td>";
	echo "\n\t<td class='text-center'>";

	$deportes=explode("-", $fila["deportes"]);
	foreach ($deportes as $codDeporte) {
		echo "<div>".$nomDep[$codDeporte]."</div>";
	}

	echo "</td>";
	echo "\n\t<td class='text-center'>".$nomProv[$fila["provincia"]]."</td>";
	echo "\n\t<td class='text-center'>
				<a href='#' class='btn btn-success'>Modificar</a>
				&nbsp;
				<a href='#' onclick='estasSeguro({$fila['registro']})'class='btn btn-danger'>Eliminar</a>
				
	</td>";
  	// antes llamabamos directamente a la configuración php
	// <a href='delete.php?id={$fila['registro']}' class='btn btn-danger'>Eliminar</a>
	// Se puede hacer con un evento onclick de javascript
	echo "\n</tr>";
}

mysqli_close($c);

?>	



</table>
