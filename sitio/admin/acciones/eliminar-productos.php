<?php
require_once __DIR__ . '/../../bootstrap/init.php';

$autenticacion = new Autenticacion();
if(!$autenticacion->estaAutenticado()) {
    $_SESSION['msg-error'] = "Para ingresar a esta pantalla debe iniciar sesión";
    header('Location: ../index.pphp?m=login');
    exit;
}

$id = $_POST['id'];

try {
    $producto = new Producto();
    $producto->eliminar($id);

    $_SESSION['mensaje logrado'] = 'El producto fue eliminado correctamente.';
    header("Location:../index.php?m=productos");
    exit;
} catch(Exception $e) {
    $_SESSION['mensaje no logrado'] = 'Ocurrió un error y el producto no fue eliminado';
    header("Location:../index.php?m=productos");
    exit;
}