<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Cargo;
use App\Models\Contrato;
use App\Models\Departamento;
use App\Models\Nivele;
use App\Models\Personal;
use App\Models\Seccion;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class PersonalController
 * @package App\Http\Controllers
 */
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personals = Personal::paginate(10);

        return view('personal.index', compact('personals'))
            ->with('i', (request()->input('page', 1) - 1) * $personals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personal = new Personal();
        // $nivel = Nivele::pluck('nivel','id');
        $nivel = Nivele::all('id','nivel');

        // $cargo = Cargo::pluck('cargo','id');
        $cargo = Cargo::all('id','cargo','nivel_id');
        $area = Area::pluck('area','id');
        $depto = Departamento::pluck('departamento','id');
        $unidad = Unidad::pluck('unidad','id');
        $seccion = Seccion::pluck('seccion','id');
        $tipocontrato = Contrato::pluck('tipo_contrato','id');
        return view('personal.create', compact('personal','nivel','cargo','area','depto','unidad','seccion','tipocontrato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(Personal::$rules);

        // $personal = Personal::create($request->all());
        $apellidos = $request->input('apellidos');
        $nombres = $request->input('nombres');
        $nivel = $request->input('nivel');
        $cargo = $request->input('cargos');
        $area = $request->input('area_id');
        $depto = $request->input('depto_id');
        $unidad = $request->input('unidad_id');
        $seccion = $request->input('seccion_id');
        $fechaingreso = $request->input('fecha_ingreso');
        $fechanac = $request->input('fecha_nacimiento');
        $docid = $request->input('doc_identidad');
        $expedido = $request->input('expedido');
        $tipo = $request->input('tipocontrato_id');

        $now = DB::raw('CURRENT_TIMESTAMP');

        DB::table('personals')->insertGetId(
            [
                'apellidos' => $apellidos,
                'nombres' => $nombres,
                'nivel_id' => $nivel,
                'cargo_id' => $cargo,
                'area_id' => $area,
                'depto_id' => $depto,
                'unidad_id' => $unidad,
                'seccion_id' => $seccion,
                'fecha_ingreso' => $fechaingreso,
                'fecha_nacimiento' => $fechanac,
                'doc_identidad' => $docid,
                'expedido' => $expedido,
                'tipocontrato_id' => $tipo,
                'created_at' => $now,
                'updated_at' => $now
            ]
        );


        // return view('personal.pruebas', compact('apellidos', 'nombres', 'nivel', 'cargo','area','depto','unidad','seccion','fechaingreso','fechanac', 'docid', 'expedido', 'tipo'));
        return redirect()->route('personals.index')
            ->with('success', 'Personal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personal = Personal::find($id);

        return view('personal.show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personal = Personal::find($id);
        $nivel = Nivele::all('id','nivel');

        // $cargo = Cargo::pluck('cargo','id');
        $cargo = Cargo::all('id','cargo','nivel_id');
        $area = Area::pluck('area','id');
        $depto = Departamento::pluck('departamento','id');
        $unidad = Unidad::pluck('unidad','id');
        $seccion = Seccion::pluck('seccion','id');
        $tipocontrato = Contrato::pluck('tipo_contrato','id');
    
        return view('personal.edit', compact('personal','nivel','cargo','area','depto','unidad','seccion','tipocontrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Personal $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        // request()->validate(Personal::$rules);

        // $personal->update($request->all());
        $apellidos = $request->input('apellidos');
        $nombres = $request->input('nombres');
        $nivel = $request->input('nivel');
        $cargo = $request->input('cargos');
        $area = $request->input('area_id');
        $depto = $request->input('depto_id');
        $unidad = $request->input('unidad_id');
        $seccion = $request->input('seccion_id');
        $fechaingreso = $request->input('fecha_ingreso');
        $fechanac = $request->input('fecha_nacimiento');
        $docid = $request->input('doc_identidad');
        $expedido = $request->input('expedido');
        $tipo = $request->input('tipocontrato_id');
        $now = DB::raw('CURRENT_TIMESTAMP');
        
        DB::table('personals')
        ->where('id', $personal->id)
        ->update(
            [
                'apellidos' => $apellidos,
                'nombres' => $nombres,
                'nivel_id' => $nivel,
                'cargo_id' => $cargo,
                'area_id' => $area,
                'depto_id' => $depto,
                'unidad_id' => $unidad,
                'seccion_id' => $seccion,
                'fecha_ingreso' => $fechaingreso,
                'fecha_nacimiento' => $fechanac,
                'doc_identidad' => $docid,
                'expedido' => $expedido,
                'tipocontrato_id' => $tipo,
                'created_at' => $now,
                'updated_at' => $now
            ]
        );
        return redirect()->route('personals.index')
            ->with('success', 'Personal updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $personal = Personal::find($id)->delete();

        return redirect()->route('personals.index')
            ->with('success', 'Personal deleted successfully');
    }
}
