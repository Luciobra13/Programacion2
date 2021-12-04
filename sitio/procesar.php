<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Link to your css file -->
	<link rel="stylesheet" href="css/estilos.css">
    
</head>
<body class="bg-fondo container-fluid col">
 <h2>Producto que seleccionaste</h2>   

 <ul class="envio">
	<?php
    $nom = $_GET['nombre'];
	echo "<li>Calzado Hombre/ Mujer: "	. $nom . "</li>"
     ?>

<?php  
    $colo = $_GET['color'];
	echo "<li>Color: " . $colo . "</li>";
    ?>

<?php  
    $mate = $_GET['material'];
	echo "<li>Material de confección: " . $mate . "</li>";
	?> 
    
<?php  
    $cat = $_GET['categoria'];
	echo "<li>Categoría elegida: " . $cat . "</li>";
	?>  

 </ul>

 <?php
echo"Si este es el producto que elegiste" . "</br>"
?>
<div>
<button class="mt-4 ml-3 btn-formu"  onclick="location.href='menu/gracias.php'">CONFIRMA</button>
</div>
</body>
</html>