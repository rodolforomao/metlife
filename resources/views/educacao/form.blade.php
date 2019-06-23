<div class="form-group {{ $errors->has('iduser') ? 'has-error' : ''}}">
    <label for="iduser" class="control-label">{{ 'Iduser' }}</label>
    <input class="form-control" name="iduser" type="number" id="iduser" value="{{ isset($educacao->iduser) ? $educacao->iduser : ''}}" >
    {!! $errors->first('iduser', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idadeserie') ? 'has-error' : ''}}">
    <label for="idadeserie" class="control-label">{{ 'Idadeserie' }}</label>
    <input class="form-control" name="idadeserie" type="text" id="idadeserie" value="{{ isset($educacao->idadeserie) ? $educacao->idadeserie : ''}}" >
    {!! $errors->first('idadeserie', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('totaldeanosparaformacao') ? 'has-error' : ''}}">
    <label for="totaldeanosparaformacao" class="control-label">{{ 'Totaldeanosparaformacao' }}</label>
    <input class="form-control" name="totaldeanosparaformacao" type="text" id="totaldeanosparaformacao" value="{{ isset($educacao->totaldeanosparaformacao) ? $educacao->totaldeanosparaformacao : ''}}" >
    {!! $errors->first('totaldeanosparaformacao', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('basico') ? 'has-error' : ''}}">
    <label for="basico" class="control-label">{{ 'Basico' }}</label>
    <input class="form-control" name="basico" type="text" id="basico" value="{{ isset($educacao->basico) ? $educacao->basico : ''}}" >
    {!! $errors->first('basico', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('custo2') ? 'has-error' : ''}}">
    <label for="custo2" class="control-label">{{ 'Custo2' }}</label>
    <input class="form-control" name="custo2" type="text" id="custo2" value="{{ isset($educacao->custo2) ? $educacao->custo2 : ''}}" >
    {!! $errors->first('custo2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('anos2') ? 'has-error' : ''}}">
    <label for="anos2" class="control-label">{{ 'Anos2' }}</label>
    <input class="form-control" name="anos2" type="text" id="anos2" value="{{ isset($educacao->anos2) ? $educacao->anos2 : ''}}" >
    {!! $errors->first('anos2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total2') ? 'has-error' : ''}}">
    <label for="total2" class="control-label">{{ 'Total2' }}</label>
    <input class="form-control" name="total2" type="text" id="total2" value="{{ isset($educacao->total2) ? $educacao->total2 : ''}}" >
    {!! $errors->first('total2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fundamental3anos') ? 'has-error' : ''}}">
    <label for="fundamental3anos" class="control-label">{{ 'Fundamental3anos' }}</label>
    <input class="form-control" name="fundamental3anos" type="text" id="fundamental3anos" value="{{ isset($educacao->fundamental3anos) ? $educacao->fundamental3anos : ''}}" >
    {!! $errors->first('fundamental3anos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('filho') ? 'has-error' : ''}}">
    <label for="filho" class="control-label">{{ 'Filho' }}</label>
    <input class="form-control" name="filho" type="text" id="filho" value="{{ isset($educacao->filho) ? $educacao->filho : ''}}" >
    {!! $errors->first('filho', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('custo3') ? 'has-error' : ''}}">
    <label for="custo3" class="control-label">{{ 'Custo3' }}</label>
    <input class="form-control" name="custo3" type="text" id="custo3" value="{{ isset($educacao->custo3) ? $educacao->custo3 : ''}}" >
    {!! $errors->first('custo3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('anos3') ? 'has-error' : ''}}">
    <label for="anos3" class="control-label">{{ 'Anos3' }}</label>
    <input class="form-control" name="anos3" type="text" id="anos3" value="{{ isset($educacao->anos3) ? $educacao->anos3 : ''}}" >
    {!! $errors->first('anos3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total3') ? 'has-error' : ''}}">
    <label for="total3" class="control-label">{{ 'Total3' }}</label>
    <input class="form-control" name="total3" type="text" id="total3" value="{{ isset($educacao->total3) ? $educacao->total3 : ''}}" >
    {!! $errors->first('total3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('superior4a5anos') ? 'has-error' : ''}}">
    <label for="superior4a5anos" class="control-label">{{ 'Superior4a5anos' }}</label>
    <input class="form-control" name="superior4a5anos" type="text" id="superior4a5anos" value="{{ isset($educacao->superior4a5anos) ? $educacao->superior4a5anos : ''}}" >
    {!! $errors->first('superior4a5anos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('custo4') ? 'has-error' : ''}}">
    <label for="custo4" class="control-label">{{ 'Custo4' }}</label>
    <input class="form-control" name="custo4" type="text" id="custo4" value="{{ isset($educacao->custo4) ? $educacao->custo4 : ''}}" >
    {!! $errors->first('custo4', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('anos4') ? 'has-error' : ''}}">
    <label for="anos4" class="control-label">{{ 'Anos4' }}</label>
    <input class="form-control" name="anos4" type="text" id="anos4" value="{{ isset($educacao->anos4) ? $educacao->anos4 : ''}}" >
    {!! $errors->first('anos4', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total4') ? 'has-error' : ''}}">
    <label for="total4" class="control-label">{{ 'Total4' }}</label>
    <input class="form-control" name="total4" type="text" id="total4" value="{{ isset($educacao->total4) ? $educacao->total4 : ''}}" >
    {!! $errors->first('total4', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('infantil') ? 'has-error' : ''}}">
    <label for="infantil" class="control-label">{{ 'Infantil' }}</label>
    <input class="form-control" name="infantil" type="text" id="infantil" value="{{ isset($educacao->infantil) ? $educacao->infantil : ''}}" >
    {!! $errors->first('infantil', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('custo1') ? 'has-error' : ''}}">
    <label for="custo1" class="control-label">{{ 'Custo1' }}</label>
    <input class="form-control" name="custo1" type="text" id="custo1" value="{{ isset($educacao->custo1) ? $educacao->custo1 : ''}}" >
    {!! $errors->first('custo1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('anos1') ? 'has-error' : ''}}">
    <label for="anos1" class="control-label">{{ 'Anos1' }}</label>
    <input class="form-control" name="anos1" type="text" id="anos1" value="{{ isset($educacao->anos1) ? $educacao->anos1 : ''}}" >
    {!! $errors->first('anos1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total1') ? 'has-error' : ''}}">
    <label for="total1" class="control-label">{{ 'Total1' }}</label>
    <input class="form-control" name="total1" type="text" id="total1" value="{{ isset($educacao->total1) ? $educacao->total1 : ''}}" >
    {!! $errors->first('total1', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
