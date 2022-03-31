<!-- html/quitar.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Quitar profesor</title>
	<link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
</head>
<body>
	<form action="quitar2.php" method="post">
		<label><strong>Seleccione profesor:</strong></label> 
		<select name="profesor">
			<?php foreach ($this->profesores as $p){ ?>
				<option value="<?=$p['id_profesor']?>"><?=$p['nombre_profesor']?></option>
			<?php } ?>
		</select> <br/><br/>
		<input type="submit" value="Siguiente">
		<br/><br/>
	</form>
	<form action="principal_administrativo.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>
</html>