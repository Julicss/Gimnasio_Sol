<?php

// controllers/maquinasreservadas.php

require '../fw/fw.php';
require '../views/maquinasreservadas.php';
require '../models/maquinas.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

$v = new maquinasreservadas();
$m = new maquinas();

if(isset($_POST['maquina'])){
	$m->bajaReserva($_SESSION['DNI'],$_POST['maquina']);
}

$v->maquinas = $m->getMaquinasReservadas($_SESSION['DNI']);
$v->render();