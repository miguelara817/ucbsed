@extends('tablar::page')

@section('title', 'Editar Proceso de evaluación')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Editar proceso de evaluación ') }}
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
                        {{-- <div class="card-header">
                            <h3 class="card-title">Evalproce Details</h3>
                        </div> --}}
                        <div class="card-body">
                            <form method="POST"
                                  action="{{ route('evalproces.update', $evalproce->id) }}" id="ajaxForm" role="form"
                                  enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="form-label">Fecha de inicio</label>
                                    <div>
                                        <input class="form-control" type="date" name="fecha_inicio" id="" value="{{ old('fecha_inicio', $evalproce->fecha_inicio) }}" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Fecha de conclusión</label>
                                    <div>
                                        <input class="form-control" type="date" name="fecha_conclusion" id="" value="{{ old('fecha_conclusion', $evalproce->fecha_conclusion) }}" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Texto de encabezado</label>
                                    <div>
                                        <textarea class="form-control" name="texto_encabezado" id="" cols="30" rows="5" required >{{ old('texto_encabezado', $evalproce->texto_encabezado ) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Texto de instrucción de llenado</label>
                                    <div>
                                        <textarea class="form-control" name="texto_instruccion" id="" cols="30" rows="5" required >{{ old('texto_instruccion', $evalproce->texto_instruccion ) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-footer">
                                    <div class="text-end">
                                        <div class="d-flex">
                                            <a href="{{ route('evalproces.index') }}" class="btn btn-danger">Cancelar</a>
                                            <input type="submit" class="btn btn-primary ms-auto ajax-submit" value="Actualizar">
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



