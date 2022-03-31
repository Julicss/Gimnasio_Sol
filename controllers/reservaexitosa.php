<?php

// controllers/reservaexitosa.php

require '../fw/fw.php';
require '../views/reservaexitosa.php';
require '../views/reservarechazada.php';
require '../views/yareservada.php';
require '../models/socio.php';

session_start();
if(!isset($_SESSION['logueado'])){
	header("Location: login.php");
	exit;
}

if(count($_POST)>0) {
	$s = new socio();
	if($s->existeReserva($_SESSION['DNI'], $_POST['maquina'])){
		if($s->existeFecha($_POST['maquina'], $_POST['dia'], $_POST['mes'], $_POST['anio'], $_POST['hora'], $_POST['minuto'])){
			$s->reservar($_SESSION['DNI'], $_POST['maquina'], $_POST['dia'], $_POST['mes'], $_POST['anio'], $_POST['hora'], $_POST['minuto']);
			$v = new reservaexitosa();
			$v->render();
		} else {
			$v = new yareservada();
			$v->render();
		}
	} else {
	$v = new reservarechazada();
	$v->render();
	}
}