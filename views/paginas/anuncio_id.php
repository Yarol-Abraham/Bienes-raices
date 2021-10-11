<main>

    <section class="anuncio">
        <div class="container anuncio-box">
            <div class="anuncio__title">
                <h1 data-cy="title-anuncio" class="text-primary"><?php echo $propiedad->titulo; ?></h1>
                <h3 class="text-primary">$<?php echo $propiedad->precio; ?></h3>
            </div>
            <div class="anuncio__preview">
                <img class="anuncio__preview--imagen" src="/bienes-raices/public/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" />
                <div class="anuncio__details">
                    <div class="anuncio__details--item">
                        <p class="text-tertiary--title"><?php echo $propiedad->habitaciones; ?></p>
                        <p class="text-tertiary">Habitaciones</p>
                    </div>
                    <div class="anuncio__details--item">
                        <p class="text-tertiary--title"><?php echo $propiedad->inodoros; ?></p>
                        <p class="text-tertiary">Inodoros</p>
                    </div>
                    <div class="anuncio__details--item">
                        <p class="text-tertiary--title"><?php echo $propiedad->estacionamientos; ?></p>
                        <p class="text-tertiary">Estacionamientos</p>
                    </div>
                </div>
            </div>
            <div class="anuncio__descripcion">
                <p class="anuncio__descripcion__item--title text-tertiary">Descripcion</p>
                <p class="anuncio__descripcion__item--paragraph text-paragraph"><?php echo $propiedad->descripcion; ?></p>
                <div class="anuncio__descripcion__item--user anuncio__descripcion--contacto">
                    <p class="text-tertiary--title text-autor"><?php echo $usuario->nombre . ' ' . $usuario->apellido; ?></p>
                    <p class="text-tertiary text-autor"><?php echo $usuario->telefono; ?></p>
                </div>
            </div>
        </div>
    </section>

</main>