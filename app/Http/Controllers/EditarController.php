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

class EditarController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }

    public function index(Request $request, $id) {
        $dadosCadastrais = Dadoscadastrai::findOrFail($id);
        $dadosFamiliares = Dadosfamiliare::where('idCliente', $id)->get();
        $dadosRendimentoPrincipal = Rendimentomensal::where('idCliente', $id)->get();
        $dadosPatrimonio = Patrimonio::where('idCliente', $id)->get();
        $dadosPadraoVida = Padrao_de_vida::where('idCliente', $id)->get();
        $dadosEducacao = Educacao::
                        select("educacaos.id", "idTipoEducacao", "custo", "anos", "anos", "total", "idDadosFamiliares", "tipoeducacaos.descricao")->
                        leftJoin('dadosfamiliares', function ($join) {
                            $join->on('dadosfamiliares.id', '=', 'educacaos.idDadosFamiliares');
                        })->
                        leftJoin('tipoeducacaos', function ($join) {
                            $join->on('tipoeducacaos.id', '=', 'educacaos.idTipoEducacao');
                        })
                        ->where('dadosfamiliares.idCliente', $id)
                        ->orwhereNull('idCliente')->get();

        $dadosSaldoEmprestimo = Saldoemprestimo::where('idCliente', $id)->get();
        $dadosEmprestimos = Emprestimo::where('idCliente', $id)->get();
        $dadosFGTS_INSS_principal = Inssfgtsprevidenciaseguro::where('idDadosFamiliares', $id)->get();
        $dadosFGTS_INSS_conjugue = Inssfgtsprevidenciaseguro::where('idDadosFamiliares', $id)->get();
        $dadosPrevidencia = Inssprevidenciacliente::where('idCliente', $id)->get();
        $dadosSeguro = Insssegurocliente::where('idDadosFamiliares', $id)->get();

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

        return view('dashboard.v2_edit', [
            'dadoscadastrais' => $dadosCadastrais,
            'dadosFamiliares' => $dadosFamiliares,
            'dadosRendimentoPrincipal' => $dadosRendimentoPrincipal,
            'dadosPatrimonio' => $dadosPatrimonio,
            'dadosPadraoVida' => $dadosPadraoVida,
            'dadosEducacao' => $dadosEducacao,
            'dadosSaldoEmprestimo' => $dadosSaldoEmprestimo,
            'dadosEmprestimos' => $dadosEmprestimos,
            'dadosFGTS_INSS_principal' => $dadosFGTS_INSS_principal,
            'dadosFGTS_INSS_conjugue' => $dadosFGTS_INSS_conjugue,
            'dadosPrevidencia' => $dadosPrevidencia,
            'dadosSeguro' => $dadosSeguro,
            'dadosPlanosPrincipal' => $dadosPlanosPrincipal,
            'dadosPlanoConjugue' => $dadosPlanoConjugue
        ]);
    }

}
