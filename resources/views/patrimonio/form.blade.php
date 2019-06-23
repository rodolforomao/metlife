<div class="form-group {{ $errors->has('fundos') ? 'has-error' : ''}}">
    <label for="fundos" class="control-label">{{ 'Fundos' }}</label>
    <input class="form-control" name="fundos" type="text" id="fundos" value="{{ isset($patrimonio->fundos) ? $patrimonio->fundos : ''}}" >
    {!! $errors->first('fundos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('reservas') ? 'has-error' : ''}}">
    <label for="reservas" class="control-label">{{ 'Reservas' }}</label>
    <input class="form-control" name="reservas" type="text" id="reservas" value="{{ isset($patrimonio->reservas) ? $patrimonio->reservas : ''}}" >
    {!! $errors->first('reservas', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('inventario') ? 'has-error' : ''}}">
    <label for="inventario" class="control-label">{{ 'Inventario' }}</label>
    <input class="form-control" name="inventario" type="text" id="inventario" value="{{ isset($patrimonio->inventario) ? $patrimonio->inventario : ''}}" >
    {!! $errors->first('inventario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('emergencia') ? 'has-error' : ''}}">
    <label for="emergencia" class="control-label">{{ 'Emergencia' }}</label>
    <input class="form-control" name="emergencia" type="text" id="emergencia" value="{{ isset($patrimonio->emergencia) ? $patrimonio->emergencia : ''}}" >
    {!! $errors->first('emergencia', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('funeral') ? 'has-error' : ''}}">
    <label for="funeral" class="control-label">{{ 'Funeral' }}</label>
    <input class="form-control" name="funeral" type="text" id="funeral" value="{{ isset($patrimonio->funeral) ? $patrimonio->funeral : ''}}" >
    {!! $errors->first('funeral', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('outros') ? 'has-error' : ''}}">
    <label for="outros" class="control-label">{{ 'Outros' }}</label>
    <input class="form-control" name="outros" type="text" id="outros" value="{{ isset($patrimonio->outros) ? $patrimonio->outros : ''}}" >
    {!! $errors->first('outros', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="control-label">{{ 'Total' }}</label>
    <input class="form-control" name="total" type="text" id="total" value="{{ isset($patrimonio->total) ? $patrimonio->total : ''}}" >
    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('imoveis') ? 'has-error' : ''}}">
    <label for="imoveis" class="control-label">{{ 'Imoveis' }}</label>
    <input class="form-control" name="imoveis" type="text" id="imoveis" value="{{ isset($patrimonio->imoveis) ? $patrimonio->imoveis : ''}}" >
    {!! $errors->first('imoveis', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
