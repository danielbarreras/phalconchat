<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['info', 'Atras']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Registro De Usuario
    </h1>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['info/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>


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
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Registrar', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
