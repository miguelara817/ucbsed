<?php

namespace App\Http\Controllers;

use App\Models\Arbolcargo;
use App\Models\Confirmassignment;
use App\Models\Confirmdetailsresult;
use App\Models\Confirmproce;
use App\Models\Conformmodel;
use App\Models\Confproce;
use App\Models\Confproces;
use App\Models\Jerarquia;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ConfirmproceController
 * @package App\Http\Controllers
 */
class ConfirmproceController extends Controller
{
    
    public function index(){
        $confirmproces = Confproce::orderBy('id', 'DESC')->get();

        return view('confirmproce.index', compact('confirmproces'))
            ->with('i');
    }

 
    public function create(){

        $versiones = Conformmodel::get();
        return view('confirmproce.create', compact('versiones'));

    }

    public function cinitprocess(Request $request){
        
        $version_id = $request->input('form_version_id');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_conclusion = $request->input('fecha_conclusion');
        // $users = User::orderBy('codigo')->get();
        // $usuarios = User::select('users.id', 'users.name', 'users.apellido', 'users.id_cargo', 'jerarquias.cargo_dependiente', 'jerarquias.cargo_jefe')
        //                 ->join('jerarquias', 'jerarquias.cargo_dependiente', '=', 'users.id_cargo')
        //                 ->distinct()
        //                 ->get();
        $users = DB::select('SELECT DISTINCT usersJefes.jerarquia_id, usersJefes.jefe_id, usersJefes.jefe_apellido, usersJefes.jefe_name, usersJefes.cargo_jefe_id, usersJefes.cargo_jefe, usersJefes.jefe_area ,usersJefes.dependiente_cargo_id, cargos.cargo ,users.id AS dependiente_id, users.apellido AS dependiente_apellido, users.name AS dependiente_name, users.area_id FROM
        (SELECT DISTINCT jerarquias.id AS jerarquia_id, users.id AS jefe_id, users.apellido AS jefe_apellido, users.name AS jefe_name, jerarquias.cargo_jefe AS cargo_jefe_id, cargos.cargo AS cargo_jefe, users.area_id AS jefe_area ,jerarquias.cargo_dependiente AS dependiente_cargo_id
        FROM jerarquias
        INNER JOIN users ON jerarquias.cargo_jefe = users.id_cargo
        INNER JOIN cargos ON jerarquias.cargo_jefe = cargos.id) AS usersJefes
        INNER JOIN users ON users.id_cargo = usersJefes.dependiente_cargo_id
        INNER JOIN cargos ON usersJefes.dependiente_cargo_id = cargos.id
        ORDER BY dependiente_apellido;');

        return view('confirmproce.confassign', compact('users','version_id','fecha_inicio','fecha_conclusion'));
    }

    public function recieve(Request $request){
       
        $version_id = $request->input('version_id');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_conclusion = $request->input('fecha_conclusion');
        $user_id = $request->input('select-funcionario');


        $evaluado = User::find($user_id);
        $evaluado_cargo = $evaluado->id_cargo;
        
        $evaluador_cargo = Jerarquia::where('cargo_dependiente',$evaluado_cargo)->get();

        foreach ($evaluador_cargo as $items) {
            $evaluado_cargo_id = $items->cargo_jefe;
        }

        $evaluador_user = User::where('id_cargo',$evaluado_cargo_id)->get();
        foreach ($evaluador_user as $items) {
            $evaluador_user_id = $items->id;
        }
        // $cargo_jefe = $evaluado->arbolcargo->jcargo->cargo;
        // $jefe_info = Arbolcargo::where('cargo_dependiente',$cargo_jefe)->get();
        
        // foreach ($jefe_info as $item){
        //     $cargo_jefe_id = $item->id;
        // }
        
        // $evaluador = User::where('cargo_id',$cargo_jefe_id)->get();
        
        $confprocess = Confproce::create(["form_version_id" => $version_id, "fecha_inicio" => $fecha_inicio, "fecha_conclusion" => $fecha_conclusion,"evaluador_id" => $evaluador_user_id, "evaluado_id" => $user_id]);

        return redirect()->route('confirmproces.index')
            ->with('success', 'Proceso de confirmación creado exitosamente.');
        // return view('confirmproce.pruebas', compact('version_id', 'fecha_inicio','fecha_conclusion','user_id','cargo_jefe','evaluador'));
    }


    public function store(Request $request)
    {
        request()->validate(Confproce::$rules);

        $confirmproce = Confproce::create($request->all());

        return redirect()->route('confirmproces.index')
            ->with('success', 'Confirmproce created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $confirmproce = Confproce::find($id);

        return view('confirmproce.show', compact('confirmproce'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $confirmproce = Confproce::find($id);

        return view('confirmproce.edit', compact('confirmproce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Confirmproce $confirmproce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Confproce $confirmproce)
    {
        request()->validate(Confproce::$rules);

        $confirmproce->update($request->all());

        return redirect()->route('confirmproces.index')
            ->with('success', 'Confirmproce updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $confirmproce = Confproce::find($id)->delete();

        return redirect()->route('confirmproces.index')
            ->with('success', 'Confirmproce deleted successfully');
    }

    public function print() {
        $num_confirmproces = 0;
        $confirmproces = Confproce::orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('confirmproce.print', compact('confirmproces', 'num_confirmproces'))
                ->setPaper('letter', 'landscape');
        return $pdf->stream();
        // return view('confirmproce.print', compact('confirmproces', 'num_confirmproces'));
    }

    public function reevaluar(Request $request){
        $confirmproce_id = $request->input('confirmproce_id');
        $evaluador_id = $request->input('evaluador_id');
        $evaluado_id = $request->input('evaluado_id');

        $confevalresult = Confirmdetailsresult::where('confproces_id',$confirmproce_id)
                                            ->delete();
        
        $confprocess = Confproce::where('id',$confirmproce_id)
                                ->where('evaluador_id',$evaluador_id)
                                ->where('evaluado_id',$evaluado_id)  
                                ->update(['nota_final' => 0, 'recomendado' => 0, 'finalizacion' => 0]);        
        // return redirect()->route('assignments.index')
        //     ->with('success', 'Se asignó una nueva evaluación');


        return redirect()->route('confirmproces.index')
        ->with('success', 'Se asignó una nueva evaluación');
    }
}
