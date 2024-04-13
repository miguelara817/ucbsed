@extends('tablar::page')

@section('title', 'Vista previa')
@section('css')
<style>
    .form-title{
        margin-top: 50px;
        text-align: center;
    }
    .form-title h3{
        margin: 0;
    }

    .form-subtitle{
        text-align: center;
        padding: 10px;
        background-color: #d9d9d9;
    }

    .form-subtitle h3{
        margin: 0;
    }

    .form-seccion{
        padding: 8px;
        background-color: #d9d9d9;
    }
    .form-seccion h3{
        margin: 0;
    }
    .header{
        margin: 15px auto;
    }
    .header-info{
        margin: 5px auto;
        display: flex;
        flex-direction: row;
        align-items: center;
        
    }
    .header-info .pregunta{
        margin-right: 20px;
        font-size: 15px;
        color: #18244e;
        font-weight: bold;
        
    }
    .header-info .respuesta{
        margin-right: 20px;
        font-size: 15px;
        border: none;
    }
    .header-info input {
        width: 60%;
        border:0;
        outline:0;
    }


    .selector-container{
        margin-left: 20px;
    }

    .selectors{
        display: flex;
        align-items: center;
    }

    .selectors label{
        padding-left: 10px;
    }

    .selector-container input[type="checkbox"]{
        height: 20px;
        width: 20px;
    }
    .selector-son{
        margin-left: 30px;
        margin-bottom: 15px;
        margin-top: 15px;
    }

