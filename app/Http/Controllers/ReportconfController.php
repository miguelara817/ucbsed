<?php

namespace App\Http\Controllers;

use App\Models\Confirmdetailsresult;
use App\Models\Confproce;
use App\Models\User;
use Illuminate\Http\Request;

class ReportconfController extends Controller
{
    public function index() {
        $procesos_confirmacion = false;
        $confprocess = Confproce::get();
        if (count($confprocess)) {
            $procesos_confirmacion = true;
            $num_confprocess = Confproce::count();

            $num_confprocess_finalizados = Confproce::where('finalizacion', 1)->count();
    
            $num_confprocess_pendientes = Confproce::where('finalizacion', 0)->count();
            $num_recomendados = Confproce::where('recomendado', 1)->count();
            $num_no_recomendados = Confproce::where('recomendado', 0)->count();

            $confprocess_users = Confproce::select('confproces.nota_final','users.name', 'users.apellido')->join('users', 'users.id','=','confproces.evaluado_id')->orderBy('users.apellido')->get();


            // $evalresult_users = Evalresult::select('evalresults.nota_final','users.name', 'users.apellido')->join('users', 'users.id','=','evalresults.evaluado_id')->where('evalprocess_id',$evalprocess_id)->orderby('users.apellido')->get();

            return view('reportesconf.index', compact('procesos_confirmacion','confprocess', 'num_confprocess','num_recomendados','num_no_recomendados', 'num_confprocess_finalizados','num_confprocess_pendientes','confprocess_users'));
        } else {
            return view('reportesconf.index', compact('procesos_confirmacion'));
        }
    }

    public function create() {
        // $evalprocess = Evalproce::get();
        $users = User::get();
        return view('reportesconf.create', compact('users'));
    }

    public function selectprocess(Request $request) {
        $user_id = $request->input('select-funcionario');
        $evaluacion = false;
        $confprocess = Confproce::where('evaluado_id',$user_id)->get()->last();

        if ($confprocess != NULL) {
            $evaluacion = true;
            $confirmdetailsresults = Confirmdetailsresult::where('confproces_id',$confprocess->id);
            $user = User::find($user_id);
            return view('reportesconf.seleccionar', compact('evaluacion','user_id','confprocess','user','confirmdetailsresults'));
        } else{

        } return view('reportesconf.seleccionar', compact('evaluacion','user_id','confprocess'));
    }

    // public function selectprocess(Request $request) {
    //     $evaluacion = false;
    //     $user_id = $request->input('select-funcionario');
    //     $evalprocess_id = $request->input('evalprocess_id');

    //     $user = User::find($user_id);
    //     $evalprocess = Evalproce::find($evalprocess_id);

    //     $evalresult = Evalresult::where('evalprocess_id', $evalprocess_id)
    //                             ->where('evaluado_id',$user_id)->get();
    //     if (count($evalresult)) {
    //         $evaluacion = true;
    //         $evalresult_id = $evalresult[0]->id;
    //         $evaldetailsresult = Evaldetailsresult::where('evalresult_id',$evalresult_id)->get();

    //         $evalxcomp = Evalxcomp::where('evalresult_id',$evalresult_id)->get();

    //         // $pdf =Pdf::loadView('reporteseval.seleccionar', compact('evaluacion','user_id', 'evalprocess_id','user','evalprocess','evalresult','evaldetailsresult', 'evalxcomp'));
    //         // return $pdf->stream();

    //         return view('reporteseval.seleccionar', compact('evaluacion','user_id', 'evalprocess_id','user','evalprocess','evalresult','evaldetailsresult', 'evalxcomp'));
    //     } else {
    //         return view('reporteseval.seleccionar', compact('evaluacion','user_id', 'evalprocess_id','user'));
    //     }
    // }
}
