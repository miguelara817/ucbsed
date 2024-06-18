<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Assignment;
use App\Models\Evalproce;
use App\Models\Evalresult;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class AssignmentController
 * @package App\Http\Controllers
 */
class AssignmentController extends Controller
{
    public function index()
    {
        // $usuarios = DB::select('SELECT DISTINCT usersJefes.jerarquia_id, usersJefes.jefe_id, usersJefes.jefe_apellido, usersJefes.jefe_name, usersJefes.cargo_jefe_id, usersJefes.cargo_jefe, usersJefes.jefe_area ,usersJefes.dependiente_cargo_id, cargos.cargo ,users.id AS dependiente_id, users.apellido AS dependiente_apellido, users.name AS dependiente_name, users.area_id
        // FROM
        // (SELECT DISTINCT jerarquias.id AS jerarquia_id, users.id AS jefe_id, users.apellido AS jefe_apellido, users.name AS jefe_name, jerarquias.cargo_jefe AS cargo_jefe_id, cargos.cargo AS cargo_jefe, users.area_id AS jefe_area ,jerarquias.cargo_dependiente AS dependiente_cargo_id
        // FROM jerarquias
        // INNER JOIN users ON jerarquias.cargo_jefe = users.id_cargo
        // INNER JOIN cargos ON jerarquias.cargo_jefe = cargos.id) AS usersJefes
        // INNER JOIN users ON users.id_cargo = usersJefes.dependiente_cargo_id
        // INNER JOIN cargos ON usersJefes.dependiente_cargo_id = cargos.id
        // WHERE users.id NOT IN (SELECT evaluado_id FROM assignments WHERE evalprocess_id = (SELECT id FROM evalproces ORDER BY id DESC LIMIT 1))
        // ORDER BY usersJefes.jefe_apellido;');

        $usuarios = DB::select(
            'SELECT DISTINCT usersJefes.jerarquia_id, usersJefes.jefe_id, usersJefes.jefe_apellido, 
            usersJefes.jefe_name, usersJefes.jefe_estado, usersJefes.cargo_jefe_id, usersJefes.cargo_jefe, usersJefes.jefe_area ,
            usersJefes.dependiente_cargo_id, cargos.cargo ,users.id AS dependiente_id, 
            users.apellido AS dependiente_apellido, users.name AS dependiente_name, users.estado AS dependiente_estado,users.area_id
            FROM
            (SELECT DISTINCT jerarquias.id AS jerarquia_id, users.id AS jefe_id, users.apellido AS jefe_apellido, 
            users.name AS jefe_name, users.estado AS jefe_estado,jerarquias.cargo_jefe AS cargo_jefe_id, cargos.cargo AS cargo_jefe, 
            users.area_id AS jefe_area ,jerarquias.cargo_dependiente AS dependiente_cargo_id
            FROM jerarquias
            INNER JOIN users ON jerarquias.cargo_jefe = users.id_cargo
            INNER JOIN cargos ON jerarquias.cargo_jefe = cargos.id) AS usersJefes
            INNER JOIN users ON users.id_cargo = usersJefes.dependiente_cargo_id
            INNER JOIN cargos ON usersJefes.dependiente_cargo_id = cargos.id
            WHERE users.id NOT IN (SELECT evaluado_id FROM assignments 
            WHERE evalprocess_id = (SELECT id FROM evalproces ORDER BY id DESC LIMIT 1)) AND usersJefes.jefe_estado = 1 
            AND users.estado = 1
            ORDER BY usersJefes.jefe_apellido;'
        );
        $evalproces_last = Evalproce::get()->last();

        if ($evalproces_last != null) {
            // $assignments = Assignment::where('evalprocess_id',$evalproces_last->id)->orderBy('evaluado_deacuerdo', 'DESC')->orderBy('finalizacion', 'DESC')->paginate(10);
            $assignments = Assignment::where('evalprocess_id',$evalproces_last->id)->orderBy('evaluado_deacuerdo', 'DESC')->orderBy('finalizacion', 'DESC')->get();
            // return view('assignment.index', compact('assignments','usuarios'))
            //     ->with('i', (request()->input('page', 1) - 1) * $assignments->perPage());
            return view('assignment.index', compact('assignments','usuarios'))
                    ->with('i');
        }
        $assignments = [];
        // $assignments = Assignment::where('evalprocess_id',0)->orderBy('evaluado_deacuerdo', 'DESC')->orderBy('finalizacion', 'DESC')->get();
        return view('assignment.index', compact('assignments','usuarios'))
                    ->with('i');

    }


