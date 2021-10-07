<?php
//verificar la sesion
//verifcarSesion();

?>

<main>
    <section class="admin">
        <div class="container">
            <h1 class="text-primary">Administrador - Bienes Raices</h1>
            <?php if ($result === "propiedad") { ?>
                <p class="alert alert-success">Propiedad creada exitosamente</p>
            <?php  } elseif ($result === "error") { ?>
                <p class="alert alert-error">Ha ocurrido un error inesperado, Porfavor vuelve a intentarlo.</p>
            <?php } elseif ($result === "actualizar") { ?>
                <p class="alert alert-success">Propiedad Actualizada exitosamente</p>
            <?php } elseif ($result === "eliminar") { ?>
                <p class="alert alert-success">Propiedad Eliminada exitosamente</p>
            <?php } ?>
            <div class="admin-box">
                <a class="btn admin__btn" href="/bienes-raices/propiedades/crear">Crear propiedad</a>
                <a class="btn admin__btn" href="/bienes-raices/vendedores/inicio">Ver Vendedores</a>
            </div>
        </div>
    </section>
    <section class="propiedades">
        <div class="container propiedades-box">
            <h1 class="text-primary">Propiedades</h1>
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th class="table__thead--item">ID</th>
                        <th class="table__thead--item">Titulo</th>
                        <th class="table__thead--item">Imagen</th>
                        <th class="table__thead--item">Precio</th>
                        <th class="table__thead--item">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table__tbody">
                    <?php
                    foreach ($propiedades as $propiedad) :
                    ?>
                        <tr>
                            <td class="table__tbody--item"><?php echo $propiedad->id; ?></td>
                            <td class="table__tbody--item"><?php echo $propiedad->titulo; ?></td>
                            <td class="table__tbody--item">
                                <div class="table__imagen">
                                    <img src="/bienes-raices/public/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen" />
                                </div>
                            </td>
                            <td class="table__tbody--item"><?php echo $propiedad->precio; ?></td>
                            <td class="table__tbody--item">
                                <div class="table__acciones">
                                    <a class="btn table___btn--edit" href="/bienes-raices/propiedades/editar?id=<?php echo $propiedad->id; ?>">editar</a>
                                    <form method="POST" action="/bienes-raices/propiedades/eliminar">
                                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>" />
                                        <input type="submit" class="btn table___btn--delete" value="Eliminar" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>