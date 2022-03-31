<?php

// controllers/generaractividad.php

require '../fw/fw.php';
require '../views/generaractividad.php';
require '../views/actividadgenerada.php';
require '../views/actividadrechazada.php';
require '../views/horariorechazado.php';
require '../models/actividades.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

if(isset($_POST['nombre'])) {
	$a = new actividades();
	if($a->comprobarHorario($_POST['dia'], $_POST['horario'])){
		$v = new horariorechazado();
		$v->render();
	} else {
	if(!$a->comprobarActividad($_POST['nombre'], $_POST['dia'], $_POST['horario'])){
		$a->altaActividad($_POST['nombre'], $_POST['dia'], $_POST['horario'], $_POST['limite']);
	$v = new actividadgenerada();
	$v->render();
	} else {
		$v = new actividadrechazada();
		$v->render();
	}
	}
}

$v = new generaractividad();

$v->render();
