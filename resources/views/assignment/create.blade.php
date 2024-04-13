@extends('tablar::page')

@section('title', 'Crear asignación')
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

    /*   ESTILOS DE LA PÁGINA   */
    .form-title{
        margin-top: 50px;
        text-align: center;
    }
    .form-title h3{
        margin: 0;
    }

    .form-subtitle{
        text-align: center;
        padding: 10px;
        background-color: #d9d9d9;
    }

    .form-subtitle h3{
        margin: 0;
    }

    .form-seccion{
        padding: 8px;
        background-color: #d9d9d9;
    }
    .form-seccion h3{
        margin: 0;
    }
    .header{
        margin: 15px auto;
    }
    .header-info{
        margin: 5px auto;
        display: flex;
        flex-direction: row;
        align-items: center;
        
    }
    .header-info .pregunta{
        margin-right: 20px;
        font-size: 15px;
        color: #18244e;
        font-weight: bold;
        
    }
    .header-info .respuesta{
        margin-right: 20px;
        font-size: 15px;
        border: none;
    }
    .header-info input {
        width: 60%;
        border:0;
        outline:0;
    }


    .selector-container{
        display: block;
        margin-left: 10px;
        transition: all 0.25s ease-in;
    }

    .noactivo{
        display: none;
        transition: all 0.25s ease-in;
    }

    .selectors{
        display: flex;
        align-items: center;
    }

    .selector-area{
        display: flex;
        align-items: center;
    }

    .selector-area label{
        padding-left: 10px;
        padding-right: 10px;
    }

    .selector-area label:hover{
        /* border: 1px solid #ccc; */
        border-radius: 3px;
        background-color:#ccc;
        cursor: pointer;
    }

    .selectors label{
        padding-left: 10px;
        padding-right: 10px;
    }

    .selector-container input[type="checkbox"]{
        height: 20px;
        width: 20px;
    }

    input[type="checkbox"]{
        height: 20px;
        width: 20px;
    }
    .selector-son{
        margin-left: 30px;
        margin-bottom: 15px;
        margin-top: 15px;
    }

    


