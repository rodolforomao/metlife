<?php

namespace App\Http\Controllers;

use App\DadosFamiliares;
use Illuminate\Http\Request;

class DadosFamiliaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dadosFamilia = DadosFamiliares::all();
        $json = json_encode($dadosFamilia);
        return response()->json($json , 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dadosFamilia = DadosFamiliares::all();
        $json = json_encode($dadosFamilia);
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
        $dadosFamilia = DadosFamiliares::create($request);
        $dadosFamilia->save();
        $json = json_encode($dadosFamilia);
        return response()->json($json, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DadosFamiliares  $dadosFamiliares
     * @return \Illuminate\Http\Response
     */
    public function show(DadosFamiliares $dadosFamiliares)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DadosFamiliares  $dadosFamiliares
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dadosFamilia = DadosFamiliares::find($id);
        $json = json_encode($dadosFamilia);
        return response()->json($json, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DadosFamiliares  $dadosFamiliares
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dadosFamilia = DadosFamiliares::find($id);
        $dadosFamilia = $request->all();
        $dadosFamilia->update();
        $json = json_encode($dadosFamilia);
        return response()->json($json, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DadosFamiliares  $dadosFamiliares
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dadosFamilia = DadosFamiliares::find($id);
        $dadosFamilia->delete();
        $json = json_encode($dadosFamilia);
        return response()->json($json, 200);
    }
}
