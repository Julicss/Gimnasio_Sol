<?php

// controllers/quitar2.php

require '../fw/fw.php';
require '../views/quitar2.php';
require '../models/actividades.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new quitar2();
$a = new actividades();

$v->id_profesor = $_POST['profesor'];
$v->actividades = $a->getActividadesdeProfesor($_POST['profesor']);
$v->render();