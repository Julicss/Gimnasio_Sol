<!-- html/vistracronograma.php -->
<!DOCTYPE html>
<html> 
<head>
	<title>Cronograma</title>
	<link rel="stylesheet" type="text/css" href="../css/csscronograma.css">
</head>

<body>
	<table>
	<tr>
		<th class="horario">Horarios/Dias</th>
		<th>Lunes</th>
       	<th>Martes</th>
       	<th>Miércoles</th>
       	<th>Jueves</th>
       	<th>Viernes</th>
      	<th>Sábado</th>
    </tr>
    <?php $dia=array(1=>"Lunes", 2=>"Martes", 3=>"Miercoles", 4=>"Jueves", 5=>"Viernes", 6=>"Sabado"); ?>
    <?php for($i=8;$i<=21;$i++){?>
	<tr>
		<td class="horario"><?=$i?>:00</td>
		<?php for($j=1;$j<=6;$j++) {?>
			<td>
			<?php foreach ($this->actividades as $a) { ?>
			<?php if($a['hora']==$i && $a['dia']==$dia[$j]) {?>
				<?=$a['nombre_actividad']?><br/>
			<?php } ?>
			<?php } ?>
			</td>
		<?php } ?>
	</tr>
	<?php } ?>
	</table>

	<form action="principal_socios.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>	
</html>