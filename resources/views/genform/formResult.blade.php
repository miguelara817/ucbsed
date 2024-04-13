@extends('tablar::page')

@section('title', 'Fomrulario de evaluación')

@section('css')
    <style>
        .form-title{
            margin-top: 50px;
            text-align: center;
        }
        .form-title h3{
            margin: 0;
        }

        .form-subtitle{
            text-align: center;
            padding: 10px;
            background-color: #d9d9d9;
        }

        .form-subtitle h3{
            margin: 0;
        }

        .form-seccion{
            padding: 8px;
            background-color: #d9d9d9;
        }
        .form-seccion h3{
            margin: 0;
        }
        .header{
            margin: 15px auto;
        }
        .header-info{
            margin: 5px auto;
            display: flex;
            flex-direction: row;
            align-items: center;
            
        }
        .header-info .pregunta{
            margin-right: 20px;
            font-size: 15px;
            color: #18244e;
            font-weight: bold;
            
        }
        .header-info .respuesta{
            margin-right: 20px;
            font-size: 15px;
            border: none;
        }
        .header-info input {
            width: 60%;
            border:0;
            outline:0;
        }


        .selector-container{
            margin-left: 20px;
        }

        .selectors{
            display: flex;
            align-items: center;
        }

        .selectors label{
            padding-left: 10px;
        }

        .selector-container input[type="checkbox"]{
            height: 20px;
            width: 20px;
        }
        .selector-son{
            margin-left: 30px;
            margin-bottom: 15px;
            margin-top: 15px;
        }

    </style>
@endsection

@section('content')

