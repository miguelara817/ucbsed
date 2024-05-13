@extends('tablar::page')

@section('title', 'Detalles del formulario')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        {{ __('Detalles de la versión del formulario') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('cmatriz.pdfprint', $version->id) }}" target="_blank" class="btn btn-danger">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                            Imprimir
                        </a>
                        <a href="{{ route('cmatriz.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12l.01 0" /><path d="M13 12l2 0" /><path d="M9 16l.01 0" /><path d="M13 16l2 0" /></svg>
                            Lista de versiones
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
                    @if(config('tablar','display_alert'))
                        @include('tablar::common.alert')
                    @endif
                    <div class="card">
                        {{-- <div class="card-header">
                            <h3 class="card-title">Detalles de la version</h3>
                        </div> --}}
                        <div class="card-body">
                            <div class="form-group">
                                <strong>VERSIÓN: </strong>
                                <span>{{ $version->id }}</span>
                            </div>
                            <div class="form-group">
                                <strong>CREADOR: </strong>
                                <span>{{ $version->creador }}</span>
                            </div>
                            
                            <div class="form-group">
                                <strong>DESCRIPCIÓN: </strong>
                                <span>{{ $version->descripcion }}</span>
                            </div>
                            {{-- <div class="form-group">
                            <strong>Tipo de formulario:</strong>
                            {{ $version->tipo->tipo_formulario }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">

                
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
                                            @forelse ($competencias as $competencia)
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
                                                            <tr>
                                                                <td>{{++$numejecutivo}}</td>
                                                                <td>{{$ejecutivos->factor}}</td>
                                                                <td>{{$ejecutivos->descripcion}}</td>
                                                                <td style="text-align: center">{{$ejecutivos->ponderacion}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                            <td style="text-align: center; background-color: #0054a6; color: white;">100</td>
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
                                            @forelse ($competencias as $competencia)
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
                                                            <tr>
                                                                <td>{{++$nummedio}}</td>
                                                                <td>{{$medio->factor}}</td>
                                                                <td>{{$medio->descripcion}}</td>
                                                                <td style="text-align: center">{{$medio->ponderacion}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                            <td style="text-align: center; background-color: #0054a6; color: white;">100</td>
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
                                            <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVOS-PROFESIONAL</h3>
                                        </div>
                                        <div class="table-responsive">
                                            {{-- --------------------------COMPETENCIAS------------------- --}}
                                            @forelse ($competencias as $competencia)
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
                                                            <tr>
                                                                <td>{{++$numprofesional}}</td>
                                                                <td>{{$profesional->factor}}</td>
                                                                <td>{{$profesional->descripcion}}</td>
                                                                <td style="text-align: center">{{$profesional->ponderacion}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                            <td style="text-align: center; background-color: #0054a6; color: white;">100</td>
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
                                            @forelse ($competencias as $competencia)
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
                                                            <tr>
                                                                <td>{{++$numtecnico}}</td>
                                                                <td>{{$tecnico->factor}}</td>
                                                                <td>{{$tecnico->descripcion}}</td>
                                                                <td style="text-align: center">{{$tecnico->ponderacion}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                            <td style="text-align: center; background-color: #0054a6; color: white;">100</td>
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
                                            @forelse ($competencias as $competencia)
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
                                                            <tr>
                                                                <td>{{++$numadministrativo}}</td>
                                                                <td>{{$administrativo->factor}}</td>
                                                                <td>{{$administrativo->descripcion}}</td>
                                                                <td style="text-align: center">{{$administrativo->ponderacion}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                            <td style="text-align: center; background-color: #0054a6; color: white;">100</td>
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
                                            @forelse ($competencias as $competencia)
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
                                                            <tr>
                                                                <td>{{++$numauxiliar}}</td>
                                                                <td>{{$auxiliar->factor}}</td>
                                                                <td>{{$auxiliar->descripcion}}</td>
                                                                <td style="text-align: center">{{$auxiliar->ponderacion}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3" style="text-align: center; background-color: #0054a6; color: white;">SUBTOTAL</td>
                                                            <td style="text-align: center; background-color: #0054a6; color: white;">100</td>
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
@endsection


