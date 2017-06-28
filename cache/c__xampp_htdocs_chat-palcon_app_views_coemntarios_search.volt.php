<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['coemntarios/index', 'Atras']) ?></li>
            <li class="next"><?= $this->tag->linkTo(['coemntarios/new', 'Crear']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Buscar Comentarios</h1>
</div>

<?= $this->getContent() ?>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
            <th>Fecha</th>
            <th>Comentario</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($page->items)) { ?>
        <?php foreach ($page->items as $coemntario) { ?>
            <tr>
                <td><?= $coemntario->getId() ?></td>
            <td><?= $coemntario->getFecha() ?></td>
            <td><?= $coemntario->getComentario() ?></td>

                <td><?= $this->tag->linkTo(['coemntarios/edit/' . $coemntario->getId(), 'Editar']) ?></td>
                <td><?= $this->tag->linkTo(['coemntarios/delete/' . $coemntario->getId(), 'Eliminar']) ?></td>
            </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            <?= $page->current . '/' . $page->total_pages ?>
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li><?= $this->tag->linkTo(['coemntarios/search', 'First']) ?></li>
                <li><?= $this->tag->linkTo(['coemntarios/search?page=' . $page->before, 'Previous']) ?></li>
                <li><?= $this->tag->linkTo(['coemntarios/search?page=' . $page->next, 'Next']) ?></li>
                <li><?= $this->tag->linkTo(['coemntarios/search?page=' . $page->last, 'Last']) ?></li>
            </ul>
        </nav>
    </div>
</div>
