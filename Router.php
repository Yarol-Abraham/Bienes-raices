<?php

namespace MVC;

use Controllers\ErrorController;

class Router
{
    public $rutasGet = [];
    public $rutasPost = [];

    public function get($url, $fn)
    {
        $this->rutasGet[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->rutasPost[$url] = $fn;
    }
    // verifica que la ruta exista
    public function routes()
    {
        session_start();
        $auth = $_SESSION['login'] ?? null;
        // rutas protegidas
        $rutas_progtegidas = [
            "/admin/inicio",
            "/propiedades/crear",
            "/propiedades/editar",
            "/propiedades/eliminar",
            "/vendedores/inicio",
            "/vendedores/crear",
            "/vendedores/editar",
            "/vendedores/eliminar"
        ];
        // ruta actual
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === "GET") $fn = $this->rutasGet[$urlActual] ?? null;
        if ($metodo === "POST") $fn = $this->rutasPost[$urlActual] ?? null;
        // proteger las rutas
        if (in_array($urlActual, $rutas_progtegidas) && !$auth) {
            header('Location: /bienes-raices/');
        }
        // instancear el metodo del controlador
        if ($fn) {
            call_user_func($fn, $this);
        } else {
            call_user_func([ErrorController::class, "index"], $this);
        }
    }
    // renderizamos la vista de la ruta
    public function render($view, $datos = [])
    {
        // recorremos la informacion
        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        // iniciamos almacenamiento en memoria
        ob_start();
        include __DIR__ . "/views/$view.php";
        // borramos almacenamiento anterior en memoria
        $contenido = ob_get_clean();
        include __DIR__ . "/views/layout.php";
    }
    //END
}
