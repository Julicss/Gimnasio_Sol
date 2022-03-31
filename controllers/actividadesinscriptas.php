<?php

// controllers/actividadesinscriptas.php

require '../fw/fw.php';
require '../views/actividadesinscriptas.php';
require '../models/actividades.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new actividadesinscriptas();
$a = new actividades();

if(isset($_POST['actividad'])){
	$a->bajaInscripcion($_SESSION['DNI'],$_POST['actividad']);
}

$v->actividades = $a->getActividadesInscriptas($_SESSION['DNI']);
$v->render();