<!-- html/lista.php -->
<!DOCTYPE html>
<html> 
<head>
	<title>Lista de actividades</title>
	<link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
</head>

<body>
	<form action="" method="post" id="formulario">
		<label>Seleccione socio:</label>
		<select name="socio">
			<?php foreach ($this->socios as $s){ ?>
				<option value="<?=$s['dni']?>"><?=$s['nombre_socio']?></option>
			<?php } ?>
		</select> <br/><br/>
		<input type="submit" value="Mostrar actividades del socio"><br/><br/>
	</form>

	<form action="principal_administrativo.php" method="post">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>	
</html>