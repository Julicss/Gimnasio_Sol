<!-- html/altaprofesor.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Alta profesor</title>
	<link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
</head>
<body>
	<h3 class= "centro">Bienvenido <?=$this->nombre_profesor?></h3>
	<form action="altaprofesor2.php" method="post">
		<input type="hidden" name="profesor" value="<?=$this->nombre_profesor?>">
		<label for="direccion"><strong>Ingrese direccion:</strong></label> 
		<input type="text" name="direccion" required="" maxlength="20">
		<br/><br/>
		<label for="telefono"><strong>Ingrese un telefono de contacto:</strong></label> 
		<input type="text" name="telefono" required="" pattern="[0-9]+" maxlength="10">
		<br/><br/>
		<input type="submit" value="Agregar empleado">
		<br/><br/>
	</form>
	<form action="principal_administrativo.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>
</html>