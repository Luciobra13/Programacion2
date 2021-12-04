<?php

$producto = (new Producto())->traerPorPk($_GET['id']);

if(isset($_SESSION['errores'])) {
    $errores = $_SESSION['errores'];
    
    unset($_SESSION['errores']);
} else {
    $errores = [];
}
if(isset($_SESSION['old_data'])) {
    $oldData = $_SESSION['old_data'];
    unset($_SESSION['old_data']);
} else {
    $oldData = [
        'id' => $producto->getProductoId(),
        'nombre' => $producto->getNombre(),
        'descripcion' => $producto->getDescripcion(),
        'precio' => $producto->getPrecio(),
        'texto' => $producto->getTexto(),
        'imagen' => $producto->getImagen(),
        'imagen_descripcion' => $producto->getImagenDescripcion(),
    ];
}
?>
<main class="main-content">
    <div class="container">
        <h2 class="mb-1">Editar productos</h2>

        <p class="mb-1">En este panel se pueden modificar las distintas características del producto, una vez finalizado apretá "Actualizar".</p>

        
        <form action="acciones/editar-productos.php" method="post" enctype="multipart/form-data">
            <!-- Forma 2. -->
            <input type="hidden" name="id" value="<?= $oldData['id'];?>">
            <div class="form-fila">
                <label for="titulo">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="form-control"
                    aria-describedby="help-nombre <?= isset($errores['nombre']) ? 'error-nombre' : '';?>"
                    value="<?= $oldData['nombre'] ?? '';?>"
                >
                <?php
                if(isset($errores['nombre'])):
                ?>
                    <div class="msg-error" id="error-nombre"><span class="visually-hidden">Error: </span><?= $errores['nombre'];?></div>
                <?php
                endif;
                ?>
                <div class="form-help mb-3" id="help-nombre">El nombre debe tener al menos 5 caracteres.</div>
            </div>
            <div class="form-fila">
                <label for="descripcion">Descripcion</label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    class="form-control"
                    aria-describedby="help-descripcion <?= isset($errores['descripcion']) ? 'error-descripcion' : '';?>"
                ><?= $oldData['descripcion'] ?? '';?></textarea>
                <?php
                if(isset($errores['descripcion'])):
                ?>
                    <div class="msg-error" id="error-descripcion"><?= $errores['descripcion'];?></div>
                <?php
                endif;
                ?>
                <div class="form-help mb-3" id="help-descripcion">Debes ingresar la descripción del producto.</div>
            </div>
            <div class="form-fila">
        <label for="precio">Precio</label>
        <input type="text" id="precio" name="precio" aria-describedby="help-precio <?= isset($precio['precio']) ? 'error-precio' : '';?>"
        value="<?= $oldData['precio'] ?? '';?>">
        <?php
        if(isset($errores['precio'])):
        ?>
        <div class="msg-error" id="help-precio"><?= $errores['precio'];?></div>
        <?php
        endif
        ?>
        <div class="form-help mb-3" id="help-precio">Se debe ingresar el precio del producto</div>
    
            
            <div class="form-fila">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" class="form-control mb-3">
            
            <div class="form-fila">
                <label for="imagen_descripcion">Descripción de la imagen (opcional)</label>
                <input type="text" id="imagen_descripcion" name="imagen_descripcion" class="form-control" value="<?= $oldData['imagen_descripcion'] ?? '';?>">
            </div>
            <button class="button mt-3 mb-3" type="submit">Actualizar</button>
        </form>
    </div>  
 </main>
