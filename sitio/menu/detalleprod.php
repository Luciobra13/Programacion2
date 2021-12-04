<?php

$id = (int) $_GET['id'];
$producto = new Producto();
$producto = $producto->traerPorPk($id);
?>
<div class="container-fluid">
    <article class="noticias noticias-item">
        <div class="noticias-item_content">
            <h2 class="mt-4"><?= $producto->getNombre();?></h2>
            <p class="pie"><?= $producto->getDescripcion();?></p>

            
        </div>
        <picture class="d-flex justify-content-center">
            <source srcset="<?= 'imagenes/Big-' . $producto->getImagen();?>" >
            <img class="img-fluid lg-col-6" src="<?= 'imagenes/' . $producto->getImagen();?>" alt="<?= $producto->getImagenDescripcion();?>">
        </picture>
        <h3 class="mb-4"><?= $producto->getPrecio();?></h3>
        <div class="producto-item_texto">
        <p><?= $producto->getTexto();?></p>
      </div> 
       </article>
    <div class="boton-pie">
    <button class="d-flex justify-content-center-center  m-3 btn-formu" onclick="location.href='index.php?m=muestrario'">Volver al Catálogo</button>
    </div>
</div>
