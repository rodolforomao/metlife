<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Patrimonio;
use Illuminate\Http\Request;

class PatrimonioController extends Controller
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
            $patrimonio = Patrimonio::where('fundos', 'LIKE', "%$keyword%")
                ->orWhere('reservas', 'LIKE', "%$keyword%")
                ->orWhere('inventario', 'LIKE', "%$keyword%")
                ->orWhere('emergencia', 'LIKE', "%$keyword%")
                ->orWhere('funeral', 'LIKE', "%$keyword%")
                ->orWhere('outros', 'LIKE', "%$keyword%")
                ->orWhere('total', 'LIKE', "%$keyword%")
                ->orWhere('imoveis', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $patrimonio = Patrimonio::latest()->paginate($perPage);
        }

        return view('patrimonio.index', compact('patrimonio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('patrimonio.create');
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
        
        Patrimonio::create($requestData);

        return redirect('patrimonio')->with('flash_message', 'Patrimonio added!');
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
        $patrimonio = Patrimonio::findOrFail($id);

        return view('patrimonio.show', compact('patrimonio'));
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
        $patrimonio = Patrimonio::findOrFail($id);

        return view('patrimonio.edit', compact('patrimonio'));
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
        
        $patrimonio = Patrimonio::findOrFail($id);
        $patrimonio->update($requestData);

        return redirect('patrimonio')->with('flash_message', 'Patrimonio updated!');
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
        Patrimonio::destroy($id);

        return redirect('patrimonio')->with('flash_message', 'Patrimonio deleted!');
    }
}
