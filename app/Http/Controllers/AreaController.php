<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::orderBy('area')->get();
        return view('area.index', compact('areas'))
             ->with('i');
    }

    public function create()
    {
        $area = new Area();
        return view('area.create', compact('area'));
    }

    public function store(Request $request)
    {
        request()->validate(Area::$rules);

        $area = Area::create($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'Área creada exitosamente.');
    }

    public function show($id)
    {
        $area = Area::find($id);

        return view('area.show', compact('area'));
    }

    public function edit($id)
    {
        $area = Area::find($id);

        return view('area.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        request()->validate(Area::$rules);

        $area->update($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'Área actualizada exitosamente');
    }

    public function destroy($id)
    {
        $area = Area::find($id)->delete();

        return redirect()->route('areas.index')
            ->with('success', 'Área eliminada exitosamente');
    }

    public function print() {
        $num_areas = 0;
        $areas = Area::orderBy('area')->get();

        $pdf = Pdf::loadView('area.print', compact('areas','num_areas'))
                ->setPaper('letter');
        return $pdf->stream();
    }
}
