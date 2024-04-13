@extends('tablar::page')

@section('title')
    Reportes de evaluación
@endsection

@section('content')
  <div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                
                <h2 class="page-title">
                    {{ __('Reportes de procesos de evaluación ') }}
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-12 col-md-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('reporteseval.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Generar reporte
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
      {{-- <div class="card">
        <div class="card-header">
          <label for="select-funcionario">Seleccionar funcionario:</label>
        </div>
        <div class="card-body">


          <form action="" method="post" id="ajaxForm" role="form"
          enctype="multipart/form-data">
            @csrf
            <input list="select-fun" id="select-funcionario" name="select-funcionario" class="form-control" />

            <datalist id="select-fun" >
              @foreach ($users as $user)
                  <option class="form-control" value="{{$user->id}}">{{$user->apellido}} {{$user->name}}</option>
              @endforeach
              <input type="hidden" name="select-funcionario" id="select-funcionario-hidden">
            </datalist>

            <div class="form-footer">
                <div class="text-end">
                    <div class="d-flex">
                        <input type="submit" class="btn btn-primary ms-auto ajax-submit" value="Ver reporte">
                    </div>
                </div>
            </div>
          </form>
          <script>
            document.querySelector('#select-funcionario').addEventListener('input', function(e) {
                    var input = e.target,   
                        list = input.getAttribute('list'),
                        options = document.querySelectorAll('#' + list + ' option[value="'+input.value+'"]'),
                        hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden');
                
                    if (options.length > 0) {
                      hiddenInput.value = input.value;
                      input.value = options[0].innerText;
                      }
                
                });
          </script>
        </div>
      </div> --}}
      



        <div class="row row-deck row-cards">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                {{-- {{$num_evalprocess}} --}}
                {{$evalasignacion_pendientes}}
                {{$evalasignacion_finalizado}}
                {{$evalasignacion_conformes}}
                {{$evalasignacion_no_conformes}}
                
                  <h3 class="card-title">Cantidad de usuarios que finalizaron sus evaluaciones</h3>
                <div id="chart-cantidadxproceso" class="chart-lg"></div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                <li class="nav-item">
                  <a href="#tabs-ejecutivo-ex1" class="nav-link active" data-bs-toggle="tab">EJECUTIVO</a>
                </li>
                <li class="nav-item">
                  <a href="#tabs-medios-ex1" class="nav-link" data-bs-toggle="tab">MANDOS MEDIOS</a>
                </li>
                <li class="nav-item">
                  <a href="#tabs-profesional-ex1" class="nav-link" data-bs-toggle="tab">OPERATIVO PROFESIONAL</a>
                </li>
                <li class="nav-item">
                  <a href="#tabs-tecnico-ex1" class="nav-link" data-bs-toggle="tab">OPERATIVO TÉCNICO</a>
                </li>
                <li class="nav-item">
                  <a href="#tabs-administrativo-ex1" class="nav-link" data-bs-toggle="tab">OPERATIVO ADMINISTRATIVO</a>
                </li>
                <li class="nav-item">
                  <a href="#tabs-auxiliar-ex1" class="nav-link" data-bs-toggle="tab">OPERATIVO AUXILIAR</a>
                </li>
                
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active show" id="tabs-ejecutivo-ex1">
                  <h4>Cantidad de usuarios de nivel ejecutivo que finalizaron sus evaluaciones</h4>
                  <div style="display: flex; flex-direction:row; justify-content:space-evenly">
                    <div class="card">
                      <div class="card-body">
                        
                        <div id="chart-ejecutivoxproceso" class="chart-lg"></div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        
                        <div id="chart-ejecutivopromedio" class="chart-lg"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tabs-medios-ex1">
                  <h4>Cantidad de usuarios de nivel mandos medios que finalizaron sus evaluaciones</h4>
                  <div>

                  </div>
                </div>
                <div class="tab-pane" id="tabs-profesional-ex1">
                  <h4>Cantidad de usuarios de nivel operativo profesional que finalizaron sus evaluaciones</h4>
                  <div style="display: flex; flex-direction:row">

                  </div>
                </div>
                <div class="tab-pane" id="tabs-tecnico-ex1">
                  <h4>Cantidad de usuarios de nivel operativo técnico que finalizaron sus evaluaciones</h4>
                  <div>

                  </div>
                </div>
                <div class="tab-pane" id="tabs-administrativo-ex1">
                  <h4>Cantidad de usuarios de nivel operativo administrativo que finalizaron sus evaluaciones</h4>
                  <div>

                  </div>
                </div>
                <div class="tab-pane" id="tabs-auxiliar-ex1">
                  <h4>Cantidad de usuarios de nivel operativo auxiliar que finalizaron sus evaluaciones</h4>
                  <div>

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
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-cantidadxproceso'), {
        chart: {
          type: "pie",
          fontFamily: 'inherit',
          height: 300,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        fill: {
          opacity: 1,
        },
        series: [50, 30, 50, 180],
        labels: ["Proceso 1", "Proceso 2", "Proceso 3", "Proceso 4"],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          strokeDashArray: 4,
        },
        colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8),tabler.getColor("yellow"),tabler.getColor("green")],
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
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-ejecutivoxproceso'), {
        chart: {
          type: "pie",
          fontFamily: 'inherit',
          height: 300,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        fill: {
          opacity: 1,
        },
        series: [50, 30, 50, 180],
        labels: ["Proceso 1", "Proceso 2", "Proceso 3", "Proceso 4"],
        tooltip: {
          theme: 'dark'
        },
        grid: {
          strokeDashArray: 4,
        },
        colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8),tabler.getColor("yellow"),tabler.getColor("green")],
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
</script>



  <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>


