<html>
<head>
	<title>Inscripcion a actividades</title>
	<link rel="stylesheet" type="text/css" href="../css/csssocio.css">
</head>
<body>
	<h2 class="principal">Recuerde que las actividades tienen duracion de una hora</h2>
	<form action="inscripcion4.php" method="post">
		
		<input type="hidden" name="socio" value="<?=$_SESSION['DNI']?>">
		
		<label>Seleccione Horario:</label>
		<select name="actividad">
			<?php foreach ($this->actividades as $a){ ?>
				<option value="<?=$a['codigo_actividad']?>"><?=$a['hora']?>:00</option>
            <?php } ?> 
		</select> <br/><br/><br/>
		<input type="submit" value="Inscribirse">
	</form>
	<form action="principal_socios.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>
</html>