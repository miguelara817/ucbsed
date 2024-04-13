<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Seccione;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SeccioneController extends Controller
{
    public function index()
    {
        $secciones = Seccione::orderBy('seccion')->get();
        return view('seccione.index', compact('secciones'))
            ->with('i');
    }

    public function create()
    {
        $seccione = new Seccione();
        $area = Area::pluck('area','id');
        return view('seccione.create', compact('seccione','area'));
    }

    public function store(Request $request)
    {
        request()->validate(Seccione::$rules);

        $seccione = Seccione::create($request->all());

        return redirect()->route('secciones.index')
            ->with('success', 'La sección fue creada exitosamente.');
    }

    public function show($id)
    {
        $seccione = Seccione::find($id);

        return view('seccione.show', compact('seccione'));
    }

    public function edit($id)
    {
        $seccione = Seccione::find($id);
        $area = Area::pluck('area','id');
        return view('seccione.edit', compact('seccione','area'));
    }

    public function update(Request $request, Seccione $seccione)
    {
        request()->validate(Seccione::$rules);

        $seccione->update($request->all());

        return redirect()->route('secciones.index')
            ->with('success', 'La sección fue actualizada exitosamente');
    }

    public function destroy($id)
    {
        $seccione = Seccione::find($id)->delete();

        return redirect()->route('secciones.index')
            ->with('success', 'La sección fue eliminada exitosamente');
    }

    public function print() {
        $num_secciones = 0;
        $secciones = Seccione::orderBy('seccion')->get();

        $pdf =Pdf::loadView('seccione.print', compact('num_secciones', 'secciones'))
            ->setPaper('letter');
        return $pdf->stream();

    }
}
