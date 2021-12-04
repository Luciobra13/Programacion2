<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
</head>
<body>
  <h2>Contactanos</h2>  
  <p class="mb-3">Ingresá el producto del que querés recibir más información</p>


  <form action="./menu/gracias.php" method="get">
     
       
        <div class="form-fila">
            <label for="nombre-id">Calzado de Hombre/ Mujer:</label>
            <input type="text" id="nombre-id" name="nombre" autocomplete="off">
        </div>
       
        <div class="form-fila mt-4">
            <label for="color-id">Color:</label>
            <input type="text" id="color-id" name="color" autocomplete="off">
        </div>
    
        <div class="form-fila mt-4">
            <label for="materia-id">Material de confección:</label>
            <input type="text" id="materia-id" name="material" autocomplete="off">
        </div>
        <div class="form-fila mt-4">
        <label for="categoria-id">Categoría del producto</label>
        <select  id="categoria" name="categoria" class="form-control">
            <option value="Zapatos">Zapatos</option>
            <option value="Botas">Botas</option>
            <option value="Zapatillas">Zapatillas</option>
            <option value="Mocasines">Mocasines</option>
            <option value="Nauticos">Nauticos</option>
            <option value="Suecos">Suecos</option>
            <option value="Sandalias">Sandalias</option>
        </select>
        </div>
   
        <button type="submit" class="mt-3 mb-5 btn-formu">Enviar</button>
    </form>



</body>
</html>