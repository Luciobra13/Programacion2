<?php
/**
 
 * @return string[]
 */
function getListaSecciones(): array {
    return [
        'home' => [
            'title' => 'Greenshoes',
        ],
        'muestrario' => [
            'title' => 'Catálogo de Productos',
        ],
        'detalleprod' => [
            'title' => 'Detalle',
        ],
        'contacto' => [
            'title' => 'Contacto',
        ],
        'iniciar-sesion' => [
            'title' => 'Ingresar',
        ],
        'registro' => [
            'title' => 'Registrarse',
        ], 
        '404' => [
            'title' => 'Página no encontrada ',
        ],
        
    ];
}



/**
 * @return array[]
 */

function getSeccionesAdmin(): array {
    return [
        'home' => [
            'title' => 'Inicio',
        ],
        'login' => [
            'title' => 'Iniciar Sesión',
        ],
        'productos' => [
            'title' => 'Administrar Productos',
            'autenticacion' => true,
        ],
        'productos-ingresados' => [
            'title' => 'Ingresar Producto',
            'autenticacion' => true,
        ],
        'productos-editar' => [
            'title' => 'Editar Producto',
            'autenticacion' => true,
        ],

    ];
}