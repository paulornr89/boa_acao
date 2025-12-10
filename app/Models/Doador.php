<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Doador extends Model
{
    use HasFactory;
     /**
     * A tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'doadores'; 
    protected $fillable = ['user_id','documento', 'nome', 'telefone', 'endereco', 'cep', 'cidade', 'estado', 'documento_tipo'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function doacoes() {
        return $this->hasMany(Doacao::class);
    }

    public function media():MorphMany {
        return $this->morphMany(Media::class,'model'); 
    }
}
