<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacao extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizacaoFactory> */
    use HasFactory;

    protected $table = 'organizacoes'; 
    protected $fillable = ['razao','documento','user_id','telefone','endereco','cidade','cep','documento_tipo'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function doacoes() {
        return $this->hasMany(Doacao::class);
    }
}
