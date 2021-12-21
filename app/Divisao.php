<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisao extends Model
{
    protected $table = 'divisoes'; // sacocorrencia.
    // protected $primaryKey = 'id_divisao';

    protected $fillable = [
        'descricao',
        'ativo'];
}
