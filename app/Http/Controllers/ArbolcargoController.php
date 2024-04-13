<?php

namespace App\Http\Controllers;

use App\Models\Arbolcargo;
use App\Models\Jcargo;
use App\Models\Nivele;
use Illuminate\Http\Request;

/**
 * Class ArbolcargoController
 * @package App\Http\Controllers
 */
class ArbolcargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cargos = Arbolcargo::orderBy('cargo_dependiente')->get();
        $arbolcargos = Arbolcargo::orderBy('cargo_dependiente')->paginate(10);

        return view('arbolcargo.index', compact('arbolcargos'))
            ->with('i', (request()->input('page', 1) - 1) * $arbolcargos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arbolcargo = new Arbolcargo();
        $nivel = Nivele::pluck('nivel','id');
        $jcargo = Jcargo::pluck('cargo','id');
        return view('arbolcargo.create', compact('arbolcargo','nivel','jcargo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Arbolcargo::$rules);

        $arbolcargo = Arbolcargo::create($request->all());

        return redirect()->route('arbolcargos.index')
            ->with('success', 'Arbolcargo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arbolcargo = Arbolcargo::find($id);

        return view('arbolcargo.show', compact('arbolcargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arbolcargo = Arbolcargo::find($id);
        $nivel = Nivele::pluck('nivel','id');
        $jcargo = Jcargo::pluck('cargo','id');
        return view('arbolcargo.edit', compact('arbolcargo','nivel','jcargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Arbolcargo $arbolcargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arbolcargo $arbolcargo)
    {
        request()->validate(Arbolcargo::$rules);

        $arbolcargo->update($request->all());

        return redirect()->route('arbolcargos.index')
            ->with('success', 'Arbolcargo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $arbolcargo = Arbolcargo::find($id)->delete();

        return redirect()->route('arbolcargos.index')
            ->with('success', 'Arbolcargo deleted successfully');
    }
}
