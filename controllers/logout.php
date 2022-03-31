<?php

session_start();
unset($_SESSION['logueado']);
unset($_SESSION['DNI']);
header("Location: login.php");
