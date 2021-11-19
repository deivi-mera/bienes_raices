<?php

namespace Model;

class Propiedad extends ActiveRecord {
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($arg = [])
    {
        $this->id = $arg['id'] ?? NULL;
        $this->titulo = $arg['titulo'] ?? '';
        $this->precio = $arg['precio'] ?? '';
        $this->imagen = $arg['imagen'] ?? '';
        $this->descripcion = $arg['descripcion'] ?? '';
        $this->habitaciones = $arg['habitaciones'] ?? '';
        $this->wc = $arg['wc'] ?? '';
        $this->estacionamiento = $arg['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $arg['vendedorId'] ?? '';
        
    }

    public function validar() {
        
        if(!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }

        if(!$this->precio) {
            self::$errores[] = "El precio es obligatorio";
        }

        if( strlen( $this->descripcion ) < 50 ) {
            self::$errores[] = "la descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$this->habitaciones) {
            self::$errores[] = "El numero de habitaciones es obligatorio";
        }

        if(!$this->wc) {
            self::$errores[] = "El numero de baños es obligatorio";
        }

        if(!$this->estacionamiento) {
            self::$errores[] = "El número de lugares de estacionamiento";
        }

        if(!$this->vendedorId) {
            self::$errores[] = "Elige un vendedor";
        }

        if(!$this->imagen ) {
            self::$errores[] = 'La Imagen de la propiedad es Obligatoria';
        }

        return self::$errores;

    }

}