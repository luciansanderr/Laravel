<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id'];

    // Maneira de definir o relacionamento muitos-para-muitos
    // entre Pedido e Produto através do modelo intermediário PedidoProduto.
    // Produto é a tabela relacionada, Tabela pedido produto é interediária
    public function produtos()
    {
        return $this->belongsToMany(Produto::class, PedidoProduto::class, 'pedido_id', 'produto_id');
    }
    // public function produtos()
    // {
    //     return $this->belongsToMany('App\Models\Produto', 'pedido_produto', 'pedido_id', 'produto_id');
    // }
}
