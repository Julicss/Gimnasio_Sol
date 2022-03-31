<?php

//controllers/login.php

require '../fw/fw.php';
require '../views/login.php';
require '../models/usuario.php';

session_start();

$v = new login();
if(count($_POST)>0) {
	if(!isset($_POST['usuario'])) die ("usuario no esta seteado");
	if(!isset($_POST['pass'])) die ("contraseña no esta seteada");
	$s = new usuario();
	if($s->existeUsuario($_POST['usuario'], sha1($_POST['pass']) )) {
		$_SESSION['logueado'] = true;
		$v->usuario = $s->getDatos($_POST['usuario'], sha1($_POST['pass'])) ;
		if($v->usuario['ingresa']=="socios"){
			$_SESSION['DNI'] = $v->usuario['DNI'];
			header("Location: principal_socios.php");
		}
		if($v->usuario['ingresa']=="administrativo"){
			header("Location: principal_administrativo.php");
		}
	}
}
$v->render();