</style>
<div id="loader-contenedor">
    <div id="loader-texto">
        <div id="loader"></div>
        <h3>Asignando evaluaciones...</h3>
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
                        {{ __('Crear proceso de evaluación ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('assignments.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Lista de asignaciones
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
                        <div class="card-header" style="display: flex; justify-content:space-between">
                            <h3 class="card-title">ASIGNACIÓN DE USUARIOS</h3>
                            <div>
                                <button class="btn btn-primary d-none d-sm-inline-block" type="button" id="marcar_todo" onclick="checkall()">MARCAR TODO</button>
                            <button class="btn btn-danger" type="button" id="desmarcar_todo" onclick="uncheckall()">DESMARCAR TODO</button>
                            </div>
                            
                        </div>
              
                        <div class="card-body">
                            <form method="POST" action="{{ route('assignments.uassignments') }}" id="formAsign" role="form"
                                  enctype="multipart/form-data">
                                @csrf
                                <input hidden type="number" name="evalprocess_id" id="" value="{{$evalprocess_id}}">
                                {{-- <input hidden type="number" name="version_id" id="" value="{{$version_id}}">
                        
                                <input hidden type="text" name="texto_encabezado" id="" value="{{$texto_encabezado}}">
                                <input hidden type="date" name="fecha_inicio" id="" value="{{$fecha_inicio}}">
                                <input hidden type="date" name="fecha_conclusion" id="" value="{{$fecha_conclusion}}">
                                <input hidden type="text" name="texto_instruccion" id="" value="{{$texto_instruccion}}"> --}}


                                <div class="contenedor">
                                    @forelse ($areas as $area)
                                    <div class="selector-area">
                                        <input type="checkbox" id="area-{{$area->id}}">
                                        <label for=""><strong>AREA: </strong>{{$area->area}}</label>
                                    </div>
                                    
                                    <div class="selector-container">
                                        @forelse ($usuarios as $user)
                                            @if (($area->id) == ($user->area_id))
                                            <div class="selectors">
                                                <input class="selector-son" type="checkbox" name="usuarios_asignados[]" id="" value="{{$user->dependiente_id}}">
                                                <label for=""><strong>USUARIO: </strong>{{$user->dependiente_apellido}} {{$user->dependiente_name}} | <strong>CARGO: </strong>{{$user->cargo}}</label>
                                            </div>
                                            @endif      
                                        @empty
                                            <label>No se encontraron datos</label>
                                        @endforelse
                                    
                                    </div>
                                    <br>
                                    @empty
                                        <label>No se encontraron datos</label>
                                    @endforelse
                                </div>

                                {{-- @forelse ($areas as $area)
                                <div class="selector-container">
                                    <div class="selectors">
                                        <label for=""><strong>AREA: </strong>{{$area->area}}</label>
                                    </div>
                                    
                                    <br>
                                    @forelse ($usuarios as $user)
                                        @if (($area->id) == ($user->area_id))
                                        <div class="selectors">
                                            <input class="selector-son" type="checkbox" name="usuarios_asignados[]" id="" value="{{$user->dependiente_id}}" checked>
                                            <label for=""><strong>USUARIO: </strong>{{$user->dependiente_apellido}} {{$user->dependiente_name}} | <strong>CARGO: </strong>{{$user->cargo}}</label>
                                        </div>
                                        @endif      
                                    @empty
                                        <label>No se encontraron datos</label>
                                    @endforelse
                                </div>
                                <br>
                                @empty
                                <label>No se encontraron datos</label>
                                @endforelse --}}
                                
                                @if (!empty($usuarios))
                                <div class="form-footer">
                                    <div class="text-end">
                                        <div class="d-flex">
                                            <a href="{{ route('assignments.index') }}" class="btn btn-danger">Cancelar</a>
                                            <input type="submit" class="btn btn-primary ms-auto ajax-submit" value="Asignar">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                            </form>

                            <script>
                                const contenedor = document.querySelector('.contenedor');
                                let buttonCheck = document.getElementById('marcar_todo');
                                let buttonUnCheck = document.getElementById('desmarcar_tdo');
                                let allChecks = document.querySelectorAll("input[type = 'checkbox']");

                                let form = document.getElementById('formAsign');

                                for (let index = 0; index < contenedor.children.length; index = index + 3) {
                                    const inputBtn = contenedor.children[index].children[0];
                                    const label = contenedor.children[index].children[1];

                                    label.addEventListener('click', desplegar);
                                    function desplegar() {
                                        // console.log(label.textContent);
                                        const divContenedor = label.parentElement.nextElementSibling;
                                        if (divContenedor.classList.contains('noactivo')) {
                                            divContenedor.classList.remove('noactivo');
                                        } else {
                                            divContenedor.classList.add('noactivo');
                                        }
                                    }

                                    inputBtn.addEventListener("change", (e) =>{
                                    if (e.currentTarget.checked) {
                                        const divInputs = inputBtn.parentElement.nextElementSibling.children;
                                        for (let index = 0; index < divInputs.length; index++) {
                                            const element = divInputs[index].children[0];
                                            element.checked = true;
                                        }
                                        
                                    } else {
                                        const divInputs = inputBtn.parentElement.nextElementSibling.children;
                                        for (let index = 0; index < divInputs.length; index++) {
                                            const element = divInputs[index].children[0];
                                            element.checked = false;
                                        }
                                    }
                                })
                                }

                                form.addEventListener("submit", function(){
                                    let loader = document.querySelector("#loader-contenedor");
                                    
                                    loader.classList.add("active");
                                }, false);


                                function checkall() {
                                    
                                    allChecks.forEach(function(checkbox) {
                                        checkbox.checked = true;
                                    })
                                }
                                function uncheckall() {
                                    
                                    allChecks.forEach(function(checkbox) {
                                        checkbox.checked = false;
                                    })
                                }

                                
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

