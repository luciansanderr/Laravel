<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobrenos'])->name('site.sobrenos');
Route::get('/contatos', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contatos', [ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/login', function () {return 'login';})->name('site.login');
//agrupando com prefix as rotas
Route::prefix('/app')->group(function() {
    Route::get('/clientes', function () {return 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/produtos', function() {return 'produtos';})->name('app.produtos');
});

// Route::get('/contatos/{nome}/{sobrenome}/{apelido?}', function ($nome, $sobrenome, $apelido = 'Não foi inserido nada'){
//     echo "'Retornando: $nome - $sobrenome - $apelido";
// });

// chamando a rota, um tratamento de erro do próprio laravel
// Route::get('/produto/{nome}/{categoria_id}', function (string $nome, int $categoria_id){
//     echo "'Retornando: $nome - $categoria_id";
// })->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');

Route::get('/rota1', function() {echo 'rota1'; })->name('site.rota1');

Route::get('/rota2', function() { return redirect()->route('site.rota1'); });

Route::redirect('rota2','rota1');
//utilizando rota de callback, para tratamento de erro.
Route::fallback(function(){
    echo 'A rota acessada não existe.<a href="'.route('site.index').'"> Clique aqui</a> aqui para retornar.';
});

Route::get('/teste/{n1}/{n2}', [TesteController::class, 'teste'])->name('site.teste');
