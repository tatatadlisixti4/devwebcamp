<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">
        Información Evento
    </legend>
    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre Evento</label>
        <input
            type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre Evento"
        />
    </div>
    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción Evento</label>
        <textarea
            class="formulario__input"
            id="descripcion"
            name="descripcion"
            placeholder="Descripción Evento"
            rows="8"
        ></textarea>
    </div>
    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Categoría o Tipo de Evento</label>
        <select
            class="formulario__select"
            id="categoria"
            name="categoria_id"

        >
            <option value="" disabled selected>-- Seleccionar --</option>
            <?php foreach($categorias as $categoria) {?>
                <option value="<?php echo $categoria->id;?>">
                    <?php echo $categoria->nombre;?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Selecciona el día</label>
        <div class="formulario__radio">
            <?php foreach($dias as $dia) { ?>
                <div>
                    <label for="<?php echo strtolower($dia->nombre); ?>">
                        <?php echo $dia->nombre;?>
                    </label>
                    <input
                        type="radio"
                        name="dia"
                        id="<?php echo strtolower($dia->nombre); ?>"
                        value="<?php echo $dia->id;?>"
                    />
                </div>
            <?php } ?>
        </div>
    </div>
    <div id="horas" class="formulario__campo">
        <label for="" class="formulario__label">Seleccionar Hora</label>

        <ul class="horas">
            <?php foreach($horas as $hora) {?>
                <li class="horas__hora"><?php echo $hora->hora;?></li>
            <?php }?>
        </ul>
    </div>
</fieldset>