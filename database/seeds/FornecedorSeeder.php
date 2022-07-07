<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'fornecedor 1';
        $fornecedor->site = 'fornecedor1.com';
        $fornecedor->uf = 'DF';
        $fornecedor->email = 'fornecedor1@gmail.com';
        $fornecedor->save();

        Fornecedor::create([
        'nome' => 'fornecedor2',
        'site' => 'Fornecedor2.com',
        'uf' => 'CE',
        'email' => 'fornecedor2@gmail.com',
        ]);

        DB::table('fornecedores')->insert([
        'nome' => 'fornecedor3',
        'site' => 'Fornecedor3.com',
        'uf' => 'SP',
        'email' => 'fornecedor3@gmail.com',
        ]);
    }
}
