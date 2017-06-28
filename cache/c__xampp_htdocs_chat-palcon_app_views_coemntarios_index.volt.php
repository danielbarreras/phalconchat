<div class="page-header">
    <h1>
        Formulario de busqueda
    </h1>
    <p>
        <?= $this->tag->linkTo(['coemntarios/new', 'Crear comentario']) ?>
    </p>
</div>

<?= $this->getContent() ?>




<?= $this->tag->form(['coemntarios/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

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


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Buscar', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
