<div class="data-container">
    <form action="/programa/create" method="post">

        <div class="form-group">
            <label for="txtNombre">Codigo</label>
            <input type="text" name="txtCodigo" id="txtCodigo">
        </div>

        <div class="form-group">
            <label for="txtNombre">Nombre</label>
            <input type="text" name="txtNombre" id="txtNombre">
        </div>

        <div class="form-group">
            <label for="txtCentro">Centro de formacion</label>
            <Select name="txtCentro" id="txtCentro">
                <?php
                foreach ($centros as $centro) {
                    echo "<option value='$centro->id'>  ". $centro->nombre ."</option>";
                }
                ?>
            </Select>
        </div>
        <div class="form-group">
            <button type="submit">Crear</button>
        </div>
    </form>
</div>