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
    <div class="page-body">
        <div class="container-xl">
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        @csrf
                        <form action="" method="post">
                            <div class="card-header">
                                <h3 class="card-title">Nivel ejecutivo</h3>
                            </div>
                            {{$ejecutivo[0][0]}}
                            <div class="table-responsive min-vh-100">
                                {{-- @foreach ($ejecutivo as $ejecutivos)
                                    {{$ejecutivos->factor}}
                                @endforeach --}}
                                <hr>
                                @foreach ($competencia as $competencias)
                                {{$competencias->competencias}}
                                @endforeach
                                    
                                

                                <table>
                                    <thead>
                                        <th></th>
                                    </thead>
                                </table>


                                
                                <script>
                                    // let r = document.getElementById
                                    let ejecutivo = {!! json_encode($ejecutivo) !!};
                                    // console.log(ejecutivo)
                                    for (let index = 0; index < ejecutivo.length; index++) {
                                        const element = ejecutivo[index];
                                        console.log(element['competencia_id']);
                                    }

                                    let ids = [];
                                    let values = [];
                                    function seleccion() {
                                        console.log(event.target.value);
                                        // console.log('Click')
                                        values.push(parseInt(event.target.value))
                                        // console.log(ids)
                                        console.log(event.currentTarget.id);
                                        console.log(event.target.parentElement.id);
                                        // document.getElementById('resultadoSuma2').innerHTML += parseInt(event.target.value);
                                        
                                    }
                                    function validar() {
                                        let suma = 0;

                                        values.forEach(item => {
                                            suma += item;
                                        });
                                        console.log(suma);

                                        document.getElementById('resultadoSuma2').innerHTML = String(suma);
                                    }
                                </script>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
