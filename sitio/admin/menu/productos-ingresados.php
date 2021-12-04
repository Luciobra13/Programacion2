<?php
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
    $oldData = [];
}
?>

<main class="main-content">
<div class="container">
    <h1>Cargar un Producto</h1>
    <p>Se deben completar todos los campos del formulario para cargar un producto y clickear "Ingresar"</p>

    <form action="acciones/cargar-productos.php" method="post" enctype="multipart/form-data">
    <div class="form-fila">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" aria-describedby="help-nombre <?= isset($errores['nombre']) ? 'error-nombre' : '';?>" value="<?= $oldData['nombre'] ?? '';?>">
    <?php
    if(isset($errores['nombre'])):
    ?>
        <div class="msg-error" id="error-nombre">
            <span class="visually-hidden">Error: </span><?= $errores['nombre'];?>
        </div>
    <?php
    endif
    ?>
    <div class="help-form mb-3" id="help-nombre">El nombre debe tener al menos 5 caracteres</div>
    </div>

    <div class="form-fila mt-4">
        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="descripcion" class="form-control" aria-describedby="help-descripcion <?= isset($errores['descripcion']) ? 'error-descripcion' : '';?>"<?= $oldData['descripcion'] ?? '';?>
        ></textarea>
    <?php
    if(isset($errores['descripcion'])):
    ?> 
    <div class="msg-error" id="error-descripcion"><?= $errores['descripcion'];?></div> 
    <?php
    endif
    ?>
    <div class="form-help mb-3" id="help-descripcion">Debes ingresar la descripción del producto</div>
    </div>

    <div class="form-fila mt-4">
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
    </div>

    <div class="form-fila mt-4">
    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" name="imagen">
    </div>

    <div class="form-fila mt-4">
    <label for="imagen_descripcion">Descripción de la imagen</label>
    <input type="text" id="imagen_descripcion" name="imagen_descripcion" class="form-control" value="<?= $oldData['imagen_descripcion'] ?? '';?>">
    </div>
    
    <div >
    <button class="button mb-5 mt-5" type="submit">Ingresar</button>
    </div>
</form>
</div>
</main>