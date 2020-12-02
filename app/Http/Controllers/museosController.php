<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\museo;
use Illuminate\Http\Request;

class museosController extends Controller
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
            $museos = museo::where('foto', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('informacion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $museos = museo::latest()->paginate($perPage);
        }

        return view('museos.index', compact('museos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('museos.create');
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

        museo::create($requestData);

        return redirect('museos')->with('flash_message', 'museo agregado!');
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
        $museo = museo::findOrFail($id);

        return view('museos.show', compact('museo'));
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
        $museo = museo::findOrFail($id);

        return view('museos.edit', compact('museo'));
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
                    $museo = museo::findOrFail($id);
                    unlink(storage_path ('app\\public\\'.$museo->foto));
            $requestData['foto'] = $request->file('foto')
                ->store('uploads', 'public');
        }

        $museo = museo::findOrFail($id);
        $museo->update($requestData);

        return redirect('museos')->with('flash_message', 'museo actualizado!');
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
        $museo = museo::findOrFail($id);
        museo::destroy($id);
        unlink(storage_path ('app\\public\\'.$museo->foto));
        return redirect('/museos')->with('flash_message', 'museo eliminado!');
    }
}