{{-- <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
        <li class="nav-item">
          <a href="#tabs-home-ex1" class="nav-link active" data-bs-toggle="tab">EJECUTIVO</a>
        </li>
        <li class="nav-item">
          <a href="#tabs-profile-ex1" class="nav-link" data-bs-toggle="tab">MANDOS MEDIOS</a>
        </li>
        <li class="nav-item">
          <a href="#tabs-profile-ex1" class="nav-link" data-bs-toggle="tab">OPERATIVO-PROFESIONAL</a>
        </li>
        <li class="nav-item">
          <a href="#tabs-profile-ex1" class="nav-link" data-bs-toggle="tab">OPERATIVO-TÉCNICO</a>
        </li>
        <li class="nav-item">
          <a href="#tabs-profile-ex1" class="nav-link" data-bs-toggle="tab">OPERATIVO-ADMINISTRATIVO</a>
        </li>
        <li class="nav-item">
          <a href="#tabs-profile-ex1" class="nav-link" data-bs-toggle="tab">OPERATIVO-AUXILIAR</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane active show" id="tabs-home-ex1">
          <h4>NIVEL EJECUTIVO</h4>
          <div class="card">
            <div class="card-body">
              <div id="chart-demo-pie" class="chart-lg"></div>
            </div>
          </div>
          
          
          <script>
            document.addEventListener("DOMContentLoaded", function() {
              window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
                chart: {
                  type: "pie",
                  fontFamily: 'inherit',
                  height: 240,
                  sparkline: {
                    enabled: true
                  },
                  animations: {
                    enabled: false
                  },
                },
                fill: {
                  opacity: 1,
                },
                series: {!! json_encode($notas->pluck('nota_final')->toArray()) !!},
                labels: ["Direct", "Affilliate"],
                tooltip: {
                  theme: 'dark'
                },
                grid: {
                  strokeDashArray: 4,
                },
                colors: [tabler.getColor("primary"), tabler.getColor("primary", 0.8)],
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
          </script>

          <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
          
        </div>

        <table class="table table-responsive">
            <thead>
              <tr>
                <th>#</th>
                <th class="text-nowrap">Heading 1</th>
                <th class="text-nowrap">Heading 2</th>
                <th class="text-nowrap">Heading 3</th>
                <th class="text-nowrap">Heading 4</th>
                <th class="text-nowrap">Heading 5</th>
                <th class="text-nowrap">Heading 6</th>
                <th class="text-nowrap">Heading 7</th>
                <th class="text-nowrap">Heading 8</th>
                <th class="text-nowrap">Heading 9</th>
                <th class="text-nowrap">Heading 10</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>1</th>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
              </tr>
              <tr>
                <th>2</th>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
                <td>Cell</td>
              </tr>
            </tbody>
          </table>

          

        <div class="tab-pane" id="tabs-profile-ex1">
          <h4>Profile tab</h4>
          <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
        </div>
      </div>
    </div>
  </div> --}}


  {{-- <form action="" method="post" class="form-control">
    <select name="evalprocess" id="" required>
      <option value="" disabled selected>Seleccione un proceso</option>
      @foreach ($evalprocess as $proceso)
        <option value="{{$proceso->id}}">Proceso: {{$proceso->id}} | Fecha incio: {{$proceso->fecha_inicio}} | Fecha conclusion: {{$proceso->fecha_conslusion}}</option>
      @endforeach
    </select>

  </form>
   --}}
  
@endsection