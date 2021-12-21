<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    // protected $primaryKey = 'id_area';

    protected $fillable = [
        'descricao', 
        'email', 
        'sigla',
        'ativo'];
}
