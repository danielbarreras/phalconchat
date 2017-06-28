<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['coemntarios', 'Atras']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Escribir Comentario
    </h1>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['coemntarios/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>



<div class="form-group">
    <label for="fieldComentario" class="col-sm-2 control-label">Comentario</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['comentario', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldComentario']) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Guardar', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
