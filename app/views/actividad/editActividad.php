<div class="data-container">
    <form action="/actividad/update" method="post">
        <div class="form-group">
            <label for="txtId">ID</label>
            <input type="read" value="<?php echo $infoReal->id ?>" name="txtId" id="txtId" readonly>
        </div>

        <div class="form-group">
            <label for="txtNombre">nombre</label>
            <input type="text" value="<?php echo $infoReal->nombre ?>" name="txtNombre" id="txtNombre">
        </div>

        <div class="form-group">
            <label for="txtDesc">Descripcion</label>
            <input type="text" value="<?php echo $infoReal->descripcion ?>" name="txtDesc" id="txtDesc">
        </div>
        <div class="form-group">
            <button type="submit">Editar</button>
        </div>
    </form>
</div>