<?php

// controllers/lista.php

require '../fw/fw.php';
require '../views/lista.php';
require '../views/lista_actividades.php';
require '../models/socio.php';
require '../models/actividades.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}


if(!isset($_POST['socio'])) {
$v = new lista();
$s = new socio();
$v->socios = $s->getSocios();
$v->render();
}
if(isset($_POST['socio'])) {
$v = new lista_actividades();
$a = new actividades();
$v->socio=$_POST['socio'];
$v->actividades = $a->getActividadesInscriptas($_POST['socio']);
$v->render();
}
