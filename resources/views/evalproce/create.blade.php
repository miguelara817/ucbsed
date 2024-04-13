@extends('tablar::page')

@section('title', 'Iniciar proceso de evaluación')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    {{-- <div class="page-pretitle">
                        Crear
                    </div> --}}
                    <h2 class="page-title">
                        {{ __('Iniciar proceso de evaluación ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
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
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Configuración del proceso de evaluación</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('evalproces.evalassign') }}" id="ajaxForm" role="form"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <h3 class="card-title">Introduzca el rango de fechas del proceso</h3>
                                    <label class="form-label">Fecha de incio</label>
                                    <div>
                                        <input class="form-control" type="date" name="fecha_inicio" id="" required>
                                    </div>
                                    <br>
                                    <label class="form-label">Fecha de conclusión</label>
                                    <div>
                                        <input class="form-control" type="date" name="fecha_conclusion" id="" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group mb-3">
                                    <h3 class="card-title">Formulario de evaluación</h3>

                                    <div class="d-flex flex-lg-row align-center">
                                        <div style="width: 100%; margin-right:10px">
                                            <select name="form_version_id" id="version" class='form-control' onchange="nivelesSelector(this.value)" required>
                                                <option value="" selected="selected" disabled>Selecciona una versión</option>
                                                @foreach ($versiones as $version)
                                                    <option value="{{$version->id}}" >Versión: {{$version->id}} | Creador: {{$version->creador}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        
                                        <div class="btn-list">
                                            <a href="{{ route('matriz.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                                </svg>
                                                Crear nueva versión
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Texto en el encabezado (Este es el texto de encabezado que tendrá cada formulario de evaluación)</label>
                                    <div>
                                        <textarea  class="form-control" name="texto_encabezado" id="" cols="30" rows="5" required placeholder="Por ejemplo: A través del presente formulario, se evaluará el desempeño mediante el análisis de la aplicación de competencias en el desarrollo de las funciones de cada colaborador(a), durante  el periodo..."></textarea>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Texto de Instrucción de llenado (Este es el texto de instrucción de llenado que tendrá cada formulario)</label>
                                    <div>
                                        <textarea  class="form-control" name="texto_instruccion" id="" cols="30" rows="3" required placeholder="Por ejemplo: Marque en la columna que mejor expresa su opinión sobre la forma cómo el funcionario actuó con relación a cada factor, en el periodo de evaluación..."></textarea>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <div class="text-end">
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-danger">Cancelar</a>
                                            <input type="submit" class="btn btn-primary ms-auto ajax-submit" value="Siguiente">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

