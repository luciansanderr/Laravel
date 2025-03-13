<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    // Trazer o produto pk
    // ProdutoDetalhe fk
    // Trazer o produto através do fk
    public function produto() {
        return $this->belongsTo(Produto::class);
    }
}
