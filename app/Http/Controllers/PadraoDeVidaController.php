<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PadraoDeVida;
use Illuminate\Http\Request;

class PadraoDeVidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $padraodevida = PadraoDeVida::where('moradia', 'LIKE', "%$keyword%")
                ->orWhere('servicos', 'LIKE', "%$keyword%")
                ->orWhere('transporte', 'LIKE', "%$keyword%")
                ->orWhere('saude', 'LIKE', "%$keyword%")
                ->orWhere('vestuario', 'LIKE', "%$keyword%")
                ->orWhere('seguroDeVidaPrevidencia', 'LIKE', "%$keyword%")
                ->orWhere('lazer', 'LIKE', "%$keyword%")
                ->orWhere('alimentacao', 'LIKE', "%$keyword%")
                ->orWhere('impostos', 'LIKE', "%$keyword%")
                ->orWhere('extrasoutros', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $padraodevida = PadraoDeVida::latest()->paginate($perPage);
        }

        return view('padrao-de-vida.index', compact('padraodevida'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('padrao-de-vida.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        PadraoDeVida::create($requestData);

        return redirect('padrao-de-vida')->with('flash_message', 'PadraoDeVida added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $padraodevida = PadraoDeVida::findOrFail($id);

        return view('padrao-de-vida.show', compact('padraodevida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $padraodevida = PadraoDeVida::findOrFail($id);

        return view('padrao-de-vida.edit', compact('padraodevida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $padraodevida = PadraoDeVida::findOrFail($id);
        $padraodevida->update($requestData);

        return redirect('padrao-de-vida')->with('flash_message', 'PadraoDeVida updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        PadraoDeVida::destroy($id);

        return redirect('padrao-de-vida')->with('flash_message', 'PadraoDeVida deleted!');
    }
}
