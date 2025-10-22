<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
     /**
     * A tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'usuarios'; 
    protected $fillable = ['nome','email', 'telefone', 'endereco', 'cep', 'numero', 'complemento', 'bairro', 'cidade', 'uf', 'senha', 'tipo'];
}
