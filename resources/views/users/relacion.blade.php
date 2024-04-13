@extends('tablar::page')

@section('title', 'Relación de usuarios')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

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
                        {{ __('Nómina de usuarios jefe - dependiente') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('users.relprint') }}" target="_blank" class="btn btn-danger">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                            Imprimir
                        </a>
                        <a href="{{ route('users.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12l.01 0" /><path d="M13 12l2 0" /><path d="M9 16l.01 0" /><path d="M13 16l2 0" /></svg>
                            Lista de usuarios
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
                                    <table id="maintabla" class="stripe compact tabla">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jefe apellido</th>
                                                <th>Jefe nombre</th>
                                                <th>Jefe cargo</th>
                                                <th>Dependiente apellido</th>
                                                <th>Dependiente nombre</th>
                                                <th>Dependiente cargo</th>
                                                <th>Área</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @forelse ($reluser as $user)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                @if (!empty($user->jefe_apellido))
                                                    <td class="text-nowrap ">{{ $user->jefe_apellido }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                @if (!empty($user->jefe_apellido))
                                                    <td class="text-nowrap ">{{ $user->jefe_name }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                @if (!empty($user->jefe_apellido))
                                                    <td>{{ $user->cargo_jefe }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                @if (!empty($user->dependiente_apellido))
                                                    <td class="text-nowrap ">{{ $user->dependiente_apellido }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                @if (!empty($user->dependiente_name))
                                                    <td class="text-nowrap ">{{ $user->dependiente_name }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                @if (!empty($user->cargo))
                                                    <td>{{ $user->cargo }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
                                                @if (!empty($user->area))
                                                    <td>{{ $user->area }}</td>
                                                @else
                                                    <td> - </td>
                                                @endif
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

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        var table = new DataTable('#maintabla', {
      
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/es-ES.json',
            },
        });

        
    </script>
@endsection