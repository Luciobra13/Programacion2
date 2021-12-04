<?php

class ValidadorProductos
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var array
     */

     protected $errores = [];

     /**
      * @param $data
      */
      public function __construct(array $data) {
          $this->data = $data;
      }
      
      public function ejecutar() {
          if(empty($this->data['nombre'])) {
              $this->errores['nombre'] = 'Se debe completar el nombre del producto';
          }else if(strlen($this->data['nombre']) < 5) {
              $this->errores['nombre'] = 'El nombre de tener al menos cinco caracteres.';
          }  
          if(empty($this->data['descripcion'])) {
              $this->errores['descripcion'] = 'Este campo no puede quedar vacío';
          }else if(strlen($this->data['descripcion']) > 255) {
              $this->errores['descripcion'] = 'Debes ingresar la descripción del producto';
          }

    if(empty($this->data['precio'])) {
        $this->errores['precio'] = 'No se ingresó el precio ';
    }
      }
   /**
    * @return bool
    */
    public function hasErrors(): bool {
    return count($this->errores) > 0;
    }

/**
 * @return array
 */

     public function getErrores(): array {
     return $this->errores;
    }
}