<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12 col-md-auto ms-auto d-print-none">
                {{-- <div class="btn-list">
                    <a href="{{ route('genform.print') }}" target="_blank" class="btn btn-danger">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                        Imprimir
                    </a>
                </div> --}}
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="form-title">
                        <h3>GESTIÓN DE RECURSOS HUMANOS</h3>
                        <h3>FORMULARIO</h3>
                        <h3>EVALUACIÓN DEL DESEMPEÑO EVD-0{{$nivel_id}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-subtitle">
                            <h3>{{$nivel_info->nivel}} ({{$cargo}})</h3>
                        </div>
                        <div>
                            <p>{{$evalprocess->texto_encabezado}}</p>
                        </div>
                        <div class="form-seccion">
                            <h3>I. Funcionario a evaluar</h3>
                        </div>
                        <div class="header">
                            <div class="header-info">
                                <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                <span class="respuesta">{{$user->apellido}} {{$user->name}}</span>
                            </div>
                            <div class="header-info">
                                <span class="pregunta">PUESTO: </span>
                                <span class="respuesta">{{$user->cargo->cargo}}</span>
                            </div>

                            <div class="header-info">
                                <span class="pregunta">PERIODO DE EVALUACIÓN: </span>
                                <span class="respuesta">Inicio: {{date('d/m/Y',strtotime($evalprocess->fecha_inicio))}}</span>
                                <span class="respuesta">Conclusión: {{date('d/m/Y',strtotime($evalprocess->fecha_conclusion))}}</span>
                            </div>
                        </div>

                        <div class="form-seccion">
                            <h3>II. Funcionario evaluador</h3>
                        </div>
                        <div class="header">
                            <div class="header-info">
                                <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                <span class="respuesta">{{$user_jefe[0]->apellido}} {{$user_jefe[0]->name}}</span>
                                
                            </div>
                            <div class="header-info">
                                <span class="pregunta">PUESTO: </span>
                                <span class="respuesta">{{$user_jefe[0]->cargo->cargo}}</span>
                               
                            </div>
                        </div>
                        <div class="form-seccion">
                            <h3>III. Factores a evaluar</h3>
                        </div>
                        <div>
                            <p>{{$evalprocess->texto_instruccion}}</p>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter datatable">
                                <thead>
                                    <th style="font-size: 12px; font-weight: bold; text-align: center;">N°</th>
                                    <th style="font-size: 12px; font-weight: bold;">FACTOR</th>
                                    <th style="font-size: 12px; font-weight: bold; text-align: center;">DESCRIPCIÓN</th>
                                    <th style="font-size: 12px; font-weight: bold; text-align: center;">CALIFICACIÓN</th>
                                    <th style="font-size: 12px; font-weight: bold; text-align: center;">COMENTARIOS</th>
                                </thead>
                                <tbody>
                                    @foreach ($competencias as $competencia)
                                        <tr>
                                            <td colspan="5" style="justify-content: center; background-color: rgb(254 240 138);">{{$competencia}}</td>
                                            @foreach ($evaldetailsresult as $details)
                                                @if (($competencia) == ($details->competencia))
                                                    <tr>
                                                        <td style="text-align: center">{{++$numeracion}}</td>
                                                        <td>{{$details->factor}}</td>
                                                        <td>{{$details->descripcion}}</td>
                                                        <td style="text-align: center">{{$details->nota}}</td>
                                                        @if ($details->comentario)
                                                            <td style="text-align: center">{{$details->comentario}}</td>
                                                        @else
                                                            <td style="text-align: center"> - </td>
                                                        @endif
                                                    </tr>
                                                @endif
                                                
                                            @endforeach
                                            @foreach ($result_competencias as $rxcompetencia)
                                                @if ( ($rxcompetencia->competencia) == ($competencia))
                                                    <tr>
                                                        <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                        <td colspan="1" style="text-align: center; background-color: #0054a6; color: white;">{{$rxcompetencia->nota}}</td>
                                                        <td colspan="1" style="text-align: center; background-color: #0054a6; color: white;"></td>
                                                    </tr> 
                                                @endif
                                            @endforeach
                                            
                                        </tr>
                                    @endforeach
                                  
                                        <tr>
                                            <td colspan="3" style="text-align: center; background-color: black; color: white;">TOTAL RESULTADO FINAL DE LA EVALUACIÓN</td>
                                            <td colspan="1" style="text-align: center; background-color: black; color: white;">{{$result_nota_final}}</td>
                                            @if ( (intval(round($result_nota_final)) <= 100) && ( intval(round($result_nota_final)) >= 91))
                                                <td colspan="1" style="text-align: center; background-color: black; color: white;">EXCELENTE</td>
                                            @elseif( (intval(round($result_nota_final)) <= 90) && (intval(round($result_nota_final)) >= 81))
                                                <td colspan="1" style="text-align: center; background-color: black; color: white;">MUY BUENO</td>
                                            @elseif( (intval(round($result_nota_final)) <= 80) && (intval(round($result_nota_final)) >= 71))
                                                <td colspan="1" style="text-align: center; background-color: black; color: white;">BUENO</td>
                                            @elseif((intval(round($result_nota_final)) <= 70) && (intval(round($result_nota_final)) >= 61))
                                                <td colspan="1" style="text-align: center; background-color: black; color: white;">SUFICIENTE</td>
                                            @elseif((intval(round($result_nota_final)) <= 60) && (intval(round($result_nota_final)) >= 51))
                                                <td colspan="1" style="text-align: center; background-color: black; color: white;">ACEPTABLE</td>
                                            @else
                                                <td colspan="1" style="text-align: center; background-color: black; color: white;">INSATISFACTORIO</td>
                                            @endif
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="form-seccion">
                            <h3>IV. RESUMEN DE LA EVALUACIÓN</h3>
                        </div>
                        <div class='form-control'>
                            <h4>A. Fortalezas del funcionario evaluado</h4>
                            <p class='form-control' style="width: 100%" name="fortalezas" id="" cols="30" rows="5">{{$result_fortalezas}}</p>
                            <br>
                            <h4>B. Debilidades del funcionario evaluado</h4>
                            <p class='form-control' style="width: 100%" name="debilidades" id="" cols="30" rows="5">{{$result_debilidades}}</p>
                            <br>
                            <h4>C. Comentarios/recomendaciones del funcionario evaluador</h4>
                            <p class='form-control' style="width: 100%" name="comentarios_evaluador" id="" cols="30" rows="5">{{$result_comentarios_evaluador}}</p>
                            <br>
                            <h4>D. Propuesta de capacitaciones para superar las debilidades del funcionario</h4>
                            <p class='form-control' style="width: 100%" name="propuestas" id="" cols="30" rows="5">{{$result_propuestas}}</p>
                            <hr>
                            <div style="display: flex; flex-direction:row; justify-content: space-between; align-items: center">    
                                <h4>¿ESTÁ DE ACUERDO CON LA EVALUACIÓN?</h4>
                                @if (($asignacion[0]->evaluado_deacuerdo) == 1)
                                    <h4 style="width: 200px">SI</h4>
                                @else
                                    <h4 style="width: 200px">NO</h4>
                                @endif   
                                
                                
                            </div>
                            <h4>E. Comentarios del funcionario evaluado</h4>
                            <p class='form-control' style="width: 100%" name="comentarios_evaluador" id="" cols="30" rows="5">{{$result_comentarios_evaluado}}</p>
                            <br>
                            <div class="text-end">
                                <div class="d-flex">
                                    <a href="javascript:history.back()" class="btn btn-danger">Volver</a>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection