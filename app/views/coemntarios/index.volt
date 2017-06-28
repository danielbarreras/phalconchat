<div class="page-header">
    <h1>
        Formulario de busqueda
    </h1>
    <p>
        {{ link_to("coemntarios/new", "Crear comentario") }}
    </p>
</div>

{{ content() }}




{{ form("coemntarios/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Buscar', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
