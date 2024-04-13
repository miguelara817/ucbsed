@extends('tablar::page')

@section('title', 'Create Evalproce')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Create
                    </div>
                    <h2 class="page-title">
                        {{ __('Evalproce ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('evalproces.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Evalproce List
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
                            <h3 class="card-title">Asignación</h3>
                            
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('confirmproce.store') }}" id="ajaxForm" role="form"
                                  enctype="multipart/form-data">
                                @csrf
                                <input hidden type="number" name="version_id" id="" value="{{$version_id}}">
                                <input hidden type="date" name="fecha_inicio" id="" value="{{$fecha_inicio}}">
                                <input hidden type="date" name="fecha_conclusion" id="" value="{{$fecha_conclusion}}">
                              
                                {{-- @foreach ($areas as $area)
                                <div class="selector-container">
                                    <div class="selectors">
                                        <input type="checkbox" name="{{$area->id}}" id="">
                                        <label for="{{$area->id}}">{{$area->area}}</label>
                                    </div>
                                    <br>
                                
                                    @foreach ($cargos as $cargo)
                                        @if (($area->id) == ($cargo["area_id"]))
                                        <div class="selectors">
                                            <input class="selector-son" type="checkbox" name="cargos_asignados[]" id="" value="{{$cargo["cargo_id"]}}">
                                            <label for="">{{$cargo["cargo"]}}</label>
                                            <br>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <hr>
                                @endforeach --}}
                                @foreach ($areas as $area)
                                <div class="selector-container">
                                    <div class="selectors">
                                        <input type="checkbox" name="{{$area->id}}" id="">
                                        <label for="{{$area->id}}">{{$area->area}}</label>
                                    </div>
                                    
                                    <br>
                                    @foreach ($cargos as $cargo)
                                        @if (($area->id) == ($cargo["area_id"]))
                                        
                                            {{-- <input class="selector-son" type="checkbox" name="cargos_asignados[]" id="" value="{{$cargo["cargo_id"]}}">
                                            <label for="">{{$cargo["cargo"]}}</label> --}}
                                            
                                            @foreach ($users as $user)
                                                @if (($user->cargo_id) == ($cargo["cargo_id"]))
                                                    {{-- <p>{{$user->name}}</p>
                                                    <br> --}}
                                                <div class="selectors">
                                                    <input class="selector-son" type="checkbox" name="jefes_asignados[]" id="" value="{{$user->id}}">
                                                    <label for="">{{$cargo["cargo"]}} | <strong>{{$user->name}}</strong></label>
                                                </div>
                                                @endif
                                            @endforeach
                                            
                                        
                                        @endif                       
                                    @endforeach
                                </div>
                                <hr>
                                @endforeach
                                <div class="form-footer">
                                    <div class="text-end">
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-danger">Cancelar</a>
                                            <input type="submit" class="btn btn-primary ms-auto ajax-submit" value="Asignar">
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

