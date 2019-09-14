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
    
    <section class="content" style="text-align: center;text-align: -moz-center; text-align: -webkit-center; ">
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
              <div class="box">
                <div class="boxContent">
                  <i class="fa fa-phone icon"></i>
                  <h1 class="title">AB Fone</h1>
                  <p class="desc">Less unicorn and apart and credibly yikes touched much jeez that so reverent the by a as that kiwi fed wherever more aboard.</p>
                </div>
                <a href="{{ route('v4') }}" ></a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
              <div class="box">
                <div class="boxContent">
                  <i class="fa fa-calendar icon"></i>
                  <h1 class="title">Agenda</h1>
                  <p class="desc">Less unicorn and apart and credibly yikes touched much jeez that so reverent the by a as that kiwi fed wherever more aboard.</p>
                </div>
                <a href="{{ route('v5') }}" ></a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
              <div class="box">
                <div class="boxContent">
                  <i class="fa fa-clipboard icon"></i>
                  <h1 class="title">Fechamento</h1>
                  <p class="desc">Less unicorn and apart and credibly yikes touched much jeez that so reverent the by a as that kiwi fed wherever more aboard.</p>
                </div>
                <a href="{{ route('v6') }}" ></a>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
              <div class="box">
                <div class="boxContent">
                  <i class="fa fa-users icon"></i>
                  <h1 class="title">Clientes</h1>
                  <p class="desc">Less unicorn and apart and credibly yikes touched much jeez that so reverent the by a as that kiwi fed wherever more aboard.</p>
                </div>
                <a href="{{ route('v7') }}" ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

@endsection