</style>
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        {{ __('Previsualización de los formularios en cada nivel') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('evalproces.edit',$evalproces->id) }}" class="btn btn-green">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                            Editar campos de texto
                        </a>
                        <a href="{{ route('evalproces.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Lista de procesos de evaluación
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
                            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                            <li class="nav-item">
                                <a href="#tabs-ejecutivo-ex1" class="nav-link active" data-bs-toggle="tab">EJECUTIVO</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-mandosmedios-ex1" class="nav-link" data-bs-toggle="tab">MANDOS MEDIOS</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-opeprofesional" class="nav-link" data-bs-toggle="tab">OPERATIVO-PROFESIONAL</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-opetecnico" class="nav-link" data-bs-toggle="tab">OPERATIVO-TÉCNICO</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-opeadministrativo" class="nav-link" data-bs-toggle="tab">OPERATIVO-ADMINISTRATIVO</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-opeauxiliar" class="nav-link" data-bs-toggle="tab">OPERATIVO-AUXILIAR</a>
                            </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show"  id="tabs-ejecutivo-ex1">
                                    <div class="row row-deck row-cards">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="form-title">
                                                    <h3>GESTIÓN DE RECURSOS HUMANOS</h3>
                                                    <h3>FORMULARIO</h3>
                                                    <h3>EVALUACIÓN DEL DESEMPEÑO EVD-01</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-subtitle">
                                                        <h3>NIVEL EJECUTIVO</h3>
                                                    </div>
                                                    <div>
                                                        <p>{{$evalproces->texto_encabezado}}</p>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>I. Funcionario a evaluar</h3>
                                                    </div>
                                                    <div class="header">
                                                        <div class="header-info">
                                                            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                                        </div>
                                                        <div class="header-info">
                                                            <span class="pregunta">PUESTO: </span>
                                                        </div>
                        
                                                        <div class="header-info">
                                                            <span class="pregunta">PERIODO DE EVALUACIÓN: </span>
                                                            <span class="respuesta">Inicio: {{date('d/m/Y',strtotime($evalproces->fecha_inicio))}}</span>
                                                            <span class="respuesta">Conclusión: {{date('d/m/Y',strtotime($evalproces->fecha_conclusion))}}</span>
                                                        </div>
                                                    </div>
    
                                                    <div class="form-seccion">
                                                        <h3>II. Funcionario evaluador</h3>
                                                    </div>
                                                    <div class="header">
                                                        <div class="header-info">
                                                            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                                        </div>
                                                        <div class="header-info">
                                                            <span class="pregunta">PUESTO: </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>III. Factores a evaluar</h3>
                                                    </div>
                                                    <div>
                                                        <p>{{$evalproces->texto_instruccion}}</p>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table card-table table-vcenter datatable">
                                                            <thead>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">N°</th>
                                                                <th style="font-size: 12px; font-weight: bold;">FACTOR</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">DESCRIPCIÓN</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Excelente</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Muy Bueno</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Bueno</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Débil</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center">COMENTARIOS</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($competencias_ejecutivo as $competencia)
                                                                {{-- {{$competencia->id}} --}}
                                                                <tr>
                                                                    <td colspan="8" style="justify-content: center; background-color: rgb(254 240 138);">{{$competencia}}</td>
                                                                    @foreach ($factorjecutivo as $factor)
                                                                        @if (($factor->competencia) == ($competencia))
                                                                            <tr>
                                                                                <td>{{++$numejecutivo}}</td>
                                                                                <td>{{$factor->factor}}</td>
                                                                                {{-- <input hidden type="text" name="factor[]" id="" value="{{$factor["factor"]}}"> --}}
                                                                                <td>{{$factor->descripcion}}</td>
                                                                                {{-- <input hidden type="text" name="descripcion[]" id="" value="{{$factor["descripcion"]}}"> --}}
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="100" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="75" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="50" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="25" required></td>
                                                                                <td style="text-align: center"><textarea class='form-control' name="comentario{{$factor->id}}" id="" cols="25" rows="5"></textarea></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                @endforeach 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>IV. RESUMEN DE LA EVALUACIÓN</h3>
                                                    </div>
                                                    <div class='form-control'>
                                                        <h4>A. Fortalezas del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="fortalezas" id="" cols="30" rows="5" placeholder='Destaca en la ejecución de sus tareas con un enfoque proactivo, mostrando habilidades excepcionales en...' required></textarea>
                                                        <br>
                                                        <h4>B. Debilidades del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="debilidades" id="" cols="30" rows="5" placeholder='Presenta oportunidades de mejora en la gestión del tiempo, particularmente en...' required></textarea>
                                                        <br>
                                                        <h4>C. Comentarios/recomendaciones del funcionario evaluador</h4>
                                                        <textarea class='form-control' style="width: 100%" name="comentarios_evaluador" id="" cols="30" rows="5" placeholder='El funcionario ha demostrado un compromiso excepcional con sus responsabilidades, pero se sugiere trabajar en mejorar la comunicación interdepartamental para optimizar la colaboración...' required></textarea>
                                                        <br>
                                                        <h4>D. Propuesta de capacitaciones para superar las debilidades del funcionario</h4>
                                                        <textarea class='form-control' style="width: 100%" name="propuestas" id="" cols="30" rows="5" placeholder='Se recomienda participar en programas de desarrollo profesional para fortalecer las habilidades técnicas necesarias en el área de...' required></textarea>
                                                        <hr>
                                                        <div style="display: flex; flex-direction:row; justify-content: space-between; align-items: center">    
                                                            <h4>¿ESTÁ DE ACUERDO CON LA EVALUACIÓN?</h4>        
                                                            <h4>SI <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="1"></h4>
                                                            <h4>NO <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="0"></h4>
                                                        </div>
                                                        <h4>E. Comentarios del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="comentarios_evaluado" id="" cols="30" rows="5" required></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="tab-pane" id="tabs-mandosmedios-ex1">
                                    <div class="row row-deck row-cards">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="form-title">
                                                    <h3>GESTIÓN DE RECURSOS HUMANOS</h3>
                                                    <h3>FORMULARIO</h3>
                                                    <h3>EVALUACIÓN DEL DESEMPEÑO EVD-02</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-subtitle">
                                                        <h3>NIVEL MANDOS MEDIOS</h3>
                                                    </div>
                                                    <div>
                                                        <p>{{$evalproces->texto_encabezado}}</p>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>I. Funcionario a evaluar</h3>
                                                    </div>
                                                    <div class="header">
                                                        <div class="header-info">
                                                            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                                        </div>
                                                        <div class="header-info">
                                                            <span class="pregunta">PUESTO: </span>
                                                        </div>
                        
                                                        <div class="header-info">
                                                            <span class="pregunta">PERIODO DE EVALUACIÓN: </span>
                                                            <span class="respuesta">Inicio: {{date('d/m/Y',strtotime($evalproces->fecha_inicio))}}</span>
                                                            <span class="respuesta">Conclusión: {{date('d/m/Y',strtotime($evalproces->fecha_conclusion))}}</span>
                                                        </div>
                                                    </div>
    
                                                    <div class="form-seccion">
                                                        <h3>II. Funcionario evaluador</h3>
                                                    </div>
                                                    <div class="header">
                                                        <div class="header-info">
                                                            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                                        </div>
                                                        <div class="header-info">
                                                            <span class="pregunta">PUESTO: </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>III. Factores a evaluar</h3>
                                                    </div>
                                                    <div>
                                                        <p>{{$evalproces->texto_instruccion}}</p>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table card-table table-vcenter datatable">
                                                            <thead>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">N°</th>
                                                                <th style="font-size: 12px; font-weight: bold;">FACTOR</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">DESCRIPCIÓN</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Excelente</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Muy Bueno</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Bueno</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Débil</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center">COMENTARIOS</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($competencias_medios as $competencia)
                                                                {{-- {{$competencia->id}} --}}
                                                                <tr>
                                                                    <td colspan="8" style="justify-content: center; background-color: rgb(254 240 138);">{{$competencia}}</td>
                                                                    @foreach ($factormedios as $factor)
                                                                        @if (($factor->competencia) == ($competencia))
                                                                            <tr>
                                                                                <td>{{++$nummedio}}</td>
                                                                                <td>{{$factor->factor}}</td>
                                                                                {{-- <input hidden type="text" name="factor[]" id="" value="{{$factor["factor"]}}"> --}}
                                                                                <td>{{$factor->descripcion}}</td>
                                                                                {{-- <input hidden type="text" name="descripcion[]" id="" value="{{$factor["descripcion"]}}"> --}}
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="100" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="75" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="50" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="25" required></td>
                                                                                <td style="text-align: center"><textarea class='form-control' name="comentario{{$factor->id}}" id="" cols="25" rows="5"></textarea></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                @endforeach 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>IV. RESUMEN DE LA EVALUACIÓN</h3>
                                                    </div>
                                                    <div class='form-control'>
                                                        <h4>A. Fortalezas del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="fortalezas" id="" cols="30" rows="5" placeholder='Destaca en la ejecución de sus tareas con un enfoque proactivo, mostrando habilidades excepcionales en...' required></textarea>
                                                        <br>
                                                        <h4>B. Debilidades del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="debilidades" id="" cols="30" rows="5" placeholder='Presenta oportunidades de mejora en la gestión del tiempo, particularmente en...' required></textarea>
                                                        <br>
                                                        <h4>C. Comentarios/recomendaciones del funcionario evaluador</h4>
                                                        <textarea class='form-control' style="width: 100%" name="comentarios_evaluador" id="" cols="30" rows="5" placeholder='El funcionario ha demostrado un compromiso excepcional con sus responsabilidades, pero se sugiere trabajar en mejorar la comunicación interdepartamental para optimizar la colaboración...' required></textarea>
                                                        <br>
                                                        <h4>D. Propuesta de capacitaciones para superar las debilidades del funcionario</h4>
                                                        <textarea class='form-control' style="width: 100%" name="propuestas" id="" cols="30" rows="5" placeholder='Se recomienda participar en programas de desarrollo profesional para fortalecer las habilidades técnicas necesarias en el área de...' required></textarea>
                                                        <hr>
                                                        <div style="display: flex; flex-direction:row; justify-content: space-between; align-items: center">    
                                                            <h4>¿ESTÁ DE ACUERDO CON LA EVALUACIÓN?</h4>        
                                                            <h4>SI <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="1"></h4>
                                                            <h4>NO <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="0"></h4>
                                                        </div>
                                                        <h4>E. Comentarios del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="comentarios_evaluado" id="" cols="30" rows="5" required></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabs-opeprofesional">
                                    <div class="row row-deck row-cards">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="form-title">
                                                    <h3>GESTIÓN DE RECURSOS HUMANOS</h3>
                                                    <h3>FORMULARIO</h3>
                                                    <h3>EVALUACIÓN DEL DESEMPEÑO EVD-03</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-subtitle">
                                                        <h3>NIVEL OPERATIVOS-PROFESIONAL</h3>
                                                    </div>
                                                    <div>
                                                        <p>{{$evalproces->texto_encabezado}}</p>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>I. Funcionario a evaluar</h3>
                                                    </div>
                                                    <div class="header">
                                                        <div class="header-info">
                                                            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                                        </div>
                                                        <div class="header-info">
                                                            <span class="pregunta">PUESTO: </span>
                                                        </div>
                        
                                                        <div class="header-info">
                                                            <span class="pregunta">PERIODO DE EVALUACIÓN: </span>
                                                            <span class="respuesta">Inicio: {{date('d/m/Y',strtotime($evalproces->fecha_inicio))}}</span>
                                                            <span class="respuesta">Conclusión: {{date('d/m/Y',strtotime($evalproces->fecha_conclusion))}}</span>
                                                        </div>
                                                    </div>
    
                                                    <div class="form-seccion">
                                                        <h3>II. Funcionario evaluador</h3>
                                                    </div>
                                                    <div class="header">
                                                        <div class="header-info">
                                                            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                                        </div>
                                                        <div class="header-info">
                                                            <span class="pregunta">PUESTO: </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>III. Factores a evaluar</h3>
                                                    </div>
                                                    <div>
                                                        <p>{{$evalproces->texto_instruccion}}</p>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table card-table table-vcenter datatable">
                                                            <thead>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">N°</th>
                                                                <th style="font-size: 12px; font-weight: bold;">FACTOR</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">DESCRIPCIÓN</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Excelente</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Muy Bueno</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Bueno</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Débil</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center">COMENTARIOS</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($competencias_profesional as $competencia)
                                                                {{-- {{$competencia->id}} --}}
                                                                <tr>
                                                                    <td colspan="8" style="justify-content: center; background-color: rgb(254 240 138);">{{$competencia}}</td>
                                                                    @foreach ($factorprofesional as $factor)
                                                                        @if (($factor->competencia) == ($competencia))
                                                                            <tr>
                                                                                <td>{{++$numprofesional}}</td>
                                                                                <td>{{$factor->factor}}</td>
                                                                                {{-- <input hidden type="text" name="factor[]" id="" value="{{$factor["factor"]}}"> --}}
                                                                                <td>{{$factor->descripcion}}</td>
                                                                                {{-- <input hidden type="text" name="descripcion[]" id="" value="{{$factor["descripcion"]}}"> --}}
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="100" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="75" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="50" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="25" required></td>
                                                                                <td style="text-align: center"><textarea class='form-control' name="comentario{{$factor->id}}" id="" cols="25" rows="5"></textarea></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                @endforeach 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>IV. RESUMEN DE LA EVALUACIÓN</h3>
                                                    </div>
                                                    <div class='form-control'>
                                                        <h4>A. Fortalezas del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="fortalezas" id="" cols="30" rows="5" placeholder='Destaca en la ejecución de sus tareas con un enfoque proactivo, mostrando habilidades excepcionales en...' required></textarea>
                                                        <br>
                                                        <h4>B. Debilidades del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="debilidades" id="" cols="30" rows="5" placeholder='Presenta oportunidades de mejora en la gestión del tiempo, particularmente en...' required></textarea>
                                                        <br>
                                                        <h4>C. Comentarios/recomendaciones del funcionario evaluador</h4>
                                                        <textarea class='form-control' style="width: 100%" name="comentarios_evaluador" id="" cols="30" rows="5" placeholder='El funcionario ha demostrado un compromiso excepcional con sus responsabilidades, pero se sugiere trabajar en mejorar la comunicación interdepartamental para optimizar la colaboración...' required></textarea>
                                                        <br>
                                                        <h4>D. Propuesta de capacitaciones para superar las debilidades del funcionario</h4>
                                                        <textarea class='form-control' style="width: 100%" name="propuestas" id="" cols="30" rows="5" placeholder='Se recomienda participar en programas de desarrollo profesional para fortalecer las habilidades técnicas necesarias en el área de...' required></textarea>
                                                        <hr>
                                                        <div style="display: flex; flex-direction:row; justify-content: space-between; align-items: center">    
                                                            <h4>¿ESTÁ DE ACUERDO CON LA EVALUACIÓN?</h4>        
                                                            <h4>SI <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="1"></h4>
                                                            <h4>NO <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="0"></h4>
                                                        </div>
                                                        <h4>E. Comentarios del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="comentarios_evaluado" id="" cols="30" rows="5" required></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabs-opetecnico">
                                    <div class="row row-deck row-cards">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="form-title">
                                                    <h3>GESTIÓN DE RECURSOS HUMANOS</h3>
                                                    <h3>FORMULARIO</h3>
                                                    <h3>EVALUACIÓN DEL DESEMPEÑO EVD-04</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-subtitle">
                                                        <h3>NIVEL OPERATIVO-TÉCNICO</h3>
                                                    </div>
                                                    <div>
                                                        <p>{{$evalproces->texto_encabezado}}</p>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>I. Funcionario a evaluar</h3>
                                                    </div>
                                                    <div class="header">
                                                        <div class="header-info">
                                                            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                                        </div>
                                                        <div class="header-info">
                                                            <span class="pregunta">PUESTO: </span>
                                                        </div>
                        
                                                        <div class="header-info">
                                                            <span class="pregunta">PERIODO DE EVALUACIÓN: </span>
                                                            <span class="respuesta">Inicio: {{date('d/m/Y',strtotime($evalproces->fecha_inicio))}}</span>
                                                            <span class="respuesta">Conclusión: {{date('d/m/Y',strtotime($evalproces->fecha_conclusion))}}</span>
                                                        </div>
                                                    </div>
    
                                                    <div class="form-seccion">
                                                        <h3>II. Funcionario evaluador</h3>
                                                    </div>
                                                    <div class="header">
                                                        <div class="header-info">
                                                            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                                        </div>
                                                        <div class="header-info">
                                                            <span class="pregunta">PUESTO: </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>III. Factores a evaluar</h3>
                                                    </div>
                                                    <div>
                                                        <p>{{$evalproces->texto_instruccion}}</p>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table card-table table-vcenter datatable">
                                                            <thead>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">N°</th>
                                                                <th style="font-size: 12px; font-weight: bold;">FACTOR</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">DESCRIPCIÓN</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Excelente</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Muy Bueno</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Bueno</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Débil</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center">COMENTARIOS</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($competencias_tecnico as $competencia)
                                                                <tr>
                                                                    <td colspan="8" style="justify-content: center; background-color: rgb(254 240 138);">{{$competencia}}</td>
                                                                    @foreach ($factortecnico as $factor)
                                                                        @if (($factor->competencia) == ($competencia))
                                                                            <tr>
                                                                                <td>{{++$numtecnico}}</td>
                                                                                <td>{{$factor->factor}}</td>
                                                                                {{-- <input hidden type="text" name="factor[]" id="" value="{{$factor["factor"]}}"> --}}
                                                                                <td>{{$factor->descripcion}}</td>
                                                                                {{-- <input hidden type="text" name="descripcion[]" id="" value="{{$factor["descripcion"]}}"> --}}
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="100" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="75" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="50" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="25" required></td>
                                                                                <td style="text-align: center"><textarea class='form-control' name="comentario{{$factor->id}}" id="" cols="25" rows="5"></textarea></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                @endforeach 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>IV. RESUMEN DE LA EVALUACIÓN</h3>
                                                    </div>
                                                    <div class='form-control'>
                                                        <h4>A. Fortalezas del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="fortalezas" id="" cols="30" rows="5" placeholder='Destaca en la ejecución de sus tareas con un enfoque proactivo, mostrando habilidades excepcionales en...' required></textarea>
                                                        <br>
                                                        <h4>B. Debilidades del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="debilidades" id="" cols="30" rows="5" placeholder='Presenta oportunidades de mejora en la gestión del tiempo, particularmente en...' required></textarea>
                                                        <br>
                                                        <h4>C. Comentarios/recomendaciones del funcionario evaluador</h4>
                                                        <textarea class='form-control' style="width: 100%" name="comentarios_evaluador" id="" cols="30" rows="5" placeholder='El funcionario ha demostrado un compromiso excepcional con sus responsabilidades, pero se sugiere trabajar en mejorar la comunicación interdepartamental para optimizar la colaboración...' required></textarea>
                                                        <br>
                                                        <h4>D. Propuesta de capacitaciones para superar las debilidades del funcionario</h4>
                                                        <textarea class='form-control' style="width: 100%" name="propuestas" id="" cols="30" rows="5" placeholder='Se recomienda participar en programas de desarrollo profesional para fortalecer las habilidades técnicas necesarias en el área de...' required></textarea>
                                                        <hr>
                                                        <div style="display: flex; flex-direction:row; justify-content: space-between; align-items: center">    
                                                            <h4>¿ESTÁ DE ACUERDO CON LA EVALUACIÓN?</h4>        
                                                            <h4>SI <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="1"></h4>
                                                            <h4>NO <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="0"></h4>
                                                        </div>
                                                        <h4>E. Comentarios del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="comentarios_evaluado" id="" cols="30" rows="5" required></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabs-opeadministrativo">
                                    <div class="row row-deck row-cards">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="form-title">
                                                    <h3>GESTIÓN DE RECURSOS HUMANOS</h3>
                                                    <h3>FORMULARIO</h3>
                                                    <h3>EVALUACIÓN DEL DESEMPEÑO EVD-05</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-subtitle">
                                                        <h3>NIVEL OPERATIVO-ADMINISTRATIVO</h3>
                                                    </div>
                                                    <div>
                                                        <p>{{$evalproces->texto_encabezado}}</p>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>I. Funcionario a evaluar</h3>
                                                    </div>
                                                    <div class="header">
                                                        <div class="header-info">
                                                            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                                        </div>
                                                        <div class="header-info">
                                                            <span class="pregunta">PUESTO: </span>
                                                        </div>
                        
                                                        <div class="header-info">
                                                            <span class="pregunta">PERIODO DE EVALUACIÓN: </span>
                                                            <span class="respuesta">Inicio: {{date('d/m/Y',strtotime($evalproces->fecha_inicio))}}</span>
                                                            <span class="respuesta">Conclusión: {{date('d/m/Y',strtotime($evalproces->fecha_conclusion))}}</span>
                                                        </div>
                                                    </div>
    
                                                    <div class="form-seccion">
                                                        <h3>II. Funcionario evaluador</h3>
                                                    </div>
                                                    <div class="header">
                                                        <div class="header-info">
                                                            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                                        </div>
                                                        <div class="header-info">
                                                            <span class="pregunta">PUESTO: </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>III. Factores a evaluar</h3>
                                                    </div>
                                                    <div>
                                                        <p>{{$evalproces->texto_instruccion}}</p>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table card-table table-vcenter datatable">
                                                            <thead>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">N°</th>
                                                                <th style="font-size: 12px; font-weight: bold;">FACTOR</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">DESCRIPCIÓN</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Excelente</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Muy Bueno</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Bueno</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Débil</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center">COMENTARIOS</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($competencias_administrativo as $competencia)
                                                                <tr>
                                                                    <td colspan="8" style="justify-content: center; background-color: rgb(254 240 138);">{{$competencia}}</td>
                                                                    @foreach ($factoradministrativo as $factor)
                                                                        @if (($factor->competencia) == ($competencia))
                                                                            <tr>
                                                                                <td>{{++$numadministrativo}}</td>
                                                                                <td>{{$factor->factor}}</td>
                                                                                {{-- <input hidden type="text" name="factor[]" id="" value="{{$factor["factor"]}}"> --}}
                                                                                <td>{{$factor->descripcion}}</td>
                                                                                {{-- <input hidden type="text" name="descripcion[]" id="" value="{{$factor["descripcion"]}}"> --}}
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="100" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="75" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="50" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="25" required></td>
                                                                                <td style="text-align: center"><textarea class='form-control' name="comentario{{$factor->id}}" id="" cols="25" rows="5"></textarea></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                @endforeach 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>IV. RESUMEN DE LA EVALUACIÓN</h3>
                                                    </div>
                                                    <div class='form-control'>
                                                        <h4>A. Fortalezas del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="fortalezas" id="" cols="30" rows="5" placeholder='Destaca en la ejecución de sus tareas con un enfoque proactivo, mostrando habilidades excepcionales en...' required></textarea>
                                                        <br>
                                                        <h4>B. Debilidades del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="debilidades" id="" cols="30" rows="5" placeholder='Presenta oportunidades de mejora en la gestión del tiempo, particularmente en...' required></textarea>
                                                        <br>
                                                        <h4>C. Comentarios/recomendaciones del funcionario evaluador</h4>
                                                        <textarea class='form-control' style="width: 100%" name="comentarios_evaluador" id="" cols="30" rows="5" placeholder='El funcionario ha demostrado un compromiso excepcional con sus responsabilidades, pero se sugiere trabajar en mejorar la comunicación interdepartamental para optimizar la colaboración...' required></textarea>
                                                        <br>
                                                        <h4>D. Propuesta de capacitaciones para superar las debilidades del funcionario</h4>
                                                        <textarea class='form-control' style="width: 100%" name="propuestas" id="" cols="30" rows="5" placeholder='Se recomienda participar en programas de desarrollo profesional para fortalecer las habilidades técnicas necesarias en el área de...' required></textarea>
                                                        <hr>
                                                        <div style="display: flex; flex-direction:row; justify-content: space-between; align-items: center">    
                                                            <h4>¿ESTÁ DE ACUERDO CON LA EVALUACIÓN?</h4>        
                                                            <h4>SI <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="1"></h4>
                                                            <h4>NO <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="0"></h4>
                                                        </div>
                                                        <h4>E. Comentarios del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="comentarios_evaluado" id="" cols="30" rows="5" required></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabs-opeauxiliar">
                                    <div class="row row-deck row-cards">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="form-title">
                                                    <h3>GESTIÓN DE RECURSOS HUMANOS</h3>
                                                    <h3>FORMULARIO</h3>
                                                    <h3>EVALUACIÓN DEL DESEMPEÑO EVD-06</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-subtitle">
                                                        <h3>NIVEL OPERATIVO-AUXILIAR</h3>
                                                    </div>
                                                    <div>
                                                        <p>{{$evalproces->texto_encabezado}}</p>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>I. Funcionario a evaluar</h3>
                                                    </div>
                                                    <div class="header">
                                                        <div class="header-info">
                                                            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                                        </div>
                                                        <div class="header-info">
                                                            <span class="pregunta">PUESTO: </span>
                                                        </div>
                        
                                                        <div class="header-info">
                                                            <span class="pregunta">PERIODO DE EVALUACIÓN: </span>
                                                            <span class="respuesta">Inicio: {{date('d/m/Y',strtotime($evalproces->fecha_inicio))}}</span>
                                                            <span class="respuesta">Conclusión: {{date('d/m/Y',strtotime($evalproces->fecha_conclusion))}}</span>
                                                        </div>
                                                    </div>
    
                                                    <div class="form-seccion">
                                                        <h3>II. Funcionario evaluador</h3>
                                                    </div>
                                                    <div class="header">
                                                        <div class="header-info">
                                                            <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                                        </div>
                                                        <div class="header-info">
                                                            <span class="pregunta">PUESTO: </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>III. Factores a evaluar</h3>
                                                    </div>
                                                    <div>
                                                        <p>{{$evalproces->texto_instruccion}}</p>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table card-table table-vcenter datatable">
                                                            <thead>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">N°</th>
                                                                <th style="font-size: 12px; font-weight: bold;">FACTOR</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">DESCRIPCIÓN</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Excelente</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Muy Bueno</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Bueno</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center;">Débil</th>
                                                                <th style="font-size: 12px; font-weight: bold; text-align: center">COMENTARIOS</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($competencias_auxiliar as $competencia)
                                                                <tr>
                                                                    <td colspan="8" style="justify-content: center; background-color: rgb(254 240 138);">{{$competencia}}</td>
                                                                    @foreach ($factorauxiliar as $factor)
                                                                        @if (($factor->competencia) == ($competencia))
                                                                            <tr>
                                                                                <td>{{++$numauxiliar}}</td>
                                                                                <td>{{$factor->factor}}</td>
                                                                                {{-- <input hidden type="text" name="factor[]" id="" value="{{$factor["factor"]}}"> --}}
                                                                                <td>{{$factor->descripcion}}</td>
                                                                                {{-- <input hidden type="text" name="descripcion[]" id="" value="{{$factor["descripcion"]}}"> --}}
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="100" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="75" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="50" required></td>
                                                                                <td style="text-align: center"><input type="radio" style="height: 22px; width: 22px" name="{{ $factor->id }}" id="" value="25" required></td>
                                                                                <td style="text-align: center"><textarea class='form-control' name="comentario{{$factor->id}}" id="" cols="25" rows="5"></textarea></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                @endforeach 
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="form-seccion">
                                                        <h3>IV. RESUMEN DE LA EVALUACIÓN</h3>
                                                    </div>
                                                    <div class='form-control'>
                                                        <h4>A. Fortalezas del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="fortalezas" id="" cols="30" rows="5" placeholder='Destaca en la ejecución de sus tareas con un enfoque proactivo, mostrando habilidades excepcionales en...' required></textarea>
                                                        <br>
                                                        <h4>B. Debilidades del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="debilidades" id="" cols="30" rows="5" placeholder='Presenta oportunidades de mejora en la gestión del tiempo, particularmente en...' required></textarea>
                                                        <br>
                                                        <h4>C. Comentarios/recomendaciones del funcionario evaluador</h4>
                                                        <textarea class='form-control' style="width: 100%" name="comentarios_evaluador" id="" cols="30" rows="5" placeholder='El funcionario ha demostrado un compromiso excepcional con sus responsabilidades, pero se sugiere trabajar en mejorar la comunicación interdepartamental para optimizar la colaboración...' required></textarea>
                                                        <br>
                                                        <h4>D. Propuesta de capacitaciones para superar las debilidades del funcionario</h4>
                                                        <textarea class='form-control' style="width: 100%" name="propuestas" id="" cols="30" rows="5" placeholder='Se recomienda participar en programas de desarrollo profesional para fortalecer las habilidades técnicas necesarias en el área de...' required></textarea>
                                                        <hr>
                                                        <div style="display: flex; flex-direction:row; justify-content: space-between; align-items: center">    
                                                            <h4>¿ESTÁ DE ACUERDO CON LA EVALUACIÓN?</h4>        
                                                            <h4>SI <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="1"></h4>
                                                            <h4>NO <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="0"></h4>
                                                        </div>
                                                        <h4>E. Comentarios del funcionario evaluado</h4>
                                                        <textarea class='form-control' style="width: 100%" name="comentarios_evaluado" id="" cols="30" rows="5" required></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection