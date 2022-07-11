<?php

use Illuminate\Database\Seeder;
use \App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $contato = new SiteContato();
        $contato->nome = 'Sistema';
        $contato->telefone = '55-5555-5555';
        $contato->email = 'Systema@gmail.com'; 
        $contato->motivo_contato = '3';
        $contato->mensagem = 'welcome';
        $contato->save();

     
    }
}

