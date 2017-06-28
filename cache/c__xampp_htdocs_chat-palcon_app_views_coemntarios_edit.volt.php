<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['coemntarios', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Editar Comentario
    </h1>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['coemntarios/save', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldId" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['id', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldId']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldFecha" class="col-sm-2 control-label">Fecha</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['fecha', 'type' => 'date', 'class' => 'form-control', 'id' => 'fieldFecha']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldComentario" class="col-sm-2 control-label">Comentario</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['comentario', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldComentario']) ?>
    </div>
</div>


<?= $this->tag->hiddenField(['id']) ?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Editar', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
