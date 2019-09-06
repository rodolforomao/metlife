<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dadoscadastrai;
use App\Dadosfamiliare;
use App\Rendimentomensal;
use App\Patrimonio;
use App\Padrao_de_vida;
use App\Educacao;
use App\Saldoemprestimo;
use App\Emprestimo;
use App\Inssfgtsprevidenciaseguro;
use App\Inssprevidenciacliente;
use App\Insssegurocliente;
use App\Planoprodutodesc;
use DB;

class RelatorioController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request, $id) {
        $dadosCadastrais = Dadoscadastrai::findOrFail($id);
        $dadosFamiliares = Dadosfamiliare::where('idCliente', $id)->get();
        $dadosRendimento = Rendimentomensal::where('idCliente', $id)->get();
        $dadosPatrimonio = Patrimonio::where('idCliente', $id)->get();
        $dadosPadraoVida = Padrao_de_vida::where('idCliente', $id)->get();
        $dadosEducacao = Educacao::
                        select("educacaos.id", "idTipoEducacao", "idTipoFamiliar", "custo", "anos", "anos", "total", "tipoeducacaos.descricao")->
//                        leftJoin('dadosfamiliares', function ($join) {
//                            $join->on('dadosfamiliares.id', '=', 'educacaos.idDadosFamiliares');
//                        })->
                        leftJoin('tipoeducacaos', function ($join) {
                            $join->on('tipoeducacaos.id', '=', 'educacaos.idTipoEducacao');
                        })
                        ->where('educacaos.idCliente', $id)
                        ->orwhereNull('idCliente')->get();

        $dadosSaldoEmprestimo = Saldoemprestimo::where('idCliente', $id)->get();
        $dadosEmprestimos = Emprestimo::where('idCliente', $id)->get();
        $dadosFGTS_INSS = Inssfgtsprevidenciaseguro::where('idCliente', $id)->where('idTipoFamiliar', '1')->get();
        $dadosPrevidencia = Inssprevidenciacliente::where('idCliente', $id)->where('idTipoFamiliar', '1')->get();
        $dadosSeguro = Insssegurocliente::where('idCliente', $id)->where('idTipoFamiliar', '1')->get();

        $dadosPlanosPrincipal = Planoprodutodesc::
                        select("descricao", "planoprodutos.id", "planoprodutodescs.id as idProduto", "vigencia", "prazo", "capitalsegurado", "valor", "idTipoFamiliar")->
                        leftJoin('planoprodutos', function ($join) {
                            $join->on('planoprodutos.idPlanoProduto', '=', 'planoprodutodescs.id');
                        })
                        ->where('idCliente', $id)
                        ->where('idTipoFamiliar', 1)
                        ->orwhereNull('idCliente')->get();
        $dadosPlanoConjugue = Planoprodutodesc::
                        select("descricao", "planoprodutos.id", "planoprodutodescs.id as idProduto", "vigencia", "prazo", "capitalsegurado", "valor", "idTipoFamiliar")->
                        leftJoin('planoprodutos', function ($join) {
                            $join->on('planoprodutos.idPlanoProduto', '=', 'planoprodutodescs.id');
                        })
                        ->where('idCliente', $id)
                        ->where('idTipoFamiliar', 2)
                        ->orwhereNull('idCliente')->get();

        return view('dashboard.v3', [
            'dadoscadastrais' => $dadosCadastrais,
            'dadosFamiliares' => $dadosFamiliares,
            'dadosRendimento' => $dadosRendimento,
            'dadosPatrimonio' => $dadosPatrimonio,
            'dadosPadraoVida' => $dadosPadraoVida,
            'dadosEducacao' => $dadosEducacao,
            'dadosSaldoEmprestimo' => $dadosSaldoEmprestimo,
            'dadosEmprestimos' => $dadosEmprestimos,
            'dadosFGTS_INSS' => $dadosFGTS_INSS,
            'dadosPrevidencia' => $dadosPrevidencia,
            'dadosSeguro' => $dadosSeguro,
            'dadosPlanosPrincipal' => $dadosPlanosPrincipal,
            'dadosPlanoConjugue' => $dadosPlanoConjugue
        ]);
    }

}
