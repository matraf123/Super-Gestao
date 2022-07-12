<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
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
/*
Route::get('/', function () {
    return 'Olá, seja bem vindo ao curso!';
});
*/

    Route::get('/', 'PrincipalController@principal')->name('site.index');

    Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

    Route::get('/contato', 'ContatoController@contato')->name('site.contato');
    Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

    Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
    Route::post('/login', 'LoginController@autenticar')->name('site.login');

    Route::middleware('autenticacao:ldap,visitante')->prefix('/app')->group(function() {
        Route::get('/home', 'HomeController@index')->name('app.home');
        Route::get('/sair', 'LoginController@sair')->name('app.sair');                
        Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
        Route::get('/fornecedore', 'FornecedorController@index')->name('app.fornecedore');
        Route::get('/produto', 'ProdutoController@index')->name('app.produto');
    });

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});
