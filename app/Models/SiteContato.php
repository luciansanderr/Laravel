<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    use HasFactory;
    //protected $table = ['site_contatos']; // as vezes o tinker não funciona com esse protected
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contato', 'mensagem'];
}
