<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Cargo;
use App\Models\Nivele;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

/**
 * Class CargoController
 * @package App\Http\Controllers
 */
class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::orderBy('cargo')->paginate(10);
        $lista_cargos = Cargo::orderBy('cargo')->get();
        return view('cargo.index', compact('cargos','lista_cargos'))
            ->with('i', (request()->input('page', 1) - 1) * $cargos->perPage());
    }

    public function buscar(Request $request) {
        $cargo_id = $request->input('select-cargo');
        $cargos = Cargo::where('id', $cargo_id)->get();
        return view('cargo.buscar', compact('cargos'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargo = new Cargo();
        $niveles = Nivele::pluck('nivel','id');
        $areas = Area::pluck('area','id');
        return view('cargo.create', compact('cargo','niveles','areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cargo::$rules);

        $cargo = Cargo::create($request->all());

        return redirect()->route('cargos.index')
            ->with('success', 'Cargo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cargo = Cargo::find($id);

        return view('cargo.show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargo = Cargo::find($id);
        $niveles = Nivele::pluck('nivel','id');
        $areas = Area::pluck('area','id');

        return view('cargo.edit', compact('cargo','niveles','areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cargo $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo)
    {
        request()->validate(Cargo::$rules);

        $cargo->update($request->all());

        return redirect()->route('cargos.index')
            ->with('success', 'Cargo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cargo = Cargo::find($id)->delete();

        return redirect()->route('cargos.index')
            ->with('success', 'Cargo deleted successfully');
    }

    public function print() {
        $num_cargos = 0;
        $cargos = Cargo::orderBy('cargo')->get();

        $pdf =Pdf::loadView('cargo.print', compact('cargos','num_cargos'))
            ->setPaper('letter');
        return $pdf->stream();
        
    }
}
