<?php
$producto = new Producto();
$productos = $producto->datosFromArray();
?>

    <section>
       
            <h2 class="mb-5">Catálogo de Productos</h2>
              
       <div class="muestrario">
        <?php
        foreach($productos as $producto):
        ?>
             <a href="index.php?m=detalleprod&id=<?= $producto->getProductoId();?>"  class="producto">
                <article class="mb-5 sm-col-12">
                    <div class="producto_parrafo">
                        <h3><?= htmlspecialchars($producto->getNombre());?></h3>
                        <p><?= htmlspecialchars($producto->getDescripcion());?></p>
                    </div>

                    <picture class="d-flex justify-content-center">
                        <source srcset="<?= 'imagenes/' . $producto->getImagen();?>" media="all and (min-width: 46.875em)">
                        <img class="img-fluid" src="<?= 'imagenes/' . $producto->getImagen();?>" alt="<?= htmlspecialchars($producto->getImagenDescripcion());?>">
                    </picture>
                    <h3 class="precio"><?= htmlspecialchars($producto->getPrecio()); ?></h3>
                  
                </article>
            </a>
        <?php
        endforeach;
        ?>
        </div>
		 	
    </section>

