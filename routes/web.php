<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
//chamando o apelido do middleware
Route::get('/sobre-nos', [SobreNosController::class, 'sobrenos'])->name('site.sobrenos')->middleware('log.acesso');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

//agrupando com prefix as rotas
Route::middleware('autenticacao:padrao')->prefix('/app')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/excluir/{id}/{msg?}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');
    //produtos
    Route::resource('produto', ProdutoController::class);
    //produto_detalhe
    Route::resource('produto-detalhe', ProdutoDetalheController::class);

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
