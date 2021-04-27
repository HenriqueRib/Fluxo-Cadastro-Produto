<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    public $timestamps = false;
    protected $fillable = ['tipo_veiculo', 'retirado' ,
        'devolucao', 'produto_id', 'data_inicio' ,'data_final'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
