<?php

// controllers/vistacronograma2.php

require '../fw/fw.php';
require '../views/vistacronograma2.php';
require '../models/actividades.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new vistacronograma2();
$a = new actividades();

$v->actividades = $a->getCronograma();
$v->render();