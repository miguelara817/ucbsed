<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Unidade;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function index()
    {
        $unidades = Unidade::orderBy('unidad')->get();
        return view('unidade.index', compact('unidades'))
            ->with('i');
    }

    public function create()
    {
        $unidade = new Unidade();
        $area = Area::pluck('area','id');
        return view('unidade.create', compact('unidade','area'));
    }

    public function store(Request $request)
    {
        request()->validate(Unidade::$rules);

        $unidade = Unidade::create($request->all());

        return redirect()->route('unidades.index')
            ->with('success', 'Unidade created successfully.');
    }

    public function show($id)
    {
        $unidade = Unidade::find($id);

        return view('unidade.show', compact('unidade'));
    }

    public function edit($id)
    {
        $unidade = Unidade::find($id);
        $area = Area::pluck('area','id');
        return view('unidade.edit', compact('unidade','area'));
    }

    public function update(Request $request, Unidade $unidade)
    {
        request()->validate(Unidade::$rules);

        $unidade->update($request->all());

        return redirect()->route('unidades.index')
            ->with('success', 'Unidade updated successfully');
    }

    public function destroy($id)
    {
        $unidade = Unidade::find($id)->delete();

        return redirect()->route('unidades.index')
            ->with('success', 'Unidade deleted successfully');
    }

    public function print() {
        $num_unidades = 0;
        $unidades = Unidade::orderBy('unidad')->get();
        
        $pdf = Pdf::loadView('unidade.print', compact('unidades', 'num_unidades'))
                ->setPaper('letter');
        return $pdf->stream();
    }
}
