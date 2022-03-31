<?php

// controllers/altasocio.php

require '../fw/fw.php';
require '../views/altasocio.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new altasocio();
$v->nombre_socio=$_POST['socio'];

$v->render();