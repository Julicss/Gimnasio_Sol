<!-- html/maquinasreservadas.php -->
<!DOCTYPE html>
<html> 
<head>
	<title>Maquinas reservadas</title>
	<link rel="stylesheet" type="text/css" href="../css/csssocio.css">
</head>

<body>
	<h1>Lista de maquinas reservadas:</h1>
	<table>
	<tr>
		<th>Maquina</th>
		<th>Fecha</th>
		<th>Horario</th>
		<th class="invisible"></th>
	</tr>
	<?php foreach ($this->maquinas as $m) { ?>
	<tr>
		<td><?=$m['descripcion_tipo']?> N° <?=$m['descripcion_maquina']?></td>
		<td><?=$m['dia']?>/<?=$m['mes']?>/<?=$m['anio']?></td>
		<td><?=$m['hora']?>:<?php if($m['minuto']==0) echo('00'); ?><?php if($m['minuto']==30) echo('30'); ?></td>
		<td th class="invisible">
			<form action="" method="post">
			<input type="hidden" name="maquina" value="<?=$m['codigo_maquinaria']?>">
			<input type="submit" value="Eliminar reserva">
			</form>
		</td>
	</tr>
	<?php } ?>
	</table><br/><br/>

	<form action="principal_socios.php" method="post">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>	
</html>