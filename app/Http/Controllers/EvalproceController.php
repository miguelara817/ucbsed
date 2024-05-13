<?php

namespace App\Http\Controllers;

use App\Models\Arbolcargo;
use App\Models\Area;
use App\Models\Assignment;
use App\Models\Cargo;
use App\Models\Evalproce;
use App\Models\Formmodel;
use App\Models\Jcargo;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EvalproceController extends Controller
{

    public function index()
    {
        // $evalproces = Evalproce::orderBy('id', 'DESC')->paginate(10);
        $evalproces = Evalproce::orderBy('id', 'DESC')->get();
        $evalproces_last = Evalproce::get()->last();

        return view('evalproce.index', compact('evalproces', 'evalproces_last'))
            ->with('i');
    }


    public function create()
    {
        $evalproce = new Evalproce();
        // $versiones = Formmodel::all();
        // $versiones = DB::table('formmodels')
        //                 ->where('tipo_id', '=', 1)
        //                 ->get();
        $versiones = Formmodel::get();
        // $versiones = json_decode(json_encode($versiones), true);
        return view('evalproce.create', compact('evalproce','versiones'));
    }


    public function evalassign(Request $request)
    {        
        $version_id = $request->input('form_version_id');

        $texto_encabezado = $request->input('texto_encabezado');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_conclusion = $request->input('fecha_conclusion');
        $texto_instruccion = $request->input('texto_instruccion');

        $usuarios = DB::select('SELECT DISTINCT usersJefes.jerarquia_id, usersJefes.jefe_id, usersJefes.jefe_apellido, usersJefes.jefe_name, usersJefes.cargo_jefe_id, usersJefes.cargo_jefe, usersJefes.jefe_area ,usersJefes.dependiente_cargo_id, cargos.cargo ,users.id AS dependiente_id, users.apellido AS dependiente_apellido, users.name AS dependiente_name, users.area_id
        FROM
        (SELECT DISTINCT jerarquias.id AS jerarquia_id, users.id AS jefe_id, users.apellido AS jefe_apellido, users.name AS jefe_name, jerarquias.cargo_jefe AS cargo_jefe_id, cargos.cargo AS cargo_jefe, users.area_id AS jefe_area ,jerarquias.cargo_dependiente AS dependiente_cargo_id
        FROM jerarquias
        INNER JOIN users ON jerarquias.cargo_jefe = users.id_cargo
        INNER JOIN cargos ON jerarquias.cargo_jefe = cargos.id) AS usersJefes
        INNER JOIN users ON users.id_cargo = usersJefes.dependiente_cargo_id
        INNER JOIN cargos ON usersJefes.dependiente_cargo_id = cargos.id
        ORDER BY dependiente_apellido;');

        $cargos = array();
        $areas = Area::orderBy('area')->get();
        $jcargos = Jcargo::get();
        $cargos_dependientes = Arbolcargo::get();

        $users = User::get();
        //Obtener cargos jefe con ID de cargos dependiente

        foreach ($areas as $area) {
            foreach ($jcargos as  $jcargo) {
                if (($jcargo->area_id) == ($area->id) ) {
                    foreach ($cargos_dependientes as $cargos_dependiente) {
                        if (($cargos_dependiente->cargo_dependiente) == ($jcargo->cargo)) {
                            array_push($cargos, ["cargo_id" => $cargos_dependiente->id, "cargo" => $cargos_dependiente->cargo_dependiente, "area_id" => $area->id]);
                        }
                    }
                }
            }
        }


        return view('evalproce.evalassign', compact('usuarios','users','version_id','fecha_inicio','fecha_conclusion','areas','jcargos', 'cargos', 'texto_encabezado', 'texto_instruccion'));
    }

    public function recieve(Request $request){
        $version_id = $request->input('version_id');
        $texto_encabezado = $request->input('texto_encabezado');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_conclusion = $request->input('fecha_conclusion');
        $texto_instruccion = $request->input('texto_instruccion');

        $usuarios_asignados = $request->input('usuarios_asignados');
        $jefes_id_cargo = array();
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
        return view('evalproce.pruebas', compact('version_id', 'fecha_inicio','fecha_conclusion','users_info','cargos_id'));
    }

    public function store(Request $request)
    {
        $version_id = $request->input('version_id');
        $texto_encabezado = $request->input('texto_encabezado');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_conclusion = $request->input('fecha_conclusion');
        $texto_instruccion = $request->input('texto_instruccion');

        $evalprocess = Evalproce::create(["form_version_id" => $version_id, "texto_encabezado" => $texto_encabezado, "fecha_inicio" => $fecha_inicio,"fecha_conclusion" => $fecha_conclusion, "texto_instruccion" => $texto_instruccion]);

        $evalprocess_id = DB::getPdo()->lastInsertId();

        
        $usuarios_asignados = $request->input('usuarios_asignados');
        $jefes_id_cargo = array();
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

        // CREAR LOS REGISTROS DE CADA USUARIO

        foreach ($users_info as $user_item) {
            $asignaciones = Assignment::create(["evalprocess_id" => $evalprocess_id, "evaluador_id" => $user_item["user_evaluador"],"evaluado_id" => $user_item["user_evaluado"]]);
        }

        // return redirect()->route('evalproces.index')
        //     ->with('success', 'Proceso de evaluación creado exitosamente.');

        // Armar la vista previa de los formularios

        $evalproces = Evalproce::find($evalprocess_id);
        $numejecutivo = 0;
        $factorjecutivo = DB::table('ejecutivoforms')
                        ->where("formmodel_id", "=", $evalproces->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();

        $competencias_ejecutivo = array();
        foreach ($factorjecutivo as $ejecutivo) {
            array_push($competencias_ejecutivo, $ejecutivo->competencia);
        };
        $competencias_ejecutivo = array_unique($competencias_ejecutivo);

        $nummedio = 0;
        $factormedios = DB::table('mediosforms')
                        ->where("formmodel_id", "=", $evalproces->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_medios = array();
        foreach ($factormedios as $medio) {
            array_push($competencias_medios, $medio->competencia);
        };
        $competencias_medios = array_unique($competencias_medios);

        $numprofesional = 0;
        $factorprofesional = DB::table('profesionalforms')
                        ->where("formmodel_id", "=", $evalproces->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_profesional = array();
        foreach ($factorprofesional as $profesional) {
            array_push($competencias_profesional, $profesional->competencia);
        };
        $competencias_profesional = array_unique($competencias_profesional);

        $numtecnico = 0;
        $factortecnico = DB::table('tecnicoforms')
                        ->where("formmodel_id", "=", $evalproces->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_tecnico = array();
        foreach ($factortecnico as $tecnico) {
            array_push($competencias_tecnico, $tecnico->competencia);
        };
        $competencias_tecnico = array_unique($competencias_tecnico);

        $numadministrativo = 0;
        $factoradministrativo = DB::table('administrativoforms')
                        ->where("formmodel_id", "=", $evalproces->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_administrativo = array();
        foreach ($factoradministrativo as $administrativo) {
            array_push($competencias_administrativo, $administrativo->competencia);
        };
        $competencias_administrativo = array_unique($competencias_administrativo);

        $numauxiliar = 0;
        $factorauxiliar = DB::table('auxiliarforms')
                        ->where("formmodel_id", "=", $evalproces->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_auxiliar = array();
        foreach ($factorauxiliar as $auxiliar) {
            array_push($competencias_auxiliar, $auxiliar->competencia);
        };
        $competencias_auxiliar = array_unique($competencias_auxiliar);

        return view('evalproce.store', compact('evalproces','factorjecutivo','competencias_ejecutivo','numejecutivo','factormedios','competencias_medios','nummedio','numprofesional','factorprofesional','competencias_profesional','numtecnico','factortecnico','competencias_tecnico','numadministrativo','factoradministrativo','competencias_administrativo','numauxiliar','factorauxiliar','competencias_auxiliar'))
            ->with('success', 'Proceso de evaluación creado exitosamente.');
        
    }


    public function vistaPrevia($evalprocess_id) {
        $evalproces = Evalproce::find($evalprocess_id);
        $numejecutivo = 0;
        $factorjecutivo = DB::table('ejecutivoforms')
                        ->where("formmodel_id", "=", $evalproces->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();

        // $competencias_ejecutivo = array();
        // foreach ($factorjecutivo as $ejecutivo) {
        //     array_push($competencias_ejecutivo, $ejecutivo->competencia);
        // };
        // $competencias_ejecutivo = array_unique($competencias_ejecutivo);
        $competencias_ejecutivo = DB::select("SELECT ejecutivoforms.competencia,SUM(ejecutivoforms.ponderacion) suma FROM ejecutivoforms WHERE ejecutivoforms.formmodel_id = $evalproces->form_version_id GROUP BY ejecutivoforms.competencia ORDER BY ejecutivoforms.competencia");
        
        $nummedio = 0;
        $factormedios = DB::table('mediosforms')
                        ->where("formmodel_id", "=", $evalproces->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        // $competencias_medios = array();
        // foreach ($factormedios as $medio) {
        //     array_push($competencias_medios, $medio->competencia);
        // };
        // $competencias_medios = array_unique($competencias_medios);
        $competencias_medios = DB::select("SELECT mediosforms.competencia,SUM(mediosforms.ponderacion) suma FROM mediosforms WHERE mediosforms.formmodel_id = $evalproces->form_version_id GROUP BY mediosforms.competencia ORDER BY mediosforms.competencia");

        $numprofesional = 0;
        $factorprofesional = DB::table('profesionalforms')
                        ->where("formmodel_id", "=", $evalproces->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        // $competencias_profesional = array();
        // foreach ($factorprofesional as $profesional) {
        //     array_push($competencias_profesional, $profesional->competencia);
        // };
        // $competencias_profesional = array_unique($competencias_profesional);
        $competencias_profesional = DB::select("SELECT profesionalforms.competencia,SUM(profesionalforms.ponderacion) suma FROM profesionalforms WHERE profesionalforms.formmodel_id = $evalproces->form_version_id GROUP BY profesionalforms.competencia ORDER BY profesionalforms.competencia");

        $numtecnico = 0;
        $factortecnico = DB::table('tecnicoforms')
                        ->where("formmodel_id", "=", $evalproces->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        // $competencias_tecnico = array();
        // foreach ($factortecnico as $tecnico) {
        //     array_push($competencias_tecnico, $tecnico->competencia);
        // };
        // $competencias_tecnico = array_unique($competencias_tecnico);
        $competencias_tecnico = DB::select("SELECT tecnicoforms.competencia,SUM(tecnicoforms.ponderacion) suma FROM tecnicoforms WHERE tecnicoforms.formmodel_id = $evalproces->form_version_id GROUP BY tecnicoforms.competencia ORDER BY tecnicoforms.competencia");

        $numadministrativo = 0;
        $factoradministrativo = DB::table('administrativoforms')
                        ->where("formmodel_id", "=", $evalproces->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        // $competencias_administrativo = array();
        // foreach ($factoradministrativo as $administrativo) {
        //     array_push($competencias_administrativo, $administrativo->competencia);
        // };
        // $competencias_administrativo = array_unique($competencias_administrativo);
        $competencias_administrativo = DB::select("SELECT administrativoforms.competencia,SUM(administrativoforms.ponderacion) suma FROM administrativoforms WHERE administrativoforms.formmodel_id = $evalproces->form_version_id GROUP BY administrativoforms.competencia ORDER BY administrativoforms.competencia");

        $numauxiliar = 0;
        $factorauxiliar = DB::table('auxiliarforms')
                        ->where("formmodel_id", "=", $evalproces->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        // $competencias_auxiliar = array();
        // foreach ($factorauxiliar as $auxiliar) {
        //     array_push($competencias_auxiliar, $auxiliar->competencia);
        // };
        // $competencias_auxiliar = array_unique($competencias_auxiliar);
        $competencias_auxiliar = DB::select("SELECT auxiliarforms.competencia,SUM(auxiliarforms.ponderacion) suma FROM auxiliarforms WHERE auxiliarforms.formmodel_id = $evalproces->form_version_id GROUP BY auxiliarforms.competencia ORDER BY auxiliarforms.competencia");

        return view('evalproce.vistaPrevia', compact('evalproces','factorjecutivo','competencias_ejecutivo','numejecutivo','factormedios','competencias_medios','nummedio','numprofesional','factorprofesional','competencias_profesional','numtecnico','factortecnico','competencias_tecnico','numadministrativo','factoradministrativo','competencias_administrativo','numauxiliar','factorauxiliar','competencias_auxiliar'));
            
        // return view('evalproce.vistaPrevia');
    }



    public function show($id)
    {
        $evalproce = Evalproce::find($id);

        $version = Formmodel::find($evalproce->form_version_id);
        $counter = 1;
        $numejecutivo = 0;
        $factorjecutivo = DB::table('ejecutivoforms')
                        ->where("formmodel_id", "=", $evalproce->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();

        $competencias_ejecutivo = DB::select("SELECT ejecutivoforms.competencia,SUM(ejecutivoforms.ponderacion) suma FROM ejecutivoforms WHERE ejecutivoforms.formmodel_id = $evalproce->form_version_id GROUP BY ejecutivoforms.competencia ORDER BY ejecutivoforms.competencia");

        $nummedio = 0;
        $factormedios = DB::table('mediosforms')
                        ->where("formmodel_id", "=", $evalproce->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        
        $competencias_medios = DB::select("SELECT mediosforms.competencia,SUM(mediosforms.ponderacion) suma FROM mediosforms WHERE mediosforms.formmodel_id = $evalproce->form_version_id GROUP BY mediosforms.competencia ORDER BY mediosforms.competencia");


        $numprofesional = 0;
        $factorprofesional = DB::table('profesionalforms')
                        ->where("formmodel_id", "=", $evalproce->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
       
        $competencias_profesional = DB::select("SELECT profesionalforms.competencia,SUM(profesionalforms.ponderacion) suma FROM profesionalforms WHERE profesionalforms.formmodel_id = $evalproce->form_version_id GROUP BY profesionalforms.competencia ORDER BY profesionalforms.competencia");

        $numtecnico = 0;
        $factortecnico = DB::table('tecnicoforms')
                        ->where("formmodel_id", "=", $evalproce->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        
        $competencias_tecnico = DB::select("SELECT tecnicoforms.competencia,SUM(tecnicoforms.ponderacion) suma FROM tecnicoforms WHERE tecnicoforms.formmodel_id = $evalproce->form_version_id GROUP BY tecnicoforms.competencia ORDER BY tecnicoforms.competencia");

        $numadministrativo = 0;
        $factoradministrativo = DB::table('administrativoforms')
                        ->where("formmodel_id", "=", $evalproce->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();

        $competencias_administrativo = DB::select("SELECT administrativoforms.competencia,SUM(administrativoforms.ponderacion) suma FROM administrativoforms WHERE administrativoforms.formmodel_id = $evalproce->form_version_id GROUP BY administrativoforms.competencia ORDER BY administrativoforms.competencia");


        $numauxiliar = 0;
        $factorauxiliar = DB::table('auxiliarforms')
                        ->where("formmodel_id", "=", $evalproce->form_version_id)
                        ->orderBy('factor','ASC')
                        ->get();
        // $competencias_auxiliar = array();
        // foreach ($factorauxiliar as $auxiliar) {
        //     array_push($competencias_auxiliar, $auxiliar->competencia);
        // };
        // $competencias_auxiliar = array_unique($competencias_auxiliar);
        $competencias_auxiliar = DB::select("SELECT auxiliarforms.competencia,SUM(auxiliarforms.ponderacion) suma FROM auxiliarforms WHERE auxiliarforms.formmodel_id = $evalproce->form_version_id GROUP BY auxiliarforms.competencia ORDER BY auxiliarforms.competencia");

        return view('evalproce.show', compact('evalproce','factorjecutivo', 'competencias_ejecutivo','numejecutivo','factormedios','competencias_medios','nummedio','factorprofesional','competencias_profesional','numprofesional','factortecnico','competencias_tecnico','numtecnico','factoradministrativo', 'competencias_administrativo','numadministrativo','factorauxiliar', 'competencias_auxiliar','numauxiliar'));
    }

    public function edit($id)
    {
        $evalproce = Evalproce::find($id);

        return view('evalproce.edit', compact('evalproce'));
    }


    public function update(Request $request, $id)
    {
        $evalproce = Evalproce::find($id);

        $evalproce->texto_encabezado = $request->input('texto_encabezado');
        $evalproce->fecha_inicio = $request->input('fecha_inicio');
        $evalproce->fecha_conclusion = $request->input('fecha_conclusion');
        $evalproce->texto_instruccion = $request->input('texto_instruccion');
        $evalproce->save();

        return redirect()->route('evalproces.index')
            ->with('success', 'Proceso de evaluación actualizado exitosamente');
    }

    public function destroy($id)
    {
        $evalproce = Evalproce::find($id)->delete();

        return redirect()->route('evalproces.index')
            ->with('success', 'Evalproce deleted successfully');
    }

    public function estado(Request $request)
    {
        $evalprocess_id = $request->input('evalprocess_id');
        $evalproce = Evalproce::find($evalprocess_id);
        $evalproce->finalizacion = 1;
        $evalproce->save();

        return redirect()->route('evalproces.index');
    }

    public function reabrir(Request $request)
    {
        $evalprocess_id = $request->input('evalprocess_id');
        $evalproce = Evalproce::find($evalprocess_id);
        $evalproce->finalizacion = 0;
        $evalproce->save();

        return redirect()->route('evalproces.index');
    }

    public function print() {
        $num_evalproces = 0;
        $evalproces = Evalproce::orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('evalproce.print',compact('num_evalproces', 'evalproces'))
                ->setPaper('letter');
        return $pdf->stream();
    }
}