<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    /**
     * A tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'itens'; 
    protected $fillable = ['nome', 'descricao', 'categoria', 'unidade'];

    public function categoria() {
        return $this->belongsToMany(Categoria::class);//N
    }
}
