<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("coemntarios/index", "Atras") }}</li>
            <li class="next">{{ link_to("coemntarios/new", "Crear") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Buscar Comentarios</h1>
</div>

{{ content() }}

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
        {% if page.items is defined %}
        {% for coemntario in page.items %}
            <tr>
                <td>{{ coemntario.getId() }}</td>
            <td>{{ coemntario.getFecha() }}</td>
            <td>{{ coemntario.getComentario() }}</td>

                <td>{{ link_to("coemntarios/edit/"~coemntario.getId(), "Editar") }}</td>
                <td>{{ link_to("coemntarios/delete/"~coemntario.getId(), "Eliminar") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("coemntarios/search", "First") }}</li>
                <li>{{ link_to("coemntarios/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("coemntarios/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("coemntarios/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
