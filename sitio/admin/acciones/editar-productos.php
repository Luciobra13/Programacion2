<?php
require_once __DIR__ . '/../../bootstrap/init.php';

$autenticacion = new Autenticacion();
if(!$autenticacion->estaAutenticado()) {
    $_SESSION['msg-error'] = "Para ingresar a esta pantalla debe iniciar sesión";
    header('Location: ../index.pphp?m=login');
    exit;
}


$id                 = $_POST['id'];
$nombre             = $_POST['nombre'];
$descripcion        = $_POST['descripcion'];
$precio             = $_POST['precio'];
$imagen             = $_FILES['imagen'];
$imagen_descripcion = $_POST['imagen_descripcion'];

$validator = new ValidadorProductos($_POST);
$validator->ejecutar();

if($validator->hasErrors()) {
    $_SESSION['errores'] = $validator->getErrores();
    $_SESSION['old_data'] = $_POST;
    header("Location: ../index.php?m=productos-editar&id=" . $id);
    exit;
}

$producto = (new Producto())->traerPorPk($id);

if(!empty($imagen['tmp_name'])) {
    $nombreImagen = date('YmdHis_') . $imagen['name'];

    move_uploaded_file($imagen['tmp_name'], __DIR__ . '/../../imagenes/' . $nombreImagen);
} else {
     $nombreImagen = $producto->getImagen();
}

try {
    $producto = new Producto();
    $producto->editar($id, [
        'usuario_id' => 1, 
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'precio' => $precio,
        'imagen' => $nombreImagen,
        'imagen_descripcion' => $imagen_descripcion,
    ]);
    $_SESSION['mensaje_exito'] = "El producto fue editado correctamente.";
    header("Location: ../index.php?s=productos");
    exit;
} catch(PDOException $e) {
 
    $_SESSION['mensaje_error'] = "Ocurrió un error inesperado y el producto no pudo ser editado.";
    header("Location: ../index.php?s=editar-productos&id=" . $id);
    exit;
  
}
