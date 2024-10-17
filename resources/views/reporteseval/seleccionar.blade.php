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
                    {{ __('Proceso de evaluación') }}
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
                    {{-- <div class="card-header">
                        <h3 class="card-title">Reporte de individual del proceso de evaluación</h3>
                    </div> --}}
                    {{-- <br> --}}
                    
                    @if ($evaluacion == true)
                        <div class="card-body">
                            <h3 class="card-title">Reporte individual del proceso de evaluación</h3>
                            <hr>
                            <div class="row align-items-center">
                                <div class="row col-6">
                                    <div class="col-3">
                                        <label for="funcionario" class="col-form-label">FUNCIONARIO:</label>
                                    </div>

                                    <div class="col-9">
                                        <input type="text" id="funcionario" class="form-control" value="{{$user->apellido}} {{$user->name}}" readonly>
                                    </div>
                                </div>

                                <div class="row col-6">
                                    <div class="col-2">
                                        <label for="cargo" class="col-form-label">CARGO:</label>
                                    </div>
                                    <div class="col-10">
                                        <input type="text" id="cargo" class="form-control" value="{{$user->cargo->cargo}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row align-items-center">
                                <div class="row col-6">
                                    <div class="col-3">
                                        <label for="evaluador" class="col-form-label">EVALUADOR:</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="evaluador" class="form-control" value="{{$evalresult[0]->user_evaluador->apellido}} {{$evalresult[0]->user_evaluador->name}}" readonly>
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <div class="col-6">
                                        <label for="evaluacion" class="col-form-label">PROCESO DE EVALUACIÓN:</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="number" id="evaluacion" class="form-control" value="{{$evalprocess->id}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row align-items-center">
                                <div class="row col-6">
                                    <div class="col-3">
                                        <label for="evaluacion" class="col-form-label">PERIODO:</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="evaluacion" class="form-control" value="{{date('d/m/Y',strtotime($evalprocess->fecha_inicio))}} - {{date('d/m/Y',strtotime($evalprocess->fecha_conclusion))}}" readonly>
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <div class="col-8">
                                        <label for="calificacion" class="col-form-label">CALIFICACIÓN OBTENIDA (SOBRE 100):</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="number" id="calificacion" class="form-control" value="{{$evalresult[0]->nota_final}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row align-items-center">
                                <div class="row col-6 align-items-center">
                                    <div class="col-6">
                                        <label for="rango" class="col-form-label">RANGO DE EVALUACIÓN:</label>
                                    </div>
                                    <div class="col-6">
                                        @if ( (intval(round($evalresult[0]->nota_final)) <= 100) && ( intval(round($evalresult[0]->nota_final)) >= 91))
                                            <input type="text" id="rango" class="form-control" value="EXCELENTE" readonly>
                                            {{-- <h3 class="card-title" style="color: #fcfdfe">EXCELENTE</h3> --}}
                                        @elseif( (intval(round($evalresult[0]->nota_final)) <= 90 ) && (intval(round($evalresult[0]->nota_final)) >= 81))
                                            <input type="text" id="rango" class="form-control" value="MUY BUENO" readonly>
                                            {{-- <h3 class="card-title" style="color: #fcfdfe">MUY BUENO</h3> --}}
                                        @elseif( (intval(round($evalresult[0]->nota_final)) <= 80) && (intval(round($evalresult[0]->nota_final)) >= 71))
                                            <input type="text" id="rango" class="form-control" value="BUENO" readonly>
                                            {{-- <h3 class="card-title" style="color: #fcfdfe">BUENO</h3> --}}
                                        @elseif((intval(round($evalresult[0]->nota_final)) <= 70) && (intval(round($evalresult[0]->nota_final)) >= 61))
                                            <input type="text" id="rango" class="form-control" value="SUFICIENTE" readonly>    
                                            {{-- <h3 class="card-title" style="color: #fcfdfe">SUFICIENTE</h3> --}}
                                        @elseif((intval(round($evalresult[0]->nota_final))) <= 60 && (intval(round($evalresult[0]->nota_final)) >= 51))
                                            <input type="text" id="rango" class="form-control" value="ACEPTABLE" readonly>    
                                            {{-- <h3 class="card-title" style="color: #fcfdfe">ACEPTABLE</h3> --}}
                                        @else
                                            <input type="text" id="rango" class="form-control" value="INSATISFACTORIO" readonly>
                                            {{-- <h3 class="card-title">INSATISFACTORIO</h3> --}}
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="row col-6 align-items-center">
                                    <div class="col-8">
                                        <label for="conformidad" class="col-form-label">CONFORMIDAD DEL EVALUADO:</label>
                                    </div>
                                    <div class="col-4">
                                        <div class="btn-list flex-nowrap">
                                            <div class="dropdown">
                                                @if ($asignacion[0]->evaluado_deacuerdo == 0)
                                                <button class="btn dropdown-toggle align-text-top btn-danger"
                                                        data-bs-toggle="dropdown">
                                                    NO CONFORME
                                                </button>
                                                @else
                                                <button class="btn dropdown-toggle align-text-top btn-success"
                                                        data-bs-toggle="dropdown">
                                                    CONFORME
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
                                        height: 400,
                                        // parentHeightOffset: 0,
                                        toolbar: {
                                            show: true,
                                        },
                                        animations: {
                                            enabled: true
                                        },
                                    },
                                    // fill: {
                                    //     opacity: 1,
                                    // },
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
                                        // top: 20,
                                        // right: 30,
                                        // left: 4,
                                            bottom: 100
                                        },
                                        // strokeDashArray: 4,
                                    },
                                    dataLabels: {
                                        enabled: true,
                                        formatter: function (val, opts) {
                                            // console.log(opts)
                                            // let text;
                                            // text = opts.w.globals.categoryLabels[opts.dataPointIndex]+"\n"+val
                                            // return opts.w.globals.categoryLabels[opts.dataPointIndex]
                                            return val
                                        },
                                    },
                                    xaxis: {
                                        tickPlacement: 'between',
                                        // max: 20,
                                        position: 'bottom',
                                        lines:{
                                            show: false,
                                        },
                                        labels: {
                                            rotate: -90,
                                            rotateAlways: true,
                                            show: true,
                                            trim: false,
                                            style: {
                                                fontSize: '13px',
                                                fontWeight: 500,
                                            },
                                        },
                                        tooltip: {
                                            enabled: false
                                        },
                                        title: {
                                            text: 'Factores',
                                            offsetY: 300,
                                            style: {
                                                fontSize: '15px',
                                                fontFamily: 'Helvetica, Arial, sans-serif',
                                            }
                                        },
                                        
                                    },
                                    yaxis: {
                                        labels: {
                                        // padding: 4
                                        },
                                        title: {
                                            text: 'Calificación',
                                            style: {
                                                fontSize: '15px',
                                                fontFamily: 'Helvetica, Arial, sans-serif',
                                            }
                                        }
                                    },
                                    labels: {!! json_encode($evaldetailsresult->pluck('factor')->toArray()) !!},

                                    colors: [tabler.getColor("primary"), tabler.getColor("green")],
                                    
                                    })).render();
                                });

                                
                                document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document.getElementById('competencias'), {
                                    chart: {
                                        type: "bar",
                                        fontFamily: 'inherit',
                                        height: 300,
                                        // height: 500,
                                        // parentHeightOffset: 0,
                                        toolbar: {
                                            show: true,
                                        },
                                        animations: {
                                            enabled: true
                                        },
                                    },
                                    plotOptions: {
                                        bar: {
                                            distributed: true, // this line is mandatory
                                            horizontal: false,
                                            // barHeight: '85%',
                                        },
                                    },
                                    // fill: {
                                    //     opacity: 1,
                                    // },
                                    // stroke: {
                                    //     width: 2,
                                    //     lineCap: "round",
                                    //     curve: "straight",
                                    // },
                                    series: [{
                                        name: "Nota total obtenida",
                                        data: {!! json_encode($evalxcomp->pluck('nota')->toArray()) !!}
                                    }],
                                    tooltip: {
                                        theme: 'dark'
                                    },
                                    grid: {
                                        padding: {
                                        // top: -20,
                                        // right: 0,
                                        // left: 4,
                                        // bottom: -4
                                        // bottom: 120
                                        },
                                        // strokeDashArray: 4,
                                    },
                                    xaxis: {
                                        tickPlacement: 'between',
                                        // max: 50,
                                        position: 'bottom',
                                        lines:{
                                            show: false,
                                        },
                                        labels: {
                                            rotate: -90,
                                            rotateAlways: true,
                                            // padding: 0,
                                            show: false,
                                            trim: true,
                                            // minHeight: 100,
                                            // maxHeight: 120,
                                            style: {
                                                fontSize: '10px',
                                                fontWeight: 500,
                                            },
                                        },
                                        tooltip: {
                                            enabled: false
                                        },
                                        title: {
                                            text: 'Competencias',
                                            offsetY: 80,
                                            style: {
                                                fontSize: '15px',
                                                fontFamily: 'Helvetica, Arial, sans-serif',
                                            }
                                        },
                                        
                                    },
                                    yaxis: {
                                        labels: {
                                        // padding: 4
                                        },
                                        title: {
                                            text: 'Calificación',
                                            style: {
                                                fontSize: '15px',
                                                fontFamily: 'Helvetica, Arial, sans-serif',
                                            }
                                        }
                                    },
                                    labels: {!! json_encode($evalxcomp->pluck('competencia')->toArray()) !!},
                                    // colors: [tabler.getColor("primary")],
                                    colors: [ // this array contains different color code for each data
                                        "#33b2df",
                                        "#546E7A",
                                        "#d4526e",
                                        "#13d8aa",
                                        "#A5978B",
                                        "#2b908f",
                                        "#f9a3a4",
                                        "#90ee7e",
                                        "#f48024",
                                        "#69d2e7"
                                    ],
                                    legend: {
                                        show: true,
                                        position: 'bottom',
                                        offsetY: -10,
                                        // markers: {
                                        // width: 10,
                                        // height: 10,
                                        // radius: 100,
                                        // },
                                        // itemMargin: {
                                        // horizontal: 8,
                                        // vertical: 8
                                        // },
                                    },
                                    })).render();
                                });

                                document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document.getElementById('resultado_procesos'), {
                                    chart: {
                                        type: "line",
                                        fontFamily: 'inherit',
                                        height: 300,
                                        toolbar: {
                                            show: true,
                                        },
                                        animations: {
                                            enabled: true
                                        },
                                    },
                                    
                                    stroke: {
                                        width: 2,
                                        lineCap: "round",
                                        curve: "straight",
                                    },
                                    series: [{
                                        name: "CALIFICACIÓN",
                                        data: {!! json_encode($result_process->pluck('nota_final')->toArray()) !!}
                                    }],
                                    tooltip: {
                                        theme: 'dark'
                                    },
                                    dataLabels: {
                                        enabled: true,
                                    },
                                    xaxis: {
                                        tickPlacement: 'between',
                                        lines:{
                                            show: false,
                                        },
                                        title: {
                                            text: 'Proceso',
                                            offsetY: 90,
                                            style: {
                                                fontSize: '15px',
                                                fontFamily: 'Helvetica, Arial, sans-serif',
                                            }
                                        },
                                        tooltip: {
                                            enabled: false
                                        },
                                        
                                    },
                                    yaxis: {
                                        title: {
                                            text: 'Calificación',
                                            // offsetY: 80,
                                            style: {
                                                fontSize: '15px',
                                                fontFamily: 'Helvetica, Arial, sans-serif',
                                            }
                                        },
                                        labels: {
                                        // padding: 4
                                        },
                                    },
                                    labels: {!! json_encode($result_process->pluck('evalprocess_id')->toArray()) !!},

                                    colors: [tabler.getColor("primary")],
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

