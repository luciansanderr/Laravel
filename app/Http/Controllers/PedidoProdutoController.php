<?php

namespace App\Http\Controllers;

use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        //$Pedido->produtos; //eager loading
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required|integer'
        ];
        $feedback = [
            'produto_id.exists' => 'O produto informado não existe!',
            'produto_id.required' => 'O produto é obrigatório!',
            'quantidade.required' => 'A quantidade é obrigatória!',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro!'
        ];
        $request->validate($regras, $feedback);

        // $pedidoProduto = new PedidoProduto();
        // $pedidoProduto->pedido_id = $pedido->id;
        // $pedidoProduto->produto_id = $request->get('produto_id');
        // $pedidoProduto->quantidade = $request->get('quantidade');
        // $pedidoProduto->save();

        //$pedido->produtos; // os registros do ralacionamento
        //podemos inserir um registro por meio do relacionamento
        $pedido->produtos()->attach($request->get('produto_id'), ['quantidade' => $request->get('quantidade')]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
