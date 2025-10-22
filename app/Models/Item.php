<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * A tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'itens'; 
    protected $fillable = ['nome', 'descricao', 'categoria', 'unidade'];
}
