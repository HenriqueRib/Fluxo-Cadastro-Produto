<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome' , 'tipo' , 'imagem' , 'preco'];

    public function perguntas()
    {
        return $this->hasMany( Pergunta::class);
    }

}