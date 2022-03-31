<!-- html/altabajas.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Alta socios</title>
	<link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
</head>
<body>
	<form action="altasocio.php" method="post">
		<label for="socio"><strong>Agregar un nuevo socio:</strong></label> 
		<input type="text" name="socio" required="" pattern="[a-zA-Z ]+" maxlength="20">
		<input type="submit" value="Agregar">
		<br/><br/>
	</form>
	<form action="" method="post">
		<label><strong>Seleccione socio a eliminar:</strong></label> 
		<select name="socio">
			<?php foreach ($this->socios as $s){ ?>
				<option value="<?=$s['dni']?>"><?=$s['nombre_socio']?></option>
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