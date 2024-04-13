<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <title>Asignaciones realizadas en el proceso de evaluación</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;    
        }

        .detalles-titulo{
            font-size: 18px;
            text-align: center;
            color: #182433;
        }

        .detalles-encabezado strong{
            color: #182433;
            font-size: 12px;
        }

        .detalles-encabezado span{
            margin-left: 8px;
            font-size: 12px;
        }

        .nivel{
            margin-top: 20px;
            border: 1px solid #dddddd;
        }

        .nivel-titulo{
            font-size: 12px;
            color: #fcfdfe;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 20px;
            background-color: #0054a6;
        }

        .nivel-tabla h3{
            padding-top: 8px;
            padding-bottom: 8px;
            font-size: 12px;
            color: #182433;
            margin-left: 10px;
        }

        .nivel-tabla table{
            width: 100%;
            border-collapse: collapse;
           
        }

        .nivel-tabla table tr{ 
            border-top: 1px solid #dddddd;
            border-bottom: 1px solid #dddddd;
        }
        .nivel-tabla table td{
            color: #182433;
            font-size: 11px;
            padding: 8px 10px;
        }
        .nivel-tabla table .descripcion{
            text-align: justify;
        }
        .nivel-tabla table .ponderacion{
            text-align: center;
        }
        .nivel-tabla table th{ 
            color: #667382;
            font-size: 10px;
            text-align: left;
            text-transform: uppercase;
            border-top: 1px solid #dddddd;
            border-bottom: 1px solid #dddddd;
            padding: 8px 10px;
        }
    </style>

</head>
<body>
    <header>
        <h1 class="detalles-titulo">Asignaciones realizadas en el proceso de evaluación</h1>
    </header>

    <main>
        <div class="nivel">
            {{-- <div class="nivel-titulo">
                <h3>{{$competencia->competencias}}</h3>
            </div> --}}
            <div class="nivel-tabla">
                @if ( !empty($assignments) )
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID de proceso de evaluación</th>
                            <th>Evaluador</th>
                            <th>Evaluado</th>
                            <th>Evaluador Calificación</th>
                            <th>Evaluado Calificación</th>
                            <th>Conformidad del evaluado</th>
                            <th>Finalización</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($assignments as $assignment)
                        <tr>
                            
                            <td>{{ ++$num_assignments }}</td>
                            
                            <td class="ponderacion">{{ $assignment->evalprocess_id }}</td>
                            <td>{{ $assignment->user_evaluador->apellido }} {{ $assignment->user_evaluador->name }}</td>
                            <td>{{ $assignment->user_evaluado->apellido }} {{ $assignment->user_evaluado->name }}</td>
                            @if ($assignment->evaluador_calificacion)
                                <td class="ponderacion"><strong>SI</strong></td>
                            @else
                                <td class="ponderacion"><strong>NO</strong></td>
                            @endif

                            @if ($assignment->evaluado_calificacion)
                                <td class="ponderacion"><strong>SI</strong></td>
                            @else
                                <td class="ponderacion"><strong>NO</strong></td>
                            @endif
                            
                            @if ($assignment->evaluado_deacuerdo)
                                <td class="ponderacion"><strong>SI</strong></td>
                            @else
                                <td class="ponderacion"><strong>NO</strong></td>
                            @endif
                            
                            @if ($assignment->finalizacion)
                                <td class="ponderacion"><strong>SI</strong></td>
                            @else
                                <td class="ponderacion"><strong>NO</strong></td>
                            @endif
                            
                            @if (($assignment->evaluado_deacuerdo) && ($assignment->finalizacion)== 1)
                                <td style="margin:0; color: green">FINALIZADO</td>
                            {{-- @elseif ((($assignment->evaluado_deacuerdo) == 0) && (($assignment->finalizacion) == 1))
                                <td>
                                    <form style="margin:0;" action="{{ route('assignments.reevaluar') }}" method="post">
                                        @csrf
                                        <input hidden type="number" name="evalprocess_id" id="" value="{{$assignment->evalprocess_id}}">
                                        <input hidden type="number" name="evaluador_id" id="" value="{{$assignment->evaluador_id}}">
                                        <input hidden type="number" name="evaluado_id" id="" value="{{$assignment->evaluado_id}}">
                                        <button type="submit" class="btn btn-danger">RE EVALUAR</button>
                                    </form>
                                </td>  --}}
                            @else
                                <td style="margin:0; color: red;">EN PROCESO</td>
                            @endif
                        </tr>
                    @empty
                        <td>No existen datos</td>
                    @endforelse
                    </tbody>
                </table>
                @else
                <div>
                    <h3>¡No existen datos!</h3>
                </div>
                @endif
                
            </div> 
        </div>

        
        
    </main>
</body>
</html>