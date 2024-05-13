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
                        <a href="{{ route('matriz.index') }}" class="btn btn-primary d-none d-sm-inline-block">
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
                        {{-- ---------------------------FORMULARIO------------------- --}}
                        <form action="{{ route('matriz.recieve') }}" method="post">
                            @csrf
                            <input hidden type="text" name="creador" id="" value="{{$creador}}">
                            <input hidden type="text" name="descripcion" id="" value="{{$descripcion}}">
                            <input hidden type="text" name="tipo_formulario" id="" value="{{$tipo_formulario}}">
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="tab-pane active show"  id="tabs-ejecutivo-ex1">
                                        <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                            <h3 class="card-title" style="color: #fcfdfe">NIVEL EJECUTIVO</h3>
                                        </div>
                                        @if ($factors_ejecutivo_existe)
                                        <div class="tablas-competencia">
                                            {{-- --------------------------COMPETENCIAS------------------- --}}
                                            @foreach ($competencias_ejecutivo as $competencias)
                                            <div class="table-responsive">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{$competencias['competencia']}}</h3>
                                                </div>
                                                <table class="table card-table table-vcenter datatable">
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
                                                            @if (($ejecutivos->competencia_id)==($competencias['id']))
                                                                <tr>
                                                                    <td>{{++$numejecutivo}}</td>
                                                                    <td>{{$ejecutivos->factor}}</td>
                                                                    <td>{{$ejecutivos->descripcion}}</td>
                                                                    <td>
                                                                        <input hidden type="number" name="factores_ejecutivo[]" value="{{$ejecutivos->id}}" >
                                                                        <input class="form-control" type="number" min="0" max="100" value="0" name="ejecutivo{{$competencias['id']}}[]" id="{{$ejecutivos->factor}}">
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="sumador-subtotal-ejecutivos">
                                                    <strong>La sumatoria de la ponderacion de los factores debe ser 100</strong>
                                                    <span>0</span>
                                                </div>
                                            </div> 
                                            @endforeach
                                        </div>
                                        @else
                                        <div class="card-header">
                                            <h3>¡No existen datos!</h3>
                                        </div>
                                        @endif
                                        
        
                                    </div>
        
                                    <div class="tab-pane" id="tabs-mandosmedios-ex1">
                                        <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                            <h3 class="card-title" style="color: #fcfdfe">NIVEL MANDOS MEDIOS</h3>
                                        </div>
                                        @if ($factors_medios_existe)
                                        <div class="tablas-competencia">
                                            {{-- --------------------------COMPETENCIAS------------------- --}}
                                            @foreach ($competencias_medio as $competencias)
                                            <div class="table-responsive">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{$competencias['competencia']}}</h3>
                                                </div>
                                                <table class="table card-table table-vcenter datatable">
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
                                                            @if (($medios->competencia_id)==($competencias['id']))
                                                                <tr>
                                                                    <td>{{++$nummedio}}</td>
                                                                    <td>{{$medios->factor}}</td>
                                                                    <td>{{$medios->descripcion}}</td>
                                                                    <td>
                                                                        <input hidden type="number" name="factores_medio[]" value="{{$medios->id}}">
                                                                        <input class="form-control" type="number" name="medio{{$competencias['id']}}[]" min="0" max="100" value="0" id="{{$medios->factor}}">
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="sumador-subtotal-medios">
                                                    <strong>La sumatoria de la ponderacion de los factores debe ser 100</strong>
                                                    <span>0</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                        <div class="card-header">
                                            <h3>¡No existen datos!</h3>
                                        </div>
                                        @endif
                                       
                                    </div>
        
                                    <div class="tab-pane" id="tabs-opeprofesional">
                                        <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                            <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVO PROFESIONAL</h3>
                                        </div>
                                        @if ($factors_profesional_existe)
                                        <div class="tablas-competencia">
                                            {{-- --------------------------COMPETENCIAS------------------- --}}
                                            @foreach ($competencias_profesional as $competencias)
                                            <div class="table-responsive">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{$competencias['competencia']}}</h3>
                                                </div>
                                                <table class="table card-table table-vcenter datatable">
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
                                                            @if (($profesionals->competencia_id)==($competencias['id']))
                                                                <tr>
                                                                    <td>{{++$numprofesional}}</td>
                                                                    <td>{{$profesionals->factor}}</td>
                                                                    <td>{{$profesionals->descripcion}}</td>
                                                                    <td>
                                                                        <input hidden type="number" name="factores_profesional[]" value="{{$profesionals->id}}">
                                                                        <input class="form-control" type="number" min="0" max="100" value="0" name="profesional{{$competencias['id']}}[]" id="{{$profesionals->factor}}">
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="sumador-subtotal-profesional">
                                                    <strong>La sumatoria de la ponderacion de los factores debe ser 100</strong>
                                                    <span>0</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>  
                                        @else
                                        <div class="card-header">
                                            <h3>¡No existen datos!</h3>
                                        </div>
                                        @endif
                                                                  
                                    </div>

                                    <div class="tab-pane" id="tabs-opetecnico">
                                        <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                            <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVO TÉCNICO</h3>
                                        </div>
                                        @if ($factors_tecnico_existe)
                                        <div class="tablas-competencia">
                                            {{-- --------------------------COMPETENCIAS------------------- --}}
                                            @foreach ($competencias_tecnico as $competencias)
                                            <div class="table-responsive">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{$competencias['competencia']}}</h3>
                                                </div>
                                                <table class="table card-table table-vcenter datatable">
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
                                                            @if (($tecnicos->competencia_id)==($competencias['id']))
                                                                <tr>
                                                                    <td>{{++$numtecnico}}</td>
                                                                    <td>{{$tecnicos->factor}}</td>
                                                                    <td>{{$tecnicos->descripcion}}</td>
                                                                    <td>
                                                                        <input hidden type="number" name="factores_tecnico[]" value="{{$tecnicos->id}}">
                                                                        <input class="form-control" type="number" min="0" max="100" value="0" name="tecnico{{$competencias['id']}}[]" id="{{$tecnicos->factor}}">
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="sumador-subtotal-tecnico">
                                                    <strong>La sumatoria de la ponderacion de los factores debe ser 100</strong>
                                                    <span>0</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div> 
                                        @else
                                        <div class="card-header">
                                            <h3>¡No existen datos!</h3>
                                        </div>
                                        @endif
                                        
                                    </div>
                                    
                                    <div class="tab-pane" id="tabs-opeadministrativo">
                                        <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                            <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVO ADMINISTRATIVO</h3>
                                        </div>
                                        @if ($factors_administrativo_existe)
                                        <div class="tablas-competencia">
                                            {{-- --------------------------COMPETENCIAS------------------- --}}
                                            @foreach ($competencias_administrativo as $competencias)
                                            <div class="table-responsive">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{$competencias['competencia']}}</h3>
                                                </div>
                                                <table class="table card-table table-vcenter datatable">
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
                                                            @if (($administrativos->competencia_id)==($competencias['id']))
                                                                <tr>
                                                                    <td>{{++$numadministrativo}}</td>
                                                                    <td>{{$administrativos->factor}}</td>
                                                                    <td>{{$administrativos->descripcion}}</td>
                                                                    <td>
                                                                        <input hidden type="number" name="factores_administrativo[]" value="{{$administrativos->id}}">
                                                                        <input class="form-control" type="number" min="0" max="100" value="0" name="administrativo{{$competencias['id']}}[]" id="{{$administrativos->factor}}">
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="sumador-subtotal-administrativo">
                                                    <strong>La sumatoria de la ponderacion de los factores debe ser 100</strong>
                                                    <span>0</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                        <div class="card-header">
                                            <h3>¡No existen datos!</h3>
                                        </div>
                                        @endif
                                        
                                    </div>
                    
                                    <div class="tab-pane" id="tabs-opeauxiliar">
                                        <div class="card-header" style="justify-content: center; background-color: #0054a6;">
                                            <h3 class="card-title" style="color: #fcfdfe">NIVEL OPERATIVO AUXILIAR</h3>
                                        </div>
                                        @if ($factors_auxiliar_existe)
                                        <div class="tablas-competencia">
                                            {{-- --------------------------COMPETENCIAS------------------- --}}
                                            @foreach ($competencias_auxiliar as $competencias)
                                            <div class="table-responsive">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{$competencias['competencia']}}</h3>
                                                </div>
                                                <table class="table card-table table-vcenter datatable">
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
                                                            @if (($auxiliars->competencia_id)==($competencias['id']))
                                                                <tr>
                                                                    <td>{{++$numauxiliar}}</td>
                                                                    <td>{{$auxiliars->factor}}</td>
                                                                    <td>{{$auxiliars->descripcion}}</td>
                                                                    <td>
                                                                        <input hidden type="number" name="factores_auxiliar[]" value="{{$auxiliars->id}}">
                                                                        <input class="form-control" type="number" min="0" max="100" value="0" name="auxiliar{{$competencias['id']}}[]" id="{{$auxiliars->factor}}">
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="sumador-subtotal-auxiliar">
                                                    <strong>La sumatoria de la ponderacion de los factores debe ser 100</strong>
                                                    <span>0</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                        <div class="card-header">
                                            <h3>¡No existen datos!</h3>
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-footer">
                                    <div class="text-end">
                                        <div class="d-flex">
                                            <a href="javascript:history.back()" class="btn btn-danger">Volver</a>
                                            <input type="submit" class="btn btn-primary ms-auto ajax-submit" id="generar" disabled value="Generar">
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

