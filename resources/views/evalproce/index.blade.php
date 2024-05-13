@extends('tablar::page')

@section('title')
    Proceso de evaluación
@endsection
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        {{ __('Procesos de evaluación ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                @if ($evalproces_last)
                    @if ($evalproces_last->finalizacion == 1)
                    <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('evalproces.print') }}" target="_blank" class="btn btn-danger">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                                Imprimir
                            </a>
                            <a href="{{ route('evalproces.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                </svg>
                                Crear proceso de evaluación
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('evalproces.print') }}" target="_blank" class="btn btn-danger">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                                Imprimir
                            </a>
                        </div>
                    </div>
                    @endif
                @else
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('evalproces.print') }}" target="_blank" class="btn btn-danger">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" /><path d="M17 18h2" /><path d="M20 15h-3v6" /><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" /></svg>
                            Imprimir
                        </a>
                        <a href="{{ route('evalproces.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Crear proceso de evaluación
                        </a>
                    </div>
                </div>
                @endif
                
                
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
                        <div class="table-responsive">
                            <div class="card-body">
                                <div class="table card-table">
                                    <table id="datatable" class="stripe compact tabla">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID</th>
                                                <th>Vers. formulario</th>
                                                <th>Fecha de inicio</th>
                                                <th>Fecha de conclusion</th>
                                                <th>Estado</th>
                                                <th> - </th>
                                                <th> - </th>
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                        @foreach ($evalproces as $key => $evalproce)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $evalproce->id }}</td>
                                                <td>{{ $evalproce->form_version_id }}</td>
                                                <td>{{date('d/m/Y',strtotime($evalproce->fecha_inicio))}}</td>
                                                <td>{{date('d/m/Y',strtotime($evalproce->fecha_conclusion))}}</td>
                                                @if ($evalproce->finalizacion == 0)
                                                    <td style="color: red">En proceso</td>
                                                    <td>
                                                        <form style="margin:0;" action="{{ route('evalproces.estado') }}" method="post" id="form_cerrar">
                                                            @csrf
                                                            <input hidden type="number" name="evalprocess_id" id="" value="{{$evalproce->id}}">
                                                            <button type="submit" class="btn btn-danger" style="font-size: 12px">Cerrar proceso</button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td style="color: green">Finalizado</td>
                                                    @if ($evalproce == $evalproces_last)
                                                        <td>
                                                            <form style="margin:0;" action="{{ route('evalproces.reabrir') }}" method="post" id="form_abrir">
                                                                @csrf
                                                                <input hidden type="number" name="evalprocess_id" id="" value="{{$evalproce->id}}">
                                                                <button type="submit" class="btn btn-primary" style="font-size: 12px">Reabrir proceso</button>
                                                            </form>
                                                        </td>
                                                    @else
                                                        <td> - </td>
                                                    @endif
                                                @endif
                                    
        
                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                        <div class="dropdown">
                                                            <button class="btn dropdown-toggle align-text-top"
                                                                    data-bs-toggle="dropdown" style="font-size: 12px;">
                                                                Acciones
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                   href="{{ route('evalproces.show',$evalproce->id) }}">
                                                                    Ver
                                                                </a>
                                                                <a class="dropdown-item"
                                                                   href="{{ route('evalproces.edit',$evalproce->id) }}">
                                                                    Editar
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
    <script type="module">
        const formulario = document.querySelector('#form_cerrar');
        if (formulario) {
            formulario.addEventListener('submit', seguro);

            function seguro(e) {
                e.preventDefault();
                const swalWithBootstrapButtons = Swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-success m-1",
                    cancelButton: "btn btn-danger m-1"
                },
                
                });
                swalWithBootstrapButtons.fire({
                title: "¿Está seguro?",
                text: "Se cerrará el proceso de evaluación",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "¡Si, estoy seguro de cerrarlo!",
                cancelButtonText: `¡No, cancelar!`,
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                    title: "Cerrado",
                    text: "Se cerró el proceso de evaluación.",
                    icon: "success"
                    });
                    this.submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                    title: "Cancelado",
                    text: "El proceso de evaluación sigue abierto.",
                    icon: "error"
                    });
                }
                });
            }
        }
    </script>
@endsection
