<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];
    // função para retornar o produto_detalhe do produto
    // produto -> pk / produto_detalhe -> fk
    // chamar na view
    public function produtoDetalhe() {
        return $this->hasOne('App\Models\ProdutoDetalhe', 'produto_id', 'id');
    }
    public function fornecedor() {
        return $this->belongsTo('App\Models\Fornecedor', 'fornecedor_id', 'id');
    }
    public function pedidos() {
        return $this->belongsToMany(Pedido::class, PedidoProduto::class);
    }
}
