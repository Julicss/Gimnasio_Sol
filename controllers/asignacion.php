<?php

// controllers/asignacion.php

require '../fw/fw.php';
require '../views/asignacion.php';
require '../views/profesorasignado.php';
require '../models/actividades.php';
require '../models/profesores.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new asignacion();
$a = new actividades();
$p = new profesores();

$v->actividades = $a->getCronogramaOrdenado();
$v->profesores = $p->getProfesores();
$v->render();
