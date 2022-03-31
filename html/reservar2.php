<!-- html/reservar.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Reservar maquinas</title>
	<link rel="stylesheet" type="text/css" href="../css/csssocio.css">
</head>
<body>
	<form action="reservaexitosa.php" method="post" id="formulario">
		<label><strong>Seleccione numero de maquina:</strong></label> 
		<select name="maquina">
			<?php foreach ($this->maquinas as $m){ ?>
				<option value="<?=$m['codigo_maquinaria']?>">N° <?=$m['descripcion_maquina']?></option>
			<?php } ?>
		</select> <br/><br/>
		<label><strong>Seleccione día:</strong></label>
		<select name="dia" id="dia">
		<?php for($i=1;$i<=31;$i++) {?>
		<option value="<?=$i?>"><?=$i?></option>
		<?php } ?>
		</select><br/><br/>
		<label><strong>Seleccione mes:</strong></label>
		<select name="mes" id="mes">
			<option value="" id="mes1"></option>   
			<option value="" id="mes2"></option>   
			<option value="" id="mes3"></option>   
		</select> <br/><br/>
		<script>
		"use strict"
		var m=new Date();
		var m1=document.getElementById("mes1");
		var m2=document.getElementById("mes2");
		var m3=document.getElementById("mes3");
		if(m.getMonth()==0){
			m1.innerHTML="Enero";
			m2.innerHTML="Febrero";
			m3.innerHTML="Marzo";
			m1.value=0;
			m2.value=1;
			m3.value=2;
		}
		if(m.getMonth()==1){
			m1.innerHTML="Febrero";
			m2.innerHTML="Marzo";
			m3.innerHTML="Abril";
			m1.value=1;
			m2.value=2;
			m3.value=3;
		}
		if(m.getMonth()==2){
			m1.innerHTML="Marzo";
			m2.innerHTML="Abril";
			m3.innerHTML="Mayo";
			m1.value=2;
			m2.value=3;
			m3.value=4;
		}
		if(m.getMonth()==3){
			m1.innerHTML="Abril";
			m2.innerHTML="Mayo";
			m3.innerHTML="Junio";
			m1.value=3;
			m2.value=4;
			m3.value=5;
		}
		if(m.getMonth()==4){
			m1.innerHTML="Mayo";
			m2.innerHTML="Junio";
			m3.innerHTML="Julio";
			m1.value=4;
			m2.value=5;
			m3.value=6;
		}
		if(m.getMonth()==5){
			m1.innerHTML="Junio";
			m2.innerHTML="Julio";
			m3.innerHTML="Agosto";
			m1.value=5;
			m2.value=6;
			m3.value=7;
		}
		if(m.getMonth()==6){
			m1.innerHTML="Julio";
			m2.innerHTML="Agosto";
			m3.innerHTML="Septiembre";
			m1.value=6;
			m2.value=7;
			m3.value=8;
		}
		if(m.getMonth()==7){
			m1.innerHTML="Agosto";
			m2.innerHTML="Septiembre";
			m3.innerHTML="Octubre";
			m1.value=7;
			m2.value=8;
			m3.value=9;
		}
		if(m.getMonth()==8){
			m1.innerHTML="Septiembre";
			m2.innerHTML="Octubre";
			m3.innerHTML="Noviembre";
			m1.value=8;
			m2.value=9;
			m3.value=10;
		}
		if(m.getMonth()==9){
			m1.innerHTML="Octubre";
			m2.innerHTML="Noviembre";
			m3.innerHTML="Diciembre";
			m1.value=9;
			m2.value=10;
			m3.value=11;
		}
		if(m.getMonth()==10){
			m1.innerHTML="Noviembre";
			m2.innerHTML="Diciembre";
			m3.innerHTML="Enero";
			m1.value=10;
			m2.value=11;
			m3.value=0;
		}
		if(m.getMonth()==11){
			m1.innerHTML="Diciembre";
			m2.innerHTML="Enero";
			m3.innerHTML="Febrero";
			m1.value=11;
			m2.value=0;
			m3.value=1;
		}
		</script>
		<label><strong>Seleccione año:</strong></label>
		<select name="anio" id="anio">
			<option value="" id="anio1"></option>
			<option value="" id="anio2" required></option>
		</select><br/><br/>
		<script>
		"use strict"
		var a=new Date();
		var a1=document.getElementById("anio1");
		var a2=document.getElementById("anio2");
		a1.innerHTML=a.getFullYear();
		a1.value=a.getFullYear();
		a2.innerHTML=a.getFullYear()+1;
		a2.value=a.getFullYear()+1;
		</script>

		<label><strong>Las reservas duran 30 minutos</strong></label><br/><br/>
		<label><strong>Seleccione hora de uso:</strong></label>
		<select name="hora">
			<?php for($i=8;$i<21;$i++) { ?>
			<option value="<?=$i?>"><?=$i?></option>   
			<?php } ?>  
		</select>
		<strong>:</strong>
		<select name="minuto">
			<option value="00">00</option>   
			<option value="30">30</option>   
		</select> <br/><br/>
		<input type="submit" value="Reservar">
	</form>

	<div id="mensaje"></div>

	<script>
		"use strict"
		document.getElementById("formulario").onsubmit=function(){
			var mensaje=document.getElementById("mensaje");
			var d=document.getElementById("dia").value;
			var m=document.getElementById("mes").value;
			var a=document.getElementById("anio").value;
			var f = new Date();
			var ingreso = new Date(a,m,d);
			if(ingreso.getDate()!=d || ingreso.getMonth()!=m || ingreso.getFullYear()!=a){
				mensaje.innerHTML="Fecha invalida<br/><br/>";
				return false;
			}
			if(ingreso.getMonth()>=f.getMonth()&&ingreso.getFullYear()>f.getFullYear()){
				mensaje.innerHTML="No puede reservar en esa fecha<br/><br/>";
				return false;
			}
			if(ingreso.getDate()<f.getDate() && ingreso.getMonth()==f.getMonth()){
				mensaje.innerHTML="El dia seleccionado ya paso<br/><br/>";
				return false;
			}
			if(ingreso.getDate()==f.getDate() && ingreso.getMonth()==f.getMonth()){
				mensaje.innerHTML="No puede reservar el mismo dia<br/><br/>";
				return false;
			}
		}
	</script>

	<form action="principal_socios.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>
</html>