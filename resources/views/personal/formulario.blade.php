
<div class="form-group mb-3">
    <label class="form-label">Apellidos</label>
    <div>
        {{-- <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Apellidos"> --}}
        {{ Form::text('apellidos', $personal->apellidos, ['class' => 'form-control' .
        ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
        {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Nombres</label>
    <div>
        {{-- <input class="form-control" type="text" name="nombres" id="nombres" placeholder="Nombres"> --}}
        {{ Form::text('nombres', $personal->nombres, ['class' => 'form-control' .
        ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
        {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">personal <b>nombres</b> instruction.</small> --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Nivel</label>
    <div>
        <select class="form-control" name="nivel" id="nivel" onchange="nivelcargos(this.value)">
            <option value="" disabled selected>Seleccione un nivel</option>
            @foreach ($nivel as $niveles)
                <option value="{{$niveles->id}}">{{$niveles->nivel}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Cargo</label>
    <div>
        <select class="form-control" name="cargos" id="cargos">
            <option value="" disabled selected>Seleccione un cargo</option>
        </select>
    </div>
</div>
<script>
    let niveles = {!! json_encode($nivel->toArray()) !!};
    let cargos = {!! json_encode($cargo->toArray()) !!};
    let formnNivel = document.getElementById('nivel');

    console.log(niveles);
    console.log(cargos);
    console.log(formnNivel);

    function nivelcargos(value) {
        if (value.length == 0) {
            document.getElementById('cargos').innerHTML = '<option></option>'   
        } else{
            let cargosOptions = "";
            // console.log(value);
            for (let cargo in cargos){
                // console.log(cargos[cargo]['nivel_id'])
                if (cargos[cargo]['nivel_id'] == value) {
                    // console.log(cargos[cargo]['cargo']);
                    cgr = String(cargos[cargo]['id']);
                    cargosOptions += '<option value='+ cgr +'>'+ cargos[cargo]['cargo'] + '</option>';
                    
                }
            }
            document.getElementById('cargos').innerHTML = cargosOptions;
            console.log(cargosOptions);
        }
    }
</script>

<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('area_id') }}</label>
    <div>
        {{ Form::select('area_id', $area, $personal->area_id, ['class' => 'form-control' .
        ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Area Id']) }}
        {!! $errors->first('area_id', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">personal <b>area_id</b> instruction.</small> --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('depto_id') }}</label>
    <div>
        {{ Form::select('depto_id', $depto, $personal->depto_id, ['class' => 'form-control' .
        ($errors->has('depto_id') ? ' is-invalid' : ''), 'placeholder' => 'Depto Id']) }}
        {!! $errors->first('depto_id', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">personal <b>depto_id</b> instruction.</small> --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('unidad_id') }}</label>
    <div>
        {{ Form::select('unidad_id', $unidad, $personal->unidad_id, ['class' => 'form-control' .
        ($errors->has('unidad_id') ? ' is-invalid' : ''), 'placeholder' => 'Unidad Id']) }}
        {!! $errors->first('unidad_id', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">personal <b>unidad_id</b> instruction.</small> --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('seccion_id') }}</label>
    <div>
        {{ Form::select('seccion_id', $seccion, $personal->seccion_id, ['class' => 'form-control' .
        ($errors->has('seccion_id') ? ' is-invalid' : ''), 'placeholder' => 'Seccion Id']) }}
        {!! $errors->first('seccion_id', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">personal <b>seccion_id</b> instruction.</small> --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_ingreso') }}</label>
    <div>
        {{ Form::text('fecha_ingreso', $personal->fecha_ingreso, ['class' => 'form-control' .
        ($errors->has('fecha_ingreso') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
        {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">personal <b>fecha_ingreso</b> instruction.</small> --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_nacimiento') }}</label>
    <div>
        {{ Form::text('fecha_nacimiento', $personal->fecha_nacimiento, ['class' => 'form-control' .
        ($errors->has('fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento']) }}
        {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">personal <b>fecha_nacimiento</b> instruction.</small> --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('doc_identidad') }}</label>
    <div>
        {{ Form::text('doc_identidad', $personal->doc_identidad, ['class' => 'form-control' .
        ($errors->has('doc_identidad') ? ' is-invalid' : ''), 'placeholder' => 'Doc Identidad']) }}
        {!! $errors->first('doc_identidad', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">personal <b>doc_identidad</b> instruction.</small> --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('expedido') }}</label>
    <div>
        {{ Form::text('expedido', $personal->expedido, ['class' => 'form-control' .
        ($errors->has('expedido') ? ' is-invalid' : ''), 'placeholder' => 'Expedido']) }}
        {!! $errors->first('expedido', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">personal <b>expedido</b> instruction.</small> --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('tipo de contrato') }}</label>
    <div>
        {{ Form::select('tipocontrato_id', $tipocontrato, $personal->tipocontrato_id, ['class' => 'form-control' .
        ($errors->has('tipocontrato_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipocontrato Id']) }}
        {!! $errors->first('tipocontrato_id', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">personal <b>tipocontrato_id</b> instruction.</small> --}}
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>


