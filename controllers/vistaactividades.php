<?php

// controllers/vistaactividades.php

require '../fw/fw.php';
require '../views/vistaactividades.php';
require '../models/actividades.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new vistaactividades();
$a = new actividades();

$v->actividades = $a->getVistaActividades();
$v->render();