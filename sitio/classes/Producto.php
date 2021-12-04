<?php

class Producto {

/** @var  int */
protected $productos_id;

/** @var  int */
protected $usuario_id;

/** @var  string */
protected $categorias_id;

/** @var  string */
protected $nombre;

/** @var  string */
protected $descripcion;

/** @var  string */
protected $precio;

/** @var  string  */
protected $texto;

/** @var  string */
protected $imagen;

/** @var  string  */
protected $imagen_descripcion;

/**
  * @return Producto[]
 *  */

public function datosFromArray(): array
{
    $db =( new Conexion())->getConexion();;
    $query = "SELECT * FROM productos";              
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

    return $stmt->fetchAll();
}


/** @param int $pk
 *  @return Producto|null
*/
public function traerPorPk(int $pk ): ?Producto
{
   $db = (new Conexion())->getConexion();
   $query = "SELECT *FROM productos
             WHERE productos_id = ?";
             $stmt = $db->prepare($query);
             $stmt->execute([$pk]);
             $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
             $producto = $stmt->fetch();

             if(!$producto) {
                 return null;
             }
             return $producto;
}

    /**
    * @param array $data
    * @throws PDOException
    */
    public function crear(array $data)
    {
    $db = (new Conexion())->getConexion();
    $query = "INSERT INTO productos (usuario_id, nombre, descripcion, precio,  imagen, imagen_descripcion)
        VALUES (:usuario_id, NOW(), :nombre, :descripcion, :precio, :imagen, :imagen_descripcion)";
    $stmt = $db-> prepare($query);
    $stmt->execute([
        'usuario_id' => $data['usuario_id'],
        'nombre' => $data['nombre'],
        'descripcion' => $data['descripcion'],
        'precio' => $data['precio'],
        'imagen' => $data['imagen'],
        'imagen_descripcion' => $data['imagen_descripcion'],
    ]);
    }
   /**
    * Edita un producto cargado en la base
     * @param $pk
     * @param array $data
     */
    public function editar($pk, array $data)
    {
        $db = (new Conexion())->getConexion();
        $query = "UPDATE productos
                SET nombre = :nombre,
                    descripcion = :descripcion,
                    precio = :precio,
                    imagen = :imagen,
                    imagen_descripcion = :imagen_descripcion
                WHERE productos_id = :productos_id";

        $stmt = $db->prepare($query);
        $stmt->execute([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'precio' => $data['precio'],
            'imagen' => $data['imagen'],
            'imagen_descripcion' => $data['imagen_descripcion'],
            'productos_id' => $pk,
        ]);
    }


/**
 *    @param int $pk
 */
public function eliminar(int $pk) {
    $db = (new Conexion())->getConexion();
    $query = "DELETE FROM productos
              WHERE productos_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$pk]);
}

    /**    
    * @param array $data
    */
public function dataFromArray(array $data): void
{
    $this->setProductoId($data['productos_id']);
    $this->setCategoriaId($data['categorias_id']);
    $this->setNombre($data['nombre']);
    $this->setDescripcion($data['descripcion']);
    $this->setPrecio($data['precio']);
    $this->setTexto($data['texto']);
    $this->setImagen($data['imagen']);
    $this->setImagenDescripcion($data['imagen_descripcion']);
}

/**
     * @return int
     */
    public function getProductoId(): int
    {
        return $this->productos_id;
    }

/**
* @param int $productos_id
*/
public function setProductoId(int $productos_id): void
{
   $this->productos_id = $productos_id;
}

 /**
     * @return int
     */
    public function getUsuarioId(): int
    {
        return $this->usuario_id;
    }

    /**
     * @param int $usuario_id
     */
    public function setUsuarioId(int $usuario_id): void
    {
        $this->usuario_id = $usuario_id;
    }

     /**
     * @return int
     */
    public function getCategoriaId(): int
    {
        return $this->categorias_id;
    }

    /**
     * @param int $categorias_id
     */
    public function setCategoriaId(int $categorias_id): void
    {
        $this->categorias_id = $categorias_id;
    }


      /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

     /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

      /**
     * @return string
     */
    public function getPrecio(): string
    {
        return $this->precio;
    }

    /**
     * @param string $precio
     */
    public function setPrecio(string $precio): void
    {
        $this->precio = $precio;
    }

/**
 * @return string
 */
public function getTexto(): string
{
    return $this->texto;
}

/**
 * @param string $texto
 */
public function setTexto(string $texto):void
{
    $this-> texto = $texto;
}


     /**
     * @return string
     */
    public function getImagen(): string
    {
        return $this->imagen;
    }

    /**
     * @param string $imagen
     */
    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }

     /**
     * @return string
     */
    public function getImagenDescripcion(): string
    {
        return $this->imagen_descripcion;
    }

    /**
     * @param string $imagen_descripcion
     */
    public function setImagenDescripcion(string $imagen_descripcion): void
    {
        $this->imagen_descripcion = $imagen_descripcion;
    }

    /**
     * @return string  
     */ 
    public function getFecha(): string {
       return $this->fecha;
    } 
    
    /**
     * @param string $fecha  
     */ 
    public function setFecha(string $fecha): void {
        $this->fecha = $fecha;
    }
}