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
                        <div class="card-header">
                            <h3 class="card-title">GESTION DE RECURSOS HUMANOS</h3>
                            
                        </div>
                        <div class="card-header">
                            <p>A través del presente formulario, se evaluará el desempeño mediante el análisis de la aplicación de competencias en el desarrollo de las funciones de cada colaborador(a), durante  el periodo enero a octubre de 2023, con el propósito de tomar acciones de gestión que contribuyan a su desarrollo personal y profesional y de esta manera lograr una mejora continua en Sede La Paz de la Universidad.</p>
                        </div>
                        <form action="">
                            <div class="card-header">
                                <h4>I. Funcionario a evaluar</h4>
                                
                            </div>
                            <div class="card-body">
                                <label class="form-label" for="">NOMBRE Y APELLIDOS</label>
                                <input class="form-control" type="text" name="" id="">
                                <label  class="form-label" for="">PUESTO</label>
                                <input class="form-control" type="text" name="" id="">
                                <label class="form-label" for="">PERIODO DE EVALUACIÓN</label>
                                <label class="form-label" for="">Inicio</label>
                                <input class="form-control" type="date" name="" id="">
                                <label class="form-label" for="">Conclusión</label>
                                <input class="form-control" type="date" name="" id="">
                            </div>

                            <div class="card-header">
                                <h4>II. Funcionario evaluador</h4>
                                
                            </div>
                            <div class="card-body">
                                <label class="form-label" for="">NOMBRE Y APELLIDOS</label>
                                <input class="form-control" type="text" name="" id="">
                                <label  class="form-label" for="">PUESTO</label>
                                <input class="form-control" type="text" name="" id="">
                            </div>

                            <div class="card-header">
                                <h4>III. Funcionario a evaluar</h4>
                                
                            </div>
                            <div class="card-header">
                                <p>A través del presente formulario, se evaluará el desempeño mediante el análisis de la aplicación de competencias en el desarrollo de las funciones de cada colaborador(a), durante  el periodo enero a octubre de 2023, con el propósito de tomar acciones de gestión que contribuyan a su desarrollo personal y profesional y de esta manera lograr una mejora continua en Sede La Paz de la Universidad.</p>
                            </div>
                            


                            <div class="table-responsive">
                                <table class="table card-table table-vcenter datatable">
                                    <thead>
                                        <th>N°</th>
                                        <th>Factor</th>
                                        <th>Descripcion</th>
                                        <th>Débil</th>
                                        <th>Bueno</th>
                                        <th>Muy bueno</th>
                                        <th>Excelente</th>
                                        <th>Comentarios</th>
                                    </thead>

                                    <tbody>
                                    @forelse ($factores as $factore)
                                        <tr>
                                            <td>{{ $factore->id }}</td>
                                            <td>{{ $factore->factor }}</td>
                                            <td>{{ $factore->descripcion }}</td>
                                            <form action="">
                                                <td><input type="radio" name="{{ $factore->id }}" id=""></td>
                                                <td><input type="radio" name="{{ $factore->id }}" id=""></td>
                                                <td><input type="radio" name="{{ $factore->id }}" id=""></td>
                                                <td><input type="radio" name="{{ $factore->id }}" id=""></td>
                                                <td><textarea name="" id="" cols="30" rows="5"></textarea></td>
                                            </form>
                                        </tr>
                                    @empty
                                        <td>No Data Found</td>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-footer">
                                <div class="text-end">
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- <div class="card-body">
                            <form method="POST" action="{{ route('formularios.store') }}" id="ajaxForm" role="form"
                                  enctype="multipart/form-data">
                                @csrf
                                @include('formulario.form')
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

