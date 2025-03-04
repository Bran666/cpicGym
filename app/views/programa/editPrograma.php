<form action="/programa/update" method="POST">
    <input type="hidden" name="txtId" value="<?= htmlspecialchars($data['programa']->id) ?>">

    <div class="form-group">
        <label>Código:</label>
        <input type="text" name="txtCodigo" class="form-control"
            value="<?= htmlspecialchars($data['programa']->codigo) ?>" required>
    </div>

    <div class="form-group">
        <label>Nombre:</label>
        <input type="text" name="txtNombre" class="form-control"
            value="<?= htmlspecialchars($data['programa']->nombre) ?>" required>
    </div>

    <div class="form-group">
        <label>Centro Actual:</label>
        <input type="text" class="form-control"
            value="<?= htmlspecialchars($data['programa']->nombreCentro) ?>" readonly>
    </div>

    <div class="form-group">
        <label>Seleccionar Nuevo Centro:</label>
        <select name="selCentro" class="form-control" required>
            <?php foreach ($data['centros'] as $centro): ?>
                <option value="<?= $centro->id ?>"
                    <?= ($centro->id == $data['programa']->idCentro) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($centro->nombre) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>