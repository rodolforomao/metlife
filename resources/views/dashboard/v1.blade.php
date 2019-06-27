@extends('layouts.master') 
@section('content')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-condensed table-hover table-striped center" style="width: 100%;">
                      <tbody>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Cliente</th>
                          <th>Data de Criação</th>
                          <th>Última Alteração</th>
                          <th>Ações</th>
                        </tr>
                        <tr>
                          <td>1.</td>
                          <td><b>Gabriel Omami</b></td>
                          <td>25/06/2019</td>
                          <td>20/06/2019</td>
                          <td>
                              <a href="../relatorio/relatorio.html" target="_blank"><button type="button" class="btn btn-sm btn-info"><i class="fa fa-print"></i></button>
                              </a>
                              <button type="button" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                              <button type="button" class="btn btn-sm btn-info"><i class="fa fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td>2.</td>
                          <td><b>Gabriel Omami</b></td>
                          <td>25/06/2019</td>
                          <td>20/06/2019</td>
                          <td>
                               <a href="{{ route('v3') }}" target="_blank"><button type="button" class="btn btn-sm btn-info"><i class="fa fa-print"></i></button></a>
                              <button type="button" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                              <button type="button" class="btn btn-sm btn-info"><i class="fa fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td>3.</td>
                          <td><b>Gabriel Omami</b></td>
                          <td>25/06/2019</td>
                          <td>20/06/2019</td>
                          <td>
                              <button type="button" class="btn btn-sm btn-info"><i class="fa fa-print"></i></button>
                              <button type="button" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                              <button type="button" class="btn btn-sm btn-info"><i class="fa fa-trash"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td>4.</td>
                          <td><b>Gabriel Omami</b></td>
                          <td>25/06/2019</td>
                          <td>20/06/2019</td>
                          <td>
                              <button type="button" class="btn btn-sm btn-info"><i class="fa fa-print"></i></button>
                              <button type="button" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                              <button type="button" class="btn btn-sm btn-info"><i class="fa fa-trash"></i></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>

          </div>          
        </div>
    </section>
</div> 
@endsection