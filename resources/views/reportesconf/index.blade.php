@extends('tablar::page')

@section('title')
    Reportes de confirmación
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
                    {{ __('Reportes de evaluaciones de confirmación ') }}
                </h2>
            </div>
            <!-- Page title actions -->
            @if ($procesos_confirmacion)
            <div class="col-12 col-md-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="javascript:window.print()" class="btn btn-danger">Imprimir reporte</a>
                </div>
              </div>
            <div class="col-12 col-md-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('reportesconf.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Generar reporte individual
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        @if ($procesos_confirmacion)
        <div class="row row-deck row-cards">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div class="card card-data-asignaciones">
                      <h3>Número de asignaciones</h3>
                      <span>{{$num_confprocess}}</span>
                    </div>
                    <div class="card card-data-completadas">
                      <h3>Evaluaciones completadas</h3>
                      <span>{{$num_confprocess_finalizados}}</span>
                    </div>
                    <div class="card card-data-faltantes">
                      <h3>Evaluaciones pendientes</h3>
                      <span>{{$num_confprocess_pendientes}}</span>
                    </div>
                    <div class="card card-data-conforme">
                      <h3>Evaluaciones recomendadas</h3>
                      <span>{{$num_recomendados}}</span>
                    </div>
                    <div class="card card-data-noconforme">
                      <h3>Evaluaciones no recomendadas</h3>
                      <span>{{$num_no_recomendados}}</span>
                    </div>
                  </div>
                  <br>
                  <div style="display: flex; flex-direction:row; justify-content:space-evenly">
                    <div>
                      <h3>Cantidad de evaluaciones finalizadas y pendientes</h3>
                      <div id="chart-finalizados" class="chart-lg"></div>
                    </div>
                    <div>
                      <h3>Cantidad de funcionarios recomendados</h3>
                      <div id="chart-recomendados" class="chart-lg"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Notas obtenidas durante el proceso de confirmación</h3>
                    <div id="chart-notas-general" class="chart-lg"></div>
                </div>
              </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
              window.ApexCharts && (new ApexCharts(document.getElementById('chart-finalizados'), {
                chart: {
                  type: "pie",
                  fontFamily: 'inherit',
                  height: 300,
                  sparkline: {
                    enabled: true
                  },
                  animations: {
                    enabled: true
                  },
                },
                fill: {
                  opacity: 1,
                },
                series: [{!! json_encode($num_confprocess_finalizados) !!}, {!! json_encode($num_confprocess_pendientes) !!}],
                labels: ["Finalizados", "Pendientes"],
                tooltip: {
                  theme: 'dark'
                },
                grid: {
                  strokeDashArray: 4,
                },
                colors: [tabler.getColor("green"),tabler.getColor("yellow")],
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
                tooltip: {
                  fillSeriesColor: false
                },
              })).render();
            });
        
            document.addEventListener("DOMContentLoaded", function() {
              window.ApexCharts && (new ApexCharts(document.getElementById('chart-recomendados'), {
                chart: {
                  type: "pie",
                  fontFamily: 'inherit',
                  height: 300,
                  sparkline: {
                    enabled: true
                  },
                  animations: {
                    enabled: true
                  },
                },
                fill: {
                  opacity: 1,
                },
                series: [{!! json_encode($num_recomendados) !!},{!! json_encode($num_no_recomendados) !!}],
                labels: ["Recomendados", "No recomendados"],
                tooltip: {
                  theme: 'dark'
                },
                grid: {
                  strokeDashArray: 4,
                },
                colors: [tabler.getColor("primary"),tabler.getColor("red")],
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
                tooltip: {
                  fillSeriesColor: false
                },
              })).render();
            });
        
            document.addEventListener("DOMContentLoaded", function() {
              window.ApexCharts && (new ApexCharts(document.getElementById('chart-notas-general'), {
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
                  name: "Nota final obtenida",
                  data: {!! json_encode($confprocess_users->pluck('nota_final')->toArray()) !!}
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
              labels: {!! json_encode($confprocess_users->pluck('apellido')->toArray())  !!},
          
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
              plotOptions: {
                bar: {
                  horizontal: false,
                  dataLabels: {
                    position: 'bottom'
                  }
                }
              },
              })).render();
            });

          </script>
        
        
          <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
        @else
        <div class="row row-deck row-cards">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h3>No se econtraron procesos de confirmación</h3>
                </div>
              </div>
            </div>
          </div>
        @endif
          
    </div>
</div>

@endsection