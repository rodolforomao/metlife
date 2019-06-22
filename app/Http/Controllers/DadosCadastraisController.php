<?php

namespace App\Http\Controllers;

use App\DadosCadastrais;
use Illuminate\Http\Request;

class DadosCadastraisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = DadosCadastrais::all();
        return view('dados.index', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = DadosCadastrais::all();
        return view('dados.add', compact('dados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = DadosCadastrais::create($request);
        $dados->save();
        return redirect('dados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DadosCadastrais  $dadosCadastrais
     * @return \Illuminate\Http\Response
     */
    public function show(DadosCadastrais $dadosCadastrais)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DadosCadastrais  $dadosCadastrais
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = DadosCadastrais::find($id);
        return view('dados.editar', compact('dados', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DadosCadastrais  $dadosCadastrais
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = DadosCadastrais::find($id);
        $dados->nome = $request->all();
        $dados->update();
        return redirect('dados.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DadosCadastrais  $dadosCadastrais
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dados = DadosCadastrais::find($id);
        $dados->delete();
        return redirect('dados.index');
    }
}
