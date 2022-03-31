<?php

// controllers/inscripcion4.php

require '../fw/fw.php';
require '../views/inscripcion4.php';
require '../views/inscripcion5.php';
require '../views/inscripcion6.php';
require '../models/socio.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$s = new socio();
if($s->existeInscripcion($_POST['socio'], $_POST['actividad'])){
	$v = new inscripcion5();
	$v->render();
} else {
	if($s->superaLimite($_POST['actividad'])){
		$v = new inscripcion6();
		$v->render();
	} else {
		$s->inscribir($_POST['socio'], $_POST['actividad']);
		$v = new inscripcion4();
		$v->render();
	}
}