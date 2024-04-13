<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use App\Models\Factor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

/**
 * Class CompetenciaController
 * @package App\Http\Controllers
 */
class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competencias = Competencia::paginate(10);

        return view('competencia.index', compact('competencias'))
            ->with('i', (request()->input('page', 1) - 1) * $competencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competencia = new Competencia();
        return view('competencia.create', compact('competencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Competencia::$rules);

        $competencia = Competencia::create($request->all());

        return redirect()->route('competencias.index')
            ->with('success', 'Competencia creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $competencia = Competencia::find($id);
        $factores = Factor::select("*")
                            ->where("competencia_id", "=", $id)
                            ->orderBy('factor', 'ASC')
                            ->get();
        $counter = 1;
        return view('competencia.show', compact('competencia','factores','counter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $competencia = Competencia::find($id);

        return view('competencia.edit', compact('competencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Competencia $competencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competencia $competencia)
    {
        request()->validate(Competencia::$rules);

        $competencia->update($request->all());

        return redirect()->route('competencias.index')
            ->with('success', 'Competencia actualizada exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $competencia = Competencia::find($id)->delete();

        return redirect()->route('competencias.index')
            ->with('success', 'Competencia eliminada exitosamente');
    }

    public function print() {
        $competencias = Competencia::get();
        $factores = Factor::orderBy('factor', 'ASC')
                    ->get();
        $num_factores = 0;
        $pdf =Pdf::loadView('competencia.print', compact('competencias', 'factores','num_factores'))
        ->setPaper('letter');
        return $pdf->stream();

        // return view('competencia.print', compact('competencias', 'factores','num_factores'));
    }
}
