<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <title>Versiones de formulario de evaluación</title>
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
        <h1 class="detalles-titulo">Versiones de formulario de evaluación</h1>
    </header>

    <main>
        <div class="nivel">
            {{-- <div class="nivel-titulo">
                <h3>{{$competencia->competencias}}</h3>
            </div> --}}
            <div class="nivel-tabla">
                @if ( !empty($versiones) )
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Versión</th>
                            <th>Creador</th>
                            <th>Descripción</th>
                            <th>Fecha de creación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($versiones as $version)
                        <tr>
                            <tr>
                                <td>{{ ++$num_versiones }}</td>
                                <td class="ponderacion">{{ $version->id }}</td>
                                <td>{{ $version->creador }}</td>
                                <td>{{ $version->descripcion }}</td>
                                <td>{{date('d/m/Y',strtotime($version->created_at))}}</td>
                                
                            <td>
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