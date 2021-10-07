<?php

namespace Model;

class ActiveRecord
{

    protected static $db;
    protected static $tabla = "";
    protected static $datosDB = [];
    protected static $errores = [];
    protected static $page = "";
    protected static $carpeta = "";

    // conectar la base de datos
    public static function connectDB($database)
    {
        self::$db = $database;
    }

    public function subirImagen($imagen)
    {
        //eliminar imagen anterior si existe
        if (!is_null($this->id)) {
            $this->eliminarImagen();
        }
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function eliminarImagen()
    {
        $ruta = CARPETA_IMAGENES . $this->imagen;
        $imagenAnterior = file_exists($ruta);
        if ($imagenAnterior) {
            unlink($ruta);
        }
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            $this->actualizar();
        } else {
            $this->crear();
        }
    }

    public function crear()
    {
        // sanitizar los campos
        $getdatosSanitizados = $this->sanitizarCampos();
        // insertar datos a la base de datos
        $dato = join(', ', array_keys($getdatosSanitizados));
        $valor = join("', '", array_values($getdatosSanitizados));
        $sql = "INSERT INTO " . static::$tabla . " ($dato) ";
        $sql .= " VALUES ('$valor') ";
        $resultado = self::$db->query($sql);
        return $resultado;
    }

    public function actualizar()
    {
        // sanitizar los campos
        $getdatosSanitizados = $this->sanitizarCampos();
        $datos = [];
        foreach ($getdatosSanitizados as $key => $value) {
            $datos[] = "{$key}='{$value}'";
        }
        // insertar datos a la base de datos
        $sql = "UPDATE " . static::$tabla . " SET ";
        $sql .= join(',', $datos);
        $sql .= " WHERE id=" . self::$db->escape_string($this->id);
        $resultado = self::$db->query($sql);
        if ($resultado) {
            header("Location: /bienes-raices/" . static::$carpeta . "/" . static::$page . "?result=actualizar");
        }
    }

    public function eliminar()
    {
        $sql = "DELETE FROM " . static::$tabla . " WHERE id=" . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($sql);
        if ($resultado) {
            $this->eliminarImagen();
            header("Location: /bienes-raices/" . static::$carpeta . "/" . static::$page . "?result=actualizar");
        }
    }

    // obtener cada dato para sanitizarlo
    public function atributos()
    {
        $atributos = [];
        foreach (static::$datosDB as $dato) {
            if ($dato === 'id') continue;
            $atributos[$dato] = $this->$dato;
        }
        return $atributos;
    }
    // sanitizar los datos
    public function sanitizarCampos()
    {
        $getAtributos = $this->atributos();
        $sanitizados = [];
        foreach ($getAtributos as $key => $value) {
            $sanitizados[$key] = self::$db->escape_string($value);
        }
        return $sanitizados;
    }
    // obtener los errores
    public static function getErrores()
    {
        return static::$errores;
    }
    // manejar los errores
    public function validarErrores()
    {
        static::$errores = [];
        return static::$errores;
    }
    // listar todas los registros
    public static function getAll()
    {
        try {
            $sql = "SELECT * FROM " . static::$tabla;
            $resultado = self::consultarSQL($sql);
            return $resultado;
        } catch (\Exception $e) {
            return null;
        }
    }
    // obtener un limitado numero de registros
    public static function getAllLimit($cantidad)
    {
        try {
            $sql = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
            $resultado = self::consultarSQL($sql);
            return $resultado;
        } catch (\Exception $e) {
            return null;
        }
    }
    // obtiene un registro por id
    public static function getFindId($id)
    {
        try {
            $sqlPropiedad = "SELECT * FROM " . static::$tabla . " WHERE id='$id' ";
            $resultado = self::consultarSQL($sqlPropiedad);
            return array_shift($resultado);
        } catch (\Exception $e) {
            return null;
        }
    }

    // consultar la base datos para obtener cada propiedad del listado
    public static function consultarSQL($sql)
    {
        $query = self::$db->query($sql);
        $array = [];
        while ($registro = $query->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        $query->free();
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;
        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    // sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizarDatos($args = [])
    {
        foreach (array_shift($args) as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
