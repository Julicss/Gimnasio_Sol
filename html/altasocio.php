<!-- html/altasocio.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Alta socio</title>
	<link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
</head>
<body>
	<h3 class ="centro">Bienvenido <?=$this->nombre_socio?></h3>
	<form action="altasocio2.php" method="post">
		<input type="hidden" name="socio" value="<?=$this->nombre_socio?>">
		<label for="dni"><strong>Ingrese DNI:</strong></label> 
		<input type="text" name="dni" required="" pattern="[0-9]+" maxlength="8" minlength="8"><br/><br/>
		<label for="direccion"><strong>Ingrese direccion:</strong></label>
		<input type="text" name="direccion" required="" maxlength="30"><br/><br/>
		<label for="telefono"><strong>Ingrese un telefono de contacto:</strong></label> 
		<input type="text" name="telefono" required="" pattern="[0-9]+" maxlength="10"><br/><br/>
		<label for="usuario"><strong>Ingrese usuario:</strong></label> 
		<input type="text" name="usuario" required="" maxlength="20"><br/><br/>
		<label for="contraseña"><strong>Ingrese contraseña:</strong></label> 
		<input type="text" name="contraseña" required="" maxlength="20"><br/><br/>
		<input type="submit" value="Agregar socio">
		<br/><br/>
	</form>
	<form action="principal_administrativo.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>
</html>