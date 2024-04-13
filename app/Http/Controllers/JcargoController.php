<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Jcargo;
use App\Models\Nivele;
use Illuminate\Http\Request;

/**
 * Class JcargoController
 * @package App\Http\Controllers
 */
class JcargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jcargos = Jcargo::paginate(10);

        return view('jcargo.index', compact('jcargos'))
            ->with('i', (request()->input('page', 1) - 1) * $jcargos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jcargo = new Jcargo();
        $nivel = Nivele::pluck('nivel','id');
        $area = Area::pluck('area','id');
        return view('jcargo.create', compact('jcargo','nivel','area'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Jcargo::$rules);

        $jcargo = Jcargo::create($request->all());

        return redirect()->route('jcargos.index')
            ->with('success', 'Jcargo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jcargo = Jcargo::find($id);

        return view('jcargo.show', compact('jcargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jcargo = Jcargo::find($id);
        $nivel = Nivele::pluck('nivel','id');
        $area = Area::pluck('area','id');
        return view('jcargo.edit', compact('jcargo','nivel','area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Jcargo $jcargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jcargo $jcargo)
    {
        request()->validate(Jcargo::$rules);

        $jcargo->update($request->all());

        return redirect()->route('jcargos.index')
            ->with('success', 'Jcargo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jcargo = Jcargo::find($id)->delete();

        return redirect()->route('jcargos.index')
            ->with('success', 'Jcargo deleted successfully');
    }
}
