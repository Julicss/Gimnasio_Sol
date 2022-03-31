<?php

// controllers/inscripcion3.php

require '../fw/fw.php';
require '../views/inscripcion3.php';
require '../models/actividades.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new inscripcion3();
$a = new actividades();

$v->actividades = $a->getHorarios($_SESSION['nom_actividad'], $_POST['dia']);
$v->render();