@extends('layouts.master') 
@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div> -->
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Clientes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datagridprincipal" class="table table-condensed table-hover table-striped center" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                        <th>Consultor</th>
                                        <th style="width:50px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>João Maria</td>
                                        <td>(61) 9999-9999</td>
                                        <td>Anna Carolina</td>
                                        <td><button class="btn btn-default btn-sm"><i class="fa fa-print"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Maria Antônia</td>
                                        <td>(61) 9999-9999</td>
                                        <td>Anna Carolina</td>
                                        <td><button class="btn btn-default btn-sm"><i class="fa fa-print"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>João Silva</td>
                                        <td>(61) 9999-9999</td>
                                        <td>Anna Carolina</td>
                                        <td><button class="btn btn-default btn-sm"><i class="fa fa-print"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
        </section>
    </div>
@endsection