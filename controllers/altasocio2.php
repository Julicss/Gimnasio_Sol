<?php

// controllers/altasocio2.php

require '../fw/fw.php';
require '../views/altasocio2.php';
require '../models/socio.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$s = new socio();
$s->alta($_POST['socio'], $_POST['dni'], $_POST['direccion'], $_POST['telefono'], $_POST['usuario'], $_POST['contraseña']);

$v = new altasocio2();

$v->render();