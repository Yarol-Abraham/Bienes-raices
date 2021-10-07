<fieldset class="contact__fieldset">
    <legend class="contact__legend">Datos generales</legend>
    <label for="titulo" class="contact__label">Titulo</label>
    <input type="text" name="propiedad[titulo]" placeholder="titulo de la propiedad" class="contact__input" value="<?php echo sanitizar($propiedad->titulo); ?>" required />

    <label for="precio" class="contact__label">Precio</label>
    <input type="number" name="propiedad[precio]" placeholder="precio de la propiedad" class="contact__input" value="<?php echo sanitizar($propiedad->precio); ?>" required />

    <label for="imagen" class="contact__label">Imagen</label>
    <input type="file" name="propiedad[imagen]" accept="image/jpeg, image/png" class="contact__input" />
    <?php if ($propiedad->imagen) : ?>
        <label for="select imagen" class="contact__label">Imagen seleccionada</label>
        <div class="edit__preview--imagen">
            <img src="/bienes-raices/public/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen actual de la propiedad" />
        </div>
    <?php endif; ?>
    <label for="descripcion" class="contact__label">Descripcion</label>
    <textarea name="propiedad[descripcion]" placeholder="Descripcion de la propiedad" class="contact__textarea"><?php echo sanitizar($propiedad->descripcion); ?></textarea>
</fieldset>
<fieldset class="contact__fieldset">
    <legend>Información de la Propiedad</legend>

    <label for="habitaciones" class="contact__label">Habitaciones</label>
    <input type="number" name="propiedad[habitaciones]" placeholder="cantidad de habitaciones" class="contact__input" value="<?php echo sanitizar($propiedad->habitaciones); ?>" required />

    <label for="inodoros" class="contact__label">Inodoros</label>
    <input type="number" name="propiedad[inodoros]" placeholder="cantidad de inodoros" class="contact__input" value="<?php echo sanitizar($propiedad->inodoros); ?>" required />

    <label for="estacionamientos" class="contact__label">Estacionamientos</label>
    <input type="number" name="propiedad[estacionamientos]" placeholder="cantidad de estacionamientos" class="contact__input" value="<?php echo sanitizar($propiedad->estacionamientos); ?>" required />

</fieldset>
<fieldset class="contact__fieldset">
    <legend class="contact__legend">Vendedor</legend>
    <select name="propiedad[id_usuario]" class="contact__input" required>
        <option value="">-- Seleccionar --</option>
        <?php
        foreach ($usuarios as $usuario) :
        ?>
            <option <?php echo $propiedad->id_usuario === sanitizar($usuario->id) ? 'selected' : ''; ?> value="<?php echo sanitizar($usuario->id); ?>">
                <?php echo sanitizar($usuario->nombre) . ' ' . sanitizar($usuario->apellido); ?>
            </option>
        <?php endforeach; ?>
    </select>
</fieldset>