@extends('tablar::page')

@section('title')
    Asignación de ponderadores
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                  
                    <h2 class="page-title">
                        {{ __('Asignación de ponderadores ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
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
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-body"> --}}
                        {{-- ---------------------------FORMULARIO------------------- --}}
                            <form action="{{ route('cmatriz.recieve') }}" method="post">
                                @csrf
                                <input hidden type="text" name="creador" id="" value="{{$creador}}">
                                <input hidden type="text" name="descripcion" id="" value="{{$descripcion}}">
                                {{-- <input hidden type="text" name="tipo_formulario" id="" value="{{$tipo_formulario}}"> --}}
                                
                                <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                    <h3 class="card-title" style="color: #fcfdfe">NIVEL EJECUTIVO</h3>
                                </div>

                                <div class="table-responsive">
                                    {{-- --------------------------COMPETENCIAS------------------- --}}
                                    @foreach ($competencias as $competencia)
                                        <table class="table card-table table-vcenter datatable" id="{{$competencia->id}}">
                                            <thead>
                                                <th>N°</th>
                                                <th>Factores</th>
                                                <th>Decripción</th>
                                                <th>Ponderación</th>
                                            </thead>
                                            <tbody>
                                                {{-- --------------------Factores Ejecutivo------------------------------ --}}
                                                @foreach ($ejecutivo as $ejecutivos)
                                                    {{-- ---------------Por competencia--------- --}}
                                                    @if (($ejecutivos->competencia_id)==($competencia->id))
                                                        <tr>
                                                            <td>{{++$numejecutivo}}</td>
                                                            <td>{{$ejecutivos->factor}}</td>
                                                            <td>{{$ejecutivos->descripcion}}</td>
                                                            <td id="{{$competencia->id}}">
                                                                <input hidden type="number" name="factores_ejecutivo[]" value="{{$ejecutivos->id}}">
                                                                <input class="form-control" type="number" name="ejecutivo{{$competencia->id}}[]" id="{{$ejecutivos->factor}}">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                                <br>

                                <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                    <h3 class="card-title" style="color: #fcfdfe">NIVEL MANDOS MEDIOS</h3>
                                </div>
                                <div class="table-responsive">
                                    {{-- --------------------------COMPETENCIAS------------------- --}}
                                    @foreach ($competencias as $competencia)
                                        <table class="table card-table table-vcenter datatable" id="{{$competencia->id}}">
                                            <thead>
                                                <th>N°</th>
                                                <th>Factores</th>
                                                <th>Decripción</th>
                                                <th>Ponderación</th>
                                            </thead>
                                            <tbody>
                                                {{-- --------------------Factores Mandos medios------------------------------ --}}
                                                @foreach ($medio as $medios)
                                                    {{-- ---------------Por competencia--------- --}}
                                                    @if (($medios->competencia_id)==($competencia->id))
                                                        <tr>
                                                            <td>{{++$nummedio}}</td>
                                                            <td>{{$medios->factor}}</td>
                                                            <td>{{$medios->descripcion}}</td>
                                                            <td id="{{$competencia->id}}">
                                                                <input hidden type="number" name="factores_medio[]" value="{{$medios->id}}">
                                                                <input class="form-control" type="number" name="medio{{$competencia->id}}[]" id="{{$medios->factor}}">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                                <br>
                                <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                    <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVO PROFESIONAL</h3>
                                </div>
    
                                <div class="table-responsive">
                                    {{-- --------------------------COMPETENCIAS------------------- --}}
                                    @foreach ($competencias as $competencia)
                                        <table class="table card-table table-vcenter datatable" id="{{$competencia->id}}">
                                            <thead>
                                                <th>N°</th>
                                                <th>Factores</th>
                                                <th>Decripción</th>
                                                <th>Ponderación</th>
                                            </thead>
                                            <tbody>
                                                {{-- --------------------Factores Operativo Profesional------------------------------ --}}
                                                @foreach ($profesional as $profesionals)
                                                    {{-- ---------------Por competencia--------- --}}
                                                    @if (($profesionals->competencia_id)==($competencia->id))
                                                        <tr>
                                                            <td>{{++$numprofesional}}</td>
                                                            <td>{{$profesionals->factor}}</td>
                                                            <td>{{$profesionals->descripcion}}</td>
                                                            <td id="{{$competencia->id}}">
                                                                <input hidden type="number" name="factores_profesional[]" value="{{$profesionals->id}}">
                                                                <input class="form-control" type="number" name="profesional{{$competencia->id}}[]" id="{{$profesionals->factor}}">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                                <br>
                                <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                    <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVO TÉCNICO</h3>
                                </div>
    
                                <div class="table-responsive">
                                    {{-- --------------------------COMPETENCIAS------------------- --}}
                                    @foreach ($competencias as $competencia)
                                        <table class="table card-table table-vcenter datatable" id="{{$competencia->id}}">
                                            <thead>
                                                <th>N°</th>
                                                <th>Factores</th>
                                                <th>Decripción</th>
                                                <th>Ponderación</th>
                                            </thead>
                                            <tbody>
                                                {{-- --------------------Factores Operativo Técnico------------------------------ --}}
                                                @foreach ($tecnico as $tecnicos)
                                                    {{-- ---------------Por competencia--------- --}}
                                                    @if (($tecnicos->competencia_id)==($competencia->id))
                                                        <tr>
                                                            <td>{{++$numtecnico}}</td>
                                                            <td>{{$tecnicos->factor}}</td>
                                                            <td>{{$tecnicos->descripcion}}</td>
                                                            <td id="{{$competencia->id}}">
                                                                <input hidden type="number" name="factores_tecnico[]" value="{{$tecnicos->id}}">
                                                                <input class="form-control" type="number" name="tecnico{{$competencia->id}}[]" id="{{$tecnicos->factor}}">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                                <br>
                                <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                    <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVO ADMINISTRATIVO</h3>
                                </div>
    
                                <div class="table-responsive">
                                    {{-- --------------------------COMPETENCIAS------------------- --}}
                                    @foreach ($competencias as $competencia)
                                        <table class="table card-table table-vcenter datatable" id="{{$competencia->id}}">
                                            <thead>
                                                <th>N°</th>
                                                <th>Factores</th>
                                                <th>Decripción</th>
                                                <th>Ponderación</th>
                                            </thead>
                                            <tbody>
                                                {{-- --------------------Factores Operativo Administrativo------------------------------ --}}
                                                @foreach ($administrativo as $administrativos)
                                                    {{-- ---------------Por competencia--------- --}}
                                                    @if (($administrativos->competencia_id)==($competencia->id))
                                                        <tr>
                                                            <td>{{++$numadministrativo}}</td>
                                                            <td>{{$administrativos->factor}}</td>
                                                            <td>{{$administrativos->descripcion}}</td>
                                                            <td id="{{$competencia->id}}">
                                                                <input hidden type="number" name="factores_administrativo[]" value="{{$administrativos->id}}">
                                                                <input class="form-control" type="number" name="administrativo{{$competencia->id}}[]" id="{{$administrativos->factor}}">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                                <br>
                                <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                    <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVO AUXILIAR</h3>
                                </div>
    
                                <div class="table-responsive">
                                    {{-- --------------------------COMPETENCIAS------------------- --}}
                                    @foreach ($competencias as $competencia)
                                        <table class="table card-table table-vcenter datatable" id="{{$competencia->id}}">
                                            <thead>
                                                <th>N°</th>
                                                <th>Factores</th>
                                                <th>Decripción</th>
                                                <th>Ponderación</th>
                                            </thead>
                                            <tbody>
                                                {{-- --------------------Factores Operativo Auxiliar------------------------------ --}}
                                                @foreach ($auxiliar as $auxiliars)
                                                    {{-- ---------------Por competencia--------- --}}
                                                    @if (($auxiliars->competencia_id)==($competencia->id))
                                                        <tr>
                                                            <td>{{++$numauxiliar}}</td>
                                                            <td>{{$auxiliars->factor}}</td>
                                                            <td>{{$auxiliars->descripcion}}</td>
                                                            <td id="{{$competencia->id}}">
                                                                <input hidden type="number" name="factores_auxiliar[]" value="{{$auxiliars->id}}">
                                                                <input class="form-control" type="number" name="auxiliar{{$competencia->id}}[]" id="{{$auxiliars->factor}}">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                                <div class="card-body">
                                    <div class="form-footer">
                                        <div class="text-end">
                                            <div class="d-flex">
                                                <a href="javascript:history.back()" class="btn btn-danger">Volver</a>
                                                <input type="submit" class="btn btn-primary ms-auto ajax-submit" value="Generar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
