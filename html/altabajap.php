<!-- html/altabajap.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Alta profesor</title>
	<link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
</head>
<body>
	<form action="altaprofesor.php" method="post">
		<label for="profesor"><strong>Agregar un nuevo empleado:</strong></label> 
		<input type="text" name="profesor" required="" pattern="[a-zA-Z ]+" maxlength="20">
		<input type="submit" value="Agregar">
		<br/><br/>
	</form>
	<form action="" method="post">
		<label><strong>Seleccione profesor a eliminar:</strong></label> 
		<select name="profesor">
			<?php foreach ($this->profesores as $p){ ?>
				<option value="<?=$p['id_profesor']?>"><?=$p['nombre_profesor']?></option>
			<?php } ?>
		</select> <br/><br/>
		<input type="submit" value="Eliminar">
		<br/><br/>
	</form>
	<form action="principal_administrativo.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>
</html>