@section('js')
    <script>
        const btnGenerar = document.querySelector('#generar');
        const validarTodo = [
            {nivel: 'ejecutivo', validar: false},
            {nivel: 'medios', validar: false},
            {nivel: 'profesional', validar: false},
            {nivel: 'tecnico', validar: false},
            {nivel: 'administrativo', validar: false},
            {nivel: 'auxiliar', validar: false},
        ]

        const tabEjecutivos = document.querySelector("#tabs-ejecutivo-ex1 .tablas-competencia");
        for (let index = 0; index < tabEjecutivos.children.length; index++) {
            const element = tabEjecutivos.children[index];        
            const tableRows = element.children[1].children[1].children;
            const divNota = element.children[2];
            const evaluadorPonderacion = divNota.children[1];
        
            let ponderación = 0;
            const inputs = [];
            for (let index = 0; index < tableRows.length; index++) {
                const trTabla = element.children[1].children[1].children[index];
                const tdPonderacion = trTabla.children[trTabla.children.length-1];
                const inputPonderacion = tdPonderacion.children[1];
                
                inputs.push(inputPonderacion)
                
                inputPonderacion.addEventListener('input', e => {
                    let subtotal = 0;
                    inputs.forEach(element => {
                        if (element.value != "") {
                            subtotal += parseInt(element.value);
                        }
                    });
        
                    evaluadorPonderacion.textContent = subtotal;

                    if (subtotal === 100) {
                        evaluadorPonderacion.parentElement.style.background = "#28a745"
                        evaluadorPonderacion.parentElement.style.color = "#ffffe1"
                        validarCamposEjecutivos();
                    } else {
                        evaluadorPonderacion.parentElement.style.background = "#dc3545";
                        evaluadorPonderacion.parentElement.style.color = "#ffffe1"
                        validarCamposEjecutivos();
                    }
                    
                }); 
                
            }
        }

        function validarCamposEjecutivos() {
            const subContenedor = document.querySelectorAll('.sumador-subtotal-ejecutivos span');
            let campos = [];
            subContenedor.forEach(contenedor =>{
                campos.push(parseInt(contenedor.textContent))
            });
            const validarCampos = campos.every(e => e === 100);
            if (validarCampos) {
                validarTodo[0].validar = true
                validacion();
            } else {
                validarTodo[0].validar = false
                validacion();
            }
            
        }
        

        const tabMedios = document.querySelector("#tabs-mandosmedios-ex1 .tablas-competencia");
        for (let index = 0; index < tabMedios.children.length; index++) {
            const element = tabMedios.children[index];        
            const tableRows = element.children[1].children[1].children;
            const divNota = element.children[2];
            const evaluadorPonderacion = divNota.children[1];
        
            let ponderación = 0;
            const inputs = [];
            for (let index = 0; index < tableRows.length; index++) {
                const trTabla = element.children[1].children[1].children[index];
                const tdPonderacion = trTabla.children[trTabla.children.length-1];
                const inputPonderacion = tdPonderacion.children[1];
                inputs.push(inputPonderacion)
                
                inputPonderacion.addEventListener('input', e => {
                    let subtotal = 0;
                    inputs.forEach(element => {
                        if (element.value != "") {
                            subtotal += parseInt(element.value);
                        }
                    });
        
                    evaluadorPonderacion.textContent = subtotal;

                    if (subtotal === 100) {
                        evaluadorPonderacion.parentElement.style.background = "#28a745"
                        evaluadorPonderacion.parentElement.style.color = "#ffffe1"
                        validarCamposMedios();
                    } else {
                        evaluadorPonderacion.parentElement.style.background = "#dc3545";
                        evaluadorPonderacion.parentElement.style.color = "#ffffe1"
                        validarCamposMedios();
                    }
                    
                }); 
                
            }
        }

        function validarCamposMedios() {
            const subContenedor = document.querySelectorAll('.sumador-subtotal-medios span');
            let campos = [];
            subContenedor.forEach(contenedor =>{
                campos.push(parseInt(contenedor.textContent))
            });
            const validarCampos = campos.every(e => e === 100);
            if (validarCampos) {
                validarTodo[1].validar = true
                validacion();
            } else {
                validarTodo[1].validar = false
                validacion();
            }
            
        }


        const tabProfesional = document.querySelector("#tabs-opeprofesional .tablas-competencia");
        for (let index = 0; index < tabProfesional.children.length; index++) {
            const element = tabProfesional.children[index];        
            const tableRows = element.children[1].children[1].children;
            const divNota = element.children[2];
            const evaluadorPonderacion = divNota.children[1];
        
            let ponderación = 0;
            const inputs = [];
            for (let index = 0; index < tableRows.length; index++) {
                const trTabla = element.children[1].children[1].children[index];
                const tdPonderacion = trTabla.children[trTabla.children.length-1];
                const inputPonderacion = tdPonderacion.children[1];
                inputs.push(inputPonderacion)
                
                inputPonderacion.addEventListener('input', e => {
                    let subtotal = 0;
                    inputs.forEach(element => {
                        if (element.value != "") {
                            subtotal += parseInt(element.value);
                        }
                    });
        
                    evaluadorPonderacion.textContent = subtotal;

                    if (subtotal === 100) {
                        evaluadorPonderacion.parentElement.style.background = "#28a745"
                        evaluadorPonderacion.parentElement.style.color = "#ffffe1"
                        validarCamposProfesional();
                    } else {
                        evaluadorPonderacion.parentElement.style.background = "#dc3545";
                        evaluadorPonderacion.parentElement.style.color = "#ffffe1"
                        validarCamposProfesional();
                    }
                    
                }); 
                
            }
        }

        function validarCamposProfesional() {
            const subContenedor = document.querySelectorAll('.sumador-subtotal-profesional span');
            let campos = [];
            subContenedor.forEach(contenedor =>{
                campos.push(parseInt(contenedor.textContent))
            });
            const validarCampos = campos.every(e => e === 100);
            if (validarCampos) {
                validarTodo[2].validar = true
                validacion();
            } else {
                validarTodo[2].validar = false
                validacion();
            }
            
        }

        const tabTecnico = document.querySelector("#tabs-opetecnico .tablas-competencia");
        for (let index = 0; index < tabTecnico.children.length; index++) {
            const element = tabTecnico.children[index];        
            const tableRows = element.children[1].children[1].children;
            const divNota = element.children[2];
            const evaluadorPonderacion = divNota.children[1];
        
            let ponderación = 0;
            const inputs = [];
            for (let index = 0; index < tableRows.length; index++) {
                const trTabla = element.children[1].children[1].children[index];
                const tdPonderacion = trTabla.children[trTabla.children.length-1];
                const inputPonderacion = tdPonderacion.children[1];
                inputs.push(inputPonderacion)
                
                inputPonderacion.addEventListener('input', e => {
                    let subtotal = 0;
                    inputs.forEach(element => {
                        if (element.value != "") {
                            subtotal += parseInt(element.value);
                        }
                    });
        
                    evaluadorPonderacion.textContent = subtotal;

                    if (subtotal === 100) {
                        evaluadorPonderacion.parentElement.style.background = "#28a745"
                        evaluadorPonderacion.parentElement.style.color = "#ffffe1"
                        validarCamposTecnico();
                    } else {
                        evaluadorPonderacion.parentElement.style.background = "#dc3545";
                        evaluadorPonderacion.parentElement.style.color = "#ffffe1"
                        validarCamposTecnico();
                    }
                    
                }); 
                
            }
        }

        function validarCamposTecnico() {
            const subContenedor = document.querySelectorAll('.sumador-subtotal-tecnico span');
            let campos = [];
            subContenedor.forEach(contenedor =>{
                campos.push(parseInt(contenedor.textContent))
            });
            const validarCampos = campos.every(e => e === 100);
            if (validarCampos) {
                validarTodo[3].validar = true
                validacion();
            } else {
                validarTodo[3].validar = false
                validacion();
            }
            
        }

        const tabAdministrativo = document.querySelector("#tabs-opeadministrativo .tablas-competencia");
        for (let index = 0; index < tabAdministrativo.children.length; index++) {
            const element = tabAdministrativo.children[index];        
            const tableRows = element.children[1].children[1].children;
            const divNota = element.children[2];
            const evaluadorPonderacion = divNota.children[1];
        
            let ponderación = 0;
            const inputs = [];
            for (let index = 0; index < tableRows.length; index++) {
                const trTabla = element.children[1].children[1].children[index];
                const tdPonderacion = trTabla.children[trTabla.children.length-1];
                const inputPonderacion = tdPonderacion.children[1];
                inputs.push(inputPonderacion)
                
                inputPonderacion.addEventListener('input', e => {
                    let subtotal = 0;
                    inputs.forEach(element => {
                        if (element.value != "") {
                            subtotal += parseInt(element.value);
                        }
                    });
        
                    evaluadorPonderacion.textContent = subtotal;

                    if (subtotal === 100) {
                        evaluadorPonderacion.parentElement.style.background = "#28a745"
                        evaluadorPonderacion.parentElement.style.color = "#ffffe1"
                        validarCamposAdministrativo();
                    } else {
                        evaluadorPonderacion.parentElement.style.background = "#dc3545";
                        evaluadorPonderacion.parentElement.style.color = "#ffffe1"
                        validarCamposAdministrativo();
                    }
                    
                }); 
                
            }
        }

        function validarCamposAdministrativo() {
            const subContenedor = document.querySelectorAll('.sumador-subtotal-administrativo span');
            let campos = [];
            subContenedor.forEach(contenedor =>{
                campos.push(parseInt(contenedor.textContent))
            });
            const validarCampos = campos.every(e => e === 100);
            if (validarCampos) {
                validarTodo[4].validar = true
                validacion();
            } else {
                validarTodo[4].validar = false
                validacion();
            }
            
        }

        const tabAuxiliar = document.querySelector("#tabs-opeauxiliar .tablas-competencia");
        for (let index = 0; index < tabAuxiliar.children.length; index++) {
            const element = tabAuxiliar.children[index];        
            const tableRows = element.children[1].children[1].children;
            const divNota = element.children[2];
            const evaluadorPonderacion = divNota.children[1];
        
            let ponderación = 0;
            const inputs = [];
            for (let index = 0; index < tableRows.length; index++) {
                const trTabla = element.children[1].children[1].children[index];
                const tdPonderacion = trTabla.children[trTabla.children.length-1];
                const inputPonderacion = tdPonderacion.children[1];
                inputs.push(inputPonderacion)
                
                inputPonderacion.addEventListener('input', e => {
                    let subtotal = 0;
                    inputs.forEach(element => {
                        if (element.value != "") {
                            subtotal += parseInt(element.value);
                        }
                    });
        
                    evaluadorPonderacion.textContent = subtotal;

                    if (subtotal === 100) {
                        evaluadorPonderacion.parentElement.style.background = "#28a745"
                        evaluadorPonderacion.parentElement.style.color = "#ffffe1"
                        validarCamposAuxiliar();
                    } else {
                        evaluadorPonderacion.parentElement.style.background = "#dc3545";
                        evaluadorPonderacion.parentElement.style.color = "#ffffe1"
                        validarCamposAuxiliar();
                    }
                    
                }); 
                
            }
        }

        function validarCamposAuxiliar() {
            const subContenedor = document.querySelectorAll('.sumador-subtotal-auxiliar span');
            let campos = [];
            subContenedor.forEach(contenedor =>{
                campos.push(parseInt(contenedor.textContent))
            });
            const validarCampos = campos.every(e => e === 100);
            if (validarCampos) {
                validarTodo[5].validar = true
                validacion();
            } else {
                validarTodo[5].validar = false
                validacion();
            }
            
        }

        function validacion() {
            const valido = validarTodo.every(e => e.validar === true)
            if (valido) {
                btnGenerar.disabled = false;
            } else{
                btnGenerar.disabled = true;
            }
        }


        


    </script>
    
@endsection
