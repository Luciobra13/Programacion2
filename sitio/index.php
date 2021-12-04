<?php

require_once __DIR__ . '/bootstrap/init.php';
require_once RUTA_RAIZ . '/bootstrap/secciones.php';

$secciones = getListaSecciones();

$seccionActual = $_GET['m'] ?? 'home';

if(!isset($secciones[$seccionActual])) {
    $seccionActual = '404';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $secciones[$seccionActual]['title']?? 'Greenshoes';?></title>
	
	<link rel="shortcut icon" href="imagenes/Logo.gif" type="image/x-icon">
	<link rel="apple-touch-icon" href="imagenes/Logo.gif">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Link to your css file -->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	
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
       
        <div class=" collapse navbar-collapse" id="navbarResponsive">  
       
            <ul>
                <li><a href="index.php" class="text-decoration-none">Home</a></li>
                <li><a href="index.php?m=muestrario" class="text-decoration-none">Catálogo</a></li>
                <li><a href="index.php?m=contacto" class="text-decoration-none">Contacto</a></li>
                <li><a href="index.php?m=iniciar-sesion" class="text-decoration-none">Iniciar Sesión</a></li><li><a href="admin" class="text-decoration-none">Registrarse</a></li>
            </ul>
        </div>
       </nav>
   
    <main class="cuerpo">
        <div class="container-flex">
     
        <?php
            require __DIR__ . '/menu/' . $seccionActual . ".php";
        ?>


        </div>
    </main>
    <footer>
        <ul>
            <li>Alumno: Lucio Mariano Brandi</li>
            <li>Turno: Noche</li>
            
        </ul>
    </footer>
 <script src="js/jquery-3.5.1.min.js"></script>
	<!-- Bootstrap bundle for full components support -->
	<script src="js/bootstrap.bundle.min.js"></script>
	

	  
  
</body>
</html>
