<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
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
                    'name'  =>  'Rodolfo Romão de Oliveira Neto',
                    'email'  =>  'rodolforomao@gmail.com',
                    'password'  =>  bcrypt('123456'),
                ],
                [
                    'name'  =>  'Jordan Fernandes Aguiar da Silva',
                    'email'  =>  'jordan_silva93@hotmail.com',
                    'password'  =>  bcrypt('123456'),
                ]
                );
    }
}
