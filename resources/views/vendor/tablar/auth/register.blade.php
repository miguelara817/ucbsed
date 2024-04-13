@extends('tablar::auth.layout')
@section('title', 'Register')
@section('content')
    <div class="container container-tight py-4">
        {{-- <div class="text-center mb-1 mt-5">
            <a href="" class="navbar-brand navbar-brand-autodark">
                <img src="{{asset(config('tablar.auth_logo.img.path','assets/logo.svg'))}}" height="36"
                     alt=""></a>
        </div> --}}
        <form class="card card-md" action="{{route('register')}}" method="post" autocomplete="off">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Crear nuevo usuario</h2>
                <div class="mb-3">
                    <label class="form-label">Código</label>
                    <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" placeholder="Ingresar código">
                    @error('codigo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Apellidos</label>
                    <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" placeholder="Ingresar apellido" required>
                    @error('apellido')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombres</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Ingresar nombre" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingresar correo electrónico" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

{{-- 
                <div class="mb-3">
                    <label class="form-label">Cargo old</label>
                    <select name="cargo" class="form-control" onchange="cargoSelect(this.value)">
                        <option value="" disabled selected>Seleccionar una opción</option>
                    @foreach ($cargos as $cargo)
                        <option value="{{$cargo->id}}">{{$cargo->cargo_dependiente}}</option>
                    @endforeach
                    </select>
                </div> --}}

                <div class="mb-3">
                    <label class="form-label">Cargo</label>
                    <select name="cargo" class="form-control" onchange="cargoidSelect(this.value)" required>
                        <option value="" disabled selected>Seleccionar una opción</option>
                    @foreach ($cargosid as $cargo)
                        <option value="{{$cargo->id}}">{{$cargo->cargo}} | ÁREA: {{$cargo->area->area}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Área</label>
                    <select name="area" id="area" class="form-control">
                        <option value="" disabled selected>Seleccionar una opción</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Departamento</label>
                    <select name="departamento" id="departamento" class="form-control">
                        <option value="" disabled selected>Seleccionar una opción</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Unidad</label>
                    <select name="unidad" id="unidad" class="form-control">
                        <option value="" disabled selected>Seleccionar una opción</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sección</label>
                    <select name="seccion" id="seccion" class="form-control">
                        <option value="" disabled selected>Seleccionar una opción</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha de Ingreso a la UCB</label>
                    <input type="date" name="fecha_ingreso" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                    {{-- @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror --}}
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Documento de Identidad</label>
                    <input type="text" name="doc_identidad" class="form-control" placeholder="C.I.">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo de Contrato</label>
                    <select name="tipocontrato" class="form-control">
                        <option value="" selected>Ninguno</option>
                        @foreach ($tipo_contratos as $tipo_contrato)
                            <option value="{{$tipo_contrato->id}}">{{$tipo_contrato->tipo_contrato}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <div class="input-group input-group-flat">
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña"
                               autocomplete="off" required>
                        <span class="input-group-text" onclick="sPassword()">
                  {{-- <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye --> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" id="icon" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12"
                                                                                                            cy="12"
                                                                                                            r="2"/><path
                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/></svg>
                  </a>
                </span>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirmar contraseña</label>
                    <div class="input-group input-group-flat">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Contraseña"
                               autocomplete="off" required>
                        <span class="input-group-text" onclick="scPassword()">
                  {{-- <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye --> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" id="icon2" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12"
                                                                                                            cy="12"
                                                                                                            r="2"/><path
                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/></svg>
                  </a>
                </span>
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="mb-3">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input"/>
                        <span class="form-check-label">Agree the <a href="#" tabindex="-1">terms and policy</a>.</span>
                    </label>
                </div> --}}
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Crear nuevo usuario</button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            ¿Ya tiene una cuenta? <a href="{{route('login')}}" tabindex="-1">Iniciar sesión</a>
        </div>
    </div>
@endsection

<script>

    let cargosid = {!! json_encode($cargosid->toArray()) !!}
    let cargos = {!! json_encode($cargos->toArray()) !!};
    let cargosJefe = {!! json_encode($cargos_jefe->toArray()) !!};
    let areas = {!! json_encode($areas->toArray()) !!};
    let departamentos = {!! json_encode($departamentos->toArray()) !!};
    let unidades = {!! json_encode($unidades->toArray()) !!};
    let secciones = {!! json_encode($secciones->toArray()) !!};
    // console.log(cargosJefe);
    
    function cargoSelect(value) {
        if (value.length == 0) {
            document.getElementById('area').innerHTML = '<option></option>'   
        } else{
            let areasOptions = "";
            let deptosOptions = "";
            let unidadesOptions = "";
            let seccionesOptions = "";
            // console.log(value);
            let cargoJefe = 0;
            for (let i in cargos) {
                if (value == cargos[i]["id"]) {
                    // console.log("jefe");
                    cargoJefe = cargos[i]["cargo_jefe"];
                    // console.log(cargoJefe);
                    let areaId = 0;
                    for (let j in cargosJefe) {
                        if (cargoJefe == cargosJefe[j]["id"]) {
                            areaId = cargosJefe[j]["area_id"];
                            // console.log(cargosJefe[j]["area_id"]);
                            for (let k in areas) {
                                if (areaId == areas[k]["id"]) {
                                    // console.log(areas[k]["area"]);
                                    // let areaSel = "";
                                    areaSelId = areas[k]["id"];
                                    areaSel = String(areas[k]['id']);
                                    areasOptions += '<option value='+ areaSel +'>'+ areas[k]['area'] + '</option>';
                                    // console.log(areasOptions);
                                    // unidadesOptions += '<option value='+ areaSel +'>'+ areas[k]['area'] + '</option>';
                                    // seccionesOptions += '<option value='+ areaSel +'>'+ areas[k]['area'] + '</option>';
                                    for (let d in departamentos) {
                                        if (areaSelId == departamentos[d]["area_id"]) {
                                            deptosSelect = String(departamentos[d]['id']);
                                            deptosOptions += '<option value='+ deptosSelect +'>'+ departamentos[d]['departamento'] + '</option>';
                                        }
                                    }

                                    for (let u in unidades) {
                                        // console.log(unidades)
                                        if (areaSelId == unidades[u]["area_id"]) {
                                            console.log(unidades[u]["area_id"])
                                            unidadesSelect = String(unidades[u]['id']);
                                            unidadesOptions += '<option value='+ unidadesSelect +'>'+ unidades[u]['unidad'] + '</option>';
                                            // console.log(unidades[u]["unidad"])
                                        }
                                    }

                                    for (let x in secciones) {
                                        if (areaSelId == secciones[x]["area_id"]) {
                                            seccionesSelect = String(secciones[x]['id']);
                                            seccionesOptions += '<option value='+ seccionesSelect +'>'+ secciones[x]['seccion'] + '</option>';
                                        }
                                    }
                                }
                                
                            }
                        }
                    }

                }
            }
            unidadesOptions +='<option value="">Ninguno</option>';
            seccionesOptions +='<option value="">Ninguno</option>';
            deptosOptions +='<option value="">Ninguno</option>';
            document.getElementById('area').innerHTML = areasOptions;
            document.getElementById('departamento').innerHTML = deptosOptions;
            document.getElementById('unidad').innerHTML = unidadesOptions;
            document.getElementById('seccion').innerHTML = seccionesOptions;
            console.log(areasOptions);
        }
    }


    function cargoidSelect(value) {
        if (value.length == 0) {
            document.getElementById('area').innerHTML = '<option></option>'   
        } else{
            let areasOptions = "";
            let deptosOptions = "";
            let unidadesOptions = "";
            let seccionesOptions = "";
            let cargoJefe = 0;
            for (let i in cargosid) {
                if (value == cargosid[i]["id"]) {
                    let areaId = 0;
                    areaId = cargosid[i]["area_id"]

                    for (let k in areas) {
                        if (areaId == areas[k]["id"]) {
                            // console.log(areas[k]["area"]);
                            // let areaSel = "";
                            areaSelId = areas[k]["id"];
                            areaSel = String(areas[k]['id']);
                            areasOptions += '<option value='+ areaSel +'>'+ areas[k]['area'] + '</option>';
                            // console.log(areasOptions);
                            // unidadesOptions += '<option value='+ areaSel +'>'+ areas[k]['area'] + '</option>';
                            // seccionesOptions += '<option value='+ areaSel +'>'+ areas[k]['area'] + '</option>';
                            for (let d in departamentos) {
                                if (areaSelId == departamentos[d]["area_id"]) {
                                    deptosSelect = String(departamentos[d]['id']);
                                    deptosOptions += '<option value='+ deptosSelect +'>'+ departamentos[d]['departamento'] + '</option>';
                                }
                            }

                            for (let u in unidades) {
                                // console.log(unidades)
                                if (areaSelId == unidades[u]["area_id"]) {
                                    console.log(unidades[u]["area_id"])
                                    unidadesSelect = String(unidades[u]['id']);
                                    unidadesOptions += '<option value='+ unidadesSelect +'>'+ unidades[u]['unidad'] + '</option>';
                                    // console.log(unidades[u]["unidad"])
                                }
                            }

                            for (let x in secciones) {
                                if (areaSelId == secciones[x]["area_id"]) {
                                    seccionesSelect = String(secciones[x]['id']);
                                    seccionesOptions += '<option value='+ seccionesSelect +'>'+ secciones[x]['seccion'] + '</option>';
                                }
                            }
                        }
                                
                    }
                    

                }
            }
            unidadesOptions +='<option value="">Ninguno</option>';
            seccionesOptions +='<option value="">Ninguno</option>';
            deptosOptions +='<option value="">Ninguno</option>';
            document.getElementById('area').innerHTML = areasOptions;
            document.getElementById('departamento').innerHTML = deptosOptions;
            document.getElementById('unidad').innerHTML = unidadesOptions;
            document.getElementById('seccion').innerHTML = seccionesOptions;
            console.log(areasOptions);
        }
    }







    function sPassword() {
        let showButton = document.getElementById("password");
        let icon = document.getElementById("icon");
        if (showButton.type === "password") {
            showButton.type = "text";
            icon.style.color = 'black';
        } else {
            showButton.type = "password";
            icon.style.color = '#798592';
        }
    }
    function scPassword() {
        let showcButton = document.getElementById("password_confirmation");
        let icon2 = document.getElementById("icon2");
        if (showcButton.type === "password") {
            showcButton.type = "text";
            icon2.style.color = 'black';
        } else {
            showcButton.type = "password";
            icon2.style.color = '#798592';
        }
    }
</script>
