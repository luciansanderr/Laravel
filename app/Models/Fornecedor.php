<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    use HasFactory;
    //utilizado para direcionar para a tabela com o nome diferente (Model: Fornecedor Migration: Fornecedores (Fornecedors))
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'uf', 'email', 'site'];

}
