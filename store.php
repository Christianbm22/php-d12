<?php
	include('conexion.php');

	//Validar recepcion de datos
	if (!empty($_POST['tarea'])){											
		
		//Recibir datos
		$tarea = $_POST['tarea'];												//Recibo formulario
		$descripcion = $_POST['descripcion'];
		$prioridad = $_POST['prioridad'];
		$urgente = $_POST['urgente'];
		$tipo = $_POST['tipo'];

		//Validar datos


		//Guardar a la BD
		$sql = "INSERT INTO tareas (tarea, descripcion, prioridad, urgente, tipo) VALUES ('$tarea', '$descripcion', '$prioridad', '$urgente', '$tipo')"; //Creo sentencia sql

		//use exec() because no results are returned
		$conn->exec($sql);														//Inserto secuencia sql a la base de datos

		//Redireccionar
		header('Location: index.php');											//Redirecciono (No se puede redireccionar si antes hacemos un echo o si hay algo de html)
	}
	else{
		echo "No hay datos enviados";
	}
?>
