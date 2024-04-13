<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Competencia;
use App\Models\Factor;
use App\Models\Formmodel;
use App\Models\Nivele;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class MatrizController extends Controller
{

    public function index()
    {
        $versiones = Formmodel::orderBy('id', 'DESC')->paginate(10);

        return view('matriz.index', compact('versiones'))
            ->with('i', (request()->input('page', 1) - 1) * $versiones->perPage());
    }

    public function create()
    {
        $tipo = Tipo::get();
        $nivel = Nivele::get();
        $factor = Factor::join('competencias', 'competencias.id', '=', 'factors.competencia_id')
                    ->orderBy('competencia_id')
                    ->get(['factors.id', 'factors.factor', 'factors.descripcion', 'competencias.competencias']);
        // $competencia = Competencia::all(); 'to_be_used_by_user_id', '!=' , 2
        $competencia = Competencia::where('competencias', '!=', 'COMPETENCIAS PARA CONFIRMACIÓN')->get();
        $numeracion = 1;
        return view('matriz.create',compact('tipo','nivel','factor','competencia','numeracion'));
    }


    
    public function setdata(Request $request) {
        $creador = $request->input('creador');
        $descripcion = $request->input('descripcion');
        $tipo_formulario = $request->input('tipo');
        $tipo_id = intval($tipo_formulario);

        // $competencia = Competencia::all();
        $competencia = Competencia::where('competencias', '!=', 'COMPETENCIAS PARA CONFIRMACIÓN')->get();
        
        $competencias_ejecutivo = array();
        $numejecutivo = 0;
        $ejecutivo = array();
        $factors_ejecutivo = $request->input('ejecutivo');
        if ($factors_ejecutivo) {
            foreach ($factors_ejecutivo as $factorid) {
                $factores_ejec = Factor::find(intval($factorid));
                array_push($ejecutivo, $factores_ejec);
                array_push($competencias_ejecutivo, ['id' => $factores_ejec->competencia_id, 'competencia' => $factores_ejec->competencia->competencias]);
            }
        }
        
        // foreach ($factors_ejecutivo as $ejecutivo) {
        //     array_push($competencias_ejecutivo, $ejecutivo->competencia);
        // };

        // $competencias_ejecutivo = array_unique($competencias_ejecutivo);


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

        return view('matriz.setdata',compact('creador','descripcion','tipo_formulario','numejecutivo', 'competencia', 'factors_ejecutivo', 'ejecutivo', 'competencias_ejecutivo', 'nummedio','factors_medios','medio', 'numprofesional', 'factors_profesional', 'profesional', 'numtecnico','factors_tecnico', 'tecnico', 'numadministrativo', 'factors_administrativo', 'administrativo', 'numauxiliar', 'factors_auxiliar', 'auxiliar'));
    }

    // ------------------------------------------------------------------------//
    // --------------------------RECEPCION DE DATOS----------------------------//
    //-------------------------------------------------------------------------//

    public function recieve(Request $request) {
        // Datos generales
        $creador = $request->input('creador');
        $descripcion = $request->input('descripcion');
        $tipo_formulario = $request->input('tipo_formulario');
        $tipo_id = intval($tipo_formulario);

        // NIVEL EJECUTIVO
        $factores_ejecutivo = $request->input('factores_ejecutivo');
        $p_ejecutivo = array();
        $ponderadoresejecutivo = array();
        // $competencias = Competencia::all();
        $competencias = Competencia::where('competencias', '!=', 'COMPETENCIAS PARA CONFIRMACIÓN')->get();
        foreach ($competencias as $competencia) {
            // array_push($ponderadores, $competencia->id);
            // array_push($ponderadores, ($competencia->id)); 
            // array_push($ponderadores, $request->input('competencia' . strval($competencia->id)));
            $ponderadoresejecutivo = $request->input('ejecutivo' . strval($competencia->id));
            if (!($ponderadoresejecutivo==NULL)) {
                $ponderadoresejecutivo = array_map('intval', $ponderadoresejecutivo);
                foreach ($ponderadoresejecutivo as $pnd) {
                    array_push($p_ejecutivo, $pnd);
                }
                if (array_sum($ponderadoresejecutivo) != 100) {
                    // Si no suma 100
                    $p_ejecutivo = array_diff($p_ejecutivo, $p_ejecutivo); 
                    return view('matriz.error');
                }
            } 
        }

        // NIVEL MANDOS MEDIOS
        $factores_medio = $request->input('factores_medio');
        $p_medio = array();
        $ponderadoresmedios = array();
        $competencias = Competencia::all();
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
                    return view('matriz.error');
                }
            } continue;    
        }
        // NIVEL OPERATIVO PROFESIONAL
        $factores_profesional = $request->input('factores_profesional');
        $p_profesional = array();
        $ponderadoresprofesional = array();
        $competencias = Competencia::all();
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
                    return view('matriz.error');
                }
            } continue;    
        }


        // NIVEL OPERATIVO TÉCNICO
        $factores_tecnico = $request->input('factores_tecnico');
        $p_tecnico = array();
        $ponderadorestecnico = array();
        $competencias = Competencia::all();
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
                    return view('matriz.error');
                }
            } continue;    
        }
        // NIVEL OPERATIVO ADMINISTRATIVO
        $factores_administrativo = $request->input('factores_administrativo');
        $p_administrativo = array();
        $ponderadoresadministrativo = array();
        $competencias = Competencia::all();
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
                    return view('matriz.error');
                }
            } continue;    
        }

        // NIVEL OPERATIVO AUXILIAR
        $factores_auxiliar = $request->input('factores_auxiliar');
        $p_auxiliar = array();
        $ponderadoresauxiliar = array();
        $competencias = Competencia::all();
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
                    return view('matriz.error');
                }
            } continue;    
        }

        // ALMACENAR EN LA BASE DE DATOS
        //----------------------------------------------------------------------
        $now = DB::raw('CURRENT_TIMESTAMP');
        DB::table('formmodels')->insertGetId(
            [
              'creador' => $creador,
              'descripcion' => $descripcion,
            //   'tipo_id' => $tipo_id,
              'created_at' => $now,
              'updated_at' => $now
            ]
        );

        $formmodelid = DB::getPdo()->lastInsertId();
        /* ---- Insercion de datos a las tablas de niveles -----*/
        // NIVEL EJECUTIVO
        if ($factores_ejecutivo) {
            foreach ($factores_ejecutivo as $id => $factores_ejecutivos) {
                $factores_ejec = Factor::find(intval($factores_ejecutivos));
                $factor = $factores_ejec["factor"];
                $descripcion = $factores_ejec["descripcion"];
                $competencia = ($factores_ejec->competencia)["competencias"];
                $ponderacion = $p_ejecutivo[$id];
                $now = DB::raw('CURRENT_TIMESTAMP');
                DB::table('ejecutivoforms')->insertGetId(
                    [
                      'formmodel_id' => $formmodelid,
                      'factor' => $factor,
                      'descripcion' => $descripcion,
                      'competencia' => $competencia,
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
                $competencia = ($factores_med->competencia)["competencias"];
                $ponderacion = $p_medio[$id];
                $now = DB::raw('CURRENT_TIMESTAMP');
                DB::table('mediosforms')->insertGetId(
                    [
                      'formmodel_id' => $formmodelid,
                      'factor' => $factor,
                      'descripcion' => $descripcion,
                      'competencia' => $competencia,
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
                $competencia = ($factores_pr->competencia)["competencias"];
                $ponderacion = $p_profesional[$id];
                $now = DB::raw('CURRENT_TIMESTAMP');
                DB::table('profesionalforms')->insertGetId(
                    [
                      'formmodel_id' => $formmodelid,
                      'factor' => $factor,
                      'descripcion' => $descripcion,
                      'competencia' => $competencia,
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
                $competencia = ($factores_tec->competencia)["competencias"];
                $ponderacion = $p_tecnico[$id];
                $now = DB::raw('CURRENT_TIMESTAMP');
                DB::table('tecnicoforms')->insertGetId(
                    [
                      'formmodel_id' => $formmodelid,
                      'factor' => $factor,
                      'descripcion' => $descripcion,
                      'competencia' => $competencia,
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
                $competencia = ($factores_adm->competencia)["competencias"];
                $ponderacion = $p_administrativo[$id];
                $now = DB::raw('CURRENT_TIMESTAMP');
                DB::table('administrativoforms')->insertGetId(
                    [
                      'formmodel_id' => $formmodelid,
                      'factor' => $factor,
                      'descripcion' => $descripcion,
                      'competencia' => $competencia,
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
                $competencia = ($factores_aux->competencia)["competencias"];
                $ponderacion = $p_auxiliar[$id];
                $now = DB::raw('CURRENT_TIMESTAMP');
                DB::table('auxiliarforms')->insertGetId(
                    [
                      'formmodel_id' => $formmodelid,
                      'factor' => $factor,
                      'descripcion' => $descripcion,
                      'competencia' => $competencia,
                      'ponderacion' => $ponderacion,
                      'created_at' => $now,
                      'updated_at' => $now
                    ]
                );
            }
        }

        

        // return view('matriz.recieve', compact('competencia','creador','tipo_id','factores_ejecutivo', 'p_ejecutivo' ,'factores_medio', 'p_medio','factores_profesional' ,'p_profesional','factores_tecnico' ,'p_tecnico','factores_administrativo' ,'p_administrativo', 'factores_auxiliar','p_auxiliar'));
        return redirect()->route('matriz.index')
            ->with('success', 'Versión creada exitosamente.');
    }


    public function store(Request $request)
    {

        //----------------------------------------------------------------------
        // $creador = $request->input('creador');
        // $tipo_formulario = $request->input('tipo');
        // $tipo_id = intval($tipo_formulario);

        // $now = DB::raw('CURRENT_TIMESTAMP');
        // DB::table('formmodels')->insertGetId(
        //     [
        //       'creador' => $creador,
        //       'tipo_id' => $tipo_id,
        //       'created_at' => $now,
        //       'updated_at' => $now
        //     ]
        // );

        // $formmodelid = DB::getPdo()->lastInsertId();
        // /* ---- Insercion de datos a las tablas de niveles -----*/
        // $factors_ejecutivo = $request->input('ejecutivo');
        // if ($factors_ejecutivo) {
        //     foreach ($factors_ejecutivo as $factorid) {
        //         $factores_ejec = Factor::find(intval($factorid));
        //         $factor = $factores_ejec["factor"];
        //         $descripcion = $factores_ejec["descripcion"];
        //         $competencia = ($factores_ejec->competencia)["competencias"];
        //         $now = DB::raw('CURRENT_TIMESTAMP');
        //         DB::table('ejecutivoforms')->insertGetId(
        //             [
        //               'formmodel_id' => $formmodelid,
        //               'factor' => $factor,
        //               'descripcion' => $descripcion,
        //               'competencia' => $competencia,
        //               'created_at' => $now,
        //               'updated_at' => $now
        //             ]
        //         );
        //     }
        // }
        


        // $factors_administrativo = $request->input('administrativo');
        // // $factors_administrativo["nivel_id"] = 2;
        // if ($factors_administrativo) {
        //     foreach ($factors_administrativo as $factorid) {
        //         $factors_adm = Factor::find(intval($factorid));
        //         $factor = $factors_adm["factor"];
        //         $descripcion = $factors_adm["descripcion"];
        //         $competencia = ($factors_adm->competencia)["competencias"];
        //         $now = DB::raw('CURRENT_TIMESTAMP');
        //         DB::table('administrativoforms')->insertGetId(
        //             [
        //               'formmodel_id' => $formmodelid,
        //               'factor' => $factor,
        //               'descripcion' => $descripcion,
        //               'competencia' => $competencia,
        //               'created_at' => $now,
        //               'updated_at' => $now
        //             ]
        //         );
        //     }
        // }
        



        // $factors_medios = $request->input('medios');
        // // $factors_medios["nivel_id"] = 3;
        // if ($factors_medios) {
        //     foreach ($factors_medios as $factorid) {
        //         $factors_md = Factor::find(intval($factorid));
        //         $factor = $factors_md["factor"];
        //         $descripcion = $factors_md["descripcion"];
        //         $competencia = ($factors_md->competencia)["competencias"];
        //         $now = DB::raw('CURRENT_TIMESTAMP');
        //         DB::table('mediosforms')->insertGetId(
        //             [
        //               'formmodel_id' => $formmodelid,
        //               'factor' => $factor,
        //               'descripcion' => $descripcion,
        //               'competencia' => $competencia,
        //               'created_at' => $now,
        //               'updated_at' => $now
        //             ]
        //         );
        //     }
        // }
        

        // $factors_profesional = $request->input('profesional');
        // // $factors_profesional["nivel_id"] = 4;
        // if ($factors_profesional) {
        //     foreach ($factors_profesional as $factorid) {
        //         $factors_pr = Factor::find(intval($factorid));
        //         $factor = $factors_pr["factor"];
        //         $descripcion = $factors_pr["descripcion"];
        //         $competencia = ($factors_pr->competencia)["competencias"];
        //         $now = DB::raw('CURRENT_TIMESTAMP');
        //         DB::table('profesionalforms')->insertGetId(
        //             [
        //               'formmodel_id' => $formmodelid,
        //               'factor' => $factor,
        //               'descripcion' => $descripcion,
        //               'competencia' => $competencia,
        //               'created_at' => $now,
        //               'updated_at' => $now
        //             ]
        //         );
        //     }
        // }
        

        // $factors_tecnico = $request->input('tecnico');
        // // $factors_tecnico["nivel_id"] = 5;
        // if ($factors_tecnico) {
        //     foreach ($factors_tecnico as $factorid) {
        //         $factors_tc = Factor::find(intval($factorid));
        //         $factor = $factors_tc["factor"];
        //         $descripcion = $factors_tc["descripcion"];
        //         $competencia = ($factors_tc->competencia)["competencias"];
        //         $now = DB::raw('CURRENT_TIMESTAMP');
        //         DB::table('tecnicoforms')->insertGetId(
        //             [
        //               'formmodel_id' => $formmodelid,
        //               'factor' => $factor,
        //               'descripcion' => $descripcion,
        //               'competencia' => $competencia,
        //               'created_at' => $now,
        //               'updated_at' => $now
        //             ]
        //         );
        //     }
        // }
        

        // $factors_auxiliar = $request->input('auxiliar');
        // // $factors_auxiliar["nivel_id"] = 6;
        // if ($factors_auxiliar) {
        //     foreach ($factors_auxiliar as $factorid) {
        //         $factors_aux = Factor::find(intval($factorid));
        //         $factor = $factors_aux["factor"];
        //         $descripcion = $factors_aux["descripcion"];
        //         $competencia = ($factors_aux->competencia)["competencias"];
        //         $now = DB::raw('CURRENT_TIMESTAMP');
        //         DB::table('auxiliarforms')->insertGetId(
        //             [
        //               'formmodel_id' => $formmodelid,
        //               'factor' => $factor,
        //               'descripcion' => $descripcion,
        //               'competencia' => $competencia,
        //               'created_at' => $now,
        //               'updated_at' => $now
        //             ]
        //         );
        //     }
        // }
        

        // return redirect()->route('matriz.index')
        //     ->with('success', 'Version creada satisfactoriamente.');

        //----------------------------------------------------------------------
        
    }

    public function show($id)
    {
        // $competencia = Competencia::all();
        // $competencia = Competencia::where('competencias', '!=', 'COMPETENCIAS PARA CONFIRMACIÓN')->get();
        $version = Formmodel::find($id);
        $counter = 1;
        $numejecutivo = 0;
        $factorjecutivo = DB::table('ejecutivoforms')
                        ->where("formmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();

        $competencias_ejecutivo = array();
        foreach ($factorjecutivo as $ejecutivo) {
            array_push($competencias_ejecutivo, $ejecutivo->competencia);
        };

        $competencias_ejecutivo = array_unique($competencias_ejecutivo);
    

        $nummedio = 0;
        $factormedios = DB::table('mediosforms')
                        ->where("formmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_medios = array();
        foreach ($factormedios as $medio) {
            array_push($competencias_medios, $medio->competencia);
        };
        $competencias_medios = array_unique($competencias_medios);
                

        $numprofesional = 0;
        $factorprofesional = DB::table('profesionalforms')
                        ->where("formmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_profesional = array();
        foreach ($factorprofesional as $profesional) {
            array_push($competencias_profesional, $profesional->competencia);
        };
        $competencias_profesional = array_unique($competencias_profesional);

        $numtecnico = 0;
        $factortecnico = DB::table('tecnicoforms')
                        ->where("formmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_tecnico = array();
        foreach ($factortecnico as $tecnico) {
            array_push($competencias_tecnico, $tecnico->competencia);
        };
        $competencias_tecnico = array_unique($competencias_tecnico);


        $numadministrativo = 0;
        $factoradministrativo = DB::table('administrativoforms')
                        ->where("formmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_administrativo = array();
        foreach ($factoradministrativo as $administrativo) {
            array_push($competencias_administrativo, $administrativo->competencia);
        };
        $competencias_administrativo = array_unique($competencias_administrativo);


        $numauxiliar = 0;
        $factorauxiliar = DB::table('auxiliarforms')
                        ->where("formmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_auxiliar = array();
        foreach ($factorauxiliar as $auxiliar) {
            array_push($competencias_auxiliar, $auxiliar->competencia);
        };
        $competencias_auxiliar = array_unique($competencias_auxiliar);
             
        return view('matriz.show', compact('version','counter','factorjecutivo', 'competencias_ejecutivo','numejecutivo','factormedios','competencias_medios','nummedio','factorprofesional','competencias_profesional','numprofesional','factortecnico','competencias_tecnico','numtecnico','factoradministrativo', 'competencias_administrativo','numadministrativo','factorauxiliar', 'competencias_auxiliar','numauxiliar'));
    }

    public function pdfprint($id) {
        // $competencia = Competencia::all();
        // $competencia = Competencia::where('competencias', '!=', 'COMPETENCIAS PARA CONFIRMACIÓN')->get();
        $version = Formmodel::find($id);
        $counter = 1;
        $numejecutivo = 0;
        $factorjecutivo = DB::table('ejecutivoforms')
                        ->where("formmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_ejecutivo = array();
        foreach ($factorjecutivo as $ejecutivo) {
            array_push($competencias_ejecutivo, $ejecutivo->competencia);
        };
        $competencias_ejecutivo = array_unique($competencias_ejecutivo);

        $nummedio = 0;
        $factormedios = DB::table('mediosforms')
                        ->where("formmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_medios = array();
        foreach ($factormedios as $medio) {
            array_push($competencias_medios, $medio->competencia);
        };
        $competencias_medios = array_unique($competencias_medios);

        $numprofesional = 0;
        $factorprofesional = DB::table('profesionalforms')
                        ->where("formmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_profesional = array();
        foreach ($factorprofesional as $profesional) {
            array_push($competencias_profesional, $profesional->competencia);
        };
        $competencias_profesional = array_unique($competencias_profesional);


        $numtecnico = 0;
        $factortecnico = DB::table('tecnicoforms')
                        ->where("formmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_tecnico = array();
        foreach ($factortecnico as $tecnico) {
            array_push($competencias_tecnico, $tecnico->competencia);
        };
        $competencias_tecnico = array_unique($competencias_tecnico);

        $numadministrativo = 0;
        $factoradministrativo = DB::table('administrativoforms')
                        ->where("formmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_administrativo = array();
        foreach ($factoradministrativo as $administrativo) {
            array_push($competencias_administrativo, $administrativo->competencia);
        };
        $competencias_administrativo = array_unique($competencias_administrativo);

        $numauxiliar = 0;
        $factorauxiliar = DB::table('auxiliarforms')
                        ->where("formmodel_id", "=", $id)
                        ->orderBy('factor','ASC')
                        ->get();
        $competencias_auxiliar = array();
        foreach ($factorauxiliar as $auxiliar) {
            array_push($competencias_auxiliar, $auxiliar->competencia);
        };
        $competencias_auxiliar = array_unique($competencias_auxiliar);
        
        $pdf =Pdf::loadView('matriz.print', compact('version','counter','factorjecutivo','competencias_ejecutivo','numejecutivo','factormedios','competencias_medios','nummedio','factorprofesional','competencias_profesional','numprofesional','factortecnico','competencias_tecnico','numtecnico','factoradministrativo', 'competencias_administrativo','numadministrativo','factorauxiliar', 'competencias_auxiliar','numauxiliar'))
        ->setPaper('letter');
        return $pdf->stream();

        // ->setPaper('letter','landscape');

        // return view('matriz.print', compact('version','counter','competencia','factorjecutivo','numejecutivo','factormedios','nummedio','factorprofesional','numprofesional','factortecnico','numtecnico','factoradministrativo', 'numadministrativo','factorauxiliar', 'numauxiliar'));

    }

    public function print() {
        $num_versiones = 0;
        $versiones = Formmodel::orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('matriz.printIndex', compact('num_versiones', 'versiones'))
                ->setPaper('letter');
        return $pdf->stream();
        // return view('matriz.printIndex', compact('num_versiones', 'versiones'));
    }


    public function edit($id)
    {

    }

    public function update(Request $request)
    {
        //
    }


    public function destroy($id)
    {
       //
    }

}
