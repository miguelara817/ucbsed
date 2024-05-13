@extends('tablar::page')

@section('title', 'Detalles proceso de evaluación')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Detalles de proceso de evaluación ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('evalproces.vistaPrevia',$evalproce->id) }}" class="btn btn-yellow d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-files"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 3v4a1 1 0 0 0 1 1h4" /><path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" /><path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" /></svg>
                            Ver formularios
                        </a>
                        <a href="{{ route('evalproces.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Lista de procesos de evaluación
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
                        <div class="card-body">
                            <div class="form-group">
                                <strong>PROCESO DE EVALUACIÓN: </strong>
                                <span>{{ $evalproce->id }}</span>
                            </div>
                            <div class="form-group">
                                <strong>VERSIÓN DE FORMULARIO UTLIZADA: </strong>
                                <span>{{ $evalproce->form_version_id }}</span>
                            </div>
                            <div class="form-group">
                                <strong>FECHA DE INICIO: </strong>
                                <span>{{date('d/m/Y',strtotime($evalproce->fecha_inicio))}}</span>
                            </div>
                            <div class="form-group">
                                <strong>FECHA DE CONCLUSIÓN: </strong>
                                <span>{{date('d/m/Y',strtotime($evalproce->fecha_conclusion))}}</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DETALLES DE FORMULARIO</h3>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Texto de encabezado</h3>
                        </div>
                        <div class="card-body">
                            <p style="text-align: justify">{{ $evalproce->texto_encabezado }}</p>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Texto de Instrucción</h3>
                        </div>
                        <div class="card-body">
                            <p style="text-align: justify">{{ $evalproce->texto_instruccion }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Competencias y ponderadores en cada nivel</h3>
                        </div>
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                            <li class="nav-item">
                                <a href="#tabs-ejecutivo-ex1" class="nav-link active" data-bs-toggle="tab">EJECUTIVO</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-mandosmedios-ex1" class="nav-link" data-bs-toggle="tab">MANDOS MEDIOS</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-opeprofesional" class="nav-link" data-bs-toggle="tab">OPERATIVO-PROFESIONAL</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-opetecnico" class="nav-link" data-bs-toggle="tab">OPERATIVO-TÉCNICO</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-opeadministrativo" class="nav-link" data-bs-toggle="tab">OPERATIVO-ADMINISTRATIVO</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-opeauxiliar" class="nav-link" data-bs-toggle="tab">OPERATIVO-AUXILIAR</a>
                            </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show"  id="tabs-ejecutivo-ex1">
                                    <div class="row row-deck row-cards">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                                    <h3 class="card-title" style="color: #fcfdfe">NIVEL EJECUTIVO</h3>
                                                </div>
                                                <div class="table-responsive">
                                                    {{-- --------------------------COMPETENCIAS------------------- --}}
                                                    @forelse ($competencias_ejecutivo as $competencias)
                                                        <div class="card-header">
                                                            <h3 class="card-title">{{$competencias->competencia}}</h3>
                                                        </div>
                                                        <table class="table card-table datatable">
                                                            <thead>
                                                                <th>N°</th>
                                                                <th>Factores</th>
                                                                <th>Decripción</th>
                                                                <th>Ponderación</th>
                                                            </thead>
                                                            <tbody>
                                                                {{-- --------------------Factores Ejecutivo------------------------------ --}}
                                                                @foreach ($factorjecutivo as $ejecutivos)
                                                                    {{-- ---------------Por competencia--------- --}}
                                                                    @if (($ejecutivos->competencia)==($competencias->competencia))
                                                                        <tr>
                                                                            <td>{{++$numejecutivo}}</td>
                                                                            <td>{{$ejecutivos->factor}}</td>
                                                                            <td>{{$ejecutivos->descripcion}}</td>
                                                                            <td style="text-align: center">{{$ejecutivos->ponderacion}}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                                    <td style="text-align: center; background-color: #0054a6; color: white;">{{$competencias->suma}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>       
                                                    @empty
                                                        <div class="card-header">
                                                            <h3>¡No existen datos!</h3>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="tabs-mandosmedios-ex1">
                                    <div class="row row-deck row-cards">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                                    <h3 class="card-title" style="color: #fcfdfe">NIVEL MANDOS MEDIOS</h3>
                                                </div>
                                                <div class="table-responsive">
                                                    {{-- --------------------------COMPETENCIAS------------------- --}}
                                                    @forelse ($competencias_medios as $competencias)
                                                        <div class="card-header">
                                                            <h3 class="card-title">{{$competencias->competencia}}</h3>
                                                        </div>
                                                        <table class="table card-table datatable">
                                                            <thead>
                                                                <th>N°</th>
                                                                <th>Factores</th>
                                                                <th>Decripción</th>
                                                                <th>Ponderación</th>
                                                            </thead>
                                                            <tbody>
                                                                {{-- --------------------Factores Ejecutivo------------------------------ --}}
                                                                @foreach ($factormedios as $medio)
                                                                    {{-- ---------------Por competencia--------- --}}
                                                                    @if (($medio->competencia)==($competencias->competencia))
                                                                        <tr>
                                                                            <td>{{++$nummedio}}</td>
                                                                            <td>{{$medio->factor}}</td>
                                                                            <td>{{$medio->descripcion}}</td>
                                                                            <td style="text-align: center">{{$medio->ponderacion}}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                                    <td style="text-align: center; background-color: #0054a6; color: white;">{{$competencias->suma}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    @empty
                                                        <div class="card-header">
                                                            <h3>¡No existen datos!</h3>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="tabs-opeprofesional">
                                    <div class="row row-deck row-cards">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                                    <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVO-PROFESIONAL</h3>
                                                </div>
                                                <div class="table-responsive">
                                                    {{-- --------------------------COMPETENCIAS------------------- --}}
                                                    @forelse ($competencias_profesional as $competencias)
                                                        <div class="card-header">
                                                            <h3 class="card-title">{{$competencias->competencia}}</h3>
                                                        </div>
                                                        <table class="table card-table datatable">
                                                            <thead>
                                                                <th>N°</th>
                                                                <th>Factores</th>
                                                                <th>Decripción</th>
                                                                <th>Ponderación</th>
                                                            </thead>
                                                            <tbody>
                                                                {{-- --------------------Factores Ejecutivo------------------------------ --}}
                                                                @foreach ($factorprofesional as $profesional)
                                                                    {{-- ---------------Por competencia--------- --}}
                                                                    @if (($profesional->competencia)==($competencias->competencia))
                                                                        <tr>
                                                                            <td>{{++$numprofesional}}</td>
                                                                            <td>{{$profesional->factor}}</td>
                                                                            <td>{{$profesional->descripcion}}</td>
                                                                            <td style="text-align: center">{{$profesional->ponderacion}}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                                    <td style="text-align: center; background-color: #0054a6; color: white;">{{$competencias->suma}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    @empty
                                                        <div class="card-header">
                                                            <h3>¡No existen datos!</h3>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="tabs-opetecnico">
                                    <div class="row row-deck row-cards">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                                    <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVO-TÉCNICO</h3>
                                                </div>
                                                <div class="table-responsive">
                                                    {{-- --------------------------COMPETENCIAS------------------- --}}
                                                    @forelse ($competencias_tecnico as $competencias)
                                                        <div class="card-header">
                                                            <h3 class="card-title">{{$competencias->competencia}}</h3>
                                                        </div>
                                                        <table class="table card-table datatable">
                                                            <thead>
                                                                <th>N°</th>
                                                                <th>Factores</th>
                                                                <th>Decripción</th>
                                                                <th>Ponderación</th>
                                                            </thead>
                                                            <tbody>
                                                                {{-- --------------------Factores Ejecutivo------------------------------ --}}
                                                                @foreach ($factortecnico as $tecnico)
                                                                    {{-- ---------------Por competencia--------- --}}
                                                                    @if (($tecnico->competencia)==($competencias->competencia))
                                                                        <tr>
                                                                            <td>{{++$numtecnico}}</td>
                                                                            <td>{{$tecnico->factor}}</td>
                                                                            <td>{{$tecnico->descripcion}}</td>
                                                                            <td style="text-align: center">{{$tecnico->ponderacion}}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                                    <td style="text-align: center; background-color: #0054a6; color: white;">{{$competencias->suma}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    @empty
                                                        <div class="card-header">
                                                            <h3>¡No existen datos!</h3>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="tabs-opeadministrativo">
                                    <div class="row row-deck row-cards">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                                    <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVO-ADMINISTRATIVO</h3>
                                                </div>
                                                <div class="table-responsive">
                                                    {{-- --------------------------COMPETENCIAS------------------- --}}
                                                    @forelse ($competencias_administrativo as $competencias)
                                                        <div class="card-header">
                                                            <h3 class="card-title">{{$competencias->competencia}}</h3>
                                                        </div>
                                                        <table class="table card-table datatable">
                                                            <thead>
                                                                <th>N°</th>
                                                                <th>Factores</th>
                                                                <th>Decripción</th>
                                                                <th>Ponderación</th>
                                                            </thead>
                                                            <tbody>
                                                                {{-- --------------------Factores Ejecutivo------------------------------ --}}
                                                                @foreach ($factoradministrativo as $administrativo)
                                                                    {{-- ---------------Por competencia--------- --}}
                                                                    @if (($administrativo->competencia)==($competencias->competencia))
                                                                        <tr>
                                                                            <td>{{++$numadministrativo}}</td>
                                                                            <td>{{$administrativo->factor}}</td>
                                                                            <td>{{$administrativo->descripcion}}</td>
                                                                            <td style="text-align: center">{{$administrativo->ponderacion}}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                                    <td style="text-align: center; background-color: #0054a6; color: white;">{{$competencias->suma}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    @empty
                                                        <div class="card-header">
                                                            <h3>¡No existen datos!</h3>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="tab-pane" id="tabs-opeauxiliar">
                                    <div class="row row-deck row-cards">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                                    <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVO-AUXILIAR</h3>
                                                </div>
                                                <div class="table-responsive">
                                                    {{-- --------------------------COMPETENCIAS------------------- --}}
                                                    @forelse ($competencias_auxiliar as $competencias)
                                                        <div class="card-header">
                                                            <h3 class="card-title">{{$competencias->competencia}}</h3>
                                                        </div>
                                                        <table class="table card-table datatable">
                                                            <thead>
                                                                <th>N°</th>
                                                                <th>Factores</th>
                                                                <th>Decripción</th>
                                                                <th>Ponderación</th>
                                                            </thead>
                                                            <tbody>
                                                                {{-- --------------------Factores Ejecutivo------------------------------ --}}
                                                                @foreach ($factorauxiliar as $auxiliar)
                                                                    {{-- ---------------Por competencia--------- --}}
                                                                    @if (($auxiliar->competencia)==($competencias->competencia))
                                                                        <tr>
                                                                            <td>{{++$numauxiliar}}</td>
                                                                            <td>{{$auxiliar->factor}}</td>
                                                                            <td>{{$auxiliar->descripcion}}</td>
                                                                            <td style="text-align: center">{{$auxiliar->ponderacion}}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                                    <td style="text-align: center; background-color: #0054a6; color: white;">{{$competencias->suma}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    @empty
                                                        <div class="card-header">
                                                            <h3>¡No existen datos!</h3>
                                                        </div>
                                                    @endforelse
        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection


