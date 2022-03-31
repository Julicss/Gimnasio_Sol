<!-- html/login.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesion</title>
	<link rel="stylesheet" type="text/css" href="../css/csslogin.css">
</head>
<body>
	<img src="../img/logo.png" id="logo">
	<form action="" method="post" id="formulario">
		<input type="text" name="usuario" maxlength="14" id="u" /> <br/>
		<input type="password" name="pass" maxlength="10" id="p" /> <br/>
		<br/>
		<input type="submit" value="Iniciar sesion"/>
	</form>
	<div id="mensaje"></div>

	<script>
		"use strict"

		document.getElementById("formulario").onsubmit=function(){
			var usu=document.getElementById("u").value;
			var pas=document.getElementById("p").value;
			var mensaje=document.getElementById("mensaje");
			if(usu.length==0 && pas.length==0){
				mensaje.innerHTML="Por favor ingrese usuario y contraseña";
				return false;
			}
			if(usu.length==0){
				mensaje.innerHTML="Por favor ingrese usuario" ;
				return false;
			}
			if(pas.length==0){
				mensaje.innerHTML="Por favor ingrese contraseña";
				return false;
			}
		}
	</script>
</body>
</html>