    public function create()
    {
        $assignment = new Assignment();
        
        $usuarios = DB::select('SELECT DISTINCT usersJefes.jerarquia_id, usersJefes.jefe_id, usersJefes.jefe_apellido, usersJefes.jefe_name, usersJefes.cargo_jefe_id, usersJefes.cargo_jefe, usersJefes.jefe_area ,usersJefes.dependiente_cargo_id, cargos.cargo ,users.id AS dependiente_id, users.apellido AS dependiente_apellido, users.name AS dependiente_name, users.area_id
        FROM
        (SELECT DISTINCT jerarquias.id AS jerarquia_id, users.id AS jefe_id, users.apellido AS jefe_apellido, users.name AS jefe_name, jerarquias.cargo_jefe AS cargo_jefe_id, cargos.cargo AS cargo_jefe, users.area_id AS jefe_area ,jerarquias.cargo_dependiente AS dependiente_cargo_id
        FROM jerarquias
        INNER JOIN users ON jerarquias.cargo_jefe = users.id_cargo
        INNER JOIN cargos ON jerarquias.cargo_jefe = cargos.id) AS usersJefes
        INNER JOIN users ON users.id_cargo = usersJefes.dependiente_cargo_id
        INNER JOIN cargos ON usersJefes.dependiente_cargo_id = cargos.id
        WHERE users.id NOT IN (SELECT evaluado_id FROM assignments WHERE evalprocess_id = (SELECT id FROM evalproces ORDER BY id DESC LIMIT 1))
        ORDER BY usersJefes.jefe_apellido;');

        $areas = Area::orderBy('area')->get();

        $evalproces_last = Evalproce::get()->last();
        $evalprocess_id = $evalproces_last->id;

        return view('assignment.create', compact('assignment','usuarios','areas','evalprocess_id'));
    }

    public function reevaluar(Request $request) {
        $evalprocess_id = $request->input('evalprocess_id');
        $evaluador_id = $request->input('evaluador_id');
        $evaluado_id = $request->input('evaluado_id');

        $evalresult = Evalresult::where('evalprocess_id',$evalprocess_id)
                                ->where('evaluador_id',$evaluador_id)
                                ->where('evaluado_id',$evaluado_id)->delete();
        
        $assignment = Assignment::where('evalprocess_id',$evalprocess_id)
                                ->where('evaluador_id',$evaluador_id)
                                ->where('evaluado_id',$evaluado_id)  
                                ->update(['evaluador_calificacion' => 0, 'evaluado_calificacion' => 0, 'evaluado_deacuerdo' => 0, 'finalizacion' => 0])      ;        
        return redirect()->route('assignments.index')
            ->with('success', 'Se asignó una nueva evaluación');
    }



    public function uassignments(Request $request)
    {

        $usuarios_asignados = $request->input('usuarios_asignados');
        $evalprocess_id = $request->input('evalprocess_id');
        $users_info = array();
        foreach ($usuarios_asignados as $user) {

            $info_user = User::select('users.id', 'users.name', 'users.apellido', 'users.id_cargo', 'jerarquias.cargo_dependiente', 'jerarquias.cargo_jefe')
                        ->join('jerarquias', 'jerarquias.cargo_dependiente', '=', 'users.id_cargo')
                        ->where('users.id', $user)->distinct()
                        ->get();

            foreach ($info_user as $i_user) {
                $user_jefe = User::where('id_cargo',$i_user->cargo_jefe)->get();
                foreach ($user_jefe as $u_jefe) {
                    array_push($users_info, ["user_evaluador" => $u_jefe->id, "user_evaluado" => $user]);
                }
                
            }
        }
        foreach ($users_info as $user_item) {
            $asignaciones = Assignment::create(["evalprocess_id" => $evalprocess_id, "evaluador_id" => $user_item["user_evaluador"],"evaluado_id" => $user_item["user_evaluado"]]);
        }

        return redirect()->route('assignments.index')
        ->with('success', 'Asignaciones creadas exitosamente.');
    }

    public function store(Request $request)
    {
        request()->validate(Assignment::$rules);

        $assignment = Assignment::create($request->all());

        return redirect()->route('assignments.index')
            ->with('success', 'Assignment created successfully.');
    }

    public function show($id)
    {
        $assignment = Assignment::find($id);

        return view('assignment.show', compact('assignment'));
    }

    public function edit($id)
    {
        $assignment = Assignment::find($id);

        return view('assignment.edit', compact('assignment'));
    }

   
    public function update(Request $request, Assignment $assignment)
    {
        request()->validate(Assignment::$rules);

        $assignment->update($request->all());

        return redirect()->route('assignments.index')
            ->with('success', 'Assignment updated successfully');
    }

 
    public function destroy($id)
    {
        $assignment = Assignment::find($id)->delete();

        return redirect()->route('assignments.index')
            ->with('success', 'Assignment deleted successfully');
    }

    public function print() {
        $num_assignments = 0;
        $usuarios = DB::select('SELECT DISTINCT usersJefes.jerarquia_id, usersJefes.jefe_id, usersJefes.jefe_apellido, usersJefes.jefe_name, usersJefes.cargo_jefe_id, usersJefes.cargo_jefe, usersJefes.jefe_area ,usersJefes.dependiente_cargo_id, cargos.cargo ,users.id AS dependiente_id, users.apellido AS dependiente_apellido, users.name AS dependiente_name, users.area_id
        FROM
        (SELECT DISTINCT jerarquias.id AS jerarquia_id, users.id AS jefe_id, users.apellido AS jefe_apellido, users.name AS jefe_name, jerarquias.cargo_jefe AS cargo_jefe_id, cargos.cargo AS cargo_jefe, users.area_id AS jefe_area ,jerarquias.cargo_dependiente AS dependiente_cargo_id
        FROM jerarquias
        INNER JOIN users ON jerarquias.cargo_jefe = users.id_cargo
        INNER JOIN cargos ON jerarquias.cargo_jefe = cargos.id) AS usersJefes
        INNER JOIN users ON users.id_cargo = usersJefes.dependiente_cargo_id
        INNER JOIN cargos ON usersJefes.dependiente_cargo_id = cargos.id
        WHERE users.id NOT IN (SELECT evaluado_id FROM assignments WHERE evalprocess_id = (SELECT id FROM evalproces ORDER BY id DESC LIMIT 1))
        ORDER BY usersJefes.jefe_apellido;');
        $evalproces_last = Evalproce::get()->last();
        if ($evalproces_last != null) {
            $assignments = Assignment::where('evalprocess_id',$evalproces_last->id)->orderBy('evaluado_deacuerdo', 'DESC')->orderBy('finalizacion', 'DESC')->get();

            $pdf = Pdf::loadView('assignment.print', compact('usuarios','assignments','num_assignments'))
                    ->setPaper('letter', 'landscape');
            return $pdf->stream();
        }
        $assignments = [];
        $pdf = Pdf::loadView('assignment.print', compact('usuarios','assignments','num_assignments'))
                ->setPaper('letter', 'landscape');
        return $pdf->stream();
       
    }

    // public function authUser(Request $request) {

    //     $id = $request->input('id');
    //     $user = User::find($id);
    //     //ore use your own way to get the user

    //     Auth::login($user);

    //     return redirect()->route('home');
    // }
    public function authUser($id) {

        // $id = $request->input('id');
        $user = User::find($id);
        //ore use your own way to get the user

        Auth::login($user);

        return redirect()->route('home');
    }
}
