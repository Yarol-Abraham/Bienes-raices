<main>
    <section class="contact">
        <div class="contact__hero">
            <h1 class="contact__title">Contacto</h1>
        </div>
        <div class="container contact-box">
            <h2 class="text-primary">LLena el formulario de contacto</h3>
                <form method="POST" class="contact__form">
                    <fieldset class="contact__fieldset">
                        <legend class="contact__legend">Datos personales</legend>
                        <label for="nombre" class="contact__label">Nombre</label>
                        <input type="text" name="contacto[nombre]" placeholder="Tu Nombre" class="contact__input" required />

                        <label for="correo" class="contact__label">Correo</label>
                        <input type="email" name="contacto[correo]" placeholder="Tu Correo" class="contact__input" required />

                        <label for="telefono" class="contact__label">Telefono</label>
                        <input type="number" min="8" name="contacto[telefono]" placeholder="Tu número de telefono" class="contact__input" required />

                        <label for="mensaje" class="contact__label">Mensaje</label>
                        <textarea name="contacto[mensaje]" placeholder="Mensaje" class="contact__textarea"></textarea>
                    </fieldset>

                    <fieldset class="contact__fieldset">
                        <legend class="contact__legend">Datos de propiedad</legend>
                        <label for="acciones" class="contact__label">Vender o comprar</label>
                        <select name="contacto[categoria]" class="contact__categorias">
                            <option value="">-- Seleccionar --</option>
                            <option value="vender">Vender</option>
                            <option value="comprar">Comprar</option>
                        </select>
                        <label for="presupuesto" class="contact__label">Presupuesto</label>
                        <input type="text" name="contacto[presupuesto]" placeholder="Tu presupuesto" class="contact__input" required />
                        <button type="submit" class="btn contact__btn">Enviar</button>
                    </fieldset>

                </form>
        </div>
    </section>
</main>