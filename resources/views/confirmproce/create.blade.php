@extends('tablar::page')

@section('title', 'Iniciar proceso de confirmación')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    {{-- <div class="page-pretitle">
                        Create
                    </div> --}}
                    <h2 class="page-title">
                        {{ __('Iniciar proceso de confirmación ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('confirmproces.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12l.01 0" /><path d="M13 12l2 0" /><path d="M9 16l.01 0" /><path d="M13 16l2 0" /></svg>
                            Lista de procesos de confirmación
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
                            <h3 class="card-title">Detalles del proceso de confirmación</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('confirmproces.confassign') }}" id="ajaxForm" role="form"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-label">Seleccione la versión del formulario con el que se evaluará todo el proceso</label>
                                    <div>
                                        <select name="form_version_id" id="version" class='form-control' required>
                                            <option value="" selected="selected" disabled>Selecciona una opción</option>
                                            @foreach ($versiones as $version)
                                                <option value="{{$version->id}}" >Versión: {{$version->id}} | Creador: {{$version->creador}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Fecha de incio</label>
                                    <div>
                                        <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Fecha de conclusion</label>
                                    <div>
                                        <input class="form-control" type="date" name="fecha_conclusion" id="fecha_conclusion" required>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <div class="text-end">
                                        <div class="d-flex">
                                            <a href="{{ route('confirmproces.index') }}" class="btn btn-danger">Cancelar</a>
                                            <input type="submit" class="btn btn-primary ms-auto ajax-submit" value="Siguiente">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <script>
                                const fechaInicio = document.querySelector('#fecha_inicio');
                                const fechaConclusion = document.querySelector('#fecha_conclusion');

                                fechaInicio.addEventListener('change', (fecha) => {
                                    const fecha1 = new Date(fecha.currentTarget.value)
                                    const fecha2 = new Date(fecha1.setDate(fecha1.getDate() + 90));
                                    fechaConclusion.value = fecha2.toISOString().split('T')[0];
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


