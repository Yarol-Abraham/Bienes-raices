<?php

require_once __DIR__ . "/includes/app.php";

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\ErrorController;
use Controllers\VendedoresController;
use Controllers\PaginasController;
// agregamos las rutas al router
$router = new Router();
//propiedades
$router->get("/admin/inicio", [PropiedadController::class, 'index']);
$router->post("/admin/inicio", [PropiedadController::class, 'index']);
$router->get("/propiedades/crear", [PropiedadController::class, 'crear']);
$router->post("/propiedades/crear", [PropiedadController::class, 'crear']);
$router->get("/propiedades/editar", [PropiedadController::class, 'editar']);
$router->post("/propiedades/editar", [PropiedadController::class, 'editar']);
$router->post("/propiedades/eliminar", [PropiedadController::class, 'eliminar']);
//vendedores
$router->get("/vendedores/inicio", [VendedoresController::class, 'index']);
$router->post("/vendedores/inicio", [VendedoresController::class, 'index']);
$router->get("/vendedores/crear", [VendedoresController::class, 'crear']);
$router->post("/vendedores/crear", [VendedoresController::class, 'crear']);
$router->get("/vendedores/editar", [VendedoresController::class, 'editar']);
$router->post("/vendedores/editar", [VendedoresController::class, 'editar']);
$router->get("/vendedores/eliminar", [VendedoresController::class, 'eliminar']);
$router->post("/vendedores/eliminar", [VendedoresController::class, 'eliminar']);
// paginas publicas
$router->get("/", [PaginasController::class, 'index']);
$router->get("/nosotros/inicio", [PaginasController::class, 'nosotros']);
$router->get("/anuncios/inicio", [PaginasController::class, 'anuncios']);
$router->get("/anuncios/anuncio", [PaginasController::class, 'anuncio']);
$router->get("/blog/inicio", [PaginasController::class, 'blog']);
$router->get("/blog/entrada", [PaginasController::class, 'entrada']);
$router->get("/contacto/inicio", [PaginasController::class, 'contacto']);
$router->post("/contacto/inicio", [PaginasController::class, 'contacto']);
// si se produce un error anonimo:
$router->get("/error/inicio", [ErrorController::class, 'index']);
// comprobamos que la ruta exista, si existe renderizamos la vista
$router->routes();
