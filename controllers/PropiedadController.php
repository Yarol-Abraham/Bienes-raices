<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Usuarios;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    // pagina de inicio
    public static function index(Router $router)
    {
        $propiedades = Propiedad::getAll();
        $result = isset($_GET["result"]) ? $_GET['result'] : "";
        $router->render("/propiedades/admin", [
            "page" => "Administrador",
            "index" => false,
            "propiedades" => $propiedades,
            "result" => $result
        ]);
    }
    // crear una nueva propiedad
    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $usuarios = Usuarios::getAll();
        $errores = Propiedad::getErrores();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $propiedad = new Propiedad($_POST['propiedad']);

            $imagen = $_FILES['propiedad'];
            // generar nombres unicos a las imagenes
            $nombreImagen = md5(uniqid(rand(), true)) . $imagen['name']['imagen'];

            //guardar la imagen en nuestro servidor
            if ($imagen['tmp_name']['imagen']) {
                $image = Image::make($imagen['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->subirImagen($nombreImagen);
            }

            $errores = $propiedad->validarErrores();

            try {
                if (empty($errores)) {
                    $propiedad->guardar();
                    //crear carpeta de imagenes en nuestro servidor
                    if (!is_dir(CARPETA_IMAGENES)) {
                        mkdir(CARPETA_IMAGENES);
                    }
                    $resultado = $image->save(CARPETA_IMAGENES . $nombreImagen);
                    if ($resultado) {
                        header('Location: /bienes-raices/admin/inicio?result=propiedad');
                    }
                }
            } catch (\Exception $e) {
                return header('Location: /bienes-raices/admin/inicio?result=error');
            }
        }
        $router->render("/propiedades/crear", [
            'page' => 'Crear',
            'index' => false,
            'propiedad' => $propiedad,
            'usuarios' => $usuarios,
            'errores' => $errores

        ]);
    }
    // actualizar una propiedad
    public static function editar(Router $router)
    {
        $id = isset($_GET['id']) ? ($_GET['id']) : '';
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if (!$id) return header('Location: /bienes-raices/admin/inicio?result=error');

        $propiedad = Propiedad::getFindId($id);
        $usuarios = Usuarios::getAll();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = [];
            $args[] = $_POST['propiedad'];
            $propiedad->sincronizarDatos($args);
            $imagen = $_FILES['propiedad'];

            // validar los errores
            $propiedad->validarErrores();

            try {
                if (empty($errores)) {
                    //guardar la imagen en nuestro servidor
                    if ($imagen['tmp_name']['imagen']) {
                        // actualizar imagen / opcional
                        $nombreImagen = md5(uniqid(rand(), true)) . $imagen['name']['imagen'];
                        $image = Image::make($imagen['tmp_name']['imagen'])->fit(800, 600);
                        $propiedad->subirImagen($nombreImagen);
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }
                    $propiedad->guardar();
                }
            } catch (\Exception $e) {
                return header('Location: /bienes-raices/admin/inicio?result=error');
            }
        }
        $router->render("/propiedades/editar", [
            'page' => 'Editar',
            'index' => false,
            'propiedad' => $propiedad,
            'usuarios' => $usuarios,
            'errores' => $errores

        ]);
    }
    // eliminar una propiedad
    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
                if ($id) {
                    // eliminar el archivo
                    $propiedad = Propiedad::getFindId($id);
                    // eliminar la propiedad
                    $propiedad->eliminar();
                }
            } catch (\Exception $e) {
                return header('Location: /bienes-raices/admin/inicio?result=error');
            }
        }
    }
}
