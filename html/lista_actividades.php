<!-- html/lista_actividades.php -->
<!DOCTYPE html>
<html> 
<head>
	<title>Lista de actividades</title>
	<link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
</head>

<body>
	<h1>Lista de actividades:</h1>
	<table>
	<tr>
		<td>Actividad</td>
		<td>Dia</td>
		<td>Horario</td>
	</tr>
	<?php foreach ($this->actividades as $a) { ?>
	<tr>
		<td><?=$a['nombre_actividad']?></td>
		<td><?=$a['dia']?></td>
		<td><?=$a['hora']?>:00</td>
	</tr>
	<?php } ?>
	</table>

	<form action="principal_administrativo.php" method="post">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>	
</html>