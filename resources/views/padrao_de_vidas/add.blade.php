@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Padrao_de_vida</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Padrao_de_vida    </div>

    <div class="panel-body">
                
        <form action="{{ url('/padrao_de_vidas'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif


                                    <div class="form-group">
                <label for="id" class="col-sm-3 control-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
                </div>
            </div>
                                                                                                                                                <div class="form-group">
                <label for="created_at" class="col-sm-3 control-label">Created At</label>
                <div class="col-sm-6">
                    <input type="text" name="created_at" id="created_at" class="form-control" value="{{$model['created_at'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="updated_at" class="col-sm-3 control-label">Updated At</label>
                <div class="col-sm-6">
                    <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$model['updated_at'] or ''}}">
                </div>
            </div>
                                                            <div class="form-group">
                <label for="moradia" class="col-sm-3 control-label">Moradia</label>
                <div class="col-sm-6">
                    <input type="text" name="moradia" id="moradia" class="form-control" value="{{$model['moradia'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="servicos" class="col-sm-3 control-label">Servicos</label>
                <div class="col-sm-6">
                    <input type="text" name="servicos" id="servicos" class="form-control" value="{{$model['servicos'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="transporte" class="col-sm-3 control-label">Transporte</label>
                <div class="col-sm-6">
                    <input type="text" name="transporte" id="transporte" class="form-control" value="{{$model['transporte'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="saude" class="col-sm-3 control-label">Saude</label>
                <div class="col-sm-6">
                    <input type="text" name="saude" id="saude" class="form-control" value="{{$model['saude'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="vestuario" class="col-sm-3 control-label">Vestuario</label>
                <div class="col-sm-6">
                    <input type="text" name="vestuario" id="vestuario" class="form-control" value="{{$model['vestuario'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="seguroDeVidaPrevidencia" class="col-sm-3 control-label">SeguroDeVidaPrevidencia</label>
                <div class="col-sm-6">
                    <input type="text" name="seguroDeVidaPrevidencia" id="seguroDeVidaPrevidencia" class="form-control" value="{{$model['seguroDeVidaPrevidencia'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="lazer" class="col-sm-3 control-label">Lazer</label>
                <div class="col-sm-6">
                    <input type="text" name="lazer" id="lazer" class="form-control" value="{{$model['lazer'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="alimentacao" class="col-sm-3 control-label">Alimentacao</label>
                <div class="col-sm-6">
                    <input type="text" name="alimentacao" id="alimentacao" class="form-control" value="{{$model['alimentacao'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="impostos" class="col-sm-3 control-label">Impostos</label>
                <div class="col-sm-6">
                    <input type="text" name="impostos" id="impostos" class="form-control" value="{{$model['impostos'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="extrasoutros" class="col-sm-3 control-label">Extrasoutros</label>
                <div class="col-sm-6">
                    <input type="text" name="extrasoutros" id="extrasoutros" class="form-control" value="{{$model['extrasoutros'] or ''}}">
                </div>
            </div>
                                                            
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/padrao_de_vidas') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection