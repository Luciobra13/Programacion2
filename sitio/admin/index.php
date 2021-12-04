<?php

require_once __DIR__ . '/../bootstrap/init.php';
require_once RUTA_RAIZ . '/bootstrap/secciones.php';

$secciones = getSeccionesAdmin();

$seccionActual = $_GET['m'] ?? 'login';

if(!isset($secciones[$seccionActual])) {
    $seccionActual = '404';
}

$autenticacion = new Autenticacion();

$requiereAutenticacion = $secciones[$seccionActual]['autenticacion'] ?? false;
if($requiereAutenticacion && !$autenticacion->estaAutenticado()) {
 
    $_SESSION['mensaje_error'] = "Para ingresar a esta pantalla debe iniciar sesión";
    header("Location: index.php?s=login");
    exit;
}

$mensajeExito = $_SESSION['mensaje_exito'] ?? null;
$mensajeError = $_SESSION['mensaje_error'] ?? null;
unset($_SESSION['mensaje_exito'], $_SESSION['mensaje_error']);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Panel de Administración ::<?= $secciones[$seccionActual]['title'];?></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet"  href="../css/estilos.css">
	
</head>
<body class="bg-fondo container-fluid col">
    <header class="container-fluid">
        <h1 class="brand">Greenshoes</h1>
        <p class="cabeza">Un estilo natural en calzado</p>
        
    </header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark text-bar">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
     <div class="collapse navbar-collapse" id="navbarResponsive">      	
     <?php
            if($autenticacion->estaAutenticado());
            ?>
            <ul>
                <li><a href="index.php" class="text-decoration-none">Home</a></li>
                <li class="mr-4"><a href="index.php?m=productos" class="text-decoration-none">Catalogo</a></li>
                <li class="text-decoration-none">
                    <form action="acciones/auth-cerrar-sesion.php" method="post">
                            <button type="submit">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
		</div>
    </nav>
   
    <div class="container-flex">
           <?php
           if($mensajeExito !== null):
           ?> 
           <div class="msg-exito"><?= $mensajeExito;?></div>
           <?php
           endif;
            ?>
           <?php
           if($mensajeError!== null):
            ?>
            <div class="msg-error"><?= $mensajeError;?></div> 
     <?php
     endif
     ?>
      
      <?php
            require __DIR__ . '/menu/' . $seccionActual . ".php";
        ?>

       </div>
    <footer>
        <ul>
            <li>Alumno: Lucio Mariano Brandi</li>
            <li>Turno: Noche</li>
        </ul>
    </footer>
  </body>
</html>