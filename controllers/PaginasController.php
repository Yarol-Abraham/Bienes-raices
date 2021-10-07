<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Usuarios;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PaginasController
{
    //pagina de inicio
    public static function index(Router $router)
    {
        $propiedades = Propiedad::getAllLimit(3);
        $router->render("/paginas/index", [
            "page" => "Bienes raices",
            "index" => true,
            "propiedades" => $propiedades
        ]);
    }
    // pagina de nosotros
    public static function nosotros(Router $router)
    {
        $router->render("/paginas/nosotros", [
            "page" => "Nosotros",
            "index" => false
        ]);
    }
    //pagina de anuncios
    public static function anuncios(Router $router)
    {
        $propiedades = Propiedad::getAll();
        $router->render("/paginas/anuncios", [
            "page" => "Anuncios",
            "index" => false,
            "propiedades" => $propiedades
        ]);
    }
    // pagina de anuncio
    public static function anuncio(Router $router)
    {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) return header('Location: /bienes-raices/');
        $propiedad = Propiedad::getFindId($id);
        $usuario = Usuarios::getFindId($propiedad->id_usuario);
        $router->render("/paginas/anuncio_id", [
            "page" => "anuncio",
            "index" => false,
            "propiedad" => $propiedad,
            "usuario" => $usuario
        ]);
    }
    //pagina de contacto
    public static function contacto(Router $router)
    {
        $mensaje = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // obtenemos los datos del formulario
            $datos = $_POST["contacto"];
            // instanciamos Mailer
            $mail = new PHPMailer();
            // configurar smtp
            $mail->isSMTP();
            $mail->Host = "smtp.mailtrap.io";
            $mail->SMTPAuth = true;
            $mail->Username = "afb8865eaa7a62";
            $mail->Password = "ccbee09c7deefe";
            $mail->SMTPSecure = "tls";
            $mail->Port = 2525;
            // configurar el asunto de email
            $mail->setFrom("admin@bienesRaices.com");
            $mail->addAddress("admin@bienesRaices.com", "admin@bienesRaices.com");
            $mail->Subject = "Tienes un nuevo mensaje";
            //Habilitar html
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";
            // definir el contenido
            $contenido = "<html>";
            $contenido .= "<p>Hola, Gracias por contactarnos😀" . $datos["nombre"] . "</p>";
            $contenido .= "<p>Email: " . $datos["correo"] . "</p>";
            $contenido .= "<p>Telefono: " . $datos["telefono"] . "</p>";
            $contenido .= "<p>Mensaje: " . $datos["mensaje"] . "</p>";
            $contenido .= "<p>Vende o Compra: " . $datos["categoria"] . "</p>";
            $contenido .= "<p>Presupuesto: " . "Q" . $datos["presupuesto"] . "</p>";
            $contenido .= "</html>";
            $mail->Body = $contenido;
            $mail->AltBody = "Mensaje alternativo sin html";
            // enviar el email
            if ($mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "Ha ocurrido un error inesperado";
            }
        }
        $router->render("/paginas/contacto", [
            "page" => "Contacto",
            "index" => false,
            "mensaje" => $mensaje
        ]);
    }
    //pagina de blog
    public static function blog(Router $router)
    {
        $router->render("/paginas/blog", [
            "page" => "Blog",
            "index" => false
        ]);
    }
    // pagina de entrada
    public static function entrada(Router $router)
    {
        $router->render("/paginas/entrada", [
            "page" => "Entrada",
            "index" => false
        ]);
    }
}
