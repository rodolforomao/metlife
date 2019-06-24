<div class="form-group {{ $errors->has('idUser') ? 'has-error' : ''}}">
    <label for="idUser" class="control-label">{{ 'Iduser' }}</label>
    <input class="form-control" name="idUser" type="number" id="idUser" value="{{ isset($rendimentomensal->idUser) ? $rendimentomensal->idUser : ''}}" >
    {!! $errors->first('idUser', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nomecompleto') ? 'has-error' : ''}}">
    <label for="nomecompleto" class="control-label">{{ 'Nomecompleto' }}</label>
    <input class="form-control" name="nomecompleto" type="text" id="nomecompleto" value="{{ isset($rendimentomensal->nomecompleto) ? $rendimentomensal->nomecompleto : ''}}" >
    {!! $errors->first('nomecompleto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('outrasrendas') ? 'has-error' : ''}}">
    <label for="outrasrendas" class="control-label">{{ 'Outrasrendas' }}</label>
    <input class="form-control" name="outrasrendas" type="text" id="outrasrendas" value="{{ isset($rendimentomensal->outrasrendas) ? $rendimentomensal->outrasrendas : ''}}" >
    {!! $errors->first('outrasrendas', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('declaracaodeir') ? 'has-error' : ''}}">
    <label for="declaracaodeir" class="control-label">{{ 'Declaracaodeir' }}</label>
    <input class="form-control" name="declaracaodeir" type="number" id="declaracaodeir" value="{{ isset($rendimentomensal->declaracaodeir) ? $rendimentomensal->declaracaodeir : ''}}" >
    {!! $errors->first('declaracaodeir', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
