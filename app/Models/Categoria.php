<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $fillable = ['sigla', 'nome'];
    
    public function itens() {
        return $this->hasMany(Item::class);//1
    }
}