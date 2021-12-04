<?php
$productos = (new Producto())->datosFromArray()
?>
<section class="container">
<div class="muestrario-admin"> 
    <h2>Administración de Productos</h2>

    <a href="index.php?m=productos-ingresados">Ingresar nuevo producto</a>
    
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th class="d-flex justify-content-center">Descripción</th>
            <th>Precio</th>
            <th class="d-flex justify-content-center">Imagen</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
    <?php
    foreach($productos as $producto): ?>
        <tr>
            <td><?=htmlspecialchars($producto->getProductoId());?></td>
            <td><?= htmlspecialchars($producto->getNombre());?></td>
            <td><?= htmlspecialchars($producto->getDescripcion());?></td>
            <td><?= htmlspecialchars($producto->getPrecio());?></td>
            <td class="d-flex justify-content-center"><img src="<?= '../imagenes/' . $producto->getImagen();?>" alt="<?= htmlspecialchars($producto->getImagenDescripcion());?>"></td>
            <td>
            <a href="index.php?m=productos-editar&id=<?= $producto->getProductoId();?>">Editar</a>
                <form action="acciones/eliminar-productos.php?id=<?=htmlspecialchars($producto->getProductoId()); ?>" method="post" class="form-eliminar">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($producto->getProductoId());?>">
                    <button class="button" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    <?php
    endforeach; ?>
        </tbody>
    </table>
    </div>
</section>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('.form-eliminar');
    for(let i = 0; i < forms.length; i++) {
        forms[i].addEventListener('submit', function(ev) {
            const confirmado = confirm('Estas por eliminar un producto de forma irreversible. Queres continuar?.');

            if(!confirmado) {
                ev.preventDefault();
            }
        });
    }
});
</script>