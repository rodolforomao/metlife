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
        $dadosEducacao = Educacao::where('idCliente', $id)->get();
        $dadosSaldoEmprestimo = Saldoemprestimo::where('idCliente', $id)->get();
        $dadosEmprestimos = Emprestimo::where('idCliente', $id)->get();
        $dadosFGTS_INSS_principal = Inssfgtsprevidenciaseguro::where('idCliente', $id)->where('tipoFamiliar', 'Principal')->get();
        $dadosFGTS_INSS_conjugue = Inssfgtsprevidenciaseguro::where('idCliente', $id)->where('tipoFamiliar', 'Conjugue')->get();
        $dadosPrevidencia = Inssprevidenciacliente::where('idCliente', $id)->get();
        $dadosSeguro = Insssegurocliente::where('idCliente', $id)->get();

        $dadosPlanosPrincipal = Planoprodutodesc::
                        select("descricao", "planoprodutos.id", "planoprodutodescs.id as idProduto", "vigencia", "prazo", "capital", "valor", "tipoFamiliar")->
                        leftJoin('planoprodutos', function ($join) {
                            $join->on('planoprodutos.idproduto', '=', 'planoprodutodescs.id')
                            ->where('planoprodutos.tipoFamiliar', '=', 'Principal');
                        })
                        ->where('idCliente', $id)
                        ->orwhereNull('idCliente')->get();
        $dadosPlanoConjugue = Planoprodutodesc::
                        select("descricao", "planoprodutos.id", "planoprodutodescs.id as idProduto", "vigencia", "prazo", "capital", "valor", "tipoFamiliar")->
                        leftJoin('planoprodutos', function ($join) {
                            $join->on('planoprodutos.idproduto', '=', 'planoprodutodescs.id')
                            ->where('planoprodutos.tipoFamiliar', '=', 'Conjugue');
                        })
                        ->where('idCliente', $id)
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
