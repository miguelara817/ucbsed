@extends('tablar::page')

@section('title')
    Reporte de procesos de evaluación
@endsection

@section('content')
  <div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">                
                <h2 class="page-title">
                    {{ __('Reportes de procesos de evaluación ') }}
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
                  <a href="{{ route('reporteseval.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                      <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                      <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-report"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" /><path d="M18 14v4h4" /><path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" /><path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M8 11h4" /><path d="M8 15h3" /></svg>
                      Generar reporte individual
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
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h2>Proceso de evaluación: {{$evalprocess->id}}</h2>
                  <h2>Fecha: {{date('d/m/Y',strtotime($evalprocess->fecha_inicio))}} - {{date('d/m/Y',strtotime($evalprocess->fecha_conclusion))}}</h2>
                </div>
                <div class="d-flex justify-content-between">
                  <div class="card card-data-asignaciones">
                    <h3>Número de asignaciones</h3>
                    <span>{{$evalasignacion}}</span>
                  </div>
                  <div class="card card-data-completadas">
                    <h3>Evaluaciones completadas</h3>
                    <span>{{$evalasignacion_finalizado}}</span>
                  </div>
                  <div class="card card-data-faltantes">
                    <h3>Evaluaciones faltantes</h3>
                    <span>{{$evalasignacion_pendientes}}</span>
                  </div>
                  <div class="card card-data-conforme">
                    <h3>Evaluaciones conformes</h3>
                    <span>{{$evalasignacion_conformes}}</span>
                  </div>
                  <div class="card card-data-noconforme">
                    <h3>Evaluaciones no conformes</h3>
                    <span>{{$evalasignacion_no_conformes}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div style="display: flex; flex-direction:row;">
                  <div style="flex-grow: 1">
                    <h3>Evaluaciones finalizadas y pendientes</h3>
                    <div id="chart-finalizados" class="chart-lg"></div>
                  </div>
                  <div style="flex-grow: 1">
                    <h3>Evaluaciones conformes y no conformes</h3>
                    <div id="chart-conformes" class="chart-lg"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Notas obtenidas durante el proceso de evaluación</h3>
                <div id="chart-notas-general" class="chart-lg"></div>
              </div>
            </div>
          </div>  

          <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <div class="d-flex">
                    <div class="flex-fill">
                      <h3 class="card-title">TOP 3 Mejores calificaciones</h3>
                      <div id="chart-notas-mejores" class="chart-lg"></div>
                    </div>
                    <div class="flex-fill">
                      <h3 class="card-title">TOP 3 Menores calificaciones</h3>
                      <div id="chart-notas-menores" class="chart-lg"></div>
                    </div>
                  </div>
                  
                </div>        
            </div>
          </div>
  
          <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <div style="display: flex; flex-direction:row;">
                    <div style="flex-grow: 1">
                      <h3 class="card-title">Cantidad de evaluaciones por área</h3>
                      <div id="chart-area-cantidad" class="chart-lg"></div>
                    </div>
                    <div style="flex-grow: 1">
                      <h3 class="card-title">Promedio de calificaciones por Área</h3>
                      <div id="chart-area-general" class="chart-lg"></div>
                    </div>
                  </div>
                </div>        
            </div>
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
              series: [{!! json_encode($evalasignacion_finalizado) !!}, {!! json_encode($evalasignacion_pendientes) !!}],
              labels: ["FINALIZADOS", "PENDIENTES"],
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
              dataLabels: {
                enabled: true
              },
            })).render();
          });

          document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-conformes'), {
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
              series: [{!! json_encode($evalasignacion_conformes) !!},{!! json_encode($evalasignacion_no_conformes) !!}],
              labels: ["CONFORMES", "NO CONFORMES"],
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
              dataLabels: {
                enabled: true
              },
            })).render();
          });

        
          document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-ejecutivopromedio'), {
              chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 240,
                parentHeightOffset: 0,
                toolbar: {
                  show: false,
                },
                animations: {
                  enabled: false
                },
                stacked: true,
              },
              plotOptions: {
                bar: {
                  barHeight: '50%',
                  horizontal: true,
                }
              },
              dataLabels: {
                enabled: false,
              },
              fill: {
                opacity: 1,
              },
              series: [{
                name: "COMPTENCIAS TÉCNICAS",
                data: [44, 55, 41]
              }, {
                name: "COMPETENCIAS DE GESTIÓN",
                data: [53, 32, 33]
              }, {
                name: "ALINEACIÓN ESTRATÉGICA",
                data: [12, 17, 11]
              }],
              
              tooltip: {
                theme: 'dark'
              },
              grid: {
                padding: {
                  top: -10,
                  right: 0,
                  left: 0,
                  bottom: -4
                },
                strokeDashArray: 4,
              },
              xaxis: {
                labels: {
                  padding: 0,
                  formatter: function(val) {
                    return val + "K"
                  },
                },
                tooltip: {
                  enabled: false
                },
                axisBorder: {
                  show: false,
                },
                categories: ['Proceso 1', 'Proceso 2', 'Proceso 3'],
              },
              yaxis: {
                labels: {
                  padding: 4
                },
              },
              colors: [tabler.getColor("purple"), tabler.getColor("green"), tabler.getColor("yellow"), tabler.getColor("red"), tabler.getColor("primary")],
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
                  data: {!! json_encode($evalresult_users->pluck('nota_final')->toArray()) !!}
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
              labels: {!! json_encode($evalresult_users->pluck('apellido')->toArray())  !!},
          
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

          document.addEventListener("DOMContentLoaded", function() {
              window.ApexCharts && (new ApexCharts(document.getElementById('chart-notas-mejores'), {
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
                  data: {!! json_encode($evalresult_mejores->pluck('nota_final')->toArray()) !!}
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
              labels: {!! json_encode($evalresult_mejores->pluck('apellido')->toArray())  !!},
          
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
              colors: ['#28a745'],
              })).render();
          });

          document.addEventListener("DOMContentLoaded", function() {
              window.ApexCharts && (new ApexCharts(document.getElementById('chart-notas-menores'), {
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
                  data: {!! json_encode($evalresult_peores->pluck('nota_final')->toArray()) !!}
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
              labels: {!! json_encode($evalresult_peores->pluck('apellido')->toArray())  !!},
          
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
              colors: ['#dc3545'],
              })).render();
          });

          document.addEventListener("DOMContentLoaded", function() {
              window.ApexCharts && (new ApexCharts(document.getElementById('chart-area-general'), {
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
                  name: "Calificación promedio",
                  data: {!! json_encode($avg) !!}
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
              yaxis: {
                  labels: {
                  padding: 4
                  },
              },
              labels: {!! json_encode($areaname)  !!},
          
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
              colors: ['#89059B'],
              })).render();
          });

          document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-area-cantidad'), {
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
              series: {!! json_encode($num) !!},
              labels: {!! json_encode($narea) !!},
              tooltip: {
                theme: 'dark'
              },
              grid: {
                strokeDashArray: 4,
              },
             
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
              dataLabels: {
                enabled: true
              },
            })).render();
          });
        </script>



        <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
      
        

  
@endsection