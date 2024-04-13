@extends('tablar::page')

@section('title', 'Seleccionar proceso')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    {{-- <div class="page-pretitle">
                        Create
                    </div> --}}
                    <h2 class="page-title">
                        {{ __('Seleccionar proceso de evaluación ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('reporteseval.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Panel general
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
                            <h3 class="card-title">Selección de proceso</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('reporteseval.selectprocess')}}" method="post" id="ajaxForm" role="form"
                            enctype="multipart/form-data">
                                @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Seleccione el proceso de evaluación</label>
                                <div>
                                <select name="evalprocess_id" id="" class='form-control' required>
                                    <option value="" disabled selected>Seleccione una opción</option>
                                    @foreach ($evalprocess as $proceso)
                                        <option value="{{$proceso->id}}">Proceso: {{$proceso->id}} | Periodo: {{$proceso->fecha_inicio}} a {{$proceso->fecha_conclusion}}</option>
                                    @endforeach
                                </select>
                                </div>
                                
                            </div>
                            <label class="form-label" for="select-funcionario">Seleccionar funcionario:</label>
                            <input list="select-fun" id="select-funcionario" name="select-funcionario" class="form-control" required />
                            <datalist id="select-fun" >
                                @foreach ($users as $user)
                                    <option class="form-control" value="{{$user->id}}">{{$user->apellido}} {{$user->name}}</option>
                                @endforeach
                                {{-- <input type="number" value=""> --}}
                                <input type="hidden" name="select-funcionario" id="select-funcionario-hidden">
                            </datalist>

                            <div class="form-footer">
                                <div class="text-end">
                                    <div class="d-flex">
                                        <a href="{{ route('reporteseval.index') }}" class="btn btn-danger">Cancelar</a>
                                        <input type="submit" class="btn btn-primary ms-auto ajax-submit" value="Siguiente">
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

