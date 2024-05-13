@extends('tablar::page')

@section('title')
    Inicio
@endsection

@section('content')

    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Espacio de trabajo
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                @if ($proceso == true)
                    @if ($evalassignments_evaluador != NULL)
                        @if (count($evalassignments_evaluador) != 0)
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Dependientes</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <div class="card-body">
                                            <div class="table card-table">
                                                <table id="datatable" class="stripe compact tabla">
                                                    <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Apellidos</th>
                                                        <th>Nombres</th>
                                                        <th>Cargo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($evalassignments_evaluador as $asignaciones)
                                                            @if ( (($asignaciones->evaluador_calificacion) == 0 ) && (($asignaciones->evaluado_calificacion) == 0))
                                                                <tr>
                                                                    <td>{{++$numusers}}</td>
                                                                    <td>{{$asignaciones->user_evaluado->apellido}}</td>
                                                                    <td>{{$asignaciones->user_evaluado->name}}</td>
                                                                    <td>{{$asignaciones->user_evaluado->cargo->cargo}}</td>
                                                                    <td>
                                                                        <form style="margin:0" action="{{ route('genform.generateForm') }}" method="post">
                                                                            @csrf
                                                                            <input hidden type="number" name="user_id" id="" value="{{$asignaciones->user_evaluado->id}}">
                                                                            <input hidden type="text" name="name" id="" value="{{$asignaciones->user_evaluado->name}}">
                                                                            <input hidden type="text" name="apellido" id="" value="{{$asignaciones->user_evaluado->apellido}}">
                                                                            <input hidden type="text" name="cargo" id="" value="{{$asignaciones->user_evaluado->cargo->cargo}}">
                                                                            <input hidden type="number" name="nivel" id="" value="{{$asignaciones->user_evaluado->cargo->nivel_id}}">
        
                                                                            <input hidden type="number" name="evalprocess_id" id="" value="{{$eval_id}}">
                                                                            
                                                                            <input hidden type="number" name="evalprocess_form_version" id="" value="{{$eval_form_version}}">
                                                                            <input hidden type="date" name="evalprocess_fecha_inicio" id="" value="{{$eval_fecha_inicio}}">
                                                                            <input hidden type="date" name="evalprocess_fecha_conclusion" id="" value="{{$eval_fecha_conclusion}}">
        
                                                                            <input hidden type="text" name="eval_texto_encabezado" id="" value="{{$eval_texto_encabezado}}">
                                                                            <input hidden type="text" name="eval_texto_instruccion" id="" value="{{$eval_texto_instruccion}}">
                                                                            <input type="submit" class="btn btn-primary d-none d-sm-inline-block" value="Evaluar">
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @elseif ( (($asignaciones->evaluador_calificacion) == 1 ) && (($asignaciones->evaluado_calificacion) == 0))
                                                                <tr>
                                                                    <td>{{++$numusers}}</td>
                                                                    <td>{{$asignaciones->user_evaluado->apellido}}</td>
                                                                    <td>{{$asignaciones->user_evaluado->name}}</td>
                                                                    <td>{{$asignaciones->user_evaluado->cargo->cargo}}</td>
                                                                    <td>Esperando respuesta</td>
                                                                </tr>
                                                            @else
                                                                @if ( ($asignaciones->evaluado_deacuerdo) == 0 )
                                                                    <tr>
                                                                        <td>{{++$numusers}}</td>
                                                                        <td>{{$asignaciones->user_evaluado->apellido}}</td>
                                                                        <td>{{$asignaciones->user_evaluado->name}}</td>
                                                                        <td>{{$asignaciones->user_evaluado->cargo->cargo}}</td>
                                                                        <td>
                                                                            <div class="btn-list flex-nowrap">
                                                                                <div class="dropdown">
                                                                                    <button class="btn btn-danger dropdown-toggle align-text-top"
                                                                                            data-bs-toggle="dropdown">
                                                                                        No conforme
                                                                                    </button>
                                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                                        <form action="{{ route('genform.formResult') }}" method="post"> 
                                                                                            @csrf
                                                                                            {{-- <input hidden type="number" name="evaluado" id="" value="{{$asignaciones->user_evaluado}}"> --}}
                            
                                                                                            <input hidden type="number" name="user_id" id="" value="{{$asignaciones->user_evaluado->id}}">
                                                                                            <input hidden type="text" name="name" id="" value="{{$asignaciones->user_evaluado->name}}">
                                                                                            <input hidden type="text" name="apellido" id="" value="{{$asignaciones->user_evaluado->apellido}}">
                                                                                            <input hidden type="text" name="cargo" id="" value="{{$asignaciones->user_evaluado->cargo->cargo}}">
                                                                                            <input hidden type="number" name="nivel_id" id="" value="{{$asignaciones->user_evaluado->cargo->nivel_id}}">
                                
                                                                                            <input hidden type="number" name="evalprocess_id" id="" value="{{$eval_id}}">
                                                                                            
                                                                                            <input hidden type="number" name="evalprocess_form_version" id="" value="{{$eval_form_version}}">
                                                                                            <input hidden type="date" name="evalprocess_fecha_inicio" id="" value="{{$eval_fecha_inicio}}">
                                                                                            <input hidden type="date" name="evalprocess_fecha_conclusion" id="" value="{{$eval_fecha_conclusion}}">
                                
                                                                                            <input hidden type="text" name="eval_texto_encabezado" id="" value="{{$eval_texto_encabezado}}">
                                                                                            <input hidden type="text" name="eval_texto_instruccion" id="" value="{{$eval_texto_instruccion}}">
                                                                                            <input type="submit" class="dropdown-item" value="Ver formulario">
                                                                                        </form>
        
                                                                                        <form action="{{ route('genform.print') }}" method="post" target="_blank"> 
                                                                                            @csrf
                                                                                            {{-- <input hidden type="number" name="evaluado" id="" value="{{$asignaciones->user_evaluado}}"> --}}
                            
                                                                                            <input hidden type="number" name="user_id" id="" value="{{$asignaciones->user_evaluado->id}}">
                                                                                            <input hidden type="text" name="name" id="" value="{{$asignaciones->user_evaluado->name}}">
                                                                                            <input hidden type="text" name="apellido" id="" value="{{$asignaciones->user_evaluado->apellido}}">
                                                                                            <input hidden type="text" name="cargo" id="" value="{{$asignaciones->user_evaluado->cargo->cargo}}">
                                                                                            <input hidden type="number" name="nivel_id" id="" value="{{$asignaciones->user_evaluado->cargo->nivel_id}}">
                                
                                                                                            <input hidden type="number" name="evalprocess_id" id="" value="{{$eval_id}}">
                                                                                            
                                                                                            <input hidden type="number" name="evalprocess_form_version" id="" value="{{$eval_form_version}}">
                                                                                            <input hidden type="date" name="evalprocess_fecha_inicio" id="" value="{{$eval_fecha_inicio}}">
                                                                                            <input hidden type="date" name="evalprocess_fecha_conclusion" id="" value="{{$eval_fecha_conclusion}}">
                                
                                                                                            <input hidden type="text" name="eval_texto_encabezado" id="" value="{{$eval_texto_encabezado}}">
                                                                                            <input hidden type="text" name="eval_texto_instruccion" id="" value="{{$eval_texto_instruccion}}">
                                                                                            <input type="submit" class="dropdown-item" value="Imprimir">
                                                                                        </form>
        
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <td>{{++$numusers}}</td>
                                                                        <td>{{$asignaciones->user_evaluado->apellido}}</td>
                                                                        <td>{{$asignaciones->user_evaluado->name}}</td>
                                                                        <td>{{$asignaciones->user_evaluado->cargo->cargo}}</td>
                                                                        <td>
                                                                            <div class="btn-list flex-nowrap">
                                                                                <div class="dropdown">
                                                                                    <button class="btn btn-success dropdown-toggle align-text-top"
                                                                                            data-bs-toggle="dropdown">
                                                                                        Conforme
                                                                                    </button>
                                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                                        <form action="{{ route('genform.formResult') }}" method="post"> 
                                                                                            @csrf
                                                                                            {{-- <input hidden type="number" name="evaluado" id="" value="{{$asignaciones->user_evaluado}}"> --}}
                            
                                                                                            <input hidden type="number" name="user_id" id="" value="{{$asignaciones->user_evaluado->id}}">
                                                                                            <input hidden type="text" name="name" id="" value="{{$asignaciones->user_evaluado->name}}">
                                                                                            <input hidden type="text" name="apellido" id="" value="{{$asignaciones->user_evaluado->apellido}}">
                                                                                            <input hidden type="text" name="cargo" id="" value="{{$asignaciones->user_evaluado->cargo->cargo}}">
                                                                                            <input hidden type="number" name="nivel_id" id="" value="{{$asignaciones->user_evaluado->cargo->nivel_id}}">
                                
                                                                                            <input hidden type="number" name="evalprocess_id" id="" value="{{$eval_id}}">
                                                                                            
                                                                                            <input hidden type="number" name="evalprocess_form_version" id="" value="{{$eval_form_version}}">
                                                                                            <input hidden type="date" name="evalprocess_fecha_inicio" id="" value="{{$eval_fecha_inicio}}">
                                                                                            <input hidden type="date" name="evalprocess_fecha_conclusion" id="" value="{{$eval_fecha_conclusion}}">
                                
                                                                                            <input hidden type="text" name="eval_texto_encabezado" id="" value="{{$eval_texto_encabezado}}">
                                                                                            <input hidden type="text" name="eval_texto_instruccion" id="" value="{{$eval_texto_instruccion}}">
                                                                                            <input type="submit" class="dropdown-item" value="Ver formulario">
                                                                                        </form>
        
                                                                                        <form action="{{ route('genform.print') }}" method="post" target="_blank"> 
                                                                                            @csrf
                                                                                            {{-- <input hidden type="number" name="evaluado" id="" value="{{$asignaciones->user_evaluado}}"> --}}
                            
                                                                                            <input hidden type="number" name="user_id" id="" value="{{$asignaciones->user_evaluado->id}}">
                                                                                            <input hidden type="text" name="name" id="" value="{{$asignaciones->user_evaluado->name}}">
                                                                                            <input hidden type="text" name="apellido" id="" value="{{$asignaciones->user_evaluado->apellido}}">
                                                                                            <input hidden type="text" name="cargo" id="" value="{{$asignaciones->user_evaluado->cargo->cargo}}">
                                                                                            <input hidden type="number" name="nivel_id" id="" value="{{$asignaciones->user_evaluado->cargo->nivel_id}}">
                                
                                                                                            <input hidden type="number" name="evalprocess_id" id="" value="{{$eval_id}}">
                                                                                            
                                                                                            <input hidden type="number" name="evalprocess_form_version" id="" value="{{$eval_form_version}}">
                                                                                            <input hidden type="date" name="evalprocess_fecha_inicio" id="" value="{{$eval_fecha_inicio}}">
                                                                                            <input hidden type="date" name="evalprocess_fecha_conclusion" id="" value="{{$eval_fecha_conclusion}}">
                                
                                                                                            <input hidden type="text" name="eval_texto_encabezado" id="" value="{{$eval_texto_encabezado}}">
                                                                                            <input hidden type="text" name="eval_texto_instruccion" id="" value="{{$eval_texto_instruccion}}">
                                                                                            <input type="submit" class="dropdown-item" value="Imprimir">
                                                                                        </form>
        
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                                
                                                            @endif
                                                            
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        @endif
                    @endif
                @endif
                
                @if ($proceso == true)
                    @if ( $evalassignments_evaluado != NULL)
                        @if (count($evalassignments_evaluado) != 0)
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Jefe a cargo</h3>
                                    </div>

                                    <div class="table-responsive">
                                        <div class="card-body">
                                            <div class="table card-table">
                                                <table class="stripe compact tabla">
                                                    <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Apellidos</th>
                                                        <th>Nombres</th>
                                                        <th>Cargo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($evalassignments_evaluado as $asignaciones)
                                                        
                                                            @if ((($asignaciones->evaluador_calificacion) == 1) && (($asignaciones->evaluado_calificacion) == 0))
                                                                <tr>
                                                                    <td>{{++$numusers}}</td>
                                                                    <td>{{$asignaciones->user_evaluador->apellido}}</td>
                                                                    <td>{{$asignaciones->user_evaluador->name}}</td>
                                                                    <td>{{$asignaciones->user_evaluador->cargo->cargo}}</td>
                                                                    <td>
                                                                        <form action="{{ route('genform.bringbackForm') }}" method="post">
                                                                            @csrf
                                                                            <input hidden type="number" name="assignment_id" id="" value="{{$asignaciones->id}}">
                                                                            <input hidden type="number" name="user_id" id="" value="{{$asignaciones->user_evaluado->id}}">
                                                                            <input hidden type="number" name="jefe_id" id="" value="{{$asignaciones->user_evaluador->id}}">
                                                                            <input hidden type="text" name="name" id="" value="{{$asignaciones->user_evaluado->name}}">
                                                                            <input hidden type="text" name="jefe_name" id="" value="{{$asignaciones->user_evaluador->apellido}} {{$asignaciones->user_evaluador->name}}">
                                                                            <input hidden type="text" name="cargo" id="" value="{{$asignaciones->user_evaluado->cargo->cargo}}">
                                                                            <input hidden type="text" name="jefe_cargo" id="" value="{{$asignaciones->user_evaluador->cargo->cargo}}">
                                                                            <input hidden type="number" name="nivel" id="" value="{{$asignaciones->user_evaluado->cargo->nivel_id}}">
        
        
                                                                            <input hidden type="number" name="evalprocess_id" id="" value="{{$eval_id}}">
                                                                            <input hidden type="number" name="evalprocess_form_version" id="" value="{{$eval_form_version}}">
                                                                            <input hidden type="date" name="evalprocess_fecha_inicio" id="" value="{{$eval_fecha_inicio}}">
                                                                            <input hidden type="date" name="evalprocess_fecha_conclusion" id="" value="{{$eval_fecha_conclusion}}">
                                                                            <input hidden type="text" name="evalprocess_texto_encabezado" id="" value="{{$eval_texto_encabezado}}">
                                                                            <input hidden type="text" name="evalprocess_texto_instruccion" id="" value="{{$eval_texto_instruccion}}">
                                                                            <input type="submit" class="btn btn-primary d-none d-sm-inline-block" value="Responder">
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            
                                                            @elseif((($asignaciones->evaluador_calificacion) == 0) && (($asignaciones->evaluado_calificacion) == 0))
                                                                <tr>
                                                                    <td>{{++$numusers}}</td>
                                                                    <td>{{$asignaciones->user_evaluador->apellido}}</td>
                                                                    <td>{{$asignaciones->user_evaluador->name}}</td>
                                                                    <td>{{$asignaciones->user_evaluador->cargo->cargo}}</td>
                                                                    <td style="font-size: 15px; padding-top: 9px; padding-bottom: 9px; font-weight:bold">Evaluando</td>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>{{++$numusers}}</td>
                                                                    <td>{{$asignaciones->user_evaluador->apellido}}</td>
                                                                    <td>{{$asignaciones->user_evaluador->name}}</td>
                                                                    <td>{{$asignaciones->user_evaluador->cargo->cargo}}</td>
                                                                    <td style="font-size: 15px; padding-top: 9px; padding-bottom: 9px; font-weight:bold">Respuesta enviada</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endif

                @if ($confproceso)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Evaluación de confirmación</h3>
                            </div>
                            <div class="table-responsive">
                                <div class="card-body">
                                    <div class="table card-table">
                                        <table id="datatable3" class="stripe compact tabla">
                                            <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Apellidos</th>
                                                <th>Nombres</th>
                                                <th>Cargo</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($confirmprocess as $cproces)
                                                    @if(($cproces->finalizacion) == 0)
                                                        <tr>
                                                            <td>{{++$numusers}}</td>
                                                            <td>{{$cproces->user_evaluado->apellido}}</td>
                                                            <td>{{$cproces->user_evaluado->name}}</td>
                                                            <td>{{$cproces->user_evaluado->cargo->cargo}}</td>
        
                                                            <td>
                                                                <form action="{{ route('genform.confirmacionForm') }}" method="post">
                                                                    @csrf
                                                                    <input hidden type="number" name="confproces_id" id="" value="{{$cproces->id}}">
                                                                        
                                                                    <input hidden type="number" name="user_id" id="" value="{{$cproces->user_evaluado->id}}">
                                                                    <input hidden type="number" name="jefe_id" id="" value="{{$cproces->user_evaluador->id}}">
                                                                    <input hidden type="text" name="name" id="" value="{{$cproces->user_evaluado->name}}">
                                                                    <input hidden type="text" name="apellido" id="" value="{{$cproces->user_evaluado->apellido}}">
                                                                    <input hidden type="text" name="jefe_name" id="" value="{{$cproces->user_evaluador->apellido}} {{$cproces->user_evaluador->name}}">
                                                                    <input hidden type="text" name="cargo" id="" value="{{$cproces->user_evaluado->cargo->cargo}}">
                                                                    <input hidden type="text" name="jefe_cargo" id="" value="{{$cproces->user_evaluador->cargo->cargo}}">
                                                                    <input hidden type="number" name="nivel" id="" value="{{$cproces->user_evaluado->cargo->nivel_id}}">
                                            
                                                                    <input hidden type="number" name="confprocess_form_version" id="" value="{{$cproces->form_version_id}}">
                                                                    <input hidden type="date" name="confprocess_fecha_inicio" id="" value="{{$cproces->fecha_inicio}}">
                                                                    <input hidden type="date" name="confprocess_fecha_conclusion" id="" value="{{$cproces->fecha_conclusion}}">
                                                                    <input type="submit" class="btn btn-primary d-none d-sm-inline-block" value="Evaluar">
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        @if (($cproces->recomendado) == 0)
                                                            <tr>
                                                                <td>{{++$numusers}}</td>
                                                                <td>{{$cproces->user_evaluado->apellido}}</td>
                                                                <td>{{$cproces->user_evaluado->name}}</td>
                                                                <td>{{$cproces->user_evaluado->cargo->cargo}}</td>
                        
                                                                <td>
                                                                    <div class="btn-list flex-nowrap">
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-danger dropdown-toggle align-text-top"
                                                                                    data-bs-toggle="dropdown">
                                                                                No recomendado
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <form action="{{ route('genform.cformResult') }}" method="post"> 
                                                                                    @csrf
                                                                                    {{-- <input hidden type="number" name="evaluado" id="" value="{{$asignaciones->user_evaluado}}"> --}}
        
                                                                                    <input hidden type="number" name="confproces_id" id="" value="{{$cproces->id}}">
                                                                                        
                                                                                    <input hidden type="number" name="user_id" id="" value="{{$cproces->user_evaluado->id}}">
                                                                                    <input hidden type="number" name="jefe_id" id="" value="{{$cproces->user_evaluador->id}}">
                                                                                    <input hidden type="text" name="name" id="" value="{{$cproces->user_evaluado->name}}">
                                                                                    <input hidden type="text" name="apellido" id="" value="{{$cproces->user_evaluado->apellido}}">
                                                                                    <input hidden type="text" name="jefe_name" id="" value="{{$cproces->user_evaluador->apellido}} {{$cproces->user_evaluador->name}}">
                                                                                    <input hidden type="text" name="cargo" id="" value="{{$cproces->user_evaluado->cargo->cargo}}">
                                                                                    <input hidden type="text" name="jefe_cargo" id="" value="{{$cproces->user_evaluador->cargo->cargo}}">
                                                                                    <input hidden type="number" name="nivel" id="" value="{{$cproces->user_evaluado->cargo->nivel_id}}">
                                                            
                                                                                    <input hidden type="number" name="confprocess_form_version" id="" value="{{$cproces->form_version_id}}">
                                                                                    <input hidden type="date" name="confprocess_fecha_inicio" id="" value="{{$cproces->fecha_inicio}}">
                                                                                    <input hidden type="date" name="confprocess_fecha_conclusion" id="" value="{{$cproces->fecha_conclusion}}">
                                                                                    <input type="submit" class="dropdown-item" value="Ver formulario">
                                                                                </form>
        
                                                                                <form action="{{ route('genform.cprint') }}" method="post" target="_blank"> 
                                                                                    @csrf
                                                                                    {{-- <input hidden type="number" name="evaluado" id="" value="{{$asignaciones->user_evaluado}}"> --}}
        
                                                                                    <input hidden type="number" name="confproces_id" id="" value="{{$cproces->id}}">
                                                                                        
                                                                                    <input hidden type="number" name="user_id" id="" value="{{$cproces->user_evaluado->id}}">
                                                                                    <input hidden type="number" name="jefe_id" id="" value="{{$cproces->user_evaluador->id}}">
                                                                                    <input hidden type="text" name="name" id="" value="{{$cproces->user_evaluado->name}}">
                                                                                    <input hidden type="text" name="apellido" id="" value="{{$cproces->user_evaluado->apellido}}">
                                                                                    <input hidden type="text" name="jefe_name" id="" value="{{$cproces->user_evaluador->apellido}} {{$cproces->user_evaluador->name}}">
                                                                                    <input hidden type="text" name="cargo" id="" value="{{$cproces->user_evaluado->cargo->cargo}}">
                                                                                    <input hidden type="text" name="jefe_cargo" id="" value="{{$cproces->user_evaluador->cargo->cargo}}">
                                                                                    <input hidden type="number" name="nivel" id="" value="{{$cproces->user_evaluado->cargo->nivel_id}}">
                                                            
                                                                                    <input hidden type="number" name="confprocess_form_version" id="" value="{{$cproces->form_version_id}}">
                                                                                    <input hidden type="date" name="confprocess_fecha_inicio" id="" value="{{$cproces->fecha_inicio}}">
                                                                                    <input hidden type="date" name="confprocess_fecha_conclusion" id="" value="{{$cproces->fecha_conclusion}}">
                                                                                    <input type="submit" class="dropdown-item" value="Imprimir">
                                                                                </form>
        
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td>{{++$numusers}}</td>
                                                                <td>{{$cproces->user_evaluado->apellido}}</td>
                                                                <td>{{$cproces->user_evaluado->name}}</td>
                                                                <td>{{$cproces->user_evaluado->cargo->cargo}}</td>
                        
                                                                <td>
                                                                    <div class="btn-list flex-nowrap">
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-success dropdown-toggle align-text-top"
                                                                                    data-bs-toggle="dropdown">
                                                                                Recomendado
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <form action="{{ route('genform.cformResult') }}" method="post"> 
                                                                                    @csrf
                                                                                    {{-- <input hidden type="number" name="evaluado" id="" value="{{$asignaciones->user_evaluado}}"> --}}
        
                                                                                    <input hidden type="number" name="confproces_id" id="" value="{{$cproces->id}}">
                                                                                        
                                                                                    <input hidden type="number" name="user_id" id="" value="{{$cproces->user_evaluado->id}}">
                                                                                    <input hidden type="number" name="jefe_id" id="" value="{{$cproces->user_evaluador->id}}">
                                                                                    <input hidden type="text" name="name" id="" value="{{$cproces->user_evaluado->name}}">
                                                                                    <input hidden type="text" name="apellido" id="" value="{{$cproces->user_evaluado->apellido}}">
                                                                                    <input hidden type="text" name="jefe_name" id="" value="{{$cproces->user_evaluador->apellido}} {{$cproces->user_evaluador->name}}">
                                                                                    <input hidden type="text" name="cargo" id="" value="{{$cproces->user_evaluado->cargo->cargo}}">
                                                                                    <input hidden type="text" name="jefe_cargo" id="" value="{{$cproces->user_evaluador->cargo->cargo}}">
                                                                                    <input hidden type="number" name="nivel" id="" value="{{$cproces->user_evaluado->cargo->nivel_id}}">
                                                            
                                                                                    <input hidden type="number" name="confprocess_form_version" id="" value="{{$cproces->form_version_id}}">
                                                                                    <input hidden type="date" name="confprocess_fecha_inicio" id="" value="{{$cproces->fecha_inicio}}">
                                                                                    <input hidden type="date" name="confprocess_fecha_conclusion" id="" value="{{$cproces->fecha_conclusion}}">
                                                                                    <input type="submit" class="dropdown-item" value="Ver formulario">
                                                                                </form>
        
                                                                                <form action="{{ route('genform.cprint') }}" method="post" target="_blank"> 
                                                                                    @csrf
                                                                                    {{-- <input hidden type="number" name="evaluado" id="" value="{{$asignaciones->user_evaluado}}"> --}}
        
                                                                                    <input hidden type="number" name="confproces_id" id="" value="{{$cproces->id}}">
                                                                                        
                                                                                    <input hidden type="number" name="user_id" id="" value="{{$cproces->user_evaluado->id}}">
                                                                                    <input hidden type="number" name="jefe_id" id="" value="{{$cproces->user_evaluador->id}}">
                                                                                    <input hidden type="text" name="name" id="" value="{{$cproces->user_evaluado->name}}">
                                                                                    <input hidden type="text" name="apellido" id="" value="{{$cproces->user_evaluado->apellido}}">
                                                                                    <input hidden type="text" name="jefe_name" id="" value="{{$cproces->user_evaluador->apellido}} {{$cproces->user_evaluador->name}}">
                                                                                    <input hidden type="text" name="cargo" id="" value="{{$cproces->user_evaluado->cargo->cargo}}">
                                                                                    <input hidden type="text" name="jefe_cargo" id="" value="{{$cproces->user_evaluador->cargo->cargo}}">
                                                                                    <input hidden type="number" name="nivel" id="" value="{{$cproces->user_evaluado->cargo->nivel_id}}">
                                                            
                                                                                    <input hidden type="number" name="confprocess_form_version" id="" value="{{$cproces->form_version_id}}">
                                                                                    <input hidden type="date" name="confprocess_fecha_inicio" id="" value="{{$cproces->fecha_inicio}}">
                                                                                    <input hidden type="date" name="confprocess_fecha_conclusion" id="" value="{{$cproces->fecha_conclusion}}">
                                                                                    <input type="submit" class="dropdown-item" value="Imprimir">
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


@endsection