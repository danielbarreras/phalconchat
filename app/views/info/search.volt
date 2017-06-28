<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("info/index", "Atras") }}</li>
            <li class="next">{{ link_to("info/new", "Crear ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Buscar Resultados</h1>
</div>

{{ content() }}

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
        {% if page.items is defined %}
        {% for info in page.items %}
            <tr>
                <td>{{ info.getId() }}</td>
            <td>{{ info.getNombre() }}</td>
            <td>{{ info.getEmail() }}</td>
            <td>{{ info.getTelefono() }}</td>
            <td>{{ info.getFecha() }}</td>

                <td>{{ link_to("info/edit/"~info.getId(), "Editar") }}</td>
                <td>{{ link_to("info/delete/"~info.getId(), "Eliminar") }}</td>
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
                <li>{{ link_to("info/search", "First") }}</li>
                <li>{{ link_to("info/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("info/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("info/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
