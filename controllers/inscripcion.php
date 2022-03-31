<?php

// controllers/inscripcion.php

require '../fw/fw.php';
require '../views/inscripcion.php';
require '../models/actividades.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new inscripcion();
$a = new actividades();

$v->actividades = $a->getActividades();
$v->render();