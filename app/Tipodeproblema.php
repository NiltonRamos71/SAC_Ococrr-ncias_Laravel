<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipodeproblema extends Model
{
    protected $table = 'tiposdeproblema';
    // protected $primaryKey = 'id_item';

    protected $fillable = [
        'categoria_id',
        'descricao', 
        'ativo',        
        'area_id', 
        'nivel_tecnico',        
        'sla',
        'ordem']; 
}
