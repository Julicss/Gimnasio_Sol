<?php

// controllers/quitar.php

require '../fw/fw.php';
require '../views/quitar.php';
require '../models/profesores.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new quitar();
$p = new profesores();

$v->profesores = $p->getProfesores();
$v->render();
