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

if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/template', function () {
    return view('bootstrap-templates');
})->name('template');

Route::get('/template2', function () {
    return view('navbar');
})->name('template2');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', ['as' => 'logout', 'uses' => 'HomeController@logout']);
Route::get('/login', ['as' => 'login', 'uses' => 'HomeController@getLoginPage']);
Route::post('/restrict_login', ['as' => 'restrict_login', 'uses' => 'HomeController@restrictLogin']);
Route::post('/home', ['as' => 'home', 'uses' => 'HomeController@login']);
Route::post('/informacoes', ['as' => 'info', 'uses' => 'HomeController@getPessoa']);
Route::get('/informacoes', ['as' => 'info', 'uses' => 'HomeController@getPessoa']);
Route::post('/registrar', ['as' => 'registrar', 'uses' => 'HomeController@getRegistroPage']);
Route::get('/registrar', ['as' => 'registrar', 'uses' => 'HomeController@getRegistroPage']);
Route::get('/get-municipios/{idEstado}', 'MunicipioController@getMunicipios');
Route::post('/comprovante',  ['as' => 'persist', 'uses' => 'HomeController@persistPresenca']);
Route::resource('pessoa', 'PessoaController');
Route::get('/buscar/pessoa', 'PessoaController@buscarPessoa')->name('pessoa.buscar');
Route::resource('profGeral', 'ProfGeralController');
Route::get('/profGeral/create/{param}', ['as' => 'cbos', 'uses' => 'ProfGeralController@getCbos']);
// Route::post('/pessoa/cadastrar', ['as' => 'pessoa.cadastrar', 'uses' => 'HomeController@getPessoaPage']);
// Route::post('/informacoes', ['as' => 'pessoa.persistir', 'uses' => 'HomeController@persistPessoa']);
Route::get('/avaliacao/{key}', 'HomeController@getAvalPage');
Route::post('/comprovante_avaliacao',  ['as' => 'persist_avaliacao', 'uses' => 'HomeController@persistAvaliacao']);
Route::get('/comprovante_show/{key}',  ['as' => 'showAval', 'uses' => 'HomeController@avalShow']);

