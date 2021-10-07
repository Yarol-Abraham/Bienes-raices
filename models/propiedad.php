<?php

namespace Model;

class Propiedad extends ActiveRecord
{
    protected static $tabla = "propiedades";
    protected static $page = "inicio";
    protected static $carpeta = "propiedades";
    protected static $datosDB = [
        'id',
        'titulo',
        'precio',
        'imagen',
        'descripcion',
        'habitaciones',
        'inodoros',
        'estacionamientos',
        'creado',
        'id_usuario'
    ];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $inodoros;
    public $estacionamientos;
    public $creado;
    public $id_usuario;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->inodoros = $args['inodoros'] ?? '';
        $this->estacionamientos = $args['estacionamientos'] ?? '';
        $this->creado = date('Y/m/d');
        $this->id_usuario = $args['id_usuario'] ?? '';
    }
    // manejar los errores
    public function validarErrores()
    {
        if (!$this->titulo) {
            self::$errores[] = "Es obligatorio un titulo";
        }
        if (!$this->precio) {
            self::$errores[] = "Es obligatorio un precio";
        }
        if (!$this->descripcion) {
            self::$errores[] = "La descripcion esta vacia";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Faltan agregar el numero de habitaciones";
        }
        if (!$this->inodoros) {
            self::$errores[] = "Faltan agregar el numero de inodoros";
        }
        if (!$this->estacionamientos) {
            self::$errores[] = "Faltan agregar el numero de estacionamientos(si no hay) agergue el valor en 0";
        }
        if (!$this->id_usuario) {
            self::$errores[] = "Faltan seleccionar un vendedor";
        }

        if (!$this->imagen) {
            self::$errores[] = "falta agregar una imagen de la propiedad";
        }

        return self::$errores;
    }
}
