<?php

//controllers/principal_administrativo.php

require '../fw/fw.php';
require '../views/principal_administrativo.php';
session_start();

if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new principal_administrativo();
$v->render();