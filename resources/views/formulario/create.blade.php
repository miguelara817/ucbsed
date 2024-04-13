@extends('tablar::page')

@section('title', 'Create Formulario')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Crear formulario
                    </div>
                    <h2 class="page-title">
                        {{ __('Formulario ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('formularios.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Formulario List
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
                        <form method="POST" action="{{ route('formularios.store') }}" id="ajaxForm" role="form"
                                  enctype="multipart/form-data">
                                @csrf
                        <div class="card-header">
                            <h3 class="card-title">Selecciona la versión del formulario</h3>
                        </div>
                        <div class="card-body">
                            
                                <select name="version" id="version" class='form-control' onchange="nivelesSelector(this.value)">
                                    <option value="" selected="selected" disabled>Selecciona una opción</option>
                                    @foreach ($versiones as $version)
                                        <option value="{{$version->id}}" >Versión: {{$version->id}} | Tipo: {{($version->tipo)->tipo_formulario}}</option>
                                    @endforeach
                                </select>
                                {{-- <br>
                                <strong>Tipo de formulario:</strong>
                                <p id="tipoForm"></p> --}}
                        </div>

                        <div class="card-header">
                            <h3 class="card-title">Selección de nivel</h3>
                        </div>
                        <div class="card-body">
                            
                            <select disabled selected name="nivel" id="nivel" class='form-control'>
                                <option value="" selected="selected" disabled>Selecciona una opción</option>
                                @foreach ($niveles as $nivel)
                                    <option value="{{$nivel->id}}" >{{$nivel->nivel}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <script>
                            let niveles = {!! json_encode($versiones->toArray()) !!};
                            let versionSelector = document.getElementById('version');
                        
                            function nivelesSelector(value) {
                                console.log(value);
                                if (value.length == 0) {
                                    console.log('valor 0');
                                    document.getElementById('nivel').setAttribute("disabled", "disabled");
                                } else{
                                    console.log('valor 1');
                                    document.getElementById('nivel').removeAttribute("disabled");
                                    
                                    // document.getElementById('tipoForm').innertHTML = $
                                }
                            }
                        </script>

                        <div class="card-body">
                            <div class="form-footer">
                                <div class="text-end">
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-danger">Cancelar</a>
                                        <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

