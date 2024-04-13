<?php

namespace App\Http\Controllers;

use App\Models\Formmodel;
use App\Models\Tipo;
use Illuminate\Http\Request;

/**
 * Class FormmodelController
 * @package App\Http\Controllers
 */
class FormmodelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formmodels = Formmodel::paginate(10);

        return view('formmodel.index', compact('formmodels'))
            ->with('i', (request()->input('page', 1) - 1) * $formmodels->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formmodel = new Formmodel();
        $tipos = Tipo::pluck('tipo_formulario','id');
        return view('formmodel.create', compact('formmodel','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Formmodel::$rules);

        $formmodel = Formmodel::create($request->all());

        return redirect()->route('formmodels.index')
            ->with('success', 'Formmodel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formmodel = Formmodel::find($id);

        return view('formmodel.show', compact('formmodel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formmodel = Formmodel::find($id);

        return view('formmodel.edit', compact('formmodel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Formmodel $formmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formmodel $formmodel)
    {
        request()->validate(Formmodel::$rules);

        $formmodel->update($request->all());

        return redirect()->route('formmodels.index')
            ->with('success', 'Formmodel updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $formmodel = Formmodel::find($id)->delete();

        return redirect()->route('formmodels.index')
            ->with('success', 'Formmodel deleted successfully');
    }
}
