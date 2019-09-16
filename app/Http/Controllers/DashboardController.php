<?php

namespace App\Http\Controllers;

use App\Dadoscadastrai;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function versionone() {
        return view('dashboard.v1');
    }

    public function versiontwo() {
        return view('dashboard.v2');
    }

    public function versionthree() {
        return view('dashboard.v3');
    }

    public function versionfour() {
        return view('dashboard.v4');
    }

    public function versionfive() {
        return view('dashboard.v5');
    }

    public function versionsix() {
        return view('dashboard.v6');
    }

    public function versionseven() {
        return view('dashboard.v7');
    }

    public function cadastrados() {
        $dadosCadastrais = Dadoscadastrai::all();
        $retorno["data"] = array();
        foreach ($dadosCadastrais as $lista) {

            $retorno["data"][] = array(
                "id" => $lista->id,
                "cliente" => $lista->nomecompleto,
                "dataCadastro" => date("d/m/Y", strtotime((string) ($lista->created_at))),
                "editar" => "<a href='/dashboard/editar/{$lista->id}' class='btn btn-default'>Editar</a>",
                "relatorio" => "<a href='/dashboard/relatorio/{$lista->id}' class='btn btn-default' target='_blank'>Relatório</a>"
            );
        }
        echo (json_encode($retorno));
    }

}
