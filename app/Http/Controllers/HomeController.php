<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Confirmassignment;
use App\Models\Confirmproce;
use App\Models\Confproce;
use App\Models\Confproces;
use App\Models\Evalproce;
use App\Models\Jcargo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $evalprocess = Evalproce::get()->last();
        // Si hay proceso de evaluación activo
        $proceso = false;
        $confproceso = false;
        
        if ($evalprocess!= NULL) {
            if (($evalprocess->finalizacion) == 0) {
                $proceso = true;
                $numusers = 0;
                $eval_texto_encabezado = $evalprocess->texto_encabezado;
                $eval_id = $evalprocess->id;
                $eval_form_version = $evalprocess->form_version_id;
                $eval_fecha_inicio = $evalprocess->fecha_inicio;
                $eval_fecha_conclusion = $evalprocess->fecha_conclusion;
                $eval_texto_instruccion = $evalprocess->texto_instruccion;
                
                $user_id = auth()->user()->id;
                // Si es el evaluador
                $evalassignments_evaluador = Assignment::where('evalprocess_id',$eval_id)
                                            ->where('evaluador_id',$user_id)->get();

                // si es el evaluado
                $evalassignments_evaluado = Assignment::where('evalprocess_id',$eval_id)
                                            ->where('evaluado_id',$user_id)->get();                
            }
            
        }

        // $confirmprocess = Confproce::where('evaluador_id', auth()->user()->id)
        //                             ->where('finalizacion', 0)->get();

        $confirmprocess = Confproce::where('evaluador_id', auth()->user()->id)
                                    ->get();
        if (count($confirmprocess)) {
            $confproceso = true;
        }

        // return view('home2', compact('evalprocess','proceso','numusers','evalassignments_evaluador','evalassignments_evaluado','eval_id','eval_form_version','eval_fecha_inicio','eval_fecha_conclusion','confirmprocess'));

        if ($proceso && !$confproceso) {
            // SOLO EVALUACIÓN
            return view('home2', compact('evalprocess','proceso','numusers','evalassignments_evaluador','evalassignments_evaluado','eval_texto_encabezado','eval_id','eval_form_version','eval_fecha_inicio', 'eval_texto_instruccion','eval_fecha_conclusion','confproceso','confirmprocess'));
        } elseif (!$proceso && $confproceso) {
            // SOLO CONFIRMACIÓN
            $numusers = 0;
            $evalassignments_evaluador = "";
            $evalassignments_evaluado = "";
            return view('home2', compact('numusers','proceso','confproceso','confirmprocess','evalassignments_evaluador','evalassignments_evaluado'));
        } elseif ($proceso && $confproceso) {
           // AMBOS
        //    $evalassignments_evaluador = "";
        //    $evalassignments_evaluado = "";
            $numusers = 0;
           return view('home2', compact('evalprocess','proceso','numusers','evalassignments_evaluador','evalassignments_evaluado', 'eval_texto_encabezado','eval_id','eval_form_version','eval_fecha_inicio','eval_fecha_conclusion', 'eval_texto_instruccion','confproceso','confirmprocess'));
        } else {
           // NINGUNO
           $evalassignments_evaluador = "";
           $evalassignments_evaluado = "";
           return view('home2', compact('proceso','confproceso','confirmprocess','evalassignments_evaluador','evalassignments_evaluado'));
        }
        

    }

}