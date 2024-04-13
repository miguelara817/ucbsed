<!DOCTYPE html>
<html lang="en">
<head>
    <title>Secciones</title>
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
            width: 100%;
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
        <h1 class="detalles-titulo">Secciones</h1>
    </header>

    <main>
        <div class="nivel">
            {{-- <div class="nivel-titulo">
                <h3>{{$competencia->competencias}}</h3>
            </div> --}}
            <div class="nivel-tabla">
                @if ( !empty($secciones) )
                <table>
                    <thead>
                        <th>No.</th>
						<th>Sección</th>
						<th>Área</th>
                    </thead>
                    <tbody>
                        @forelse ($secciones as $seccion)
                            <tr>
                                <td>{{++$num_secciones}}</td>
                                <td>{{ $seccion->seccion }}</td>
                                <td>{{ $seccion->area->area }}</td>
                            </tr>   
                        @empty
                        <h3>¡No existen datos!</h3>         
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