<main>
    <section class="login">
        <div class="container contact-box">
            <h2 class="text-primary">Iniciar Sesión</h2>
            <?php foreach ($errores as $err) : ?>
                <p class="alert alert-error"><?php echo $err; ?></p>
            <?php endforeach; ?>
            <?php if ($error) { ?>
                <p class="alert alert-error"><?php echo "Lo sentimos algo salio mal!. Vuelve a intentar"; ?></p>
            <?php } ?>
            <form method="POST" class="contact__form" action="/bienes-raices/auth/login">
                <fieldset class="contact__fieldset">
                    <legend class="contact__legend">campos obligatorios</legend>
                    <label for="correo" class="contact__label">Correo electtronico</label>
                    <input type="email" name="email" placeholder="Correo" class="contact__input" />

                    <label for="password" class="contact__label">Contraseña</label>
                    <input type="password" name="password" placeholder="Contraseña" class="contact__input" />
                    <button type="submit" class="btn contact__btn">Iniciar sesión</button>
                </fieldset>
            </form>
        </div>
    </section>
</main>