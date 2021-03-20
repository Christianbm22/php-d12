<!DOCTYPE html>
<?php include('conexion.php'); ?>
<html lang="es">
<head>
	<title>PHP Intro Cambio</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
	<h1>Manejador de Tareas - D12</h1>				
	<form method="POST" action="store.php">				<!-- Se envia a store.php con el action -->
		<label for="tarea">Nombre de Tarea</label><br>
		<input type="text" name="tarea">
		<br>

		<label for="descripcion">Descripcion</label><br>
		<textarea name="descripcion" cols="30" rows="3"></textarea>
		<br>

		<label for="prioridad">Prioridad</label><br>
		<select name="prioridad">
			<option value="Alta">Alta</option>
			<option value="Media">Media</option>
			<option value="Baja">Baja</option>
		</select>
		<br>

		<label for="urgente">Urgente</label>
		<input type="checkbox" name="urgente" value="1">
		<br>

		<label for="tipo">Escuela</label>
		<input type="radio" name="tipo" value="escuela">
		
		<label for="tipo">Trabajo</label>
		<input type="radio" name="tipo" value="trabajo">
		<br>

		<input type="submit" value="Enviar">

	</form>
	<hr>

	<h2>Lista de tareas</h2>
	<?php
		$sql = "SELECT * FROM tareas";
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		//set the resulting array to asociative
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		echo "<table border='1'>";
		echo "<tr> <th>ID</th> <th>Tarea</th> <th>Descripcion</th> </tr>";
		foreach ($stmt->fetchAll() as $tarea) {				//Con el fetchAll obtengo ya un arreglo
			echo "<tr>
				<td>" . $tarea['id'] . "</td>
				<td>" . $tarea['tarea'] . "</td>
				<td>" . $tarea['descripcion'] . "</td>
			</tr>";
		}

		echo "</table>";
	?>
</body>
</html>