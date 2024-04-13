<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Assignment;
use App\Models\Competencia;
use App\Models\Evaldetailsresult;
use App\Models\Evalproce;
use App\Models\Evalresult;
use App\Models\Evalxcomp;
use App\Models\Factor;
use App\Models\Jerarquia;
use App\Models\Nivele;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class ReportevalController extends Controller
{
    public function index() {
        
        $procesos = false;
        $evalprocess = Evalproce::get()->last();

        if ($evalprocess) {
            $evalprocess_all = Evalproce::orderBy('id','DESC')->get();

            $procesos = true;
            $notas_process = array();
            $num_evalprocess = Evalproce::count();

            $evalasignacion = Assignment::where('evalprocess_id',$evalprocess->id)->count();

            $evalasignacion_finalizado = Assignment::where('evalprocess_id',$evalprocess->id)
                                                ->where('finalizacion',1)->count();

            $evalasignacion_pendientes = Assignment::where('evalprocess_id',$evalprocess->id)
                                                ->where('finalizacion',0)->count();

            $evalasignacion_no_conformes = Assignment::where('evalprocess_id',$evalprocess->id)
                                                ->where('evaluado_deacuerdo',0)->count();

            $evalasignacion_conformes = Assignment::where('evalprocess_id',$evalprocess->id)
                                                ->where('evaluado_deacuerdo',1)->count();
            
            $evalresult = Evalresult::where('evalprocess_id',$evalprocess->id)->get();
       
            $evalresult_users = Evalresult::select('evalresults.nota_final','users.name', 'users.apellido')->join('users', 'users.id','=','evalresults.evaluado_id')->where('evalprocess_id',$evalprocess->id)->orderby('users.apellido')->get();

            $evalresult_mejores = Evalresult::select('evalresults.nota_final','users.name', 'users.apellido')->join('users','users.id','=','evalresults.evaluado_id')->where('evalprocess_id',$evalprocess->id)->orderby('evalresults.nota_final','DESC')->limit('3')->get();

            $evalresult_peores = Evalresult::select('evalresults.nota_final','users.name', 'users.apellido')->join('users','users.id','=','evalresults.evaluado_id')->where('evalprocess_id',$evalprocess->id)->orderby('evalresults.nota_final','ASC')->limit('3')->get();

            $users = User::get();

            $xareas = Evalresult::select('users.name', 'users.apellido','users.area_id','areas.area','evalresults.nota_final')->join('users','users.id','=','evalresults.evaluado_id')->join('areas', 'users.area_id','=','areas.id')->where('evalprocess_id',$evalprocess->id)->get();

            $areas = Area::all();
            
            $avgarea = DB::select("SELECT area_id, AREA, AVG(nota) maximo FROM 
            (SELECT evalresults.id, evalresults.evalprocess_id,users.name, users.apellido, users.area_id, areas.area,evalresults.nota_final AS nota
            FROM evalresults 
            INNER JOIN users ON evalresults.evaluado_id = users.id INNER JOIN areas ON users.area_id = areas.id
            WHERE evalresults.evalprocess_id = $evalprocess->id
            ) AS resultados 
            GROUP BY area_id;");
            $avgarea = json_decode(json_encode($avgarea), true);
            $avg = [];
            $areaname = [];
            foreach ($avgarea as $key => $aarea) {
                array_push($avg, round($aarea["maximo"], 2));
                array_push($areaname, $aarea["area"]);
            }

            $numarea = DB::select("SELECT area_id, AREA, COUNT(*) numero FROM 
            (SELECT evalresults.id, evalresults.evalprocess_id,users.name, users.apellido, users.area_id, areas.area,evalresults.nota_final AS nota
            FROM evalresults 
            INNER JOIN users ON evalresults.evaluado_id = users.id INNER JOIN areas ON users.area_id = areas.id
            WHERE evalresults.evalprocess_id = $evalprocess->id
            ) AS resultados 
            GROUP BY area_id;");

            $numarea = json_decode(json_encode($numarea), true);
            $num = [];
            $narea = [];
            foreach ($numarea as $key => $numar) {
                array_push($num, $numar["numero"]);
                array_push($narea, $numar["area"]);
            }
            return view('reporteseval.index', compact('procesos','evalprocess','evalprocess_all' ,'users','num_evalprocess','evalasignacion','evalasignacion_finalizado','evalasignacion_pendientes','evalasignacion_no_conformes','evalasignacion_conformes','evalresult','evalresult_users','evalresult_mejores','evalresult_peores','xareas','areas','avgarea','avg','areaname','num','narea'));
        } else {
            return view('reporteseval.index', compact('procesos'));
        }
        
    }
    
    public function seleccion(Request $request)  {
        $evalprocess_id = $request->input('evalprocess_id');
        $evalprocess = Evalproce::find($evalprocess_id);
        $notas_process = array();
        $num_evalprocess = Evalproce::count();

        $evalasignacion = Assignment::where('evalprocess_id',$evalprocess_id)->count();

        $evalasignacion_finalizado = Assignment::where('evalprocess_id',$evalprocess_id)
                                            ->where('finalizacion',1)->count();

        $evalasignacion_pendientes = Assignment::where('evalprocess_id',$evalprocess_id)
                                            ->where('finalizacion',0)->count();

        $evalasignacion_no_conformes = Assignment::where('evalprocess_id',$evalprocess_id)
                                            ->where('evaluado_deacuerdo',0)->count();

        $evalasignacion_conformes = Assignment::where('evalprocess_id',$evalprocess_id)
                                            ->where('evaluado_deacuerdo',1)->count();
        
        $evalresult = Evalresult::where('evalprocess_id',$evalprocess_id)->get();
        // User::select('users.*')->join('posts', 'posts.user_id', '=', 'users.id');
        $evalresult_users = Evalresult::select('evalresults.nota_final','users.name', 'users.apellido')->join('users', 'users.id','=','evalresults.evaluado_id')->where('evalprocess_id',$evalprocess_id)->orderby('users.apellido')->get();

        $evalresult_mejores = Evalresult::select('evalresults.nota_final','users.name', 'users.apellido')->join('users','users.id','=','evalresults.evaluado_id')->where('evalprocess_id',$evalprocess_id)->orderby('evalresults.nota_final','DESC')->limit('3')->get();

        $evalresult_peores = Evalresult::select('evalresults.nota_final','users.name', 'users.apellido')->join('users','users.id','=','evalresults.evaluado_id')->where('evalprocess_id',$evalprocess_id)->orderby('evalresults.nota_final','ASC')->limit('3')->get();

        $users = User::get();
        
        $avgarea = DB::select("SELECT area_id, AREA, AVG(nota) maximo FROM 
        (SELECT evalresults.id, evalresults.evalprocess_id,users.name, users.apellido, users.area_id, areas.area,evalresults.nota_final AS nota
        FROM evalresults 
        INNER JOIN users ON evalresults.evaluado_id = users.id INNER JOIN areas ON users.area_id = areas.id
        WHERE evalresults.evalprocess_id = $evalprocess->id
        ) AS resultados 
        GROUP BY area_id;");
        $avgarea = json_decode(json_encode($avgarea), true);
        $avg = [];
        $areaname = [];
        foreach ($avgarea as $key => $aarea) {
            array_push($avg, round($aarea["maximo"], 2));
            array_push($areaname, $aarea["area"]);
        }

        $numarea = DB::select("SELECT area_id, AREA, COUNT(*) numero FROM 
        (SELECT evalresults.id, evalresults.evalprocess_id,users.name, users.apellido, users.area_id, areas.area,evalresults.nota_final AS nota
        FROM evalresults 
        INNER JOIN users ON evalresults.evaluado_id = users.id INNER JOIN areas ON users.area_id = areas.id
        WHERE evalresults.evalprocess_id = $evalprocess->id
        ) AS resultados 
        GROUP BY area_id;");

        $numarea = json_decode(json_encode($numarea), true);
        $num = [];
        $narea = [];
        foreach ($numarea as $key => $numar) {
            array_push($num, $numar["numero"]);
            array_push($narea, $numar["area"]);
        }
        return view('reporteseval.seleccion', compact('users','num_evalprocess','evalprocess_id','evalprocess','evalasignacion','evalasignacion_finalizado','evalasignacion_pendientes','evalasignacion_no_conformes','evalasignacion_conformes','evalresult','evalresult_users','evalresult_mejores','evalresult_peores','avg','areaname','num','narea'));
    }
    
    public function create() {
        $evalprocess = Evalproce::orderBy('id','DESC')->get();
        $users = User::orderBy('apellido')->get();
        return view('reporteseval.create', compact('evalprocess','users'));
    }
    public function selectprocess(Request $request) {
        $evaluacion = false;
        $user_id = $request->input('select-funcionario');
        $evalprocess_id = $request->input('evalprocess_id');

        $user = User::find($user_id);
        $evalprocess = Evalproce::find($evalprocess_id);

        $evalresult = Evalresult::where('evalprocess_id', $evalprocess_id)
                                ->where('evaluado_id',$user_id)->get();

        if (count($evalresult)) {
            $evaluacion = true;
            $evalresult_id = $evalresult[0]->id;
            $evaldetailsresult = Evaldetailsresult::where('evalresult_id',$evalresult_id)->get();

            $evalxcomp = Evalxcomp::where('evalresult_id',$evalresult_id)->get();

            $asignacion = Assignment::where('evalprocess_id',$evalprocess_id)
                                    ->where('evaluado_id',$user_id)->limit(1)->get();

            // $pdf =Pdf::loadView('reporteseval.seleccionar', compact('evaluacion','user_id', 'evalprocess_id','user','evalprocess','evalresult','evaldetailsresult', 'evalxcomp'));
            // return $pdf->stream();
            $result_process = Evalresult::select('evalresults.nota_final','evalresults.evalprocess_id','users.name','users.apellido')->join('users','users.id','=','evalresults.evaluado_id')->where('evaluado_id',$user_id)->get();

            return view('reporteseval.seleccionar', compact('evaluacion','user_id', 'evalprocess_id','user','evalprocess','evalresult','evaldetailsresult', 'evalxcomp','asignacion','result_process'));
        } else {
            return view('reporteseval.seleccionar', compact('evaluacion','user_id', 'evalprocess_id','user'));
        }
    }

    // public function getForm(Request $request) {
    //     // $nivel_id = $request->input('nivel_id');
    //     // $nivel_info = Nivele::find($nivel_id);
    //     // $evalprocess_id = $request->input('evalprocess_id');
    //     // $evalprocess = Evalproce::find($evalprocess_id);
    //     // $cargo = $request->input('cargo');
    //     // $user_id = $request->input('user_id');
    //     // $user = User::find($user_id);
    //     // $competencias = Competencia::where('competencias', '!=', 'COMPETENCIAS PARA CONFIRMACIÓN')->get();
    //     // $numeracion = 0;

    //     // $evalresult = Evalresult::where('evalprocess_id',$evalprocess_id)
    //     //                 ->where('evaluado_id', $user_id)
    //     //                 ->get();

    //     // foreach ($evalresult as $result) {
    //     //     $result_id = $result->id;
    //     //     $result_fortalezas = $result->fortalezas;
    //     //     $result_debilidades = $result->debilidades;
    //     //     $result_comentarios_evaluador = $result->comentarios_evaluador;
    //     //     $result_comentarios_evaluado = $result->comentarios_evaluado;
    //     //     $result_propuestas = $result->propuestas;
    //     //     $result_nota_final = $result->nota_final;
    //     // }
    //     // $evaldetailsresult = Evaldetailsresult::where('evalresult_id' ,$result_id)
    //     //                     ->get();

    //     // // DATOS JEFE
    //     // $relacion = Jerarquia::where('cargo_dependiente',$user->id_cargo)->get();
    //     // $cargo_jefe = $relacion[0]->cargo_jefe;
    //     // $user_jefe = User::where('id_cargo',$cargo_jefe)->get();

    //     // $asignacion = Assignment::where('evalprocess_id', $evalprocess_id)
    //     //                         ->where('evaluado_id', $user_id)->get();
    //     // return view('reporteseval.getForm', compact('nivel_id','nivel_info','evalprocess_id','evalprocess','cargo','competencias','numeracion','evalresult', 'evaldetailsresult','result_id', 'result_fortalezas', 'result_debilidades', 'result_comentarios_evaluador','result_comentarios_evaluado', 'result_propuestas', 'result_nota_final','user','relacion','cargo_jefe','user_jefe','asignacion'));



    //     $user_id = $request->input('user_id');
    //     $nivel_id = $request->input('nivel_id');
    //     $nivel_info = Nivele::find($nivel_id);
    //     $evalprocess_id = $request->input('evalprocess_id');
    //     $evalprocess = Evalproce::find($evalprocess_id);
    //     $cargo = $request->input('cargo');
    //     $user = User::find($user_id);
    //     // $competencias = Competencia::where('competencias', '!=', 'COMPETENCIAS PARA CONFIRMACIÓN')->get();
    //     $numeracion = 0;

    //     $evalresult = Evalresult::where('evalprocess_id',$evalprocess_id)
    //                     ->where('evaluado_id', $user_id)
    //                     ->get();

    //     foreach ($evalresult as $result) {
    //         $result_id = $result->id;
    //         $result_fortalezas = $result->fortalezas;
    //         $result_debilidades = $result->debilidades;
    //         $result_comentarios_evaluador = $result->comentarios_evaluador;
    //         $result_comentarios_evaluado = $result->comentarios_evaluado;
    //         $result_propuestas = $result->propuestas;
    //         $result_nota_final = $result->nota_final;
    //     }
    //     $evaldetailsresult = Evaldetailsresult::where('evalresult_id' ,$result_id)
    //                         ->orderBy('factor')
    //                         ->get();

    //     $competencias = array();
    //     foreach ($evaldetailsresult as $detalles) {
    //         array_push($competencias, $detalles->competencia);
    //     };
    //     $competencias = array_unique($competencias);

    //     // NOTAS POR COMPETENCIAS
    //     $result_competencias = Evalxcomp::where('evalresult_id' ,$result_id)
    //                             ->get();

    //     // DATOS JEFE
    //     $relacion = Jerarquia::where('cargo_dependiente',$user->id_cargo)->get();
    //     $cargo_jefe = $relacion[0]->cargo_jefe;
    //     $user_jefe = User::where('id_cargo',$cargo_jefe)->get();

    //     $asignacion = Assignment::where('evalprocess_id', $evalprocess_id)
    //                             ->where('evaluado_id', $user_id)->get();


    //     return view('genform.formResult', compact('nivel_id','nivel_info','evalprocess_id','evalprocess','cargo','competencias','numeracion','evalresult', 'evaldetailsresult','result_id', 'result_fortalezas', 'result_debilidades', 'result_comentarios_evaluador','result_comentarios_evaluado', 'result_propuestas', 'result_nota_final', 'result_competencias','user','relacion','cargo_jefe','user_jefe','asignacion'));
    // }

}
