<?php

namespace Controllers;

use MVC\Router;

class ErrorController
{

    public static function index(Router $router)
    {
        $router->render("error", [
            "page" => "Error",
            "index" => false
        ]);
    }
}
