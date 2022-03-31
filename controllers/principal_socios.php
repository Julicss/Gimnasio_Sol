<?php

//controllers/principal_socios.php

require '../fw/fw.php';
require '../views/principal_socios.php';
session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new principal_socios();
$v->render();