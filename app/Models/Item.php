<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Item extends Model
{
    use HasFactory;
    /**
     * A tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'itens'; 
    protected $fillable = ['nome', 'descricao', 'unidade', 'categoria_id'];

    public function categoria() {
        return $this->belongsTo(Categoria::class);//N
    }

    public function doacoes() {
        return $this->belongsToMany(Doacao::class)
        ->withPivot('quantidade')
        ->withTimestamps();
    }

    public function media():MorphMany { 
        return $this->morphMany(Media::class,'model'); 
    }
}