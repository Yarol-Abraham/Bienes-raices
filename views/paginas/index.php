<?php

?>
<main>
    <section class="ventas">
        <div class="container ventas__content ">
            <h2 class="text-primary" data-cy="title-ventas">Casas y Departamentos en Ventas</h2>
            <div class="ventas-box u-spacing-card-bottom" data-cy="box-ventas">
                <?php
                include __DIR__ . "/anuncio.php";
                ?>
            </div>
            <a data-cy="enlace-verTodas" class="btn ventas--btn" href="/bienes-raices/anuncios/inicio">Ver Todas</a>
        </div>
    </section>

    <section class="contacto">
        <div class="container contacto__content">
            <h2 data-cy="title-contacto" class="contacto__title u-spacing-card-bottom">Encuentra la Casa de tus Sueños</h2>
            <p class="contacto__paragraph u-spacing-card-bottom">LLena el formulario de contacto y un asesor se pondrá en contacto contigo</p>
            <a data-cy="enalce-contacto" class="btn contacto--btn" href="/bienes-raices/contacto/inicio">Contactanos</a>
        </div>
    </section>

    <section class="about">
        <?php include __DIR__ . "/about.php"; ?>
    </section>

</main>