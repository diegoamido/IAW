function estasSeguro(id) {
	var confirmacion=confirm("Estas seguro de borrar el registro número "+id);
	if(confirmacion){
		/* si se confirmó el borrado, redireccionamos a delete.php con el id de registro */
		document.location.href="delete.php?id="+id;
	}
}