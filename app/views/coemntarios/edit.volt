<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("coemntarios", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Editar Comentario
    </h1>
</div>

{{ content() }}

{{ form("coemntarios/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldId" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
        {{ text_field("id", "type" : "numeric", "class" : "form-control", "id" : "fieldId") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFecha" class="col-sm-2 control-label">Fecha</label>
    <div class="col-sm-10">
        {{ text_field("fecha", "type" : "date", "class" : "form-control", "id" : "fieldFecha") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldComentario" class="col-sm-2 control-label">Comentario</label>
    <div class="col-sm-10">
        {{ text_field("comentario", "size" : 30, "class" : "form-control", "id" : "fieldComentario") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Editar', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
