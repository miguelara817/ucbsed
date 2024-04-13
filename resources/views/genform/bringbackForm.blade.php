@extends('tablar::page')
{{-- <link rel="stylesheet" href="assets/css/styles.css"> --}}
@section('title', 'Responder formulario')

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

<div class="page-body">
    <div class="container-xl">
        @if(config('tablar','display_alert'))
            @include('tablar::common.alert')
        @endif
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="form-title">
                        <h3>GESTIÓN DE RECURSOS HUMANOS</h3>
                        <h3>FORMULARIO</h3>
                        <h3>EVALUACIÓN DEL DESEMPEÑO EVD-0{{$nivel_id}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-subtitle">
                            <h3>{{$nivel_info->nivel}} ({{$cargo}})</h3>
                        </div>
                        <div>
                            <p>{{$evalprocess_texto_encabezado}}</p>
                        </div>
                        <div class="form-seccion">
                            <h3>I. Funcionario a evaluar</h3>
                        </div>
                        <form id="eval_form" action="{{ route('genform.recieveAnswer') }}" method="post">
                            @csrf
                            {{-- <input hidden type="number" name="version_form" id="" value="{{$version}}"> --}}
                            <input hidden type="number" name="evalprocess_id" id="" value="{{$evalprocess_id}}">
                            <input hidden type="number" name="nivel_id" id="" value="{{$nivel_id}}">
                            <div class="header">
                                <div class="header-info">
                                    <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                    <input class="respuesta" type="text" name="name_evaluado" id="" value="{{auth()->user()->apellido}} {{auth()->user()->name}}">
                                    {{-- <input hidden type="number" name="id_evaluado" id="" value="{{auth()->user()->id}}"> --}}
                                </div>
                                <div class="header-info">
                                    <span class="pregunta">PUESTO: </span>
                                    <input class="respuesta" type="text" name="cargo_evaluado" id="" value="{{auth()->user()->arbolcargo->cargo_dependiente}}">
                                </div>

                                <div class="header-info">
                                    <span class="pregunta">PERIODO DE EVALUACIÓN: </span>
                                    <span class="respuesta">Inicio: {{date('d/m/Y',strtotime($fecha_inicio))}}</span>
                                    <span class="respuesta">Conclusión: {{date('d/m/Y',strtotime($fecha_conclusion))}}</span>
                                </div>
                            </div>

                            <div class="form-seccion">
                                <h3>II. Funcionario evaluador</h3>
                            </div>
                            <div class="header">
                                <div class="header-info">
                                    <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                    <input hidden type="number" name="jefe_id" id="" value="{{$jefe_id}}">
                                    <input class="respuesta" type="text" name="name_evaluador" id="" value="{{$jefe_name}}">
                                    {{-- <input hidden type="number" name="id_evaluador" id="" value="{{auth()->user()->id}}"> --}}
                                </div>
                                <div class="header-info">
                                    <span class="pregunta">PUESTO: </span>
                                    <input class="respuesta" type="text" name="cargo_evaluador" id="" value="{{$jefe_cargo}}">
                                </div>
                            </div>
                            <div class="form-seccion">
                                <h3>III. Factores a evaluar</h3>
                            </div>
                            <div>
                                <p>{{$evalprocess_texto_instruccion}}</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter datatable">
                                    <thead>
                                        <th style="font-size: 12px; font-weight: bold; text-align: center;">N°</th>
                                        <th style="font-size: 12px; font-weight: bold;">FACTOR</th>
                                        <th style="font-size: 12px; font-weight: bold; text-align: center;">DESCRIPCIÓN</th>
                                        <th style="font-size: 12px; font-weight: bold; text-align: center;">CALIFICACIÓN</th>
                                        <th style="font-size: 12px; font-weight: bold; text-align: center">COMENTARIOS</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($competencias as $competencia)
                                        <tr>
                                            <td colspan="5" style="justify-content: center; background-color: rgb(254 240 138);">{{$competencia}}</td>
                                            @foreach ($evaldetailsresult as $details)
                                                @if (($competencia) == ($details->competencia))
                                                    <tr>
                                                        <td style="text-align: center">{{++$numeracion}}</td>
                                                        <td>{{$details->factor}}</td>
                                                        <td>{{$details->descripcion}}</td>
                                                        <td style="text-align: center">{{$details->nota}}</td>
                                                        @if ($details->comentario)
                                                            <td style="text-align: center">{{$details->comentario}}</td>
                                                        @else
                                                            <td style="text-align: center"> - </td>
                                                        @endif
                                                        
                                                    </tr>
                                                @endif
                                            @endforeach
                                            
                                        </tr>
                                        @endforeach
                                        <br>
                                        <tr>
                                            <td colspan="3" style="background-color: black; color: white;">CALIFICACIÓN FINAL</td>
                                            <td colspan="1" style="text-align: center; background-color: black; color: white;">{{$result_nota_final}}</td>
                                            @if ( (intval(round($result_nota_final)) <= 100) && ( intval(round($result_nota_final)) >= 91))
                                                <td colspan="1" style="text-align: center; background-color: black; color: white;">EXCELENTE</td>
                                            @elseif( (intval(round($result_nota_final)) <= 90) && (intval(round($result_nota_final)) >= 81))
                                                <td colspan="1" style="text-align: center; background-color: black; color: white;">MUY BUENO</td>
                                            @elseif( (intval(round($result_nota_final)) <= 80) && (intval(round($result_nota_final)) >= 71))
                                                <td colspan="1" style="text-align: center; background-color: black; color: white;">BUENO</td>
                                            @elseif((intval(round($result_nota_final)) <= 70) && (intval(round($result_nota_final)) >= 61))
                                                <td colspan="1" style="text-align: center; background-color: black; color: white;">SUFICIENTE</td>
                                            @elseif((intval(round($result_nota_final)) <= 60) && (intval(round($result_nota_final)) >= 51))
                                                <td colspan="1" style="text-align: center; background-color: black; color: white;">ACEPTABLE</td>
                                            @else
                                                <td colspan="1" style="text-align: center; background-color: black; color: white;">INSATISFACTORIO</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="form-seccion">
                                <h3>IV. RESUMEN DE LA EVALUACIÓN</h3>
                            </div>
                            <div class='form-control'>
                                <h4>A. Fortalezas del funcionario evaluado</h4>
                                <p class='form-control' style="width: 100%" name="fortalezas" id="" cols="30" rows="5">{{$result_fortalezas}}</p>
                                <br>
                                <h4>B. Debilidades del funcionario evaluado</h4>
                                <p class='form-control' style="width: 100%" name="debilidades" id="" cols="30" rows="5">{{$result_debilidades}}</p>
                                <br>
                                <h4>C. Comentarios/recomendaciones del funcionario evaluador</h4>
                                <p class='form-control' style="width: 100%" name="comentarios_evaluador" id="" cols="30" rows="5">{{$result_comentarios_evaluador}}</p>
                                <br>
                                <h4>D. Propuesta de capacitaciones para superar las debilidades del funcionario</h4>
                                <p class='form-control' style="width: 100%" name="propuestas" id="" cols="30" rows="5">{{$result_propuestas}}</p>
                                {{-- <div class="form-control">
                                    <div style="display: flex; flex-direction:row; justify-content: space-between; align-items: center">    
                                        <h4>Recomienda confirmación en el puesto:</h4>        
                                        <h4>Si  <input style="width: 50px" type="radio" name="recomendado" id=""></h4>
                                        <h4>No <input style="width: 50px" type="radio" name="recomendado" id=""></h4>
                                    </div>
                                </div> --}}
                                <hr>
                                <div style="display: flex; flex-direction:row; justify-content: space-between; align-items: center">    
                                    <h4>¿ESTÁ DE ACUERDO CON LA EVALUACIÓN?</h4>        
                                    <h4>SI <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="1"></h4>
                                    <h4>NO <input style="width: 50px" type="radio" name="deacuerdo" id="" required value="0"></h4>
                                </div>
                                <h4>E. Comentarios del funcionario evaluado</h4>
                                <textarea class='form-control' style="width: 100%" name="comentarios_evaluado" id="" cols="30" rows="5" required></textarea>
                            </div>
                            <input hidden type="number" name="result_id" id="" value="{{$result_id}}">

                            
                            <div class="form-footer">
                                <div class="text-end">
                                    <div class="d-flex">
                                        <a href="/home" class="btn btn-danger">Cancelar</a>
                                        <input type="submit" class="btn btn-primary ms-auto ajax-submit" value="Enviar">
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

@section('js')
    <script>
        const formulario = document.querySelector('#eval_form');

        if (formulario) {
            formulario.addEventListener('submit', seguro);

            function seguro(e) {
                e.preventDefault();
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                title: "¿Está seguro?",
                text: "Se enviarán los datos de evaluación",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "¡Si, estoy seguro!",
                cancelButtonText: "¡No, cancelar!",
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                    title: "Enviado",
                    text: "Se registraron sus respuestas.",
                    icon: "success"
                    });
                    this.submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                    title: "Cancelado",
                    text: "El formulario de evaluación sigue abierto.",
                    icon: "error"
                    });
                }
                });
            }
            console.log(formulario);
        }
    </script>
@endsection