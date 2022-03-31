<!-- html/inscripcion5.php -->
<!DOCTYPE html>
<html> 
<head>
	<title>Inscripcion rechazada</title>
	<link rel="stylesheet" type="text/css" href="../css/csssocio.css">
</head>

<body>
	<h1 id="comentario">Inscripcion Rechazada</h1>
	<h1 class="comentario">No puedes inscribirte a una actividad en el mismo horario</h1>
	
	<form action="principal_socios.php"method="get" >
		<input type="submit" value="Volver a menu principal">
	</form> <br/>
	<form action="inscripcion.php" method="get">
		<input type="submit" value="Volver a inscripcion a actividad">
	</form><br/>
	<form action="actividadesinscriptas.php" method="get">
		<input type="submit" value="Ir a actividades inscriptas">
	</form>
</body>	
</html>