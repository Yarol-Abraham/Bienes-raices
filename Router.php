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
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === "GET") {
            $fn = $this->rutasGet[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPost[$urlActual] ?? null;
        }
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
