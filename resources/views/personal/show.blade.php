@extends('tablar::page')

@section('title', 'View Personal')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Ver
                    </div>
                    <h2 class="page-title">
                        {{ __('Personal ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('personals.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Lista de personal
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
                        <div class="card-header">
                            <h3 class="card-title">Detalles de la persona</h3>
                        </div>
                        <div class="card-body">
                            
<div class="form-group">
<strong>Apellidos:</strong>
{{ $personal->apellidos }}
</div>
<div class="form-group">
<strong>Nombres:</strong>
{{ $personal->nombres }}
</div>
<div class="form-group">
<strong>Nivel Id:</strong>
{{ $personal->nivel_id }}
</div>
<div class="form-group">
<strong>Cargo Id:</strong>
{{ $personal->cargo_id }}
</div>
<div class="form-group">
<strong>Area Id:</strong>
{{ $personal->area_id }}
</div>
<div class="form-group">
<strong>Depto Id:</strong>
{{ $personal->depto_id }}
</div>
<div class="form-group">
<strong>Unidad Id:</strong>
{{ $personal->unidad_id }}
</div>
<div class="form-group">
<strong>Seccion Id:</strong>
{{ $personal->seccion_id }}
</div>
<div class="form-group">
<strong>Fecha Ingreso:</strong>
{{ $personal->fecha_ingreso }}
</div>
<div class="form-group">
<strong>Fecha Nacimiento:</strong>
{{ $personal->fecha_nacimiento }}
</div>
<div class="form-group">
<strong>Doc Identidad:</strong>
{{ $personal->doc_identidad }}
</div>
<div class="form-group">
<strong>Expedido:</strong>
{{ $personal->expedido }}
</div>
<div class="form-group">
<strong>Tipocontrato Id:</strong>
{{ $personal->tipocontrato_id }}
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


