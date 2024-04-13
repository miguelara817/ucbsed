<!DOCTYPE html>
<html lang="en">
<head>
    <title>Árbol de cargos</title>
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
            /* text-align: center; */
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
            <h1 class="detalles-titulo">Árbol de cargos</h1>
        </div>
    </div>
    {{-- <header>
        <h1 class="detalles-titulo">Árbol de cargos</h1>
    </header> --}}

    <main>
        <div class="nivel">
            {{-- <div class="nivel-titulo">
                <h3>{{$competencia->competencias}}</h3>
            </div> --}}
            <div class="nivel-tabla">
                @if ( !empty($relaciones) )
                <table>
                    <thead>
                        <th class="w-1">No.</th>
						<th>Cargo Jefe</th>
						<th>Cargo Dependiente</th>
                    </thead>
                    <tbody>
                        @forelse ($relaciones as $relacion)
                            <tr>
                                <td>{{++$num_relaciones}}</td>
                                <td>{{ $relacion->cargo_jefe }}</td>
                                <td>{{ $relacion->cargo_dependiente }}</td>
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