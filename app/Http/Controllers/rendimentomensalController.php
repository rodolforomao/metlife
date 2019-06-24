<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\rendimentomensal;
use Illuminate\Http\Request;

class rendimentomensalController extends Controller
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
            $rendimentomensal = rendimentomensal::where('idUser', 'LIKE', "%$keyword%")
                ->orWhere('nomecompleto', 'LIKE', "%$keyword%")
                ->orWhere('outrasrendas', 'LIKE', "%$keyword%")
                ->orWhere('declaracaodeir', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $rendimentomensal = rendimentomensal::latest()->paginate($perPage);
        }

        return view('rendimentomensal.index', compact('rendimentomensal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('rendimentomensal.create');
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
        
        rendimentomensal::create($requestData);

        return redirect('rendimentomensal')->with('flash_message', 'rendimentomensal added!');
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
        $rendimentomensal = rendimentomensal::findOrFail($id);

        return view('rendimentomensal.show', compact('rendimentomensal'));
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
        $rendimentomensal = rendimentomensal::findOrFail($id);

        return view('rendimentomensal.edit', compact('rendimentomensal'));
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
        
        $rendimentomensal = rendimentomensal::findOrFail($id);
        $rendimentomensal->update($requestData);

        return redirect('rendimentomensal')->with('flash_message', 'rendimentomensal updated!');
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
        rendimentomensal::destroy($id);

        return redirect('rendimentomensal')->with('flash_message', 'rendimentomensal deleted!');
    }
}
