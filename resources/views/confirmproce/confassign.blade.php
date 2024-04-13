@extends('tablar::page')

@section('title', 'Crear proceso de confirmación')
<style>
    #loader-contenedor{
        display: none;
        background-color: white;
        height: 100%;
        width: 100%;
        position: fixed;
        transition: all 1s ease;
        z-index: 100000;
    }

    #loader-contenedor.active{
        display: block;
    }

    #loader-texto{
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        height: 150px;
        width: 150px;
    }

    #loader{
        border: 15px solid #ccc;
        border-top-color: #0054a6;
        border-top-style: groove;
        height: 100px;
        width: 100px;
        border-radius: 100%;

        animation: girar 2s linear infinite;
    }

    @keyframes girar{
        from{ transform: rotate(0deg);}
        to { transform: rotate(360deg);}
    }
</style>
<div id="loader-contenedor">
    <div id="loader-texto">
        <div id="loader"></div>
        <h3>Habilitando evaluación...</h3>
    </div>
</div>

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
                        {{ __('Crear proceso de confirmación ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('confirmproces.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12l.01 0" /><path d="M13 12l2 0" /><path d="M9 16l.01 0" /><path d="M13 16l2 0" /></svg>
                            Procesos de confirmación
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
                        {{-- <div class="card-header" style="display: flex; justify-content:space-between">
                            <h3 class="card-title">Asignación</h3>
                        </div> --}}
                        <div class="card-body">
                            <form method="POST" action="{{ route('confirmproces.pruebas') }}" id="formAsign" role="form"
                                  enctype="multipart/form-data">
                                @csrf
                                <input hidden type="number" name="version_id" id="" value="{{$version_id}}">
                                <input hidden type="date" name="fecha_inicio" id="" value="{{$fecha_inicio}}">
                                <input hidden type="date" name="fecha_conclusion" id="" value="{{$fecha_conclusion}}">

                                {{-- <select name="user_id" id="" class='form-control' required>
                                    <option value="" disabled selected>Seleccione al funcionario a evaluar</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->codigo}} - {{$user->apellido}} {{$user->name}}</option>
                                @endforeach
                                </select> --}}
                                
                                <label class="form-label" for="select-funcionario">Seleccionar funcionario:</label>
                                <input list="select-fun" id="select-funcionario" name="select-funcionario" class="form-control" required />
                                <datalist id="select-fun" >
                                    @foreach ($users as $user)
                                        <option class="form-control" value="{{$user->dependiente_id}}">{{$user->dependiente_apellido}} {{$user->dependiente_name}}</option>
                                    @endforeach
                                    {{-- <input type="number" value=""> --}}
                                    <input type="hidden" name="select-funcionario" id="select-funcionario-hidden">
                                </datalist>

                                <div class="form-footer">
                                    <div class="text-end">
                                        <div class="d-flex">
                                            <a href="{{ route('confirmproces.index') }}" class="btn btn-danger">Cancelar</a>
                                            <input type="submit" class="btn btn-primary ms-auto ajax-submit" value="Enviar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <script>
                                
                                document.querySelector('#select-funcionario').addEventListener('input', function(e) {
                                        var input = e.target,   
                                            list = input.getAttribute('list'),
                                            options = document.querySelectorAll('#' + list + ' option[value="'+input.value+'"]'),
                                            hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden');
                                    
                                        if (options.length > 0) {
                                          hiddenInput.value = input.value;
                                          input.value = options[0].innerText;
                                          }
                                    
                                    });

                                let form = document.getElementById('formAsign');

                                form.addEventListener("submit", function(){
                                    let loader = document.querySelector("#loader-contenedor");
                                    
                                    loader.classList.add("active");
                                }, false);
                              </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

