<?php

// controllers/altabajap.php

require '../fw/fw.php';
require '../views/altabajap.php';
require '../models/profesores.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new altabajap();
$p = new profesores();

if(count($_POST)>0) {
	$p->baja($_POST['profesor']);
}

$v->profesores = $p->getProfesores();
$v->render();
