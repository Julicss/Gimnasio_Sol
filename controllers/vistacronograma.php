<?php

// controllers/vistacronograma.php

require '../fw/fw.php';
require '../views/vistacronograma.php';
require '../models/actividades.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new vistacronograma();
$a = new actividades();

$v->actividades = $a->getCronograma();
$v->render();