<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Depto;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DeptoController extends Controller
{
    public function index()
    {
        $deptos = Depto::orderBy('departamento')->get();
        return view('depto.index', compact('deptos'))
            ->with('i');
    }

    public function create()
    {
        $depto = new Depto();

        $area = Area::pluck('area','id');
        return view('depto.create', compact('depto','area'));
    }

    public function store(Request $request)
    {
        request()->validate(Depto::$rules);

        $depto = Depto::create($request->all());

        return redirect()->route('deptos.index')
            ->with('success', 'Departamento creado exitosamente.');
    }

    public function show($id)
    {
        $depto = Depto::find($id);

        return view('depto.show', compact('depto'));
    }

    public function edit($id)
    {
        $depto = Depto::find($id);
        $area = Area::pluck('area','id');
        return view('depto.edit', compact('depto', 'area'));
    }

    public function update(Request $request, Depto $depto)
    {
        request()->validate(Depto::$rules);

        $depto->update($request->all());

        return redirect()->route('deptos.index')
            ->with('success', 'Departamento actualizado exitosamente');
    }

    public function destroy($id)
    {
        $depto = Depto::find($id)->delete();
        
        return redirect()->route('deptos.index')
            ->with('success', 'Departamento eliminado exitosamente');
    }

    public function print() {
        $deptos = Depto::orderBy('departamento')->get();
        $num_deptos = 0;

        $pdf =Pdf::loadView('depto.print',compact('deptos','num_deptos'))
            ->setPaper('letter');
        return $pdf->stream();
        
    }
}
