<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PadraoDeVida extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'padrao_de_vidas';

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
    protected $fillable = ['moradia', 'servicos', 'transporte', 'saude', 'vestuario', 'seguroDeVidaPrevidencia', 'lazer', 'alimentacao', 'impostos', 'extrasoutros'];

    
}
