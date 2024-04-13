@extends('tablar::page')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    {{-- <div class="page-pretitle">
                        Overview
                    </div> --}}
                    <h2 class="page-title">
                        Espacio de trabajo
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                  {{-- <span class="d-none d-sm-inline">
                    <a href="#" class="btn btn-white">
                      New view
                    </a>
                  </span> --}}
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                           data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Crear un nuevo reporte
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                           data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dependientes</h3>
                        </div>
                        
                        <div class="table-responsive">
                            {{-- {{$proceso->id}} --}}
                            {{$evalprocess->finalizacion}}
                            <table class="table card-table table-vcenter datatable">
                                <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Apellidos y Nombres</th>
                                    <th>Cargo</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- @if (($proceso->finalizacion) == 0)
                                    @foreach ($usuarios_dependientes as $id => $usuarios)
                                        @foreach ($asignacion as $asign)
                                            @foreach ($usuarios as $user)
                                                @if (($user["id"]) == ($asign->evaluado_id) )
                                                    @if (($asign->evaluador_calificacion) == 0)
                                                    <tr>
                                                        <td>{{++$numusers}}</td>
                                                        <td>{{$user["name"]}}</td>
                                                        <td>{{$usuarios_cargos[$id]}}</td>
                                                        <td>
                                                            <form action="{{ route('genform.generateForm') }}" method="post">
                                                                @csrf
                                                                
                                                                <input hidden type="number" name="tipo" id="" value="{{$proceso->formmodel->tipo->id}}">
                                                                <input hidden type="number" name="user_id" id="" value="{{$user["id"]}}">
                                                                <input hidden type="text" name="name" id="" value="{{$user["name"]}}">
                                                                <input hidden type="text" name="cargo" id="" value="{{$usuarios_cargos[$id]}}">
                                                                <input hidden type="number" name="nivel" id="" value="{{$nivel_dependientes[$id]}}">
                                                                <input hidden type="number" name="evalprocess_id" id="" value="{{$proceso->id}}">
                                                                <input hidden type="number" name="evalprocess_form_version" id="" value="{{$proceso->form_version_id}}">
                                                                <input hidden type="date" name="evalprocess_fecha_inicio" id="" value="{{$proceso->fecha_inicio}}">
                                                                <input hidden type="date" name="evalprocess_fecha_conclusion" id="" value="{{$proceso->fecha_conclusion}}">
                                                                <input type="submit" class="btn btn-primary d-none d-sm-inline-block" value="Evaluar">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @else
                                                    <tr>
                                                        <td>{{++$numusers}}</td>
                                                        <td>{{$user["name"]}}</td>
                                                        <td>{{$usuarios_cargos[$id]}}</td>
                                                        <td>Evaluación realizada</td>
                                                    </tr> 
                                                    @endif
                                                @endif
                                            
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endif --}}
                                    
                                {{-- {{print_r($usuarios_dependientes)}} --}}
                                {{-- @foreach ($dependientes as $dependiente)
                                    <td>{{var_dump($dependiente)}}</td>
                                @endforeach --}}



                                {{-- @foreach ($usuarios_dependientes as $id => $usuarios)
                                    @foreach ($usuarios as $user)
                                    <tr>
                                        <td>{{++$numusers}}</td>
                                        <td>{{$user["name"]}}</td>
                                        <td>{{$usuarios_cargos[$id]}}</td>
                                        <td>
                                            <form action="{{ route('genform.generateForm') }}" method="post">
                                                @csrf
                                                <input hidden type="number" name="version" id="" value="41">
                                                <input hidden type="number" name="tipo" id="" value="1">
                                                <input hidden type="number" name="user_id" id="" value="{{$user["id"]}}">
                                                <input hidden type="text" name="name" id="" value="{{$user["name"]}}">
                                                <input hidden type="text" name="cargo" id="" value="{{$usuarios_cargos[$id]}}">
                                                <input hidden type="number" name="nivel" id="" value="{{$nivel_dependientes[$id]}}">
                                                <input type="submit" class="btn btn-primary d-none d-sm-inline-block" value="Evaluar">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
