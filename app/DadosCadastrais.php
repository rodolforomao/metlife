<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DadosCadastrais extends Model
{
    protected $fillable = ['nome','cpf','data_nasc'];
}
