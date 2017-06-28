<div class="page-header">
    <h1>
        Buscar Usuario
    </h1>
    <p>
        <?= $this->tag->linkTo(['info/new', 'Registrate']) ?>
    </p>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['info/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldId" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['id', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldId']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldNombre" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['nombre', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNombre']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['email', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldEmail']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldTelefono" class="col-sm-2 control-label">Telefono</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['telefono', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldTelefono']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldFecha" class="col-sm-2 control-label">Fecha de registro</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['fecha', 'type' => 'date', 'class' => 'form-control', 'id' => 'fieldFecha']) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Buscar', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
