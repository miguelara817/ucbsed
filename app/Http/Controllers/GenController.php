<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Assignment;
use App\Models\Competencia;
use App\Models\Confirmdetailsresult;
use App\Models\Confirmform;
use App\Models\Confproce;
use App\Models\Evaldetailsresult;
use App\Models\Evalproce;
use App\Models\Evalresult;
use App\Models\Evalxcomp;
use App\Models\Jerarquia;
use App\Models\Nivele;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GenController extends Controller
{
    public function generateForm(Request $request) {
        $version = $request->input('evalprocess_form_version');
        // $proceso = $request->input('proceso_id');
        
        $tipo_form = $request->input('tipo');
        $id_evaluado = $request->input('user_id');
        $nombre_evaluado = $request->input('name');
        $apellido_evaluado = $request->input('apellido');
        $cargo = $request->input('cargo');
        $nivel_id = $request->input('nivel');
        $fecha_inicio = $request->input('evalprocess_fecha_inicio');
        $fecha_conclusion = $request->input('evalprocess_fecha_conclusion');
        $evalprocess_id = $request->input('evalprocess_id');
        $eval_texto_encabezado = $request->input('eval_texto_encabezado');
        $eval_texto_instruccion = $request->input('eval_texto_instruccion');
        // $competencias = Competencia::all();
        // $competencias = Competencia::where('competencias', '!=', 'COMPETENCIAS PARA CONFIRMACIÓN')->get();
        $nivel_info = Nivele::find($nivel_id);
        $numeracion = 0;
        switch ($nivel_id) {
            case 1:
                $factores = DB::table('ejecutivoforms')
                            ->where('formmodel_id', '=', $version)
                            ->orderBy('factor')
                            ->get();
                // $factores = json_decode(json_encode($factores), true);
                $competencias = array();
                foreach ($factores as $ejecutivo) {
                    array_push($competencias, $ejecutivo->competencia);
                };
                $competencias = array_unique($competencias);
                
                break;
            case 2:
                $factores = DB::table('mediosforms')
                            ->where('formmodel_id', '=', $version)
                            ->orderBy('factor')
                            ->get();
                // $factores = json_decode(json_encode($factores), true);
                $competencias = array();
                foreach ($factores as $ejecutivo) {
                    array_push($competencias, $ejecutivo->competencia);
                };
                $competencias = array_unique($competencias);
                break;
            case 3:
                $factores = DB::table('profesionalforms')
                            ->where('formmodel_id', '=', $version)
                            ->orderBy('factor')
                            ->get();
                // $factores = json_decode(json_encode($factores), true);
                $competencias = array();
                foreach ($factores as $ejecutivo) {
                    array_push($competencias, $ejecutivo->competencia);
                };
                $competencias = array_unique($competencias);
                break;
            case 4:
                $factores = DB::table('tecnicoforms')
                            ->where('formmodel_id', '=', $version)
                            ->orderBy('factor')
                            ->get();
                // $factores = json_decode(json_encode($factores), true);
                $competencias = array();
                foreach ($factores as $ejecutivo) {
                    array_push($competencias, $ejecutivo->competencia);
                };
                $competencias = array_unique($competencias);
                break;
            case 5:
                $factores = DB::table('administrativoforms')
                            ->where('formmodel_id', '=', $version)
                            ->orderBy('factor')
                            ->get();
                // $factores = json_decode(json_encode($factores), true);
                $competencias = array();
                foreach ($factores as $ejecutivo) {
                    array_push($competencias, $ejecutivo->competencia);
                };
                $competencias = array_unique($competencias);
                break;
            default:
                $factores = DB::table('auxiliarforms')
                            ->where('formmodel_id', '=', $version)
                            ->orderBy('factor')
                            ->get();
                // $factores = json_decode(json_encode($factores), true);
                $competencias = array();
                foreach ($factores as $ejecutivo) {
                    array_push($competencias, $ejecutivo->competencia);
                };
                $competencias = array_unique($competencias);
        }
        
        return view('genform.generateForm',compact('numeracion','version','nivel_id','id_evaluado', 'fecha_inicio','fecha_conclusion','nombre_evaluado','apellido_evaluado','nivel_info','cargo','factores','competencias','evalprocess_id','eval_texto_encabezado','eval_texto_instruccion'));
    }

    public function recieveResults(Request $request) {
        $version_form = $request->input('version_form');
        $evalprocess_id = $request->input('evalprocess_id');
        $evaluado_id = $request->input('id_evaluado');
        
        // $name_evaluado = $request->input('name_evaluado');
        // $cargo_evaluado = $request->input('cargo_evaluado');

        $evaluador_id = $request->input('id_evaluador');
        
        $factores = $request->input('factor');
        $descripcion = $request->input('descripcion');

        $evaluado_nivel_id = $request->input('nivel_id');

        $fortalezas = $request->input('fortalezas');
        $debilidades = $request->input('debilidades');
        $comentarios_evaluador = $request->input('comentarios_evaluador');
        $propuestas = $request->input('propuestas');

        $evalresult = Evalresult::create(["evalprocess_id" => $evalprocess_id, 'evaluado_id' => $evaluado_id, 'evaluado_nivel_id' => $evaluado_nivel_id, 'evaluador_id' => $evaluador_id, 'fortalezas' => $fortalezas, 'debilidades' => $debilidades, 'comentarios_evaluador' => $comentarios_evaluador, 'propuestas' => $propuestas]);

        $evalresult_id = DB::getPdo()->lastInsertId();
        

        $notas_competencia = array();
        // $name_evaluador = $request->input('name_evaluador');
        // $cargo_evaluador = $request->input('cargo_evaluador');

        switch ($evaluado_nivel_id) {
            case 1:
                $factores = DB::table('ejecutivosforms')
                            ->where('formmodel_id', '=', $version_form)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                foreach ($factores as $id => $factor) {
                    $nota = $request->input($factor["id"]);
                    $ponderacion = $factor["ponderacion"];
                    $nota_ponderada = $nota/100 * $ponderacion;
                    $factor += ['nota' => $nota_ponderada];
                    
                    $comentario = $request->input('comentario'.$factor['id']);
                    $factor += ['comentario' => $comentario];

                    // array_push($detalles, [$factor]);
                    $evaldetailsresult = Evaldetailsresult::create(['evalresult_id' => $evalresult_id, 'factor' => $factor['factor'], 'descripcion' => $factor['descripcion'], 'competencia' => $factor['competencia'], 'ponderacion' => $factor['ponderacion'], 'nota' => $factor['nota'], 'comentario' => $factor['comentario']]);
                }

                $competencias = Competencia::get();
                foreach ($competencias as $competencia){
                    $evaldetailsresult = Evaldetailsresult::where('evalresult_id',$evalresult_id)
                                        ->where('competencia',$competencia->competencias)
                                        ->get();
                    if (count($evaldetailsresult) != 0) {
                        $nota_competencia = 0;
                        foreach ($evaldetailsresult as $result) {
                            $nota_competencia += $result->nota;
                        }
                        array_push($notas_competencia, ['n_factores' => count($evaldetailsresult), 'competencia' => $evaldetailsresult[0]->competencia, 'nota_competencia' => $nota_competencia]);
                    }
                    
                }
                break;
            case 2:
                $factores = DB::table('mediosforms')
                            ->where('formmodel_id', '=', $version_form)
                            ->get();
                $factores = json_decode(json_encode($factores), true);

                foreach ($factores as $id => $factor) {
                    $nota = $request->input($factor["id"]);
                    $ponderacion = $factor["ponderacion"];
                    $nota_ponderada = $nota/100 * $ponderacion;
                    $factor += ['nota' => $nota_ponderada];
                    
                    $comentario = $request->input('comentario'.$factor['id']);
                    $factor += ['comentario' => $comentario];

                    $evaldetailsresult = Evaldetailsresult::create(['evalresult_id' => $evalresult_id, 'factor' => $factor['factor'], 'descripcion' => $factor['descripcion'], 'competencia' => $factor['competencia'], 'ponderacion' => $factor['ponderacion'], 'nota' => $factor['nota'], 'comentario' => $factor['comentario']]);
                }

                $competencias = Competencia::get();
                foreach ($competencias as $competencia){
                    $evaldetailsresult = Evaldetailsresult::where('evalresult_id',$evalresult_id)
                                        ->where('competencia',$competencia->competencias)
                                        ->get();
                    if (count($evaldetailsresult) != 0) {
                        $nota_competencia = 0;
                        foreach ($evaldetailsresult as $result) {
                            $nota_competencia += $result->nota;

                        }
                        array_push($notas_competencia, ['n_factores' => count($evaldetailsresult), 'competencia' => $evaldetailsresult[0]->competencia, 'nota_competencia' => $nota_competencia]);
                    }
                    
                }
                break;
            case 3:
                $factores = DB::table('profesionalforms')
                            ->where('formmodel_id', '=', $version_form)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                
                foreach ($factores as $id => $factor) {
                    $nota = $request->input($factor["id"]);
                    $ponderacion = $factor["ponderacion"];
                    $nota_ponderada = $nota/100 * $ponderacion;
                    $factor += ['nota' => $nota_ponderada];
                    
                    $comentario = $request->input('comentario'.$factor['id']);
                    $factor += ['comentario' => $comentario];

                    $evaldetailsresult = Evaldetailsresult::create(['evalresult_id' => $evalresult_id, 'factor' => $factor['factor'], 'descripcion' => $factor['descripcion'], 'competencia' => $factor['competencia'], 'ponderacion' => $factor['ponderacion'], 'nota' => $factor['nota'], 'comentario' => $factor['comentario']]);
                }

                $competencias = Competencia::get();
                foreach ($competencias as $competencia){
                    $evaldetailsresult = Evaldetailsresult::where('evalresult_id',$evalresult_id)
                                        ->where('competencia',$competencia->competencias)
                                        ->get();
                    if (count($evaldetailsresult) != 0) {
                        $nota_competencia = 0;
                        foreach ($evaldetailsresult as $result) {
                            $nota_competencia += $result->nota;

                        }
                        array_push($notas_competencia, ['n_factores' => count($evaldetailsresult), 'competencia' => $evaldetailsresult[0]->competencia, 'nota_competencia' => $nota_competencia]);
                    }
                    
                }
                break;
            case 4:
                $factores = DB::table('tecnicoforms')
                            ->where('formmodel_id', '=', $version_form)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                foreach ($factores as $id => $factor) {
                    $nota = $request->input($factor["id"]);
                    $ponderacion = $factor["ponderacion"];
                    $nota_ponderada = $nota/100 * $ponderacion;
                    $factor += ['nota' => $nota_ponderada];
                    
                    $comentario = $request->input('comentario'.$factor['id']);
                    $factor += ['comentario' => $comentario];

                    $evaldetailsresult = Evaldetailsresult::create(['evalresult_id' => $evalresult_id, 'factor' => $factor['factor'], 'descripcion' => $factor['descripcion'], 'competencia' => $factor['competencia'], 'ponderacion' => $factor['ponderacion'], 'nota' => $factor['nota'], 'comentario' => $factor['comentario']]);
                }

                $competencias = Competencia::get();
                foreach ($competencias as $competencia){
                    $evaldetailsresult = Evaldetailsresult::where('evalresult_id',$evalresult_id)
                                        ->where('competencia',$competencia->competencias)
                                        ->get();
                    if (count($evaldetailsresult) != 0) {
                        $nota_competencia = 0;
                        foreach ($evaldetailsresult as $result) {
                            $nota_competencia += $result->nota;

                        }
                        array_push($notas_competencia, ['n_factores' => count($evaldetailsresult), 'competencia' => $evaldetailsresult[0]->competencia, 'nota_competencia' => $nota_competencia]);
                    }
                    
                }
                break;
            case 5:
                $factores = DB::table('administrativoforms')
                            ->where('formmodel_id', '=', $version_form)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                foreach ($factores as $id => $factor) {
                    $nota = $request->input($factor["id"]);
                    $ponderacion = $factor["ponderacion"];
                    $nota_ponderada = $nota/100 * $ponderacion;
                    $factor += ['nota' => $nota_ponderada];
                    
                    $comentario = $request->input('comentario'.$factor['id']);
                    $factor += ['comentario' => $comentario];

                    $evaldetailsresult = Evaldetailsresult::create(['evalresult_id' => $evalresult_id, 'factor' => $factor['factor'], 'descripcion' => $factor['descripcion'], 'competencia' => $factor['competencia'], 'ponderacion' => $factor['ponderacion'], 'nota' => $factor['nota'], 'comentario' => $factor['comentario']]);
                }

                $competencias = Competencia::get();
                foreach ($competencias as $competencia){
                    $evaldetailsresult = Evaldetailsresult::where('evalresult_id',$evalresult_id)
                                        ->where('competencia',$competencia->competencias)
                                        ->get();
                    if (count($evaldetailsresult) != 0) {
                        $nota_competencia = 0;
                        foreach ($evaldetailsresult as $result) {
                            $nota_competencia += $result->nota;

                        }
                        array_push($notas_competencia, ['n_factores' => count($evaldetailsresult), 'competencia' => $evaldetailsresult[0]->competencia, 'nota_competencia' => $nota_competencia]);
                    }
                    
                }
                break;
            default:
                $factores = DB::table('auxiliarforms')
                            ->where('formmodel_id', '=', $version_form)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                foreach ($factores as $id => $factor) {
                    $nota = $request->input($factor["id"]);
                    $ponderacion = $factor["ponderacion"];
                    $nota_ponderada = $nota/100 * $ponderacion;
                    $factor += ['nota' => $nota_ponderada];
                    
                    $comentario = $request->input('comentario'.$factor['id']);
                    $factor += ['comentario' => $comentario];

                    $evaldetailsresult = Evaldetailsresult::create(['evalresult_id' => $evalresult_id, 'factor' => $factor['factor'], 'descripcion' => $factor['descripcion'], 'competencia' => $factor['competencia'], 'ponderacion' => $factor['ponderacion'], 'nota' => $factor['nota'], 'comentario' => $factor['comentario']]);
                }

                $competencias = Competencia::get();
                foreach ($competencias as $competencia){
                    $evaldetailsresult = Evaldetailsresult::where('evalresult_id',$evalresult_id)
                                        ->where('competencia',$competencia->competencias)
                                        ->get();
                    if (count($evaldetailsresult) != 0) {
                        $nota_competencia = 0;
                        foreach ($evaldetailsresult as $result) {
                            $nota_competencia += $result->nota;

                        }
                        array_push($notas_competencia, ['n_factores' => count($evaldetailsresult), 'competencia' => $evaldetailsresult[0]->competencia, 'nota_competencia' => $nota_competencia]);
                    }
                    
                }

        }
        $promedio = 0;
        foreach ($notas_competencia as $key => $notas) {
            $promedio += $notas["nota_competencia"];
            $evalxcompetencia = Evalxcomp::create(['evalresult_id' => $evalresult_id, 'competencia' => $notas["competencia"], 'nota' => $notas["nota_competencia"]]);
        }
        $promedio = $promedio/(count($notas_competencia));

        $evalresult = Evalresult::find($evalresult_id);
        $evalresult->nota_final = $promedio;
        $evalresult->save();
 
        // Alamcenar notas por competencias
        



        // Actualizar banderas de estado
        $asignacion = Assignment::where('evalprocess_id', $evalprocess_id)
                        ->where('evaluador_id', $evaluador_id)
                        ->where('evaluado_id', $evaluado_id)
                        ->get();
        $asigancion_id = $asignacion[0]->id;
        $asignacion = Assignment::find($asigancion_id);
        $asignacion->evaluador_calificacion = 1;
        $asignacion->save();

        // return view('genform.recieveResults', compact('evalprocess_id','evaluado_id','evaluado_nivel_id','evaluador_id','factores','descripcion','promedio','notas_competencia','asignacion'));
        return redirect()->route('home2')
            ->with('Hecho', 'Calificación realizada con éxito');
    }

    public function bringbackForm(Request $request) {
        $asignacion_id = $request->input('assignment_id');
        $user_id = auth()->user()->id;
        $nombre = auth()->user()->name;
        $cargo = auth()->user()->cargo->cargo;

        $nivel_id = $request->input('nivel');
        $nivel_info = Nivele::find($nivel_id);

        $fecha_inicio = $request->input('evalprocess_fecha_inicio');
        $fecha_conclusion = $request->input('evalprocess_fecha_conclusion');
        $evalprocess_id = $request->input('evalprocess_id');

        $evalprocess_texto_encabezado = $request->input('evalprocess_texto_encabezado');
        $evalprocess_texto_instruccion = $request->input('evalprocess_texto_instruccion');

        $jefe_id = $request->input('jefe_id'); 
        $jefe_name = $request->input('jefe_name'); 
        $jefe_cargo = $request->input('jefe_cargo'); 
        
        $evalresult = Evalresult::where('evalprocess_id',$evalprocess_id)
                        ->where('evaluado_id', $user_id)
                        ->get();
        foreach ($evalresult as $result) {
            $result_id = $result->id;
            $result_fortalezas = $result->fortalezas;
            $result_debilidades = $result->debilidades;
            $result_comentarios_evaluador = $result->comentarios_evaluador;
            $result_propuestas = $result->propuestas;
            $result_nota_final = $result->nota_final;
        }
        $evaldetailsresult = Evaldetailsresult::where('evalresult_id' ,$result_id)
                            ->orderBy('factor') 
                            ->get();
        // $competencias = Competencia::get();
        // $competencias = Competencia::where('competencias', '!=', 'COMPETENCIAS PARA CONFIRMACIÓN')->get();

        $competencias = array();
        foreach ($evaldetailsresult as $detalles) {
            array_push($competencias, $detalles->competencia);
        };
        $competencias = array_unique($competencias);

        $numeracion = 0;

        return view('genform.bringbackForm', compact('asignacion_id', 'user_id', 'nombre', 'cargo', 'nivel_id', 'nivel_info', 'jefe_id', 'jefe_name', 'jefe_cargo', 'fecha_inicio', 'fecha_conclusion', 'evalprocess_id','evalprocess_texto_encabezado','evalprocess_texto_instruccion','numeracion', 'evalresult', 'evaldetailsresult', 'competencias','result_id', 'result_fortalezas', 'result_debilidades', 'result_comentarios_evaluador', 'result_propuestas', 'result_nota_final'));
    }

    public function recieveAnswer(Request $request) {
        $comentarios_evaluado = $request->input('comentarios_evaluado');
        $deacuerdo = $request->input('deacuerdo');

        $result_id = $request->input('result_id');

        $jefe_id = $request->input('jefe_id');
        $evalprocess_id = $request->input('evalprocess_id');
        $user_id = auth()->user()->id;

        $evalresult = Evalresult::find($result_id);
        $evalresult->comentarios_evaluado = $comentarios_evaluado;
        $evalresult->save();

        // Actualizar estado
        $asignacion = Assignment::where('evalprocess_id', $evalprocess_id)
                                ->where('evaluador_id', $jefe_id)
                                ->where('evaluado_id', $user_id)
                                ->get();
        $asignacion[0]->evaluado_calificacion = 1;
        $asignacion[0]->save();

        // CAMPO DEACUERDO
        if ($deacuerdo == 1) {
            $asignacion[0]->evaluado_deacuerdo = 1;
            $asignacion[0]->save();
        } else {
            $asignacion[0]->evaluado_deacuerdo = 0;
            $asignacion[0]->save();
        }
        

        //Actualizar finalización

        $evaluador_calificacion = $asignacion[0]->evaluador_calificacion;
        $evaluado_calificacion = $asignacion[0]->evaluado_calificacion;

        $finalizacion = $evaluador_calificacion && $evaluado_calificacion;

        $asignacion[0]->finalizacion = $finalizacion;
        $asignacion[0]->save();

        return redirect()->route('home2')
            ->with('Hecho', 'Calificación realizada con éxito');
    }

    public function recieveConfresult(Request $request) {
        $confproces_id = $request->input('confproces_id');
        $version_form = $request->input('version_form');
        // $evalprocess_id = $request->input('evalprocess_id');
        $evaluado_id = $request->input('id_evaluado');
        
        // $name_evaluado = $request->input('name_evaluado');
        // $cargo_evaluado = $request->input('cargo_evaluado');

        $evaluador_id = $request->input('id_evaluador');
        
        $factores = $request->input('factor');
        $descripcion = $request->input('descripcion');

        $evaluado_nivel_id = $request->input('nivel_id');

        $fortalezas = $request->input('fortalezas');
        $debilidades = $request->input('debilidades');
        $comentarios_evaluador = $request->input('comentarios_evaluador');
        $propuestas = $request->input('propuestas');

        $recomendado = $request->input('recomendado');

        $nota_final = 0;


        switch ($evaluado_nivel_id) {
            case 1:
                $factores = DB::table('cejecutivosforms')
                            ->where('conformmodel_id', '=', $version_form)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                foreach ($factores as $id => $factor) {
                    $nota = $request->input($factor["id"]);
                    $ponderacion = $factor["ponderacion"];
                    $nota_ponderada = $nota/100 * $ponderacion;
                    $factor += ['nota' => $nota_ponderada];
                    
                    $comentario = $request->input('comentario'.$factor['id']);
                    $factor += ['comentario' => $comentario];
        
                    // array_push($detalles, [$factor]);
                    $confirmdetailsresult = Confirmdetailsresult::create(['confproces_id' => $confproces_id, 'factor' => $factor['factor'], 'descripcion' => $factor['descripcion'], 'ponderacion' => $factor['ponderacion'], 'nota' => $factor['nota'], 'comentario' => $factor['comentario']]);
                }
                $confirmdetailsresult = Confirmdetailsresult::where('confproces_id',$confproces_id)
                                    ->get();
                if (count($confirmdetailsresult) != 0) {
                    // $nota_competencia = 0;
                    foreach ($confirmdetailsresult as $result) {
                        $nota_final += $result->nota;
                    }
                }

                $confresult = Confproce::find($confproces_id);
                $confresult->fortalezas = $fortalezas;
                $confresult->save();
                $confresult->debilidades = $debilidades;
                $confresult->save();
                $confresult->comentarios_evaluador = $comentarios_evaluador;
                $confresult->save();
                $confresult->propuestas = $propuestas;
                $confresult->save();
                $confresult->nota_final = $nota_final;
                $confresult->save();
                // RECOMENDACIÓN

                $confresult->recomendado = $recomendado;
                $confresult->save();
                $confresult->finalizacion = 1;
                $confresult->save();
                break;

            case 2:
                $factores = DB::table('cmediosforms')
                            ->where('conformmodel_id', '=', $version_form)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                foreach ($factores as $id => $factor) {
                    $nota = $request->input($factor["id"]);
                    $ponderacion = $factor["ponderacion"];
                    $nota_ponderada = $nota/100 * $ponderacion;
                    $factor += ['nota' => $nota_ponderada];
                    
                    $comentario = $request->input('comentario'.$factor['id']);
                    $factor += ['comentario' => $comentario];
        
                    // array_push($detalles, [$factor]);
                    $confirmdetailsresult = Confirmdetailsresult::create(['confproces_id' => $confproces_id, 'factor' => $factor['factor'], 'descripcion' => $factor['descripcion'], 'ponderacion' => $factor['ponderacion'], 'nota' => $factor['nota'], 'comentario' => $factor['comentario']]);
                }
                $confirmdetailsresult = Confirmdetailsresult::where('confproces_id',$confproces_id)
                                    ->get();
                if (count($confirmdetailsresult) != 0) {
                    // $nota_competencia = 0;
                    foreach ($confirmdetailsresult as $result) {
                        $nota_final += $result->nota;
                    }
                }

                $confresult = Confproce::find($confproces_id);
                $confresult->fortalezas = $fortalezas;
                $confresult->save();
                $confresult->debilidades = $debilidades;
                $confresult->save();
                $confresult->comentarios_evaluador = $comentarios_evaluador;
                $confresult->save();
                $confresult->propuestas = $propuestas;
                $confresult->save();
                $confresult->nota_final = $nota_final;
                $confresult->save();
                // RECOMENDACIÓN

                $confresult->recomendado = $recomendado;
                $confresult->save();
                $confresult->finalizacion = 1;
                $confresult->save();
                break;

            case 3:
                $factores = DB::table('cprofesionalforms')
                            ->where('conformmodel_id', '=', $version_form)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                foreach ($factores as $id => $factor) {
                    $nota = $request->input($factor["id"]);
                    $ponderacion = $factor["ponderacion"];
                    $nota_ponderada = $nota/100 * $ponderacion;
                    $factor += ['nota' => $nota_ponderada];
                    
                    $comentario = $request->input('comentario'.$factor['id']);
                    $factor += ['comentario' => $comentario];
        
                    // array_push($detalles, [$factor]);
                    $confirmdetailsresult = Confirmdetailsresult::create(['confproces_id' => $confproces_id, 'factor' => $factor['factor'], 'descripcion' => $factor['descripcion'], 'ponderacion' => $factor['ponderacion'], 'nota' => $factor['nota'], 'comentario' => $factor['comentario']]);
                }
                $confirmdetailsresult = Confirmdetailsresult::where('confproces_id',$confproces_id)
                                    ->get();
                if (count($confirmdetailsresult) != 0) {
                    // $nota_competencia = 0;
                    foreach ($confirmdetailsresult as $result) {
                        $nota_final += $result->nota;
                    }
                }

                $confresult = Confproce::find($confproces_id);
                $confresult->fortalezas = $fortalezas;
                $confresult->save();
                $confresult->debilidades = $debilidades;
                $confresult->save();
                $confresult->comentarios_evaluador = $comentarios_evaluador;
                $confresult->save();
                $confresult->propuestas = $propuestas;
                $confresult->save();
                $confresult->nota_final = $nota_final;
                $confresult->save();
                // RECOMENDACIÓN

                $confresult->recomendado = $recomendado;
                $confresult->save();
                $confresult->finalizacion = 1;
                $confresult->save();
                break;

            case 4:
                $factores = DB::table('ctecnicoforms')
                            ->where('conformmodel_id', '=', $version_form)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                foreach ($factores as $id => $factor) {
                    $nota = $request->input($factor["id"]);
                    $ponderacion = $factor["ponderacion"];
                    $nota_ponderada = $nota/100 * $ponderacion;
                    $factor += ['nota' => $nota_ponderada];
                    
                    $comentario = $request->input('comentario'.$factor['id']);
                    $factor += ['comentario' => $comentario];
        
                    // array_push($detalles, [$factor]);
                    $confirmdetailsresult = Confirmdetailsresult::create(['confproces_id' => $confproces_id, 'factor' => $factor['factor'], 'descripcion' => $factor['descripcion'], 'ponderacion' => $factor['ponderacion'], 'nota' => $factor['nota'], 'comentario' => $factor['comentario']]);
                }
                $confirmdetailsresult = Confirmdetailsresult::where('confproces_id',$confproces_id)
                                    ->get();
                if (count($confirmdetailsresult) != 0) {
                    // $nota_competencia = 0;
                    foreach ($confirmdetailsresult as $result) {
                        $nota_final += $result->nota;
                    }
                }

                $confresult = Confproce::find($confproces_id);
                $confresult->fortalezas = $fortalezas;
                $confresult->save();
                $confresult->debilidades = $debilidades;
                $confresult->save();
                $confresult->comentarios_evaluador = $comentarios_evaluador;
                $confresult->save();
                $confresult->propuestas = $propuestas;
                $confresult->save();
                $confresult->nota_final = $nota_final;
                $confresult->save();
                // RECOMENDACIÓN

                $confresult->recomendado = $recomendado;
                $confresult->save();
                $confresult->finalizacion = 1;
                $confresult->save();
                break;

            case 5:
                $factores = DB::table('cadministrativoforms')
                            ->where('conformmodel_id', '=', $version_form)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                foreach ($factores as $id => $factor) {
                    $nota = $request->input($factor["id"]);
                    $ponderacion = $factor["ponderacion"];
                    $nota_ponderada = $nota/100 * $ponderacion;
                    $factor += ['nota' => $nota_ponderada];
                    
                    $comentario = $request->input('comentario'.$factor['id']);
                    $factor += ['comentario' => $comentario];
        
                    // array_push($detalles, [$factor]);
                    $confirmdetailsresult = Confirmdetailsresult::create(['confproces_id' => $confproces_id, 'factor' => $factor['factor'], 'descripcion' => $factor['descripcion'], 'ponderacion' => $factor['ponderacion'], 'nota' => $factor['nota'], 'comentario' => $factor['comentario']]);
                }
                $confirmdetailsresult = Confirmdetailsresult::where('confproces_id',$confproces_id)
                                    ->get();
                if (count($confirmdetailsresult) != 0) {
                    // $nota_competencia = 0;
                    foreach ($confirmdetailsresult as $result) {
                        $nota_final += $result->nota;
                    }
                }

                $confresult = Confproce::find($confproces_id);
                $confresult->fortalezas = $fortalezas;
                $confresult->save();
                $confresult->debilidades = $debilidades;
                $confresult->save();
                $confresult->comentarios_evaluador = $comentarios_evaluador;
                $confresult->save();
                $confresult->propuestas = $propuestas;
                $confresult->save();
                $confresult->nota_final = $nota_final;
                $confresult->save();
                // RECOMENDACIÓN

                $confresult->recomendado = $recomendado;
                $confresult->save();
                $confresult->finalizacion = 1;
                $confresult->save();
                break;

            default:
                $factores = DB::table('cauxiliarforms')
                            ->where('conformmodel_id', '=', $version_form)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                foreach ($factores as $id => $factor) {
                    $nota = $request->input($factor["id"]);
                    $ponderacion = $factor["ponderacion"];
                    $nota_ponderada = $nota/100 * $ponderacion;
                    $factor += ['nota' => $nota_ponderada];
                    
                    $comentario = $request->input('comentario'.$factor['id']);
                    $factor += ['comentario' => $comentario];
        
                    // array_push($detalles, [$factor]);
                    $confirmdetailsresult = Confirmdetailsresult::create(['confproces_id' => $confproces_id, 'factor' => $factor['factor'], 'descripcion' => $factor['descripcion'], 'ponderacion' => $factor['ponderacion'], 'nota' => $factor['nota'], 'comentario' => $factor['comentario']]);
                }
                $confirmdetailsresult = Confirmdetailsresult::where('confproces_id',$confproces_id)
                                    ->get();
                if (count($confirmdetailsresult) != 0) {
                    // $nota_competencia = 0;
                    foreach ($confirmdetailsresult as $result) {
                        $nota_final += $result->nota;
                    }
                }

                $confresult = Confproce::find($confproces_id);
                $confresult->fortalezas = $fortalezas;
                $confresult->save();
                $confresult->debilidades = $debilidades;
                $confresult->save();
                $confresult->comentarios_evaluador = $comentarios_evaluador;
                $confresult->save();
                $confresult->propuestas = $propuestas;
                $confresult->save();
                $confresult->nota_final = $nota_final;
                $confresult->save();
                // RECOMENDACIÓN

                $confresult->recomendado = $recomendado;
                $confresult->save();
                $confresult->finalizacion = 1;
                $confresult->save();
            }
        return redirect()->route('home2')
            ->with('success', 'Calificación realizada con éxito');
    }

    public function formresult(Request $request) {

        // $user = auth()->user();
        // $evaluado = $request->input('evaluado');
        $user_id = $request->input('user_id');
        $nivel_id = $request->input('nivel_id');
        $nivel_info = Nivele::find($nivel_id);
        $evalprocess_id = $request->input('evalprocess_id');
        $evalprocess = Evalproce::find($evalprocess_id);
        $cargo = $request->input('cargo');
        $user = User::find($user_id);
        // $competencias = Competencia::where('competencias', '!=', 'COMPETENCIAS PARA CONFIRMACIÓN')->get();
        $numeracion = 0;

        $evalresult = Evalresult::where('evalprocess_id',$evalprocess_id)
                        ->where('evaluado_id', $user_id)
                        ->get();

        foreach ($evalresult as $result) {
            $result_id = $result->id;
            $result_fortalezas = $result->fortalezas;
            $result_debilidades = $result->debilidades;
            $result_comentarios_evaluador = $result->comentarios_evaluador;
            $result_comentarios_evaluado = $result->comentarios_evaluado;
            $result_propuestas = $result->propuestas;
            $result_nota_final = $result->nota_final;
        }
        $evaldetailsresult = Evaldetailsresult::where('evalresult_id' ,$result_id)
                            ->orderBy('factor')
                            ->get();

        $competencias = array();
        foreach ($evaldetailsresult as $detalles) {
            array_push($competencias, $detalles->competencia);
        };
        $competencias = array_unique($competencias);

        // NOTAS POR COMPETENCIAS
        $result_competencias = Evalxcomp::where('evalresult_id' ,$result_id)
                                ->get();

        // DATOS JEFE
        $relacion = Jerarquia::where('cargo_dependiente',$user->id_cargo)->get();
        $cargo_jefe = $relacion[0]->cargo_jefe;
        $user_jefe = User::where('id_cargo',$cargo_jefe)->get();

        $asignacion = Assignment::where('evalprocess_id', $evalprocess_id)
                                ->where('evaluado_id', $user_id)->get();


        return view('genform.formResult', compact('nivel_id','nivel_info','evalprocess_id','evalprocess','cargo','competencias','numeracion','evalresult', 'evaldetailsresult','result_id', 'result_fortalezas', 'result_debilidades', 'result_comentarios_evaluador','result_comentarios_evaluado', 'result_propuestas', 'result_nota_final', 'result_competencias','user','relacion','cargo_jefe','user_jefe','asignacion'));
    }

    public function print(Request $request) {
        // $user = auth()->user();
        // $evaluado = $request->input('evaluado');
        $user_id = $request->input('user_id');
        $nivel_id = $request->input('nivel_id');
        $nivel_info = Nivele::find($nivel_id);
        $evalprocess_id = $request->input('evalprocess_id');
        $evalprocess = Evalproce::find($evalprocess_id);
        $cargo = $request->input('cargo');
        $user = User::find($user_id);
        // $competencias = Competencia::where('competencias', '!=', 'COMPETENCIAS PARA CONFIRMACIÓN')->get();
        $numeracion = 0;

        $evalresult = Evalresult::where('evalprocess_id',$evalprocess_id)
                        ->where('evaluado_id', $user_id)
                        ->get();

        foreach ($evalresult as $result) {
            $result_id = $result->id;
            $result_fortalezas = $result->fortalezas;
            $result_debilidades = $result->debilidades;
            $result_comentarios_evaluador = $result->comentarios_evaluador;
            $result_comentarios_evaluado = $result->comentarios_evaluado;
            $result_propuestas = $result->propuestas;
            $result_nota_final = $result->nota_final;
        }
        $evaldetailsresult = Evaldetailsresult::where('evalresult_id' ,$result_id)
                            ->orderBy('factor')
                            ->get();

        $competencias = array();
        foreach ($evaldetailsresult as $detalles) {
            array_push($competencias, $detalles->competencia);
        };
        $competencias = array_unique($competencias);

        // NOTAS POR COMPETENCIAS
        $result_competencias = Evalxcomp::where('evalresult_id' ,$result_id)
                                ->get();

        // DATOS JEFE
        $relacion = Jerarquia::where('cargo_dependiente',$user->id_cargo)->get();
        $cargo_jefe = $relacion[0]->cargo_jefe;
        $user_jefe = User::where('id_cargo',$cargo_jefe)->get();

        $asignacion = Assignment::where('evalprocess_id', $evalprocess_id)
                                ->where('evaluado_id', $user_id)->get();

        $pdf = Pdf::loadView('genform.print', compact('nivel_id','nivel_info','evalprocess_id','evalprocess','cargo','competencias','numeracion','evalresult', 'evaldetailsresult','result_id', 'result_fortalezas', 'result_debilidades', 'result_comentarios_evaluador','result_comentarios_evaluado', 'result_propuestas', 'result_nota_final', 'result_competencias','user','relacion','cargo_jefe','user_jefe','asignacion'))->setPaper('letter');
        return $pdf->stream();
    }


    public function confirmForm(Request $request){
        $numeracion = 0;
        $confproces_id = $request->input('confproces_id');
        $user_id = $request->input('user_id');
        $evaluado = User::find($user_id);
     
        $nivel_id = $evaluado->cargo->nivel_id;
        // $nivel_id = $request->input('nivel');
        $cargo = $evaluado->cargo->cargo;

        $nivel_info = Nivele::find($nivel_id);

        $confprocess_form_version = $request->input('confprocess_form_version');
        $apellido_evaluado = $request->input('apellido');
        $nombre_evaluado = $request->input('name');

        switch ($nivel_id) {
            case 1:
                $factores = DB::table('cejecutivoforms')
                            ->where('conformmodel_id', '=', $confprocess_form_version)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                
                break;
            case 2:
                $factores = DB::table('cmediosforms')
                            ->where('conformmodel_id', '=', $confprocess_form_version)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                break;
            case 3:
                $factores = DB::table('cprofesionalforms')
                            ->where('conformmodel_id', '=', $confprocess_form_version)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                break;
            case 4:
                $factores = DB::table('ctecnicoforms')
                            ->where('conformmodel_id', '=', $confprocess_form_version)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                break;
            case 5:
                $factores = DB::table('cadministrativoforms')
                            ->where('conformmodel_id', '=', $confprocess_form_version)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
                break;
            default:
                $factores = DB::table('cauxiliarforms')
                            ->where('conformmodel_id', '=', $confprocess_form_version)
                            ->get();
                $factores = json_decode(json_encode($factores), true);
        }


        $fecha_inicio = $request->input('confprocess_fecha_inicio');
        $fecha_conclusion = $request->input('confprocess_fecha_conclusion');
        return view('genform.confirmacionForm', compact('numeracion','confproces_id','nivel_info','cargo','confprocess_form_version','nivel_id','apellido_evaluado','nombre_evaluado','user_id','fecha_inicio','fecha_conclusion','factores'));
    }

    public function cformresult(Request $request) {
        $numeracion = 0;
        $confproces_id = $request->input('confproces_id');
        $user_id = $request->input('user_id');
        $evaluado = User::find($user_id);
     
        $nivel_id = $evaluado->cargo->nivel_id;
        // $nivel_id = $request->input('nivel');
        $cargo = $evaluado->cargo->cargo;

        $nivel_info = Nivele::find($nivel_id);

        $confprocess_form_version = $request->input('confprocess_form_version');
        $apellido_evaluado = $request->input('apellido');
        $nombre_evaluado = $request->input('name');

        $jefe_name = $request->input('jefe_name');
        $jefe_cargo = $request->input('jefe_cargo');
        $fecha_inicio = $request->input('confprocess_fecha_inicio');
        $fecha_conclusion = $request->input('confprocess_fecha_conclusion');

        $resultados = Confirmdetailsresult::where('confproces_id',$confproces_id)->orderBy('factor')->get();
        $confproces = Confproce::find($confproces_id);
        $result_nota_final = $confproces->nota_final;

        return view('genform.cformResult', compact('numeracion','nivel_info','confproces_id','confproces','user_id','nombre_evaluado','apellido_evaluado','cargo','jefe_name','jefe_cargo','fecha_inicio','fecha_conclusion','resultados','result_nota_final'));
    }

    public function cprint(Request $request) {
        $numeracion = 0;
        $confproces_id = $request->input('confproces_id');
        $user_id = $request->input('user_id');
        $evaluado = User::find($user_id);
     
        $nivel_id = $evaluado->cargo->nivel_id;
        // $nivel_id = $request->input('nivel');
        $cargo = $evaluado->cargo->cargo;

        $nivel_info = Nivele::find($nivel_id);

        $confprocess_form_version = $request->input('confprocess_form_version');
        $apellido_evaluado = $request->input('apellido');
        $nombre_evaluado = $request->input('name');

        $jefe_name = $request->input('jefe_name');
        $jefe_cargo = $request->input('jefe_cargo');
        $fecha_inicio = $request->input('confprocess_fecha_inicio');
        $fecha_conclusion = $request->input('confprocess_fecha_conclusion');

        $resultados = Confirmdetailsresult::where('confproces_id',$confproces_id)->orderBy('factor')->get();
        $confproces = Confproce::find($confproces_id);
        $result_nota_final = $confproces->nota_final;

        $pdf = Pdf::loadView('genform.cprint', compact('numeracion','nivel_info','confproces_id','confproces','user_id','nombre_evaluado','apellido_evaluado','cargo','jefe_name','jefe_cargo','fecha_inicio','fecha_conclusion','resultados','result_nota_final'))->setPaper('letter');
        return $pdf->stream();


        // return view('genform.cprint', compact('numeracion','nivel_info','confproces_id','confproces','user_id','nombre_evaluado','apellido_evaluado','cargo','jefe_name','jefe_cargo','fecha_inicio','fecha_conclusion','resultados','result_nota_final'))
        
    }

}
