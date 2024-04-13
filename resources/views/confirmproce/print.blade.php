<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <title>Procesos de confirmación</title>
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
        .row:after {
            content: "";
            display: table;
            clear: both;
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
        }
    </style>

</head>
<body>
    <div class="row marginBottom">
        <div class="column"><img src="assets/logo-ucb.png" alt=""></div>
        <div class="column">
            <h1 class="detalles-titulo">Procesos de confirmación</h1>
        </div>
    </div>
    {{-- <header>
        <h1 class="detalles-titulo">Procesos de confirmación</h1>
    </header> --}}

    <main>
        <div class="nivel">
            {{-- <div class="nivel-titulo">
                <h3>{{$competencia->competencias}}</h3>
            </div> --}}
            <div class="nivel-tabla">
                @if ( !empty($confirmproces) )
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Vers. Formulario</th>
                            <th>Evaluador</th>
                            <th>Evaluado</th>
                            <th>Recomendado</th>
                            <th>Finalizado</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Conclusion</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($confirmproces as $confirmproce)
                        <tr>
                            <td>{{ ++$num_confirmproces }}</td>
                                            
                            <td class="ponderacion">{{ $confirmproce->form_version_id }}</td>
                            <td>{{ $confirmproce->user_evaluador->apellido }} {{ $confirmproce->user_evaluador->name }}</td>
                            <td>{{ $confirmproce->user_evaluado->apellido }} {{ $confirmproce->user_evaluado->name }}</td>
                            @if ($confirmproce->recomendado)
                                <td style="text-align: center"><strong>SI</strong></td>
                            @else
                                <td style="text-align: center"><strong>NO</strong></td>
                            @endif
                            @if ($confirmproce->finalizacion)
                                <td style="text-align: center"><strong>SI</strong></td>
                            @else
                                <td style="text-align: center"><strong>NO</strong></td>
                            @endif
                            <td>{{date('d/m/Y',strtotime($confirmproce->fecha_inicio))}}</td>
                            <td>{{date('d/m/Y',strtotime($confirmproce->fecha_conclusion))}}</td>

                            @if ($confirmproce->finalizacion == 0)
                                <td style="color: red">EN PROCESO</td>
                            @else
                                <td style="color: green">FINALIZADO</td>
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