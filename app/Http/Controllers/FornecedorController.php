<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }
    public function listar(Request $request){
      
        $fornecedores = Fornecedor::where('nome','like','%'.$request->input('nome').'%')
        ->where('site','like','%'.$request->input('site').'%')
        ->where('uf','like','%'.$request->input('uf').'%')
        ->where('email','like','%'.$request->input('email').'%')
        ->get();

        return view('app.fornecedor.listar', [ 'fornecedores' => $fornecedores]);
    }
    public function adicionar(Request $request){

        $msg = '';
        //inclusao
        if($request->input('_token') != '' && $request->input('id') == ''){
            $regras = [
                'nome' =>'required|min:2|max:40',
                'site' =>'required',
                'uf' =>'required|min:2|max:2',
                'email' =>'email' 
            ];
            $feedback = [
                'required' =>'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no minimo 2 caracteres',
                'nome.max' => 'O campo nome deve ter no minimo 40 caracteres',
                'uf.min' => 'O campo UF deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no minimo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preeenchido corretamente'
            ];

            $request->validate($regras, $feedback);
            
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro  realizado com sucesso';
        }
        //edição
        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                echo 'Update realidado com sucesso';
            }else{
                echo 'Update apresentou problemas';
            }
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
    public function editar($id){
        $fornecedor = Fornecedor::find($id);
        
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor]);

    }
}