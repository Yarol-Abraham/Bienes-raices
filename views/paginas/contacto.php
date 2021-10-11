<main>
    <section class="contact">
        <div class="contact__hero">
            <h1 data-cy="title-contacto" class="contact__title">Contacto</h1>
        </div>
        <div class="container contact-box">
            <?php if ($mensaje !== "") { ?>
                <p data-cy="alerta-mensaje" class="alert alert-<?php echo $type ?>"><?php echo $mensaje ?></p>
            <?php  } ?>
            <h2 data-cy="title_second-contacto" class="text-primary">LLena el formulario de contacto</h2>
            <form data-cy="form-contacto" method="POST" class="contact__form">
                <fieldset class="contact__fieldset">
                    <legend class="contact__legend">Datos personales</legend>
                    <label for="nombre" class="contact__label">Nombre</label>
                    <input data-cy="input-nombre" type="text" name="contacto[nombre]" placeholder="Tu Nombre" class="contact__input" required />

                    <label for="correo" class="contact__label">Correo</label>
                    <input data-cy="input-email" type="email" name="contacto[correo]" placeholder="Tu Correo" class="contact__input" required />

                    <label for="telefono" class="contact__label">Telefono</label>
                    <input data-cy="input-telefono" type="number" min="8" name="contacto[telefono]" placeholder="Tu número de telefono" class="contact__input" required />

                    <label for="mensaje" class="contact__label">Mensaje</label>
                    <textarea data-cy="input-mensaje" name="contacto[mensaje]" placeholder="Mensaje" class="contact__textarea"></textarea>
                </fieldset>

                <fieldset class="contact__fieldset">
                    <legend class="contact__legend">Datos de propiedad</legend>
                    <label for="acciones" class="contact__label">Vender o comprar</label>
                    <select data-cy="input-categoria" name="contacto[categoria]" class="contact__categorias">
                        <option value="">-- Seleccionar --</option>
                        <option value="vender">Vender</option>
                        <option value="comprar">Comprar</option>
                    </select>
                    <label for="presupuesto" class="contact__label">Presupuesto</label>
                    <input data-cy="input-presupuesto" type="text" name="contacto[presupuesto]" placeholder="Tu presupuesto" class="contact__input" required />
                    <button type="submit" class="btn contact__btn">Enviar</button>
                </fieldset>

            </form>
        </div>
    </section>
</main>