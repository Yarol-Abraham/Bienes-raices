<fieldset class="contact__fieldset">
    <legend class="contact__legend">Datos generales</legend>
    <label for="titulo" class="contact__label">Nombre</label>
    <input type="text" name="usuario[nombre]" placeholder="Nombre" class="contact__input" value="<?php echo sanitizar($usuario->nombre); ?>" />

    <label for="precio" class="contact__label">Apellido</label>
    <input type="text" name="usuario[apellido]" placeholder="Apellido" class="contact__input" value="<?php echo sanitizar($usuario->apellido); ?>" />

    <label for="precio" class="contact__label">Telefono</label>
    <input type="number" name="usuario[telefono]" placeholder="Telefono" class="contact__input" value="<?php echo sanitizar($usuario->telefono); ?>" />

</fieldset>