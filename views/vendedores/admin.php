<main>
    <section class="admin">
        <div class="container">
            <h1 class="text-primary">Administrador - Bienes Raices</h1>
            <?php if ($result === "usuario") { ?>
                <p class="alert alert-success">Vendedor creado exitosamente</p>
            <?php  } elseif ($result === "error") { ?>
                <p class="alert alert-error">Ha ocurrido un error inesperado, Porfavor vuelve a intentarlo.</p>
            <?php } elseif ($result === "actualizar") { ?>
                <p class="alert alert-success">Vendedor Actualizado exitosamente</p>
            <?php } elseif ($result === "eliminar") { ?>
                <p class="alert alert-success">Vendedor Eliminado exitosamente</p>
            <?php } ?>
            <div class="admin-box">
                <a class="btn admin__btn" href="/bienes-raices/vendedores/crear">Crear Vendedor</a>
                <a class="btn admin__btn" href="/bienes-raices/propiedades/inicio">Ver Propiedades</a>
            </div>
        </div>
    </section>
    <section class="propiedades">
        <div class="container propiedades-box">
            <h1 class="text-primary">Vendedores</h1>
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th class="table__thead--item">ID</th>
                        <th class="table__thead--item">Nombre</th>
                        <th class="table__thead--item">Telefono</th>
                        <th class="table__thead--item">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table__tbody">
                    <?php
                    foreach ($vendedores as $vendedor) :
                    ?>
                        <tr>
                            <td class="table__tbody--item"><?php echo $vendedor->id; ?></td>
                            <td class="table__tbody--item"><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                            <td class="table__tbody--item"><?php echo $vendedor->telefono; ?></td>
                            <td class="table__tbody--item">
                                <div class="table__acciones">
                                    <a class="btn table___btn--edit" href="/bienes-raices/vendedores/editar?id=<?php echo $vendedor->id; ?>">editar</a>
                                    <form method="POST" action="/bienes-raices/vendedores/eliminar">
                                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>" />
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