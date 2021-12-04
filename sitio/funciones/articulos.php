<?php
/**
 * @return Producto[]
 */

 function catalogoProducto(): array {
      $archivo = __DIR__ . '/../productos/calzados.json';
    $contenido = file_get_contents($archivo);
    $productoData = json_decode($contenido, true);

    $salida =[];

    foreach($productoData as $producto) {
        $productoObj = new Producto;
        $productoObj->dataFromArray($producto);
        $salida[] = $productoObj;
    }

    return $salida;
 }
 
 
/**
 * @param int $id
 * @return Producto|null
 */


function ProductoById(int $id): ?Producto {
    $productos = catalogoProducto();

    foreach($productos as $producto) {
        if($producto->getProductoId() === $id) {
            return $producto;
        }
    }

    return null;
}