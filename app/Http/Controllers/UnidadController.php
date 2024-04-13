<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;

/**
 * Class UnidadController
 * @package App\Http\Controllers
 */
class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidads = Unidad::paginate(10);

        return view('unidad.index', compact('unidads'))
            ->with('i', (request()->input('page', 1) - 1) * $unidads->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidad = new Unidad();
        return view('unidad.create', compact('unidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Unidad::$rules);

        $unidad = Unidad::create($request->all());

        return redirect()->route('unidads.index')
            ->with('success', 'Unidad created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unidad = Unidad::find($id);

        return view('unidad.show', compact('unidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidad = Unidad::find($id);

        return view('unidad.edit', compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Unidad $unidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidad $unidad)
    {
        request()->validate(Unidad::$rules);

        $unidad->update($request->all());

        return redirect()->route('unidads.index')
            ->with('success', 'Unidad updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $unidad = Unidad::find($id)->delete();

        return redirect()->route('unidads.index')
            ->with('success', 'Unidad deleted successfully');
    }
}
