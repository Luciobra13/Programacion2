<?php

require_once __DIR__ . '/../../bootstrap/init.php';

$email      = $_POST['email'];
$password   = $_POST['password'];

$autenticacion = new Autenticacion();

if($autenticacion->iniciarSesion($email, $password)) {
    $_SESSION['mensaje_exito'] = "La sesión fue iniciada correctamente.";
    header("Location: ../index.php?m=home");
    exit;
}else {
    $_SESSION['mensaje_error'] = "El email y/o pasword no coinciden con nuestros registros.";
    $_SESSION['old_data'] = $_POST;
    header("Location: ../index.php?m=login");
    exit;

}


