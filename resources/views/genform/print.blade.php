<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de evaluación</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;    
        }
        .main-header{
            display: grid;
        }

        .marginTop{
            margin-top: 10px;
        }
        .marginBottom{
            margin-bottom: 10px;
        }

        .column {
            float: left;
            width: 33.33%;
        }

        .column img{
            width: 150px;
            margin: 0;
        }
        .column p{
            margin: 0;
            text-align: center;
            font-size: 12px;
            font-weight: bold;
            /* font-weight: bold; */
        }

            /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .subtitle{
            font-size: 12px;
            text-align: center;
            padding: 5px;
            background-color: #d9d9d9;
            font-weight: bold;
        }

        .texto-encabezado p{
            font-size: 12px;
            font-style: italic;
            text-align: justify;
        }

        .section{
            font-size: 12px;
            padding: 5px;
            background-color: #d9d9d9;
            font-weight: bold;
            margin-bottom: 5px;
            margin-top: 10px;
        }

        .header-info{
            display: flex;
            flex-direction: row;
            font-size: 12px;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .header-info .pregunta{
            font-weight: bold;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td{
            border: 1px solid;
            font-size: 12px;
            padding: 5px;
        }
        .pregunta{
            font-weight: bold;
        }

        .text-areas{
            font-size: 12px;
        }
        .text-areas p{
            width: 100%;
            text-align: justify;
        }
        .footer{
            width: 100%;
            border: 1px solid;
        }

        .pie{
           margin-bottom: 10px; 
        }

        .campo-firma{
            margin: 10px;
            height: 80px;
            border-bottom: 1px solid;
        }
        .campo-fecha{
            height: 72px;
        }
    </style>
</head>
<body>
    <div class="row marginBottom">
        <div class="column"><img src="assets/logo-ucb.png" alt=""></div>
        <div class="column marginTop">
            <p>GESTIÓN DE RECURSOS HUMANOS</p>
            <p>FORMULARIO</p>
            <p>EVALUACIÓN DEL DESEMPEÑO EVD-0{{$nivel_id}}</p>
        </div>
    </div>

    <div class="subtitle">
        <span>{{$nivel_info->nivel}} ({{$cargo}})</span>
        
    </div>
    <div class="texto-encabezado">
        <p>{{$evalprocess->texto_encabezado}}</p>
    </div>
    <div class="section">
        <span>I. Funcionario a evaluar</span>
    </div>

    <div class="subsection">
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
            <span class="respuesta"> Conclusión: {{date('d/m/Y',strtotime($evalprocess->fecha_conclusion))}}</span>
        </div>
    </div>

    <div class="section">
        <span>II. Funcionario evaluador</span>
    </div>

    <div class="subsection">
        <div class="header-info">
            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
            <span class="respuesta">{{$user_jefe[0]->apellido}} {{$user_jefe[0]->name}}</span>
            
        </div>
        <div class="header-info">
            <span class="pregunta">PUESTO: </span>
            <span class="respuesta">{{$user_jefe[0]->cargo->cargo}}</span>
           
        </div>
    </div>

    <div class="section">
        <span>III. Factores a evaluar</span>
    </div>
    <div class="texto-encabezado">
        <p>{{$evalprocess->texto_instruccion}}</p>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <th>N°</th>
                <th>FACTOR</th>
                <th>DESCRIPCIÓN</th>
                <th>CALIFICACIÓN</th>
                <th>COMENTARIOS</th>
            </thead>
            <tbody>
                @foreach ($competencias as $competencia)
                    <tr>
                        <td colspan="5" style="font-weight: bold;">{{$competencia}}</td>
                        {{-- <td colspan="5" style="justify-content: center; background-color: rgb(254 240 138);">{{$competencia}}</td> --}}
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
                                    <td colspan="3" style="text-align: center; font-weight: bold;">SUBTOTAL</td>
                                    <td colspan="1" style="text-align: center;">{{$rxcompetencia->nota}}</td>
                                    <td colspan="1" style="text-align: center;"></td>
                                </tr> 
                            @endif
                        @endforeach
                        
                    </tr>
                @endforeach
              
                    <tr>
                        <td colspan="3" style="text-align: center; border: 2px solid; font-weight:bold;">TOTAL RESULTADO FINAL DE LA EVALUACIÓN</td>
                        <td colspan="1" style="text-align: center; border: 2px solid; font-weight:bold;">{{$result_nota_final}}</td>
                        @if ( (intval(round($result_nota_final)) <= 100) && ( intval(round($result_nota_final)) >= 91))
                            <td colspan="1" style="text-align: center; border: 2px solid; font-weight:bold;">EXCELENTE</td>
                        @elseif( (intval(round($result_nota_final)) <= 90) && (intval(round($result_nota_final)) >= 81))
                            <td colspan="1" style="text-align: center; border: 2px solid; font-weight:bold;">MUY BUENO</td>
                        @elseif( (intval(round($result_nota_final)) <= 80) && (intval(round($result_nota_final)) >= 71))
                            <td colspan="1" style="text-align: center; border: 2px solid; font-weight:bold;">BUENO</td>
                        @elseif((intval(round($result_nota_final)) <= 70) && (intval(round($result_nota_final)) >= 61))
                            <td colspan="1" style="text-align: center; border: 2px solid; font-weight:bold;">SUFICIENTE</td>
                        @elseif((intval(round($result_nota_final)) <= 60) && (intval(round($result_nota_final)) >= 51))
                            <td colspan="1" style="text-align: center; border: 2px solid; font-weight:bold;">ACEPTABLE</td>
                        @else
                            <td colspan="1" style="text-align: center; border: 2px solid; font-weight:bold;">INSATISFACTORIO</td>
                        @endif
                    </tr>
            </tbody>
        </table>
    </div>
    <div style="page-break-before:always;"></div>
    <div class="section">
        <span>IV. RESUMEN DE LA EVALUACIÓN</span>
    </div>
    <div class="text-areas marginBottom">
        <h4>A. Fortalezas del funcionario evaluado</h4>
        <p name="fortalezas" id="" cols="30" rows="5">{{$result_fortalezas}}</p>
      
        <h4>B. Debilidades del funcionario evaluado</h4>
        <p name="debilidades" id="" cols="30" rows="5">{{$result_debilidades}}</p>
 
        <h4>C. Comentarios/recomendaciones del funcionario evaluador</h4>
        <p name="comentarios_evaluador" id="" cols="30" rows="5">{{$result_comentarios_evaluador}}</p>
    
        <h4>D. Propuesta de capacitaciones para superar las debilidades del funcionario</h4>
        <p name="propuestas" id="" cols="30" rows="5">{{$result_propuestas}}</p>
        <div class="header-info">    
            <span class="pregunta">¿ESTÁ DE ACUERDO CON LA EVALUACIÓN?</span>
            @if (($asignacion[0]->evaluado_deacuerdo) == 1)
                <span> SI</span>
            @else
                <span> NO</span>
            @endif   
        </div>
        <h4>E. Comentarios del funcionario evaluado</h4>
        <p name="comentarios_evaluador" id="" cols="30" rows="5">{{$result_comentarios_evaluado}}</p>
    </div>

    <div class="row footer">
        <div class="column">
            <div class="campo-firma"></div>
            <div class="pie"><p>Firma del Evaluador</p></div>
        </div>
        <div class="column">
            <div class="campo-firma"></div>
            <div class="pie"><p>Firma del Evaluado</p></div>
        </div>
        <div class="column">
            <div class="campo-fecha"></div>
            <div class="pie">
                <p>........../........../..........</p>
                <p>día - mes - año</p>
                <p>Fecha de Evaluación</p>
            </div>
        </div>
    </div>
</body>
</html>