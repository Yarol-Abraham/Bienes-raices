<?php

//verificar la sesion
//verifcarSesion();

?>
<main>
    <section class="create">
        <div class="container">
            <div class="box-options">
                <a href="/bienes-raices/vendedores/inicio" class="btn btn_back">&larr;</a>
            </div>
            <h1 class="text-primary">EDITAR VENDEDOR - <?php echo sanitizar($usuario->nombre); ?></h1>
            <?php foreach ($errores as $error) : ?>
                <p class="alert alert-error"><?php echo $error; ?></p>
            <?php endforeach; ?>
            <form method="POST" class="contact__form">
                <?php include __DIR__ . "/formulario.php"; ?>
                <button type="submit" class="btn contact__btn">Guardar</button>
            </form>
        </div>
    </section>
</main>