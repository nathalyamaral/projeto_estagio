<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['cpf'=>12345678901, 'rg' => 391125, 'nome'=>"Wesley", 'email'=>'wbs123@gmail.com','senha'=>bcrypt('12345'),'acesso_idacesso'=>1]);

    }
}
