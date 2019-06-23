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
        $json = json_encode($dados);
        return response()->json($json , 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = DadosCadastrais::all();
        $json = json_encode($dados);
        return response()->json($json, 200);
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
        $json = json_encode($dados);
        return response()->json($json, 200);
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
        $json = json_encode($dados);
        return response()->json($json, 200);
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
        $json = json_encode($dados);
        return response()->json($json, 200);

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
        $json = json_encode($dados);
        return response()->json($json, 200);
    }
}
