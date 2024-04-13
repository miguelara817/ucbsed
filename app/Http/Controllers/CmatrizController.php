<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use App\Models\Conformmodel;
use App\Models\Factor;
use App\Models\Nivele;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CmatrizController extends Controller
{
    public function index() {
        $versiones = Conformmodel::orderBy('id', 'DESC')->paginate(10);
        return view('cmatriz.index', compact('versiones'))
            ->with('i', (request()->input('page', 1) - 1) * $versiones->perPage());
    }

    public function create() {
        $numeracion = 0;
        $competencias = Competencia::where('competencias','COMPETENCIAS PARA CONFIRMACIÓN')->get();
        $factores = Factor::get();
        $nivel = Nivele::get();
        return view('cmatriz.create', compact('numeracion','competencias', 'factores','nivel'));
    }

    public function setdata(Request $request) {
        $creador = $request->input('creador');
        $descripcion = $request->input('descripcion');
        $competencias = Competencia::where('competencias','COMPETENCIAS PARA CONFIRMACIÓN')->get();
       

        $numejecutivo = 0;
        $ejecutivo = array();
        $factors_ejecutivo = $request->input('ejecutivo');
        if ($factors_ejecutivo) {
            foreach ($factors_ejecutivo as $factorid) {
                $factores_ejec = Factor::find(intval($factorid));
                array_push($ejecutivo, $factores_ejec);
            }
        }

        $nummedio= 0;
        $medio = array();
        $factors_medios = $request->input('medios');
        if ($factors_medios) {
            foreach ($factors_medios as $factorid) {
                $factores_med = Factor::find(intval($factorid));
                array_push($medio, $factores_med);
            }
        }

        $numprofesional = 0;
        $profesional = array();
        $factors_profesional = $request->input('profesional');
        if ($factors_profesional) {
            foreach ($factors_profesional as $factorid) {
                $factores_pr = Factor::find(intval($factorid));
                array_push($profesional, $factores_pr);
            }
        }

        
        $numtecnico = 0;
        $tecnico = array();
        $factors_tecnico = $request->input('tecnico');
        if ($factors_tecnico) {
            foreach ($factors_tecnico as $factorid) {
                $factores_tc = Factor::find(intval($factorid));
                array_push($tecnico, $factores_tc);
            }
        }

        $numadministrativo = 0;
        $administrativo = array();
        $factors_administrativo = $request->input('administrativo');
        if ($factors_administrativo) {
            foreach ($factors_administrativo as $factorid) {
                $factores_adm = Factor::find(intval($factorid));
                array_push($administrativo, $factores_adm);
            }
        }

        $numauxiliar= 0;
        $auxiliar = array();
        $factors_auxiliar = $request->input('auxiliar');
        if ($factors_auxiliar) {
            foreach ($factors_auxiliar as $factorid) {
                $factores_aux = Factor::find(intval($factorid));
                array_push($auxiliar, $factores_aux);
            }
        }

        return view('cmatriz.setdata',compact('creador','descripcion','competencias','numejecutivo', 'factors_ejecutivo', 'ejecutivo', 'nummedio','factors_medios','medio', 'numprofesional', 'factors_profesional', 'profesional', 'numtecnico','factors_tecnico', 'tecnico', 'numadministrativo', 'factors_administrativo', 'administrativo', 'numauxiliar', 'factors_auxiliar', 'auxiliar'));
    }

    public function recieve(Request $request) {
        $creador = $request->input('creador');
        $descripcion = $request->input('descripcion');

        // NIVEL EJECUTIVO
        $factores_ejecutivo = $request->input('factores_ejecutivo');
        $p_ejecutivo = array();
        $ponderadoresejecutivo = array();
        // $competencias = Competencia::all();
        $competencias = Competencia::where('competencias','COMPETENCIAS PARA CONFIRMACIÓN')
                        ->get();
        foreach ($competencias as $competencia) {
            $ponderadoresejecutivo = $request->input('ejecutivo' . strval($competencia->id));
            if (!($ponderadoresejecutivo==NULL)) {
                $ponderadoresejecutivo = array_map('intval', $ponderadoresejecutivo);
                foreach ($ponderadoresejecutivo as $pnd) {
                    array_push($p_ejecutivo, $pnd);
                }
                if (array_sum($ponderadoresejecutivo) != 100) {
                    // Si no suma 100
                    $p_ejecutivo = array_diff($p_ejecutivo, $p_ejecutivo); 
                    return view('cmatriz.error');
                }
            } 
        }

        // NIVEL MANDOS MEDIOS
        $factores_medio = $request->input('factores_medio');
        $p_medio = array();
        $ponderadoresmedios = array();
    
        foreach ($competencias as $competencia) {
            $ponderadoresmedios = $request->input('medio' . strval($competencia->id));
            if (!($ponderadoresmedios==NULL)) {
                $ponderadoresmedios = array_map('intval', $ponderadoresmedios);
                foreach ($ponderadoresmedios as $pnd) {
                    array_push($p_medio, $pnd);
                }
                if (array_sum($ponderadoresmedios) != 100) {
                    // Si no suma 100
                    $p_medio = array_diff($p_medio, $p_medio); 
                    return view('cmatriz.error');
                }
            } continue;    
        }
        // NIVEL OPERATIVO PROFESIONAL
        $factores_profesional = $request->input('factores_profesional');
        $p_profesional = array();
        $ponderadoresprofesional = array();
        foreach ($competencias as $competencia) {
            $ponderadoresprofesional = $request->input('profesional' . strval($competencia->id));
            if (!($ponderadoresprofesional==NULL)) {
                $ponderadoresprofesional = array_map('intval', $ponderadoresprofesional);
                foreach ($ponderadoresprofesional as $pnd) {
                    array_push($p_profesional, $pnd);
                }
                if (array_sum($ponderadoresprofesional) != 100) {
                    // Si no suma 100
                    $p_profesional = array_diff($p_profesional, $p_profesional); 
                    return view('cmatriz.error');
                }
            } continue;    
        }
        // NIVEL OPERATIVO TÉCNICO
        $factores_tecnico = $request->input('factores_tecnico');
        $p_tecnico = array();
        $ponderadorestecnico = array();
        foreach ($competencias as $competencia) {
            $ponderadorestecnico = $request->input('tecnico' . strval($competencia->id));
            if (!($ponderadorestecnico==NULL)) {
                $ponderadorestecnico = array_map('intval', $ponderadorestecnico);
                foreach ($ponderadorestecnico as $pnd) {
                    array_push($p_tecnico, $pnd);
                }
                if (array_sum($ponderadorestecnico) != 100) {
                    // Si no suma 100
                    $p_tecnico = array_diff($p_tecnico, $p_tecnico); 
                    return view('cmatriz.error');
                }
            } continue;    
        }
        // NIVEL OPERATIVO ADMINISTRATIVO
        $factores_administrativo = $request->input('factores_administrativo');
        $p_administrativo = array();
        $ponderadoresadministrativo = array();
        foreach ($competencias as $competencia) {
            $ponderadoresadministrativo = $request->input('administrativo' . strval($competencia->id));
            if (!($ponderadoresadministrativo==NULL)) {
                $ponderadoresadministrativo = array_map('intval', $ponderadoresadministrativo);
                foreach ($ponderadoresadministrativo as $pnd) {
                    array_push($p_administrativo, $pnd);
                }
                if (array_sum($ponderadoresadministrativo) != 100) {
                    // Si no suma 100
                    $p_administrativo = array_diff($p_administrativo, $p_administrativo); 
                    return view('cmatriz.error');
                }
            } continue;    
        }

        // NIVEL OPERATIVO AUXILIAR
        $factores_auxiliar = $request->input('factores_auxiliar');
        $p_auxiliar = array();
        $ponderadoresauxiliar = array();
 
        foreach ($competencias as $competencia) {
            $ponderadoresauxiliar = $request->input('auxiliar' . strval($competencia->id));
            if (!($ponderadoresauxiliar==NULL)) {
                $ponderadoresauxiliar = array_map('intval', $ponderadoresauxiliar);
                foreach ($ponderadoresauxiliar as $pnd) {
                    array_push($p_auxiliar, $pnd);
                }
                if (array_sum($ponderadoresauxiliar) != 100) {
                    // Si no suma 100
                    $p_auxiliar = array_diff($p_auxiliar, $p_auxiliar); 
                    return view('cmatriz.error');
                }
            } continue;    
        }

        // ALMACENAR EN LA BASE DE DATOS
        //----------------------------------------------------------------------
        $now = DB::raw('CURRENT_TIMESTAMP');
        DB::table('conformmodels')->insertGetId(
            [
              'creador' => $creador,
              'descripcion' => $descripcion,
              'created_at' => $now,
              'updated_at' => $now
            ]
        );

        $conformmodelid = DB::getPdo()->lastInsertId();


        // NIVEL EJECUTIVO
        if ($factores_ejecutivo) {
            foreach ($factores_ejecutivo as $id => $factores_ejecutivos) {
                $factores_ejec = Factor::find(intval($factores_ejecutivos));
                $factor = $factores_ejec["factor"];
                $descripcion = $factores_ejec["descripcion"];
                $ponderacion = $p_ejecutivo[$id];
                $now = DB::raw('CURRENT_TIMESTAMP');
                DB::table('cejecutivoforms')->insertGetId(
                    [
                      'conformmodel_id' => $conformmodelid,
                      'factor' => $factor,
                      'descripcion' => $descripcion,
                      'ponderacion' => $ponderacion,
                      'created_at' => $now,
                      'updated_at' => $now
                    ]
                );
            }
        }
        // NIVEL MANDOS MEDIOS
        if ($factores_medio) {
            foreach ($factores_medio as $id => $factores_medios) {
                $factores_med = Factor::find(intval($factores_medios));
                $factor = $factores_med["factor"];
                $descripcion = $factores_med["descripcion"];
                $ponderacion = $p_medio[$id];
                $now = DB::raw('CURRENT_TIMESTAMP');
                DB::table('cmediosforms')->insertGetId(
                    [
                      'conformmodel_id' => $conformmodelid,
                      'factor' => $factor,
                      'descripcion' => $descripcion,
                      'ponderacion' => $ponderacion,
                      'created_at' => $now,
                      'updated_at' => $now
                    ]
                );
            }
        }
        // NIVEL OPERATIVO PROFESIONAL
        if ($factores_profesional) {
            foreach ($factores_profesional as $id => $factores_profesionals) {
                $factores_pr = Factor::find(intval($factores_profesionals));
                $factor = $factores_pr["factor"];
                $descripcion = $factores_pr["descripcion"];
                $ponderacion = $p_profesional[$id];
                $now = DB::raw('CURRENT_TIMESTAMP');
                DB::table('cprofesionalforms')->insertGetId(
                    [
                      'conformmodel_id' => $conformmodelid,
                      'factor' => $factor,
                      'descripcion' => $descripcion,
                      'ponderacion' => $ponderacion,
                      'created_at' => $now,
                      'updated_at' => $now
                    ]
                );
            }
        }
        // NIVEL OPERATIVO TECNICO
        if ($factores_tecnico) {
            foreach ($factores_tecnico as $id => $factores_tecnicos) {
                $factores_tec = Factor::find(intval($factores_tecnicos));
                $factor = $factores_tec["factor"];
                $descripcion = $factores_tec["descripcion"];
                $ponderacion = $p_tecnico[$id];
                $now = DB::raw('CURRENT_TIMESTAMP');
                DB::table('ctecnicoforms')->insertGetId(
                    [
                      'conformmodel_id' => $conformmodelid,
                      'factor' => $factor,
                      'descripcion' => $descripcion,
                      'ponderacion' => $ponderacion,
                      'created_at' => $now,
                      'updated_at' => $now
                    ]
                );
            }
        }
        // NIVEL OPERATIVO ADMINISTRATIVO
        if ($factores_administrativo) {
            foreach ($factores_administrativo as $id => $factores_administrativos) {
                $factores_adm = Factor::find(intval($factores_administrativos));
                $factor = $factores_adm["factor"];
                $descripcion = $factores_adm["descripcion"];
                $ponderacion = $p_administrativo[$id];
                $now = DB::raw('CURRENT_TIMESTAMP');
                DB::table('cadministrativoforms')->insertGetId(
                    [
                      'conformmodel_id' => $conformmodelid,
                      'factor' => $factor,
                      'descripcion' => $descripcion,
                      'ponderacion' => $ponderacion,
                      'created_at' => $now,
                      'updated_at' => $now
                    ]
                );
            }
        }
        // NIVEL OPERATIVO AUXILIAR
        if ($factores_auxiliar) {
            foreach ($factores_auxiliar as $id => $factores_auxiliars) {
                $factores_aux = Factor::find(intval($factores_auxiliars));
                $factor = $factores_aux["factor"];
                $descripcion = $factores_aux["descripcion"];
                $ponderacion = $p_auxiliar[$id];
                $now = DB::raw('CURRENT_TIMESTAMP');
                DB::table('cauxiliarforms')->insertGetId(
                    [
                      'conformmodel_id' => $conformmodelid,
                      'factor' => $factor,
                      'descripcion' => $descripcion,
                      'ponderacion' => $ponderacion,
                      'created_at' => $now,
                      'updated_at' => $now
                    ]
                );
            }
        }
        
        return redirect()->route('cmatriz.index')
            ->with('success', 'Versión creada exitosamente.');
    }

    public function show($id) {
        $competencias = Competencia::where('competencias','COMPETENCIAS PARA CONFIRMACIÓN')->get();
        $version = Conformmodel::find($id);
        $counter = 1;
        $numejecutivo = 0;
        $factorjecutivo = DB::table('cejecutivoforms')
                        ->where("conformmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();

        $nummedio = 0;
        $factormedios = DB::table('cmediosforms')
                        ->where("conformmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();

        $numprofesional = 0;
        $factorprofesional = DB::table('cprofesionalforms')
                        ->where("conformmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();

        $numtecnico = 0;
        $factortecnico = DB::table('ctecnicoforms')
                        ->where("conformmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();

        $numadministrativo = 0;
        $factoradministrativo = DB::table('cadministrativoforms')
                        ->where("conformmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();

        $numauxiliar = 0;
        $factorauxiliar = DB::table('cauxiliarforms')
                        ->where("conformmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
             
        return view('cmatriz.show', compact('version','counter','competencias','factorjecutivo','numejecutivo','factormedios','nummedio','factorprofesional','numprofesional','factortecnico','numtecnico','factoradministrativo', 'numadministrativo','factorauxiliar', 'numauxiliar'));
    }

    public function pdfprint($id) {
        // $competencia = Competencia::all();
        // $competencias = Competencia::where('competencias','COMPETENCIAS PARA CONFIRMACIÓN')->get();
        $version = Conformmodel::find($id);
        $counter = 1;
        $numejecutivo = 0;
        $factorjecutivo = DB::table('cejecutivoforms')
                        ->where("conformmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();

        $nummedio = 0;
        $factormedios = DB::table('cmediosforms')
                        ->where("conformmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();

        $numprofesional = 0;
        $factorprofesional = DB::table('cprofesionalforms')
                        ->where("conformmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();

        $numtecnico = 0;
        $factortecnico = DB::table('ctecnicoforms')
                        ->where("conformmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();

        $numadministrativo = 0;
        $factoradministrativo = DB::table('cadministrativoforms')
                        ->where("conformmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();

        $numauxiliar = 0;
        $factorauxiliar = DB::table('cauxiliarforms')
                        ->where("conformmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
        
        $pdf =Pdf::loadView('cmatriz.print', compact('version','counter','factorjecutivo','numejecutivo','factormedios','nummedio','factorprofesional','numprofesional','factortecnico','numtecnico','factoradministrativo', 'numadministrativo','factorauxiliar', 'numauxiliar'))
        ->setPaper('letter');
        return $pdf->stream();

        // return view('cmatriz.print', compact('version','counter','factorjecutivo','numejecutivo','factormedios','nummedio','factorprofesional','numprofesional','factortecnico','numtecnico','factoradministrativo', 'numadministrativo','factorauxiliar', 'numauxiliar'));
    }

    public function print() {
        $num_versiones = 0;
        $versiones = Conformmodel::orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('cmatriz.printIndex', compact('num_versiones', 'versiones'))
                ->setPaper('letter');
        return $pdf->stream();
        // return view('cmatriz.printIndex', compact('num_versiones', 'versiones'));
    }
}
