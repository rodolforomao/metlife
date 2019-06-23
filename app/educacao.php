<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class educacao extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'educacaos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['iduser', 'idadeserie', 'totaldeanosparaformacao', 'basico', 'custo', 'anos', 'total', 'fundamental3anos', 'filho', 'custo', 'anos', 'total', 'superior4a5anos', 'custo', 'anos', 'total', 'infantil', 'custo', 'anos', 'total'];

    
}
