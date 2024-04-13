<?php

namespace App\Http\Controllers;

use App\Models\Factore;
use App\Models\Formmodel;
use App\Models\Formulario;
use App\Models\Nivele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class FormularioController
 * @package App\Http\Controllers
 */
class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formularios = Formulario::paginate(10);

        return view('formulario.index', compact('formularios'))
            ->with('i', (request()->input('page', 1) - 1) * $formularios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $formulario = new Formulario();
        // //$factor = new Factore();
        // $factores = Factore::all();
        $niveles = Nivele::all();
        $versiones = Formmodel::all();
        return view('formulario.create', compact('niveles','versiones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nivel = $request->input('nivel');

        if ($nivel == 1) {
            $factores = DB::table('ejecutivoforms')->get();
            return view('formulario.show', compact('nivel','factores'));
        }
        elseif ($nivel == 2) {
            $factores = DB::table('administrativoforms')->get();
            return view('formulario.show', compact('nivel','factores'));
        }
        elseif ($nivel == 3) {
            $factores = DB::table('mediosforms')->get();
            return view('formulario.show', compact('nivel','factores'));
        }
        elseif ($nivel == 4) {
            $factores = DB::table('profesionalforms')->get();
            return view('formulario.show', compact('nivel','factores'));
        }
        elseif ($nivel == 5) {
            $factores = DB::table('tecnicoforms')->get();
            return view('formulario.show', compact('nivel','factores'));
        }
        elseif ($nivel == 6) {
            $factores = DB::table('auxiliarforms')->get();
            return view('formulario.show', compact('nivel','factores'));
        }
        else
            return view('formulario.index');
        // request()->validate(Formulario::$rules);

        // $formulario = Formulario::create($request->all());

        // return redirect()->route('formularios.index')
        //     ->with('success', 'Formulario created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formulario = Formulario::find($id);

        return view('formulario.show', compact('formulario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formulario = Formulario::find($id);

        return view('formulario.edit', compact('formulario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Formulario $formulario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formulario $formulario)
    {
        request()->validate(Formulario::$rules);

        $formulario->update($request->all());

        return redirect()->route('formularios.index')
            ->with('success', 'Formulario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $formulario = Formulario::find($id)->delete();

        return redirect()->route('formularios.index')
            ->with('success', 'Formulario deleted successfully');
    }
}
