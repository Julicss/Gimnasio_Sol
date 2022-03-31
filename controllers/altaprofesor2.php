<?php

// controllers/altaprofesor2.php

require '../fw/fw.php';
require '../views/altaprofesor2.php';
require '../models/profesores.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$p = new profesores();
$p->alta($_POST['profesor'], $_POST['direccion'], $_POST['telefono']);

$v = new altaprofesor2();

$v->render();