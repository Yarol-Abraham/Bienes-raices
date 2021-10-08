<?php

namespace Controllers;

use MVC\Router;
use Model\Autenticacion;

class AutenticacionController
{

    private static function render(Router $router, $errores)
    {
        $router->render("/autenticacion/login", [
            "page" => "Login",
            "index" => false,
            "errores" => $errores,
            "error" => ""
        ]);
    }
    public static function login(Router $router)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $auth = new Autenticacion($_POST);
            $errores = $auth->validarErrores();
            if (!empty($errores)) return self::render($router, $errores);
            $resultado = $auth->verificar();
            if (!$resultado) return self::render($router, $errores = $auth::getErrores());
            if (!$auth->verificarPassword($resultado)) return self::render($router, $auth::getErrores());
            $auth->autenticar();
        }
        self::render($router, []);
    }
    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /bienes-raices/');
    }
}
