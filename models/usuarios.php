<?php

namespace Model;

class Usuarios extends ActiveRecord
{
    protected static $tabla = "usuarios";
    protected static $page = "inicio";
    protected static $carpeta = "vendedores";
    protected static $datosDB = [
        'id',
        'nombre',
        'apellido',
        'telefono'
    ];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }
    // manejar los errores
    public function validarErrores()
    {
        if (!$this->nombre) {
            self::$errores[] = "Es obligatorio un nombre";
        }
        if (!$this->apellido) {
            self::$errores[] = "Es obligatorio un apellido";
        }
        if (!$this->telefono) {
            self::$errores[] = "Es obligatorio un telefono";
        }
        return self::$errores;
    }
}
