<!-- html/reservar.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Reservar maquinas</title>
	<link rel="stylesheet" type="text/css" href="../css/csssocio.css">
</head>
<body>
	<form action="" method="post">
		<label><strong>Seleccione maquina:</strong></label> 
		<select name="tipo">
			<?php foreach ($this->maquinas as $m){ ?>
				<option value="<?=$m['codigo_tipo']?>"><?=$m['descripcion_tipo']?></option>
			<?php } ?>
		</select> <br/><br/>
		<input type="submit" value="Siguiente">
	</form>
	<form action="principal_socios.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>
</html>