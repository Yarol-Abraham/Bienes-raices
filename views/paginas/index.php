<?php

?>
<main>
    <section class="ventas">
        <div class="container ventas__content ">
            <h2 class="text-primary">Casas y Departamentos en Ventas</h2>
            <div class="ventas-box u-spacing-card-bottom">
                <?php
                include __DIR__ . "/anuncio.php";
                ?>
            </div>
            <a class="btn ventas--btn" href="/bienes-raices/anuncios/inicio">Ver Todas</a>
        </div>
    </section>

    <section class="contacto">
        <div class="container contacto__content">
            <h2 class="contacto__title u-spacing-card-bottom">Encuentra la casa de tus sueños</h2>
            <p class="contacto__paragraph u-spacing-card-bottom">LLena el formulario de contacto y un asesor se pondrá en contacto contigo</p>
            <a class="btn contacto--btn" href="/bienes-raices/contacto/inicio">Contactanos</a>
        </div>
    </section>

    <section class="about">
        <?php include __DIR__ . "/about.php"; ?>
    </section>

</main>