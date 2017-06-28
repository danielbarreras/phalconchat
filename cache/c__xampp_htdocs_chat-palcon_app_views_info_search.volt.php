<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['info/index', 'Atras']) ?></li>
            <li class="next"><?= $this->tag->linkTo(['info/new', 'Crear ']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Buscar Resultados</h1>
</div>

<?= $this->getContent() ?>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Fecha</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($page->items)) { ?>
        <?php foreach ($page->items as $info) { ?>
            <tr>
                <td><?= $info->getId() ?></td>
            <td><?= $info->getNombre() ?></td>
            <td><?= $info->getEmail() ?></td>
            <td><?= $info->getTelefono() ?></td>
            <td><?= $info->getFecha() ?></td>

                <td><?= $this->tag->linkTo(['info/edit/' . $info->getId(), 'Editar']) ?></td>
                <td><?= $this->tag->linkTo(['info/delete/' . $info->getId(), 'Eliminar']) ?></td>
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
                <li><?= $this->tag->linkTo(['info/search', 'First']) ?></li>
                <li><?= $this->tag->linkTo(['info/search?page=' . $page->before, 'Previous']) ?></li>
                <li><?= $this->tag->linkTo(['info/search?page=' . $page->next, 'Next']) ?></li>
                <li><?= $this->tag->linkTo(['info/search?page=' . $page->last, 'Last']) ?></li>
            </ul>
        </nav>
    </div>
</div>
