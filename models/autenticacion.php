<?php

namespace Model;

use Model\ActiveRecord;

class Autenticacion extends ActiveRecord
{
    protected static $tabla = "administrador";
    protected static $page = "login";
    protected static $carpeta = "autenticacion";
    protected static $datosDB = [
        "id",
        "usuario",
        "email",
        "password"
    ];

    public $id;
    public $usuario;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usuario = $args['usuario'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }
    // manejar los errores
    public function validarErrores()
    {
        if (!$this->email) {
            self::$errores[] = "Tu email o contraseña son incorrectas";
        }
        if (!$this->password) {
            self::$errores[] = "Tu email o contraseña son incorrectas";
        }
        return self::$errores;
    }
    // verificamos si el ususario existe
    public function verificar()
    {
        $sql = "SELECT * FROM " . self::$tabla . " WHERE email='{$this->email}'" . " LIMIT 1";
        $resultado = self::$db->query($sql);
        if (!$resultado->num_rows) {
            self::$errores[] = "No existe el usuario con este correo 😓";
            return false;
        } else {
            return $resultado;
        }
    }
    // verificar que las contraseñas sean iguales
    public function verificarPassword($resultado)
    {
        $usuario = $resultado->fetch_object();
        $verify = password_verify($this->password, $usuario->password);
        if (!$verify) self::$errores[] = "El correo o la contraseña son incorrectas";
        return $verify;
    }
    // iniciar la sesion del administrador
    public function autenticar()
    {
        session_start();
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;
        header('Location:  /bienes-raices/admin/inicio');
    }
}
