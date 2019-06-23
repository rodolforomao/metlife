<div class="form-group {{ $errors->has('moradia') ? 'has-error' : ''}}">
    <label for="moradia" class="control-label">{{ 'Moradia' }}</label>
    <input class="form-control" name="moradia" type="text" id="moradia" value="{{ isset($padraodevida->moradia) ? $padraodevida->moradia : ''}}" >
    {!! $errors->first('moradia', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('servicos') ? 'has-error' : ''}}">
    <label for="servicos" class="control-label">{{ 'Servicos' }}</label>
    <input class="form-control" name="servicos" type="text" id="servicos" value="{{ isset($padraodevida->servicos) ? $padraodevida->servicos : ''}}" >
    {!! $errors->first('servicos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('transporte') ? 'has-error' : ''}}">
    <label for="transporte" class="control-label">{{ 'Transporte' }}</label>
    <input class="form-control" name="transporte" type="text" id="transporte" value="{{ isset($padraodevida->transporte) ? $padraodevida->transporte : ''}}" >
    {!! $errors->first('transporte', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('saude') ? 'has-error' : ''}}">
    <label for="saude" class="control-label">{{ 'Saude' }}</label>
    <input class="form-control" name="saude" type="text" id="saude" value="{{ isset($padraodevida->saude) ? $padraodevida->saude : ''}}" >
    {!! $errors->first('saude', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vestuario') ? 'has-error' : ''}}">
    <label for="vestuario" class="control-label">{{ 'Vestuario' }}</label>
    <input class="form-control" name="vestuario" type="text" id="vestuario" value="{{ isset($padraodevida->vestuario) ? $padraodevida->vestuario : ''}}" >
    {!! $errors->first('vestuario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('seguroDeVidaPrevidencia') ? 'has-error' : ''}}">
    <label for="seguroDeVidaPrevidencia" class="control-label">{{ 'Segurodevidaprevidencia' }}</label>
    <input class="form-control" name="seguroDeVidaPrevidencia" type="text" id="seguroDeVidaPrevidencia" value="{{ isset($padraodevida->seguroDeVidaPrevidencia) ? $padraodevida->seguroDeVidaPrevidencia : ''}}" >
    {!! $errors->first('seguroDeVidaPrevidencia', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lazer') ? 'has-error' : ''}}">
    <label for="lazer" class="control-label">{{ 'Lazer' }}</label>
    <input class="form-control" name="lazer" type="text" id="lazer" value="{{ isset($padraodevida->lazer) ? $padraodevida->lazer : ''}}" >
    {!! $errors->first('lazer', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('alimentacao') ? 'has-error' : ''}}">
    <label for="alimentacao" class="control-label">{{ 'Alimentacao' }}</label>
    <input class="form-control" name="alimentacao" type="text" id="alimentacao" value="{{ isset($padraodevida->alimentacao) ? $padraodevida->alimentacao : ''}}" >
    {!! $errors->first('alimentacao', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('impostos') ? 'has-error' : ''}}">
    <label for="impostos" class="control-label">{{ 'Impostos' }}</label>
    <input class="form-control" name="impostos" type="text" id="impostos" value="{{ isset($padraodevida->impostos) ? $padraodevida->impostos : ''}}" >
    {!! $errors->first('impostos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('extrasoutros') ? 'has-error' : ''}}">
    <label for="extrasoutros" class="control-label">{{ 'Extrasoutros' }}</label>
    <input class="form-control" name="extrasoutros" type="text" id="extrasoutros" value="{{ isset($padraodevida->extrasoutros) ? $padraodevida->extrasoutros : ''}}" >
    {!! $errors->first('extrasoutros', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
