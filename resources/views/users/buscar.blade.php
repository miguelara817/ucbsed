@extends('tablar::page')

@section('title', 'Resultados')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    {{-- <div class="page-pretitle">
                        Lista de
                    </div> --}}
                    <h2 class="page-title">
                        {{ __('Resultados ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('users.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12l.01 0" /><path d="M13 12l2 0" /><path d="M9 16l.01 0" /><path d="M13 16l2 0" /></svg>
                            Nómina de Usuarios
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h3 class="card-title">Nómina de funcionarios registrados</h3>
                        </div> --}}
                        <div class="table-responsive min-vh-100">
                            <table class="table card-table text-nowrap table-vcenter datatable">
                                <thead>
                                <tr>

                                        <th>No.</th>
										<th>Código</th>
										<th>Apellidos</th>
										<th>Nombres</th>
										<th>Correo electrónico</th>
                                        {{-- <th>Contraseña</th> --}}
                                        {{-- <th>Rol</th> --}}
                                        <th>Cargo</th>
                                        <th>Área</th>
                                        <th>Departamento</th>
                                        <th>Unidad</th>
                                        <th>Seccion</th>
                                        <th>Fecha de ingreso</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Doc. Identidad</th>
                                        <th>Tipo de contrato</th>
                                        {{-- <th>Acciones</th> --}}

                                    <th class="w-1"></th>
                                </tr>
                                </thead>

                                <tbody>
                                  


                                @forelse ($usuario as $user)
                                
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                      
										<td>{{ $user->codigo }}</td>
                                        <td>{{ $user->apellido }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    
                                        @if (!empty($user->cargo->cargo))
                                            <td>{{ $user->cargo->cargo }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        @if (!empty($user->area->area))
                                            <td>{{ $user->area->area }}</td>
                                        @else
                                            <td></td>
                                        @endif
                        
                                        @if (!empty($user->depto->departamento))
                                            <td>{{ $user->depto->departamento }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        @if (!empty($user->unidade->unidad))
                                            <td>{{ $user->unidade->unidad }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        @if (!empty($user->seccione->seccion))
                                            <td>{{ $user->seccione->seccion }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        <td>{{ $user->fecha_ingreso }}</td>
                                        <td>{{ $user->fecha_nacimiento }}</td>
                                        <td>{{ $user->doc_identidad }}</td>

                                        @if (!empty($user->contrato->tipo_contrato))
                                            <td>{{ $user->contrato->tipo_contrato }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        <td>
                                            
                                            <div class="btn-list flex-nowrap">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown">
                                                        Acciones
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <form style="margin:0;" action="{{ route('users.editar',$user->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item">Editar</button>
                                                        </form>
 
                                                        
                                                        <form
                                                            action="{{ route('users.destroy',$user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    onclick="if(!confirm('¿Está seguro?')){return false;}"
                                                                    class="dropdown-item text-red"><i
                                                                    class="fa fa-fw fa-trash"></i>
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td>No se encontraron datos</td>
                                @endforelse
                                </tbody>

                            </table>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection