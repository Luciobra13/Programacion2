<?php
require_once __DIR__ . '/../../bootstrap/init.php';

$autentication = new Autenticacion();

$autentication->cerrarSesion();

$_SESSION['mensaje_exito'] = " La sesión fue cerrada correctamente.";
header("Location: ../index.php?s=login");
