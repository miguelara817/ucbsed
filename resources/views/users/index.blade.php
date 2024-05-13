@extends('tablar::page')

@section('title', 'Usuarios')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Usuarios registrados ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('users.print') }}" target="_blank" class="btn btn-danger">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                            Imprimir
                        </a>
                        <a href="{{ route('users.relacion') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12l.01 0" /><path d="M13 12l2 0" /><path d="M9 16l.01 0" /><path d="M13 16l2 0" /></svg>
                            Lista de usuarios Jefe - Dependiente
                        </a>
                        <a href="{{ route('users.registrar') }}" class="btn btn-success d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Crear nuevo Usuario
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
                        <div class="table-responsive">
                            <div class="card-body">
                                <div class="table card-table">
                                    <table id="datatable" class="stripe compact tabla" >
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Código</th>
                                                <th>Apellidos</th>
                                                <th>Nombres</th>
                                                <th>Correo electrónico</th>
                                                <th>Cargo</th>
                                                <th>Área</th>
                                                <th>Departamento</th>
                                                <th>Unidad</th>
                                                <th>Seccion</th>
                                                <th>Fecha de ingreso</th>
                                                <th>Fecha de nacimiento</th>
                                                <th>Doc. Identidad</th>
                                                <th>Tipo de contrato</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                        @forelse ($usersBusqueda as $user)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                @if (!empty($user->codigo))
                                                    <td>{{ $user->codigo }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                @if (!empty($user->apellido))
                                                    <td>{{ $user->apellido }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                @if (!empty($user->name))
                                                    <td>{{ $user->name }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                @if (!empty($user->email))
                                                    <td>{{ $user->email }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                
                                                @if (!empty($user->cargo->cargo))
                                                    <td>{{ $user->cargo->cargo }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                
                                                @if (!empty($user->area->area))
                                                    <td>{{ $user->area->area }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                
                                                @if (!empty($user->depto->departamento))
                                                    <td>{{ $user->depto->departamento }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                
                                                @if (!empty($user->unidade->unidad))
                                                    <td>{{ $user->unidade->unidad }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                
                                                @if (!empty($user->seccione->seccion))
                                                    <td>{{ $user->seccione->seccion }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                
                                                @if (!empty($user->fecha_ingreso))
                                                    <td>{{ $user->fecha_ingreso }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                @if (!empty($user->fecha_nacimiento))
                                                    <td>{{ $user->fecha_nacimiento }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                
                                                @if (!empty($user->doc_identidad))
                                                    <td>{{ $user->doc_identidad }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                
                
                                                @if (!empty($user->contrato->tipo_contrato))
                                                    <td>{{ $user->contrato->tipo_contrato }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
        
                                                <td>
                                                    
                                                    <div class="btn-list flex-nowrap">
                                                        <div class="dropdown">
                                                            <button class="btn dropdown-toggle align-text-top"
                                                                    data-bs-toggle="dropdown" style="font-size: 12px;">
                                                                Acciones
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <form action="{{ route('assignments.authUser', $user->id) }}" method="post">
                                                                    @csrf
                                                                    <button type="submit" formtarget="_blank" class="dropdown-item">Ingresar</button>
                                                                </form>

                                                                <form action="{{ route('users.editar',$user->id) }}" method="post">
                                                                    @csrf
                                                                    <button type="submit" class="dropdown-item">Editar</button>
                                                                </form>
                                                                {{-- <a class="dropdown-item"
                                                                   href="{{ route('users.show',$user->id) }}">
                                                                    Ver
                                                                </a> --}}
                                                                {{-- <a class="dropdown-item"
                                                                   href="{{ route('users.editar',$user->id) }}">
                                                                    Editar
                                                                </a> --}}
                                                                
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
        </div>
    </div>
@endsection