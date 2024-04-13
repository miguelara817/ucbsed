@extends('tablar::page')
{{-- <link rel="stylesheet" href="assets/css/styles.css"> --}}
@section('title', 'Responder formulario')


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
                                {{-- <input class="respuesta" type="text" name="cargo_evaluador" id="" value="{{$jefe_cargo}}"> --}}
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
                                    <th style="font-size: 12px; font-weight: bold; text-align: center;">NOTA</th>
                                    <th style="font-size: 12px; font-weight: bold; text-align: center">COMENTARIOS</th>
                                </thead>
                                <tbody>
                                    @foreach ($competencias as $competencia)
                                    <tr>
                                        <td colspan="5" style="justify-content: center; background-color: rgb(254 240 138);">{{$competencia->competencias}}</td>
                                        @foreach ($evaldetailsresult as $details)
                                            @if (($competencia->competencias) == ($details->competencia))
                                                <tr>
                                                    <td style="text-align: center">{{++$numeracion}}</td>
                                                    <td>{{$details->factor}}</td>
                                                    <td>{{$details->descripcion}}</td>
                                                    <td style="text-align: center">{{$details->nota}}</td>
                                                    <td><p>{{$details->comentario}}</p></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" style="justify-content: center; background-color: black; color: white;">Nota final</td>
                                        <td colspan="2" style="justify-content: center; background-color: black; color: white;">{{$result_nota_final}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
                                    <a href="/home" class="btn btn-danger">Volver</a>
                                    
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