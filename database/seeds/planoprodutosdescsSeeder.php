<?php

use Illuminate\Database\Seeder;
use App\User;

class planoprodutosdescsSeeder extends Seeder
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
                    'descricao'  =>  'Vitalício',
                ],
                 [
                    'descricao'  =>  'Compra de Capital',
                ],
                 [
                    'descricao'  =>  'Decrescente',
                ],
                 [
                    'descricao'  =>  'Temporário',
                ],
                 [
                    'descricao'  =>  'Doenças Graves',
                ],
                 [
                    'descricao'  =>  'Internação',
                ],
                 [
                    'descricao'  =>  'Ad. Invalidez Acidental',
                ],
                 [
                    'descricao'  =>  'Ad. Morte Acidental',
                ]
                );
    }
}
