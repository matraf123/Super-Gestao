<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;
class ContatoController extends Controller
{
    public function contato(Request $request) {
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }
        public function salvar(Request $request){
            $regras =
            [
                'nome' => 'required|min:2|max:40',
                'telefone' => 'required|min:10|max:11|unique:site_contatos',
                'email' => 'email|unique:site_contatos',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000'
            ];

            $feedback =
            [
                'nome.min' => 'O campo nome precisa ter no minimo 2 caracteres',
                'nome.max' => 'O campo nome precisa ter no maximo 40 caracteres',

                'email.email' => 'O email informado não e válido',
                'email.unique' => 'O e-mail já está em uso',
                
                'motivo_contatos_id.required' => 'O campo motivo contatos precisa ser preenchido', 
                
                'mensagem.max' => 'O campo nome precisa ter no maximo 2000 caracteres',
                
                'required' => 'O campo :attribute deve ser preenchido',
                'unique' => 'O :attribute já está em uso'
            ];

            $request->validate($regras, $feedback);
            SiteContato::create($request->all());
            return redirect()->route('site.index');
        }
    
}
