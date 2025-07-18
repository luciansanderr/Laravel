<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Produto::all();

        // trazer manualmente o detalhe do produto
        // foreach ($produtos as $key => $produto) {
        //     $ProdutoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
        //     if (isset($ProdutoDetalhe)) {
        //         $produtos[$key]['comprimento'] = $ProdutoDetalhe->comprimento;
        //         $produtos[$key]['largura'] = $ProdutoDetalhe->largura;
        //         $produtos[$key]['altura'] = $ProdutoDetalhe->altura;
        //     }
        // }

        return view ('app.produto.index', ['produtos' => $produtos, 'request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:20',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'required|integer|min:1|exists:unidades,id',
            'fornecedor_id' => 'required|integer|min:1|exists:fornecedores,id'
        ];

        $feedbacks = [
            'required' => 'Campo Obrigatório',
            'nome.min' => 'O mínimo (3 caracteres)',
            'nome.max' => 'O máximo (20 caracteres)',
            'peso.integer' => 'Números inteiros',
            'unidade_id.exists' => 'A unidade selecionada deve existir no banco.',
            'unidade_id.min' => 'Selecione uma unidade válida.',
            'fornecedor_id.exists' => 'O fornecedor selecionado deve existir no banco.',
        ];

        $request->validate($regras, $feedbacks);

        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $regras = [
            'nome' => 'required|min:3|max:20',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'required|integer|min:1|exists:unidades,id',
            'fornecedor_id' => 'required|integer|min:1|exists:fornecedores,id'
        ];

        $feedbacks = [
            'required' => 'Campo Obrigatório',
            'nome.min' => 'O mínimo (3 caracteres)',
            'nome.max' => 'O máximo (20 caracteres)',
            'peso.integer' => 'Números inteiros',
            'unidade_id.exists' => 'A unidade selecionada deve existir no banco.',
            'unidade_id.min' => 'Selecione uma unidade válida.',
            'fornecedor_id.exists' => 'O fornecedor selecionado deve existir no banco.',
        ];
        $request->validate($regras, $feedbacks);
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
