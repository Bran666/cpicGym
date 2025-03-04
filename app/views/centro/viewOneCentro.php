<div class="data-container">
    <form action="/centro/view" method="post">
        <div class="form-group">
            <label for="txtNombre">ID</label>
            <input type="read" value="<?php echo $id ?>" name="txtId" id="txtId" readonly>
        </div>

        <div class="form-group">
            <label for="txtNombre">Nombre</label>
            <input type="text" value="<?php echo $nombre ?>" name="txtNombre" id="txtNombre" readonly>
        </div>
    </form>
</div>