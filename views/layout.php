<?php
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($index) {  ?>
        <link rel="stylesheet" href="./dist/main.css">
    <?php } else { ?>
        <link rel="stylesheet" href="../dist/main.css">
    <?php } ?>
    <title>Bienes raices | <?php echo $page ? $page : ""; ?></title>
</head>

<body>

    <header class="header <?php echo $index ? "header--hero" : "header--page"; ?>">
        <?php
        echo $index ?
            "<h1 class='header_primary'>
                Venta de Casas y Departamentos <br> 
                Exclusivos de Lujo
            </h1>"
            : "";
        ?>
        <div class="container header__box">
            <div class="header__content">
                <div class="header__logo">
                    <a href="/bienes-raices/">
                        <img src="/bienes-raices/src/img/logo.svg" alt="logo" class="logo" />
                    </a>
                </div>
                <button class="btn header__menu--btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#fff">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="header__menu">
                <nav class="header__menu--nav">
                    <?php if ($page !== "Admin") { ?>
                        <a href="/bienes-raices/nosotros/inicio" class="header__menu--item">Nosotros</a>
                        <a href="/bienes-raices/anuncios/inicio" class="header__menu--item">Anuncios</a>
                        <a href="/bienes-raices/blog/inicio" class="header__menu--item">Blog</a>
                        <a href="/bienes-raices/contacto/inicio" class="header__menu--item">Contacto</a>
                    <?php } ?>
                    <?php if ($auth) { ?>
                        <a href="/bienes-raices/auth/logout" class="header__menu--item">Cerrar sesion</a>
                    <?php } ?>
                </nav>
            </div>
        </div>
    </header>

    <?php echo $contenido ?>

    <footer class="footer">
        <div class="container footer-box">
            <nav class="footer__menu">
                <a href="/bienes-raices/nosotros/inicio" class="text-paragraph text-autor footer__menu--item">Nosotros</a>
                <a href="/bienes-raices/anuncios/inicio" class="text-paragraph text-autor footer__menu--item">Anuncios</a>
                <a href="/bienes-raices/blog/inicio" class="text-paragraph text-autor footer__menu--item">Blog</a>
                <a href="/bienes-raices/contacto/inicio" class="text-paragraph text-autor footer__menu--item">Contacto</a>
            </nav>
        </div>
    </footer>
    <!--js-->
    <?php if ($index) {  ?>
        <script src=<?php echo  "./dist/index.js"; ?>></script>
    <?php } else { ?>
        <script src=<?php echo  "../dist/index.js"; ?>></script>
    <?php } ?>
</body>

</html>