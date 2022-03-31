<?php

// controllers/asignacion.php

require '../fw/fw.php';
require '../views/profesorasignado.php';
require '../views/yatiene.php';
require '../models/profesores.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$p = new profesores();
if($p->comprobarActividad($_POST['actividad'])){
	$p->asignarProfesor($_POST['profesor'], $_POST['actividad']);
	$v = new profesorasignado();
	$v->render();
} else {
	$v = new yatiene();
	$v->render();
}