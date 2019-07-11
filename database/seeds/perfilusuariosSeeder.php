<?php

use Illuminate\Database\Seeder;
use App\User;

class perfilusuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create
                (
                [
                    'descricao'  =>  'Administrador'
                ],
                [
                    'descricao'  =>  'Administrador - Gerente'
                ]
                 ,
                [
                    'descricao'  =>  'Administrador - Consultor'
                ]
                 ,
                [
                    'descricao'  =>  'Consultor'
                ],
                [
                    'descricao'  =>  'Gerente'
                ],
                [
                    'descricao'  =>  'Secretária'
                ],
                [
                    'descricao'  =>  'Gestor'
                ],
                [
                    'descricao'  =>  'Cliente'
                ]
                );
    }
}
