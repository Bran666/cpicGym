<div class="data-container">
    <form action="/programa/view" method="post">
        <div class="form-group">
            <label for="txtNombre">ID</label>
            <input type="read" value="<?php echo $data['id'] ?>" name="txtId" id="txtId" readonly>
        </div>

        <div class="form-group">
            <label for="txtNombre">Codigo</label>
            <input type="text" value="<?php echo $codigo ?>" name="txtNombre" id="txtNombre" readonly>
        </div>

        <div class="form-group">
            <label for="txtNombre">Nombre</label>
            <input type="text" value="<?php echo $nombre ?>" name="txtNombre" id="txtNombre" readonly>
        </div>

        <div class="form-group">
            <label for="txtNombre">Centro de formacion</label>
            <input type="text" value="<?php echo $centro ?>" name="txtNombre" id="txtNombre" readonly>
        </div>
    </form>
</div>