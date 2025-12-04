<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doacao extends Model
{
    use HasFactory;
     /**
     * A tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'doacoes'; 
    protected $fillable = ['organizacao_id', 'doador_id', 'status'];

    public function organizacao() {
        return $this->belongsTo(Organizacao::class);
    }
    public function doador() {
        return $this->belongsTo(Doador::class);
    }

    public function itens() {
        return $this->belongsToMany(Item::class)
        ->withPivot('quantidade')
        ->withTimestamps();
    }
}
