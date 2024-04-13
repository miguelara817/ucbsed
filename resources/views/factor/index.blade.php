@extends('tablar::page')

@section('title')
    Factores
@endsection

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
                        Lista
                    </div> --}}
                    <h2 class="page-title">
                        {{ __('Factores ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('factor.print') }}" target="_blank" class="btn btn-danger">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                            Imprimir
                        </a>
                        <a href="{{ route('factors.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Crear Factor
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
                        {{-- <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Ver
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" value="10" size="3"
                                               aria-label="Invoices count">
                                    </div>
                                    entradas
                                </div>
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                               aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="table-responsive min-vh-100">
                            <div class="card-body">
                                <div class="table card-table">
                                    <table id="factorestable" class="table card-table table-vcenter datatable">
                                        <thead>
                                        <tr>
                                            <th class="w-1">No.</th>
                                            <th>Factor</th>
                                            <th>Descripcion</th>
                                            <th>Competencia</th>
                                            <th class="w-1"></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @forelse ($factores as $factor)
                                            <tr>
                                                {{-- <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                        aria-label="Select factor"></td> --}}
                                                <td>{{ ++$i }}</td>
                                                
                                                    <td>{{ $factor->factor }}</td>
                                                    <td>{{ $factor->descripcion }}</td>
                                                    {{-- <td>{{ ($factor->competencia)->competencias }}</td> --}}
                                                    <td>{{ $factor->competencias }}</td>

                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                        <div class="dropdown">
                                                            <button class="btn dropdown-toggle align-text-top"
                                                                    data-bs-toggle="dropdown">
                                                                Acciones
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                href="{{ route('factors.show',$factor->id) }}">
                                                                    Ver
                                                                </a>
                                                                <a class="dropdown-item"
                                                                href="{{ route('factors.edit',$factor->id) }}">
                                                                    Editar
                                                                </a>
                                                                <form
                                                                    action="{{ route('factors.destroy',$factor->id) }}"
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
                                            <td>No se encontraron registros</td>
                                        @endforelse
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-footer d-flex align-items-center">
                            {!! $factors->links('tablar::pagination') !!}
                        </div> --}}
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
        var table = new DataTable('#factorestable', {
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/es-ES.json',
            },
        });
    </script>
@endsection