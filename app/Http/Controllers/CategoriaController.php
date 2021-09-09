<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{

    //método de retorno
    private function retorno($mensagem,$status,$objeto = null){
        return response([
            'mensagem' => $mensagem,
            'objeto' => $objeto
        ],$status);
    }

    public function index()
    {
        if(count(Categoria::all()) > 0){
            return response([
                'categorias' => Categoria::all()
            ],200);
        }else{
            return response([
                'mensagem'=>'Não há categorias cadastradas'
            ],500);
        }

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'nome' => 'string|required',
            'descricao' => 'string|required'
        ]);
        $categoria = Categoria::create([
            'nome' => $attrs['nome'],
            'descricao' => $attrs['descricao'],
            'user_id' => auth()->user()->id
        ]);
        if(isset($categoria)){
            return $this->retorno('Categoria cadastrada com sucesso',200,$categoria);
        }else{
            return $this->retorno('Erro ao cadastrar a categoria',500);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
