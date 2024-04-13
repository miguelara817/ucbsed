@extends('tablar::page')

@section('title', 'Fomrulario de confirmación')

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

            </div>
            <div class="col-12">
                <div class="card">
                    <div class="form-title">
                        <h3>GESTIÓN DE RECURSOS HUMANOS</h3>
                        <h3>FORMULARIO</h3>
                        <h3>EVALUACIÓN PARA CONFIRMACIÓN EN EL PUESTO</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-subtitle">
                            <h3>{{$nivel_info->nivel}}</h3>
                        </div>
                        <div class="form-seccion">
                            <h3>I. Funcionario a evaluar</h3>
                        </div>
                        <div class="header">
                            <div class="header-info">
                                <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                <span class="respuesta">{{$apellido_evaluado}} {{$nombre_evaluado}}</span>
                            </div>
                            <div class="header-info">
                                <span class="pregunta">PUESTO: </span>
                                <span class="respuesta">{{$cargo}}</span>
                            </div>

                            <div class="header-info">
                                <span class="pregunta">FECHA DE EVALUACIÓN: </span>
                                <span class="respuesta">{{date('d/m/Y',strtotime($fecha_inicio))}}</span>
                            </div>
                            <div class="header-info">
                                <span class="pregunta">FECHA DE CUMPLIMIENTO DE PERIODO DE PRUEBA: </span>
                                <span class="respuesta">{{date('d/m/Y',strtotime($fecha_conclusion))}}</span>
                            </div>
                        </div>

                        <div class="form-seccion">
                            <h3>II. Funcionario evaluador</h3>
                        </div>
                        <div class="header">
                            <div class="header-info">
                                <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                <span class="respuesta">{{$jefe_name}}</span>
                                
                            </div>
                            <div class="header-info">
                                <span class="pregunta">PUESTO: </span>
                                <span class="respuesta">{{$jefe_cargo}}</span>
                               
                            </div>
                        </div>
                        <div class="form-seccion">
                            <h3>III. Factores a evaluar</h3>
                        </div>
                        <div>
                            <p>Marque en la columna que mejor expresa su opinión sobre la forma cómo el funcionario actuó con relación a cada factor, en el periodo de prueba:</p>
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
                                    @foreach ($resultados as $result)
                                        <tr>
                                            <td style="text-align: center">{{++$numeracion}}</td>
                                            <td>{{$result->factor}}</td>
                                            <td>{{$result->descripcion}}</td>
                                            <td style="text-align: center">{{$result->nota}}</td>
                                            @if ($result->comentario)
                                                <td>{{$result->comentario}}</td>
                                            @else
                                                <td style="text-align: center"> - </td>
                                            @endif
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
                            <p class='form-control' style="width: 100%" name="fortalezas" id="" cols="30" rows="5">{{$confproces->fortalezas}}</p>
                            <br>
                            <h4>B. Debilidades del funcionario evaluado</h4>
                            <p class='form-control' style="width: 100%" name="debilidades" id="" cols="30" rows="5">{{$confproces->debilidades}}</p>
                            <br>
                            <h4>C. Comentarios/recomendaciones del funcionario evaluador</h4>
                            <p class='form-control' style="width: 100%" name="comentarios_evaluador" id="" cols="30" rows="5">{{$confproces->comentarios_evaluador}}</p>
                            <br>
                            <h4>D. Propuesta de capacitaciones para superar las debilidades del funcionario</h4>
                            <p class='form-control' style="width: 100%" name="propuestas" id="" cols="30" rows="5">{{$confproces->propuestas}}</p>
                            <hr>
                            <div style="display: flex; flex-direction:row; justify-content: space-between; align-items: center">    
                                <h4>RECOMIENDA CONFIRMACIÓN EN EL PUESTO: </h4>
                                @if (($confproces->recomendado) == 1)
                                    <h4 style="width: 200px">SI</h4>
                                @else
                                    <h4 style="width: 200px">NO</h4>
                                @endif   
                                
                                
                            </div>
                            
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