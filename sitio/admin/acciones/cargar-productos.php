<?php

require_once __DIR__ . '/../../bootstrap/init.php';

/*echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
exit;*/

$autenticacion = new Autenticacion();
if(!$autenticacion->estaAutenticado()) {
    $_SESSION['msg-error'] = "Para ingresar a esta pantalla debe iniciar sesión";
    header('Location: ../index.pphp?m=login');
    exit;
}

$nombre              = $_POST['nombre'];
$descripcion         = $_POST['descripcion'];
$precio              = $_POST['precio'];
$imagen              = $_FILES['imagen'];
$imagen_descripcion  = $_POST['imagen_descripcion'];

$validator = new ValidadorProductos($_POST);
$validator->ejecutar();

if($validator->hasErrors()) {
    $_SESSION['errores'] = $validator->getErrores();
    $_SESSION['old_data'] = $_POST;
    header('Location:../index.php?m=productos-ingresados');
    exit;
}
if(!empty($imagen['tmp_name'])) {
    $nombreimagen = date('YmdHis_') . $imagen['name'];
move_uploaded_file($imagen['tmp_name'], __DIR__ .' /../../imagenes/' . $nombreimagen);

} else {
    $nombreimagen = '';
}

try {
    $producto = new Producto();
    $producto->crear([
        'usuario_id' => 1,
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'precio' => $precio,
        'imagen' => $nombreimagen,
        'imagen_descripcion' => $imagen_descripcion,
    ]);

    $_SESSION['mensaje_exito'] = "El producto fue cargado correctamente";
    header('Location:../index.php?m=productos');
    exit;
} catch(PDOException $e) {
    /*echo "<pre>";
      print_r($e);
       echo "</pre>";
       exit;*/
   
    $_SESSION['mensaje_error'] = "Ocurrió un error y el producto no pudo ser cargado.";
    header('Location:../index.php?m=productos-ingresados');
    exit;
}
