<?php 
	require "../misfunciones.php";
	$registro=isset($_GET['id'])?$_GET['id']:false;
	// si se ejecuta la url: delete.php?id=9 or 1
	// se borrarian todos los registros. Esto es inyección SQL

//	if($registro) { // solo si me mandan un id

	// para más control debemos asegurarnos que nos pasan un número solo
	
	if (is_numeric($registro)) { // con esto controlo inyección SQL

		$sql="DELETE FROM alumnos WHERE registro=$registro";
		$c=conectarBaseDatos();
		$result=enviarConsulta($c,$sql);
	}
	header('Location: index.php'); // Esto redirecciona a la página indicada


 ?>