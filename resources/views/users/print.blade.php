<!DOCTYPE html>
<html lang="en">
<head>
    <title>Usuarios</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;    
        }

        .detalles-titulo{
            font-size: 15px;
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
            font-size: 8px;
            /* padding: 10px 20px; */
            padding: 3px 5px;
        }
        .nivel-tabla table .descripcion{
            text-align: justify;
        }
        .nivel-tabla table .ponderacion{
            text-align: center;
        }
        .nivel-tabla table th{ 
            color: #667382;
            font-size: 7px;
            text-align: left;
            text-transform: uppercase;
            border-top: 1px solid #dddddd;
            border-bottom: 1px solid #dddddd;
            padding: 3px 5px;
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
            <h1 class="detalles-titulo">Usuarios registrados</h1>
        </div>
    </div>

    <main>
        <div class="nivel">
            {{-- <div class="nivel-titulo">
                <h3>{{$competencia->competencias}}</h3>
            </div> --}}
            <div class="nivel-tabla">
                @if ( !empty($users) )
                <table>
                    <thead>
                        <th>No.</th>
                        <th>Código</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>Correo electrónico</th>
                        <th>Cargo</th>
                        <th>Área</th>
                        <th>Departamento</th>
                        <th>Unidad</th>
                        <th>Seccion</th>
                        <th>Fecha de ingreso</th>
                        <th>Fecha de nacimiento</th>
                        <th>Doc. Identidad</th>
                        <th>Tipo de contrato</th>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{++$num_users}}</td>
                                @if (!empty($user->codigo))
                                    <td>{{ $user->codigo }}</td>
                                @else
                                    <td> - </td>
                                @endif
                                @if (!empty($user->apellido))
                                    <td>{{ $user->apellido }}</td>
                                @else
                                    <td> - </td>
                                @endif
                                @if (!empty($user->name))
                                    <td>{{ $user->name }}</td>
                                @else
                                    <td> - </td>
                                @endif
                                @if (!empty($user->email))
                                    <td>{{ $user->email }}</td>
                                @else
                                    <td> - </td>
                                @endif
                                
                                @if (!empty($user->cargo->cargo))
                                    <td>{{ $user->cargo->cargo }}</td>
                                @else
                                    <td> - </td>
                                @endif

                                @if (!empty($user->area->area))
                                    <td>{{ $user->area->area }}</td>
                                @else
                                    <td> - </td>
                                @endif
                
                                @if (!empty($user->depto->departamento))
                                    <td>{{ $user->depto->departamento }}</td>
                                @else
                                    <td> - </td>
                                @endif

                                @if (!empty($user->unidade->unidad))
                                    <td>{{ $user->unidade->unidad }}</td>
                                @else
                                    <td> - </td>
                                @endif

                                @if (!empty($user->seccione->seccion))
                                    <td>{{ $user->seccione->seccion }}</td>
                                @else
                                    <td> - </td>
                                @endif

                                @if (!empty($user->fecha_ingreso))
                                    <td>{{ $user->fecha_ingreso }}</td>
                                @else
                                    <td> - </td>
                                @endif
                                @if (!empty($user->fecha_nacimiento))
                                    <td>{{ $user->fecha_nacimiento }}</td>
                                @else
                                    <td> - </td>
                                @endif
                                
                                @if (!empty($user->doc_identidad))
                                    <td>{{ $user->doc_identidad }}</td>
                                @else
                                    <td> - </td>
                                @endif
                                

                                @if (!empty($user->contrato->tipo_contrato))
                                    <td>{{ $user->contrato->tipo_contrato }}</td>
                                @else
                                    <td> - </td>
                                @endif
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