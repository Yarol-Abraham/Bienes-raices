<?php

use Model\Usuarios;

foreach ($propiedades as $anuncio) :

?>
    <div class="ventas__card u-spacing-card-bottom">
        <div class="ventas__imagen u-spacing-card-bottom">
            <a href="/bienes-raices/anuncios/anuncio?id=<?php echo $anuncio->id; ?>">
                <img src="/bienes-raices/public/imagenes/<?php echo $anuncio->imagen; ?>" alt="anuncio" />

            </a>
        </div>
        <h3 class="text-tertiary u-spacing-card-bottom"><?php echo $anuncio->titulo; ?></h3>
        <div class="ventas__body u-spacing-card-bottom">
            <div class="ventas__body--servicios u-spacing-card-bottom">
                <div class="ventas__body--item">
                    <img src="/bienes-raices/src/img/icono_wc.svg" class="ventas__body--item--imagen" alt="wc" />
                    <span><?php echo $anuncio->inodoros; ?></span>
                </div>
                <div class="ventas__body--item">
                    <img src="/bienes-raices/src/img/icono_dormitorio.svg" alt="dormitorio" />
                    <span><?php echo $anuncio->habitaciones; ?></span>
                </div>
                <div class="ventas__body--item">
                    <img src="/bienes-raices/src/img/icono_estacionamiento.svg" alt="estacionamientos" />
                    <span><?php echo $anuncio->estacionamientos; ?></span>
                </div>
            </div>
            <a href="/bienes-raices/anuncios/anuncio?id=<?php echo $anuncio->id; ?>" class="btn ventas__body--btn">Detalles &rarr;</a>
        </div>
        <div class="ventas__footer">
            <?php
            $autor = Usuarios::getFindId($anuncio->id_usuario);
            ?>
            <span class="text-autor">Autor: <?php echo $autor->nombre . ' ' . $autor->apellido; ?></span>
        </div>
    </div>
<?php
endforeach;
?>