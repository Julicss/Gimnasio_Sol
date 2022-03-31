<?php

// controllers/altabajas.php

require '../fw/fw.php';
require '../views/altabajas.php';
require '../models/socio.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new altabajas();
$s = new socio();

if(count($_POST)>0) {
	$s->baja($_POST['socio']);
}

$v->socios = $s->getSocios();
$v->render();