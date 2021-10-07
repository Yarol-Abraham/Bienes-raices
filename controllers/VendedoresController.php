<?php

namespace Controllers;

use MVC\Router;
use Model\Usuarios;

class VendedoresController
{
    // pagina de inicio
    public static function index(Router $router)
    {
        $vendedores = Usuarios::getAll();
        $result = isset($_GET["result"]) ? $_GET['result'] : "";
        $router->render("/vendedores/admin", [
            "page" => "Vendedores",
            "index" => false,
            "vendedores" => $vendedores,
            "result" => $result
        ]);
    }
    // crear vendedor
    public static function crear(Router $router)
    {
        $usuario = new Usuarios();
        $errores = Usuarios::getErrores();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuarios($_POST['usuario']);
            $errores = $usuario->validarErrores();
            if (empty($errores)) {
                $usuario->guardar();
                header('Location: /bienes_raices/vendedores/inicio?result=usuario');
            }
        }
        $router->render("/vendedores/crear", [
            "page" => "Crear",
            "index" => false,
            "usuario" => $usuario,
            "errores" => $errores
        ]);
    }
    public static function editar(Router $router)
    {
        $id = isset($_GET['id']) ? ($_GET['id']) : '';
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if (!$id) return header('Location: /bienes-raices/vendedores/inicio?result=error');

        $usuario = Usuarios::getFindId($id);
        $errores = Usuarios::getErrores();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = [];
            $args[] = $_POST['usuario'];
            $usuario->sincronizarDatos($args);
            // validar los errores
            $usuario->validarErrores();
            if (empty($errores)) {
                $usuario->guardar();
            }
        }
        $router->render("/vendedores/editar", [
            "page" => "Editar",
            "index" => false,
            "usuario" => $usuario,
            "errores" => $errores
        ]);
    }
    // eliminar vendedor
    public static function eliminar(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
                if ($id) {
                    $vendedor = Usuarios::getFindId($id);
                    // eliminar el vendedor
                    $vendedor->eliminar();
                }
            } catch (\Exception $e) {
                return header('Location: /bienes-raices/vendedores/inicio?result=error');
            }
        }
    }
}
