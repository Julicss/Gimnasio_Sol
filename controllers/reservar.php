<?php

// controllers/reservar.php

require '../fw/fw.php';
require '../views/reservar.php';
require '../views/reservar2.php';
require '../models/maquinas.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

if(!isset($_POST['tipo'])){
$v = new reservar();
$m = new maquinas();
$v->maquinas = $m->getMaquinas();
$v->render();
}

if(isset($_POST['tipo'])){
$v = new reservar2();
$m = new maquinas();
$v->maquinas = $m->getNumeros($_POST['tipo']);
$v->render();
}