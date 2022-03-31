<?php

// controllers/altaprofesor.php

require '../fw/fw.php';
require '../views/altaprofesor.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new altaprofesor();
$v->nombre_profesor=$_POST['profesor'];

$v->render();