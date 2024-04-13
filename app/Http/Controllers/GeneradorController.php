<?php

namespace App\Http\Controllers;

use App\Models\Generador;
use Illuminate\Http\Request;

/**
 * Class GeneradorController
 * @package App\Http\Controllers
 */
class GeneradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generadors = Generador::paginate(10);

        return view('generador.index', compact('generadors'))
            ->with('i', (request()->input('page', 1) - 1) * $generadors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generador = new Generador();
        return view('generador.create', compact('generador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Generador::$rules);

        $generador = Generador::create($request->all());

        return redirect()->route('generadors.index')
            ->with('success', 'Generador created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $generador = Generador::find($id);

        return view('generador.show', compact('generador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $generador = Generador::find($id);

        return view('generador.edit', compact('generador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Generador $generador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Generador $generador)
    {
        request()->validate(Generador::$rules);

        $generador->update($request->all());

        return redirect()->route('generadors.index')
            ->with('success', 'Generador updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $generador = Generador::find($id)->delete();

        return redirect()->route('generadors.index')
            ->with('success', 'Generador deleted successfully');
    }
}
