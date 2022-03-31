<html>
<head>
	<title>Inscripcion a actividades</title>
	<link rel="stylesheet" type="text/css" href="../css/csssocio.css">
</head>
<body>
	<form action="inscripcion3.php" method="post">
		
		<input type="hidden" name="socio" value="<?=$_SESSION['DNI']?>">
		<input type="hidden" name="actividad" value="<?=$_SESSION['nom_actividad']?>">
		
		<label>Seleccione día:</label>
		<select name="dia">
			<?php foreach ($this->actividades as $a){ ?>
				<option value="<?=$a['dia']?>"><?=$a['dia']?></option>
            <?php } ?>
		</select>
		<br/><br/>
		<input type="submit" value="Siguiente">
	</form>
	<form action="principal_socios.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>
</html>