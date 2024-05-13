@extends('tablar::page')

@section('title')
    Asignaciones de evaluación
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        {{ __('Lista de asignaciones ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                @if (!empty($usuarios))
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('assignments.print') }}" target="_blank" class="btn btn-danger">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                            Imprimir
                        </a>
                        <a href="{{ route('assignments.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Crear asignación
                        </a>
                    </div>
                </div>  
                @else
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('assignments.print') }}" target="_blank" class="btn btn-danger">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                            Imprimir
                        </a>
                    </div>
                </div>  
                @endif
                
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <div class="card-body">
                                <div class="table card-table">
                                    <table id="datatable" class="stripe compact tabla">
                                        <thead>
                                            <tr>
                                                <th class="w-1">No.</th>
                                                <th>Iniciar sesión</th>
                                                <th>Proceso</th>
                                                <th>Evaluador</th>
                                                <th>Evaluado</th>
                                                <th>Evaluador Calificacion</th>
                                                <th>Evaluado Calificacion</th>
                                                <th>Conformidad del evaluado</th>
                                                <th>Finalizacion</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                        @foreach ($assignments as $assignment)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    <form style="margin:0;" action="{{ route('assignments.authUser', $assignment->user_evaluador->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit" formtarget="_blank" class="btn" style="font-size: 10px">INGRESAR</button>
                                                    </form>
                                                </td>
                                                <td>{{ $assignment->evalprocess_id }}</td>
                                                
                                                <td>{{ $assignment->user_evaluador->apellido }} {{ $assignment->user_evaluador->name }}</td>
                                                <td>{{ $assignment->user_evaluado->apellido }} {{ $assignment->user_evaluado->name }}</td>
                                                @if ($assignment->evaluador_calificacion)
                                                    <td style="text-align: center"><strong>&#10004</strong></td>
                                                @else
                                                    <td style="text-align: center"><strong>&#10005</strong></td>
                                                @endif
    
                                                @if ($assignment->evaluado_calificacion)
                                                    <td style="text-align: center"><strong>&#10004</strong></td>
                                                @else
                                                    <td style="text-align: center"><strong>&#10005</strong></td>
                                                @endif
                                                
                                                @if ($assignment->evaluado_deacuerdo)
                                                    <td style="text-align: center"><strong>&#10004</strong></td>
                                                @else
                                                    <td style="text-align: center"><strong>&#10005</strong></td>
                                                @endif
                                                
                                                @if ($assignment->finalizacion)
                                                    <td style="text-align: center"><strong>&#10004</strong></td>
                                                @else
                                                    <td style="text-align: center"><strong>&#10005</strong></td>
                                                @endif
                                                
                                                @if (($assignment->evaluado_deacuerdo) && ($assignment->finalizacion)== 1)
                                                    <td style="margin:0; color: green; text-align: center">FINALIZADO</td>
                                                @elseif ((($assignment->evaluado_deacuerdo) == 0) && (($assignment->finalizacion) == 1))
                                                    <td style="text-align: center">
                                                        <form style="margin:0;" action="{{ route('assignments.reevaluar') }}" method="post">
                                                            @csrf
                                                            <input hidden type="number" name="evalprocess_id" id="" value="{{$assignment->evalprocess_id}}">
                                                            <input hidden type="number" name="evaluador_id" id="" value="{{$assignment->evaluador_id}}">
                                                            <input hidden type="number" name="evaluado_id" id="" value="{{$assignment->evaluado_id}}">
                                                            <button type="submit" class="btn btn-danger" style="font-size: 10px">RE EVALUAR</button>
                                                        </form>
                                                    </td> 
                                                @else
                                                    <td style="margin:0; color: red; text-align: center">EN PROCESO</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection