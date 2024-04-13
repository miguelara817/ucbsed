<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use App\Models\Factor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

/**
 * Class FactorController
 * @package App\Http\Controllers
 */
class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $factors = Factor::orderBy('competencia_id')->paginate(10);
        $factores = Factor::select('factors.id', 'factors.factor', 'factors.descripcion', "competencias.competencias")
                            ->join('competencias', 'competencias.id', '=', 'factors.competencia_id')
                            ->distinct()->orderBy('factors.factor')->get();

        // return view('factor.index', compact('factores'))
        //     ->with('i', (request()->input('page', 1) - 1) * $factores->perPage());
        return view('factor.index', compact('factores'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factor = new Factor();
        $competencias = Competencia::pluck('competencias', 'id');
        return view('factor.create', compact('factor' ,'competencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Factor::$rules);

        $factor = Factor::create($request->all());

        return redirect()->route('factors.index')
            ->with('success', 'Factor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factor = Factor::find($id);
        
        return view('factor.show', compact('factor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factor = Factor::find($id);
        $competencias = Competencia::pluck('competencias', 'id');
        return view('factor.edit', compact('factor','competencias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Factor $factor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factor $factor)
    {
        request()->validate(Factor::$rules);

        $factor->update($request->all());

        return redirect()->route('factors.index')
            ->with('success', 'Factor actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $factor = Factor::find($id)->delete();

        return redirect()->route('factors.index')
            ->with('success', 'Factor eliminado exitosamente');
    }

    public function print() {
        $factores = Factor::select('factors.id', 'factors.factor', 'factors.descripcion', "competencias.competencias")
                            ->join('competencias', 'competencias.id', '=', 'factors.competencia_id')
                            ->distinct()->orderBy('factors.factor')->get();
        $num_factores = 0;

        $pdf =Pdf::loadView('factor.print', compact('factores','num_factores'))
            ->setPaper('letter');
        return $pdf->stream();
    }
}
