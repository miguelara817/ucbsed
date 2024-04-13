<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulario de confirmación Version {{$version->id}}</title>
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
            text-align: center;
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
            border-collapse: collapse;
           
        }

        .nivel-tabla table tr{ 
            border-top: 1px solid #dddddd;
            border-bottom: 1px solid #dddddd;
        }
        .nivel-tabla table td{
            color: #182433;
            font-size: 14px;
            padding: 10px 20px;
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
            padding: 10px 20px;
        }
    </style>

</head>
<body>
    <header>
        <h1 class="detalles-titulo">Formulario de proceso de confirmación</h1>
        <div class="detalles-encabezado">
            <div>
                <strong>NÚMERO DE VERSIÓN: </strong>
                <span>{{ $version->id }}</span>
            </div>
            <div>
                <strong>CREADOR: </strong>
                <span>{{ $version->creador }}</span>
            </div>
            <div>
                <strong>DESCRIPCIÓN: </strong>
                <span>{{ $version->descripcion }}</span>
            </div>
        </div>
    </header>

    <main>
        <div class="nivel">
            <div class="nivel-titulo">
                <h3>NIVEL EJECUTIVO</h3>
            </div>
            <div class="nivel-tabla">
                @if ( (count($factorjecutivo)) != 0 )
                <table>
                    <thead>
                        <th>N°</th>
                        <th>Factores</th>
                        <th>Decripción</th>
                        <th>Ponderación</th>
                    </thead>
                    <tbody>
                        @foreach ($factorjecutivo as $ejecutivos)
                            <tr>
                                <td>{{++$numejecutivo}}</td>
                                <td>{{$ejecutivos->factor}}</td>
                                <td class="descripcion">{{$ejecutivos->descripcion}}</td>
                                <td class="ponderacion">{{$ejecutivos->ponderacion}}</td>
                            </tr>                   
                        @endforeach
                    </tbody>
                </table>
                @else
                    <h3>¡No existen datos!</h3>
                @endif
            </div>
           
            
        </div>
        <div style="page-break-after:always;"></div>
        <div class="nivel">
            <div class="nivel-titulo">
                <h3>NIVEL MANDOS MEDIOS</h3>
            </div>
            <div class="nivel-tabla">
                @if ((count($factormedios)) != 0)
                <table>
                    <thead>
                        <th>N°</th>
                        <th>Factores</th>
                        <th>Decripción</th>
                        <th>Ponderación</th>
                    </thead>
                    <tbody>
                        @foreach ($factormedios as $medio)
                            <tr>
                                <td>{{++$nummedio}}</td>
                                <td>{{$medio->factor}}</td>
                                <td class="descripcion">{{$medio->descripcion}}</td>
                                <td class="ponderacion">{{$medio->ponderacion}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <h3>¡No existen datos!</h3>
                @endif
            </div>
            
            
        </div>
        <div style="page-break-after:always;"></div>
        <div class="nivel">
            <div class="nivel-titulo">
                <h3>NIVEL OPERATIVOS-PROFESIONAL</h3>
            </div>
            <div class="nivel-tabla">
                @if ( (count($factorprofesional)) != 0 )
                    <table>
                        <thead>
                            <th>N°</th>
                            <th>Factores</th>
                            <th>Decripción</th>
                            <th>Ponderación</th>
                        </thead>
                        <tbody>
                            @foreach ($factorprofesional as $profesional)
                                <tr>
                                    <td>{{++$numprofesional}}</td>
                                    <td>{{$profesional->factor}}</td>
                                    <td class="descripcion">{{$profesional->descripcion}}</td>
                                    <td class="ponderacion">{{$profesional->ponderacion}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3>¡No existen datos!</h3>
                @endif
            </div>
        </div>
        <div style="page-break-after:always;"></div>
        <div class="nivel">
            <div class="nivel-titulo">
                <h3>NIVEL OPERATIVO-TÉCNICO</h3>
            </div>
            <div class="nivel-tabla">
                @if ( (count($factortecnico)) != 0 )
                    <table>
                        <thead>
                            <th>N°</th>
                            <th>Factores</th>
                            <th>Decripción</th>
                            <th>Ponderación</th>
                        </thead>
                        <tbody>
                            @foreach ($factortecnico as $tecnico)
                                <tr>
                                    <td>{{++$numtecnico}}</td>
                                    <td>{{$tecnico->factor}}</td>
                                    <td class="descripcion">{{$tecnico->descripcion}}</td>
                                    <td class="ponderacion">{{$tecnico->ponderacion}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3>¡No existen datos!</h3>
                @endif
            </div>
        </div>
        <div style="page-break-after:always;"></div>
        <div class="nivel">
            <div class="nivel-titulo">
                <h3>NIVEL OPERATIVO-ADMINISTRATIVO</h3>
            </div>
            <div class="nivel-tabla">
                @if ( (count($factoradministrativo)) != 0 )
                    <table>
                        <thead>
                            <th>N°</th>
                            <th>Factores</th>
                            <th>Decripción</th>
                            <th>Ponderación</th>
                        </thead>
                        <tbody>
                            @foreach ($factoradministrativo as $administrativo)
                                <tr>
                                    <td>{{++$numadministrativo}}</td>
                                    <td>{{$administrativo->factor}}</td>
                                    <td class="descripcion">{{$administrativo->descripcion}}</td>
                                    <td class="ponderacion">{{$administrativo->ponderacion}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3>¡No existen datos!</h3>
                @endif
            </div>
        </div>
        <div style="page-break-after:always;"></div>
        <div class="nivel">
            <div class="nivel-titulo">
                <h3>NIVEL OPERATIVO-AUXILIAR</h3>
            </div>
            <div class="nivel-tabla">
                @if ( (count($factorauxiliar)) != 0 )
                    <table>
                        <thead>
                            <th>N°</th>
                            <th>Factores</th>
                            <th>Decripción</th>
                            <th>Ponderación</th>
                        </thead>
                        <tbody>
                            @foreach ($factorauxiliar as $auxiliar)
                                <tr>
                                    <td>{{++$numauxiliar}}</td>
                                    <td>{{$auxiliar->factor}}</td>
                                    <td class="descripcion">{{$auxiliar->descripcion}}</td>
                                    <td class="ponderacion">{{$auxiliar->ponderacion}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3>¡No existen datos!</h3>
                @endif
            </div>
        </div>
    </main>
</body>
</html>