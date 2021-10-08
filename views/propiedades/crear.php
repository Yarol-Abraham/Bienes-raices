<main>
    <section class="create">
        <div class="container">
            <div class="box-options">
                <a href="/bienes-raices/admin/inicio" class="btn btn_back">&larr;</a>
            </div>
            <h1 class="text-primary">CREAR NUEVA PROPIEDAD</h1>
            <?php foreach ($errores as $error) : ?>
                <p class="alert alert-error"><?php echo $error; ?></p>
            <?php endforeach; ?>
            <form method="POST" class="contact__form" enctype="multipart/form-data">
                <?php include __DIR__ . "/formulario.php"; ?>
                <button type="submit" class="btn contact__btn">Crear</button>
            </form>
        </div>
    </section>
</main>