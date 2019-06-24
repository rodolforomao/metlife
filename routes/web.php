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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard/home', 'DashboardController@versionone')->name('home');
Route::get('/dashboard/v2', 'DashboardController@versiontwo')->name('v2');
Route::get('/dashboard/v3', 'DashboardController@versionthree')->name('v3');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('dados/index', 'DadosCadastraisController@index');
Route::get('dados/add', 'DadosCadastraisController@create');
Route::post('dados', 'DadosCadastraisController@store');
Route::post('dados/editar{id}', 'DadosCadastraisController@edit');
Route::put('dados/{id}}', 'DadosCadastraisController@upddate');
Route::post('dados/{id}', 'DadosCadastraisController@destroy');

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

Route::get('/conjugefilhos/grid', 'ConjugefilhosController@grid');
Route::resource('/conjugefilhos', 'ConjugefilhosController');

Route::get('/rendimentomensals/grid', 'RendimentomensalsController@grid');
Route::resource('/rendimentomensals', 'RendimentomensalsController');

Route::get('/usuariopermitidos/grid', 'UsuariopermitidosController@grid');
Route::resource('/usuariopermitidos', 'UsuariopermitidosController');