<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\musicaAgrupacione;
use Illuminate\Http\Request;

class musicaAgrupacionesController extends Controller
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
            $musicaagrupaciones = musicaAgrupacione::where('foto', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('informacion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $musicaagrupaciones = musicaAgrupacione::latest()->paginate($perPage);
        }

        return view('musica-agrupaciones.index', compact('musicaagrupaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('musica-agrupaciones.create');
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
                if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')
                ->store('uploads', 'public');
        }

        musicaAgrupacione::create($requestData);

        return redirect('musica-agrupaciones')->with('flash_message', 'musicaAgrupacione added!');
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
        $musicaagrupacione = musicaAgrupacione::findOrFail($id);

        return view('musica-agrupaciones.show', compact('musicaagrupacione'));
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
        $musicaagrupacione = musicaAgrupacione::findOrFail($id);

        return view('musica-agrupaciones.edit', compact('musicaagrupacione'));
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
                if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')
                ->store('uploads', 'public');
        }

        $musicaagrupacione = musicaAgrupacione::findOrFail($id);
        $musicaagrupacione->update($requestData);

        return redirect('musica-agrupaciones')->with('flash_message', 'musicaAgrupacione updated!');
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
        musicaAgrupacione::destroy($id);

        return redirect('musica-agrupaciones')->with('flash_message', 'musicaAgrupacione deleted!');
    }
}
