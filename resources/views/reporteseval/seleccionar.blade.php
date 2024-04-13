@extends('tablar::page')

@section('title')
    Reporte individual
@endsection

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                {{-- <div class="page-pretitle">
                    Lista
                </div> --}}
                <h2 class="page-title">
                    {{ __('Reporte individual ') }}
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-12 col-md-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="javascript:window.print()" class="btn btn-danger">Imprimir reporte</a>
                </div>
            </div>
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
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Datos del funcionario</h3>
                    </div>
                    
                    @if ($evaluacion == true)
                        <div class="card-body">
                            <div class="form-group">
                                <strong>Funcionario:</strong>
                                <span>{{$user->apellido}} {{$user->name}}</span>
                            </div>
                            <div class="form-group">
                                <strong>Cargo:</strong>
                                <span>{{$user->cargo->cargo}}</span>
                            </div>
                            <div class="form-group">
                                <strong>Proceso de evaluación:</strong>
                                <span>{{$evalprocess->id}}</span>
                            </div>
                            <div class="form-group">
                                <strong>Periodo:</strong>
                                <span>{{date('d/m/Y',strtotime($evalprocess->fecha_inicio))}} a {{date('d/m/Y',strtotime($evalprocess->fecha_inicio))}}</span>
                            </div>
                            <div class="form-group">
                                <strong>Evaluador:</strong>
                                <span>{{$evalresult[0]->user_evaluador->apellido}} {{$evalresult[0]->user_evaluador->name}}</span>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body" style="background-color: #0054a6">
                                    <h3 class="card-title" style="color: #fcfdfe">CALIFICACIÓN OBTENIDA: {{$evalresult[0]->nota_final}} / 100</h3>

                                    @if ( (intval(round($evalresult[0]->nota_final)) <= 100) && ( intval(round($evalresult[0]->nota_final)) >= 91))
                                        <h3 class="card-title" style="color: #fcfdfe">EXCELENTE</h3>
                                    @elseif( (intval(round($evalresult[0]->nota_final)) <= 90 ) && (intval(round($evalresult[0]->nota_final)) >= 81))
                                        <h3 class="card-title" style="color: #fcfdfe">MUY BUENO</h3>
                                    @elseif( (intval(round($evalresult[0]->nota_final)) <= 80) && (intval(round($evalresult[0]->nota_final)) >= 71))
                                        <h3 class="card-title" style="color: #fcfdfe">BUENO</h3>
                                    @elseif((intval(round($evalresult[0]->nota_final)) <= 70) && (intval(round($evalresult[0]->nota_final)) >= 61))
                                        <h3 class="card-title" style="color: #fcfdfe">SUFICIENTE</h3>
                                    @elseif((intval(round($evalresult[0]->nota_final))) <= 60 && (intval(round($evalresult[0]->nota_final)) >= 51))
                                        <h3 class="card-title" style="color: #fcfdfe">ACEPTABLE</h3>
                                    @else
                                        <h3 class="card-title">INSATISFACTORIO</h3>
                                    @endif
                                    <div class="btn-list flex-nowrap">
                                        <div class="dropdown">
                                            @if ($asignacion[0]->evaluado_deacuerdo == 0)
                                            <button class="btn dropdown-toggle align-text-top btn-danger"
                                                    data-bs-toggle="dropdown">
                                                No conforme
                                            </button>
                                            @else
                                            <button class="btn dropdown-toggle align-text-top btn-success"
                                                    data-bs-toggle="dropdown">
                                                Conforme
                                            </button>
                                            @endif
                                            
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <form action="{{ route('genform.formResult') }}" method="post"> 
                                                    @csrf
                                                    <input hidden type="number" name="nivel_id" id="" value="{{$user->cargo->nivel_id}}">
                                                    <input hidden type="number" name="evalprocess_id" id="" value="{{$evalprocess->id}}">
                                                    <input hidden type="text" name="cargo" id="" value="{{$user->cargo->cargo}}">
                                                    <input hidden type="number" name="user_id" id="" value="{{$user->id}}">
                                                    <input type="submit" class="dropdown-item" value="Ver formulario">
                                                </form>
                                                <form action="{{ route('genform.print') }}" method="post" target="_blank"> 
                                                    @csrf
                                                    <input hidden type="number" name="nivel_id" id="" value="{{$user->cargo->nivel_id}}">
                                                    <input hidden type="number" name="evalprocess_id" id="" value="{{$evalprocess->id}}">
                                                    <input hidden type="text" name="cargo" id="" value="{{$user->cargo->cargo}}">
                                                    <input hidden type="number" name="user_id" id="" value="{{$user->id}}">
                                                    <input type="submit" class="dropdown-item" value="Imprimir">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Calificación obtenida en cada factor</h3>
                                    <div id="factores-total" class="chart-lg"></div>
                                </div>
                            </div>
                            <br>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex">
                                        <div class="flex-fill">
                                          <h3 class="card-title">Historial de calificaciones por proceso</h3>
                                          <div id="resultado_procesos" class="chart-lg"></div>
                                        </div>
                                        <div class="flex-fill">
                                          <h3 class="card-title">Calificación obtenida por competencia</h3>
                                          <div id="competencias" class="chart-lg"></div>
                                        </div>
                                      </div>
                                      
                                    </div>        
                                </div>
                            </div> 

                            <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document.getElementById('factores-total'), {
                                    chart: {
                                        type: "line",
                                        fontFamily: 'inherit',
                                        height: 300,
                                        parentHeightOffset: 0,
                                        toolbar: {
                                        show: true,
                                        },
                                        animations: {
                                        enabled: true
                                        },
                                    },
                                    fill: {
                                        opacity: 1,
                                    },
                                    stroke: {
                                        width: 2,
                                        lineCap: "round",
                                        curve: "straight",
                                    },
                                    series: [{
                                        name: "PERFIL IDEAL",
                                        data: {!! json_encode($evaldetailsresult->pluck('ponderacion')->toArray()) !!}
                                    },{
                                        name: "PERFIL REAL",
                                        data: {!! json_encode($evaldetailsresult->pluck('nota')->toArray()) !!}
                                    }],
                                    tooltip: {
                                        theme: 'dark'
                                    },
                                    grid: {
                                        padding: {
                                        top: -20,
                                        right: 0,
                                        left: 4,
                                        bottom: -4
                                        },
                                        strokeDashArray: 4,
                                    },
                                    dataLabels: {
                                        enabled: true,
                                    },
                                    xaxis: {
                                        labels: {
                                            padding: 0,
                                            style: {
                                                fontSize: '10px'
                                            },
                                        },
                                        tooltip: {
                                        enabled: false
                                        },
                                        
                                    },
                                    yaxis: {
                                        labels: {
                                        padding: 4
                                        },
                                    },
                                    labels: {!! json_encode($evaldetailsresult->pluck('factor')->toArray()) !!},

                                    colors: [tabler.getColor("primary"), tabler.getColor("green")],
                                    legend: {
                                        show: true,
                                        position: 'bottom',
                                        offsetY: 12,
                                        markers: {
                                        width: 10,
                                        height: 10,
                                        radius: 100,
                                        },
                                        itemMargin: {
                                        horizontal: 8,
                                        vertical: 8
                                        },
                                    },
                                    
                                    })).render();
                                });

                                
                                document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document.getElementById('competencias'), {
                                    chart: {
                                        type: "bar",
                                        fontFamily: 'inherit',
                                        height: 300,
                                        parentHeightOffset: 0,
                                        toolbar: {
                                        show: true,
                                        },
                                        animations: {
                                        enabled: true
                                        },
                                    },
                                    fill: {
                                        opacity: 1,
                                    },
                                    stroke: {
                                        width: 2,
                                        lineCap: "round",
                                        curve: "straight",
                                    },
                                    series: [{
                                        name: "Nota total obtenida",
                                        data: {!! json_encode($evalxcomp->pluck('nota')->toArray()) !!}
                                    }],
                                    tooltip: {
                                        theme: 'dark'
                                    },
                                    grid: {
                                        padding: {
                                        top: -20,
                                        right: 0,
                                        left: 4,
                                        bottom: -4
                                        },
                                        strokeDashArray: 4,
                                    },
                                    xaxis: {
                                        labels: {
                                            padding: 0,
                                            style: {
                                                fontSize: '10px'
                                            },
                                        },
                                        tooltip: {
                                        enabled: false
                                        },
                                        
                                    },
                                    labels: {!! json_encode($evalxcomp->pluck('competencia')->toArray()) !!},
                                    colors: [tabler.getColor("primary")],
                                    legend: {
                                        show: true,
                                        position: 'bottom',
                                        offsetY: 12,
                                        markers: {
                                        width: 10,
                                        height: 10,
                                        radius: 100,
                                        },
                                        itemMargin: {
                                        horizontal: 8,
                                        vertical: 8
                                        },
                                    },
                                    })).render();
                                });

                                document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document.getElementById('resultado_procesos'), {
                                    chart: {
                                        type: "line",
                                        fontFamily: 'inherit',
                                        height: 300,
                                        parentHeightOffset: 0,
                                        toolbar: {
                                            show: true,
                                        },
                                        animations: {
                                            enabled: true
                                        },
                                    },
                                    fill: {
                                        opacity: 1,
                                    },
                                    stroke: {
                                        width: 2,
                                        lineCap: "round",
                                        curve: "straight",
                                    },
                                    series: [{
                                        name: "CALIFICACIÓNL",
                                        data: {!! json_encode($result_process->pluck('nota_final')->toArray()) !!}
                                    }],
                                    tooltip: {
                                        theme: 'dark'
                                    },
                                    grid: {
                                        padding: {
                                        top: -20,
                                        right: 0,
                                        left: 4,
                                        bottom: -4
                                        },
                                        strokeDashArray: 4,
                                    },
                                    dataLabels: {
                                        enabled: true,
                                    },
                                    xaxis: {
                                        labels: {
                                            padding: 4,
                                        },
                                        tooltip: {
                                        enabled: false
                                        },
                                        
                                    },
                                    yaxis: {
                                        labels: {
                                        padding: 4
                                        },
                                    },
                                    labels: {!! json_encode($result_process->pluck('evalprocess_id')->toArray()) !!},

                                    colors: [tabler.getColor("primary")],
                                    legend: {
                                        show: true,
                                        position: 'bottom',
                                        offsetY: 12,
                                        offsetX: 10,
                                        markers: {
                                        width: 10,
                                        height: 10,
                                        radius: 100,
                                        },
                                        itemMargin: {
                                        horizontal: 8,
                                        vertical: 8
                                        },
                                    },
                                    
                                    })).render();
                                });
                            </script>
                        </div>
                    @else
                    <div class="card">
                        <div class="card-body">
                            <h3>¡NO SE ECONTRARON REGISTROS!</h3>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

