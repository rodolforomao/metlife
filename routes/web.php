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