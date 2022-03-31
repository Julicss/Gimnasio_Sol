<?php

// controllers/quitar3.php

require '../fw/fw.php';
require '../views/quitar3.php';
require '../models/profesores.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new quitar3();
$p = new profesores();

$p->quitarProfesor($_POST['profesor'],$_POST['actividad']);
$v->render();