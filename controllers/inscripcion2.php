<?php

// controllers/inscripcion2.php

require '../fw/fw.php';
require '../views/inscripcion2.php';
require '../models/actividades.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new inscripcion2();
$a = new actividades();

$_SESSION['nom_actividad']=$_POST['actividad'];

$v->actividades = $a->getDias($_POST['actividad']);
$v->render();