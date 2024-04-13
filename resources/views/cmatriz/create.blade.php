@extends('tablar::page')

@section('title')
    Matriz generadora
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                  
                    <h2 class="page-title">
                        {{ __('Matriz de generación de formularios de confirmación ') }}
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
                        <div class="card-header">
                            <h3 class="card-title">Datos de la versión</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('cmatriz.setdata') }}" id="ajaxForm" role="form"
                                    enctype="multipart/form-data">
                                @csrf
                                <label for="creador" class="form-label">Creador</label>
                                <input type="text" name="creador" id="creador" class="form-control">
                                <br>
                                <label for="descripcion" class="form-label">Descripción (opcional)</label>
                                <textarea type="text" name="descripcion" id="descripcion" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row row-deck row-cards">
            
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Selección de factores</h3>
                        </div>
                        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter datatable">
                                        <thead>
                                            <th style="font-size: 12px; font-weight: bold;">N°</th>
                                            <th style="font-size: 12px; font-weight: bold; text-align: center;">Factores</th>
                                            {{-- <th style="font-size: 12px; font-weight: bold; text-align: center;">Descripción</th> --}}
                                            {{-- <th style="font-size: 12px; font-weight: bold; text-align: center;">Seleción de factores</th> --}}
                                            @foreach ($nivel as $niveles)
                                                <th style="font-size: 12px; font-weight: bold;">{{ $niveles->nivel }}</th>
                                            @endforeach
                                        </thead>
                                        
                                        <tbody>
                                            @foreach ($competencias as $competencia)
                                                @foreach ($factores as $factor)
                                                    @if ($competencia->id == $factor->competencia_id)
                                                        <tr>
                                                            <td>{{ ++$numeracion }}</td>
                                                            <td>{{$factor->factor}}</td>
                                                            {{-- <td>{{$factor->descripcion}}</td> --}}
                                                            {{-- <td style="text-align: center"><input style="height: 22px; width: 22px" type="checkbox" name="factores_confirmacion[]" value="{{ $factor->id }}"></td> --}}
                                                            <td style="text-align: center"><input style="height: 22px; width: 22px" type="checkbox" name="ejecutivo[]" value="{{ $factor->id }}"></td>
                                                            <td style="text-align: center"><input style="height: 22px; width: 22px" type="checkbox" name="medios[]" value="{{ $factor->id }}"></td>
                                                            <td style="text-align: center"><input style="height: 22px; width: 22px" type="checkbox" name="profesional[]" value="{{ $factor->id }}"></td>
                                                            <td style="text-align: center"><input style="height: 22px; width: 22px" type="checkbox" name="tecnico[]" value="{{ $factor->id }}"></td>
                                                            <td style="text-align: center"><input style="height: 22px; width: 22px" type="checkbox" name="administrativo[]" value="{{ $factor->id }}"></td>
                                                            <td style="text-align: center"><input style="height: 22px; width: 22px" type="checkbox" name="auxiliar[]" value="{{ $factor->id }}"></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="form-footer">
                                    <div class="text-end">
                                        <div class="d-flex">
                                            <a href="{{ route('cmatriz.index') }}" class="btn btn-danger">Cancelar</a>
                                            <input type="submit" class="btn btn-primary ms-auto ajax-submit" value="Asignar Ponderadores">
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
