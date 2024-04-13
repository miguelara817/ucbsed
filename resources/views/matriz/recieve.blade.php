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
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Lista de versiones
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
   
    {{-- @foreach ($ponderadores as $ponderador)
    {{var_dump($ponderador)}}
        @if (!($ponderador==NULL))
        
            @foreach ($ponderador as $item)
      
                {{$item}}
                    
            @endforeach
        @endif
    @endforeach --}}
    {{-- @foreach ($item1 as $it)
    {{var_dump($it)}}
    @endforeach

    {{$creador}}
    {{$tipo_id}} --}}
    @foreach ($factores_ejecutivo as $id => $factores_ejecutivos)
        {{$factores_ejecutivos}}
        {{$p_ejecutivo[$id]}}
        <br>
    @endforeach
    <hr>
    
    @foreach ($factores_medio as $id => $factores_medios)
        {{$factores_medios}}
        {{$p_medio[$id]}}
        <br>
    @endforeach
    <hr>

    @foreach ($factores_profesional as $id => $factores_profesionals)
        {{$factores_profesionals}}
        {{$p_profesional[$id]}}
        <br>
    @endforeach
    <hr>

    @foreach ($factores_tecnico as $id => $factores_tecnicos)
        {{$factores_tecnicos}}
        {{$p_tecnico[$id]}}
        <br>
    @endforeach
    <hr>

    @foreach ($factores_administrativo as $id => $factores_administrativos)
        {{$factores_administrativos}}
        {{$p_administrativo[$id]}}
        <br>
    @endforeach
    <hr>

    @foreach ($factores_auxiliar as $id => $factores_auxiliars)
        {{$factores_auxiliars}}
        {{$p_auxiliar[$id]}}
        <br>
    @endforeach
    <hr>


    
    

    
@endsection
