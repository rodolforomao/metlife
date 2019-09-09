<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    //return view('welcome');
    return view('auth/login');
});

Auth::routes();

//Home - Botões de acesso as telas
Route::get('/home', 'DashboardController@versionone')->name('home');
Route::get('/dashboard/home', 'DashboardController@versionone')->name('home');
Route::get('/dashboard/v1', 'DashboardController@versionone')->name('v1');

//Tela de Fechamento
Route::get('/dashboard/v2', 'DashboardController@versiontwo')->name('v2');

//Tela de Relatório
Route::get('/dashboard/v3', 'DashboardController@versionthree')->name('v3');

//Tela de AbFone
Route::get('/dashboard/cadastrados', 'DashboardController@cadastrados');
Route::get('/dashboard/v4', 'DashboardController@versionfour')->name('v4');

//Tela de Agenda
Route::get('/dashboard/v5', 'DashboardController@versionfive')->name('v5');

//Tela de Clientes
Route::get('/dashboard/v6', 'DashboardController@versionsix')->name('v6');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('dados/index', 'DadosCadastraisController@index');
//Route::get('dados/add', 'DadosCadastraisController@create');
//Route::post('dados', 'DadosCadastraisController@store');
//Route::post('dados/editar{id}', 'DadosCadastraisController@edit');
//Route::put('dados/{id}}', 'DadosCadastraisController@upddate');
//Route::post('dados/{id}', 'DadosCadastraisController@destroy');

Route::get('/patrimonios/grid', 'PatrimoniosController@grid');
Route::resource('/patrimonios', 'PatrimoniosController');

Route::get('/padrao_de_vidas/grid', 'Padrao_de_vidasController@grid');
Route::resource('/padrao_de_vidas', 'Padrao_de_vidasController');

Route::get('/educacaos/grid', 'EducacaosController@grid');
Route::resource('/educacaos', 'EducacaosController');

Route::get('/emprestimos/grid', 'EmprestimosController@grid');
Route::resource('/emprestimos', 'EmprestimosController');

Route::get('/inssfgtsprevidenciaseguros/grid', 'InssfgtsprevidenciasegurosController@grid');
Route::resource('/inssfgtsprevidenciaseguros', 'InssfgtsprevidenciasegurosController');

Route::get('/inssprevidenciaclientes/grid', 'InssprevidenciaclientesController@grid');
Route::resource('/inssprevidenciaclientes', 'InssprevidenciaclientesController');

Route::get('/inssseguroclientes/grid', 'InssseguroclientesController@grid');
Route::resource('/inssseguroclientes', 'InssseguroclientesController');

Route::get('/planoclientes/grid', 'PlanoclientesController@grid');
Route::resource('/planoclientes', 'PlanoclientesController');

Route::get('/planoprodutos/grid', 'PlanoprodutosController@grid');
Route::resource('/planoprodutos', 'PlanoprodutosController');

Route::get('/planoprodutodescs/grid', 'PlanoprodutodescsController@grid');
Route::resource('/planoprodutodescs', 'PlanoprodutodescsController');

Route::get('/dadoscadastrais/grid', 'DadoscadastraisController@grid');
Route::resource('/dadoscadastrais', 'DadoscadastraisController');

Route::get('/dadosfamiliares/grid', 'DadosfamiliaresController@grid');
Route::resource('/dadosfamiliares', 'DadosfamiliaresController');

Route::get('/rendimentomensals/grid', 'RendimentomensalsController@grid');
Route::resource('/rendimentomensals', 'RendimentomensalsController');

Route::get('/usuariopermitidos/grid', 'UsuariopermitidosController@grid');
Route::resource('/usuariopermitidos', 'UsuariopermitidosController');

//Dados Cadastrais
Route::post('/dadosCadastrais/cadastro', 'DadoscadastraisController@store');
Route::resource('/dadosCadastrais', 'DadoscadastraisController');

//Dados Familiares
Route::post('/dadosFamiliares/cadastro', 'DadosfamiliaresController@store');
Route::post('/dadosFamiliares/excluir', 'DadosfamiliaresController@destroy');

//Rendimentos
Route::post('/rendimentos/cadastro', 'RendimentomensalsController@store');
Route::post('/rendimentos/excluir', 'RendimentomensalsController@destroy');

//Patrimonio
Route::post('/patrimoio/cadastro', 'PatrimoniosController@store');

//Educação ddos filhos
Route::post('/educacao_filhos/cadastro', 'EducacaosController@store');
Route::post('/educacao_filhos/excluir', 'EducacaosController@destroy');

//Padrão de Vida
Route::post('/padraoVida/cadastro', 'Padrao_de_vidasController@store');

//Emprestimos
Route::post('/saldoEmprestimos/cadastro', 'SaldoemprestimosController@store');
Route::post('/emprestimos/cadastro', 'EmprestimosController@store');
Route::post('/emprestimos/excluir', 'EmprestimosController@destroy');

//Seguros e Previdencia
Route::post('/FGST/cadastro', 'InssfgtsprevidenciasegurosController@store');
Route::post('/previdencia/cadastro', 'InssprevidenciaclientesController@store');
Route::post('/seguros/cadastro', 'InssseguroclientesController@store');

Route::post('/previdencia/excluir', 'InssprevidenciaclientesController@destroy');
Route::post('/seguros/excluir', 'InssseguroclientesController@destroy');

//Planos
Route::post('/planos/cadastro', 'PlanoprodutosController@store');

//Editar
Route::get('/dashboard/editar/{id}', 'EditarController@index');

//Editar
Route::get('/dashboard/relatorio/{id}', 'RelatorioController@index');

Route::resource('saldoemprestimo', 'saldoemprestimoController');
Route::resource('emprestimounitario', 'emprestimounitarioController');
Route::resource('emprestimounitario', 'emprestimounitarioController');
Route::get('/saldoemprestimos/grid', 'SaldoemprestimosController@grid');
Route::resource('/saldoemprestimos', 'SaldoemprestimosController');
Route::get('/emprestimounitarios/grid', 'EmprestimounitariosController@grid');
Route::resource('/emprestimounitarios', 'EmprestimounitariosController');
Route::resource('planovalores', 'planovaloresController');
Route::resource('perfilusuario', 'perfilusuarioController');
Route::get('/perfilusuarios/grid', 'PerfilusuariosController@grid');
Route::resource('/perfilusuarios', 'PerfilusuariosController');
