@extends('tablar::page')
{{-- <link rel="stylesheet" href="assets/css/styles.css"> --}}
@section('title', 'Formulario de evaluación')

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
                            <p>{{$eval_texto_encabezado}}</p>
                        </div>
                        <div class="form-seccion">
                            <h3>I. Funcionario a evaluar</h3>
                        </div>
                        <form action="{{ route('genform.recieveResults') }}" method="post" id="eval_form">
                            @csrf
                            <input hidden type="number" name="version_form" id="" value="{{$version}}">
                            <input hidden type="number" name="evalprocess_id" id="" value="{{$evalprocess_id}}">
                            <input hidden type="number" name="nivel_id" id="" value="{{$nivel_id}}">
                            <div class="header">
                                <div class="header-info">
                                    <span class="pregunta">APELLIDOS Y NOMBRES: </span>
                                    <input class="respuesta" type="text" name="name_evaluado" id="" value="{{$apellido_evaluado}} {{$nombre_evaluado}}">
                                    <input hidden type="number" name="id_evaluado" id="" value="{{$id_evaluado}}">
                                </div>
                                <div class="header-info">
                                    <span class="pregunta">PUESTO: </span>
                                    <input class="respuesta" type="text" name="cargo_evaluado" id="" value="{{$cargo}}">
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
                                    <input class="respuesta" type="text" name="name_evaluador" id="" value="{{auth()->user()->apellido}} {{auth()->user()->name}}">
                                    <input hidden type="number" name="id_evaluador" id="" value="{{auth()->user()->id}}">
                                </div>
                                <div class="header-info">
                                    <span class="pregunta">PUESTO: </span>
                                    <input class="respuesta" type="text" name="cargo_evaluador" id="" value="{{auth()->user()->cargo->cargo}}">
                                </div>
                            </div>
                            <div class="form-seccion">
                                <h3>III. Factores a evaluar</h3>
                            </div>
                            <div>
                                <p>{{$eval_texto_instruccion}}</p>
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
                                        @foreach ($competencias as $competencia)
                                        {{-- {{$competencia->id}} --}}
                                        <tr>
                                            <td colspan="8" style="justify-content: center; background-color: rgb(254 240 138);">{{$competencia}}</td>
                                            @foreach ($factores as $factor)
                                                @if (($factor->competencia) == ($competencia))
                                                    <tr>
                                                        <td>{{++$numeracion}}</td>
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
                                <textarea class='form-control' style="width: 100%" name="fortalezas" id="" cols="30" rows="5" 
placeholder='Destaca en la ejecución de sus tareas con un enfoque proactivo, mostrando habilidades excepcionales en...' required></textarea>
                                <br>
                                <h4>B. Debilidades del funcionario evaluado</h4>
                                <textarea class='form-control' style="width: 100%" name="debilidades" id="" cols="30" rows="5" 
placeholder='Presenta oportunidades de mejora en la gestión del tiempo, particularmente en...' required></textarea>
                                <br>
                                <h4>C. Comentarios/recomendaciones del funcionario evaluador</h4>
                                <textarea class='form-control' style="width: 100%" name="comentarios_evaluador" id="" cols="30" rows="5"
placeholder='El funcionario ha demostrado un compromiso excepcional con sus responsabilidades, pero se sugiere trabajar en mejorar la comunicación interdepartamental para optimizar la colaboración...' required></textarea>
                                <br>
                                <h4>D. Propuesta de capacitaciones para superar las debilidades del funcionario</h4>
                                <textarea class='form-control' style="width: 100%" name="propuestas" id="" cols="30" rows="5"
placeholder='Se recomienda participar en programas de desarrollo profesional para fortalecer las habilidades técnicas necesarias en el área de...' required></textarea>
                            </div>
                            
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
@stop