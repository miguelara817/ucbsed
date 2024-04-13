
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('user_id') }}</label>
    <div>
        {{ Form::text('user_id', $headresult->user_id, ['class' => 'form-control' .
        ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">headresult <b>user_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre_evaluado') }}</label>
    <div>
        {{ Form::text('nombre_evaluado', $headresult->nombre_evaluado, ['class' => 'form-control' .
        ($errors->has('nombre_evaluado') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Evaluado']) }}
        {!! $errors->first('nombre_evaluado', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">headresult <b>nombre_evaluado</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cargo_evaluado') }}</label>
    <div>
        {{ Form::text('cargo_evaluado', $headresult->cargo_evaluado, ['class' => 'form-control' .
        ($errors->has('cargo_evaluado') ? ' is-invalid' : ''), 'placeholder' => 'Cargo Evaluado']) }}
        {!! $errors->first('cargo_evaluado', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">headresult <b>cargo_evaluado</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nivel_evaluado') }}</label>
    <div>
        {{ Form::text('nivel_evaluado', $headresult->nivel_evaluado, ['class' => 'form-control' .
        ($errors->has('nivel_evaluado') ? ' is-invalid' : ''), 'placeholder' => 'Nivel Evaluado']) }}
        {!! $errors->first('nivel_evaluado', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">headresult <b>nivel_evaluado</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre_evaluador') }}</label>
    <div>
        {{ Form::text('nombre_evaluador', $headresult->nombre_evaluador, ['class' => 'form-control' .
        ($errors->has('nombre_evaluador') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Evaluador']) }}
        {!! $errors->first('nombre_evaluador', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">headresult <b>nombre_evaluador</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cargo_evaluador') }}</label>
    <div>
        {{ Form::text('cargo_evaluador', $headresult->cargo_evaluador, ['class' => 'form-control' .
        ($errors->has('cargo_evaluador') ? ' is-invalid' : ''), 'placeholder' => 'Cargo Evaluador']) }}
        {!! $errors->first('cargo_evaluador', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">headresult <b>cargo_evaluador</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nivel_evaluador') }}</label>
    <div>
        {{ Form::text('nivel_evaluador', $headresult->nivel_evaluador, ['class' => 'form-control' .
        ($errors->has('nivel_evaluador') ? ' is-invalid' : ''), 'placeholder' => 'Nivel Evaluador']) }}
        {!! $errors->first('nivel_evaluador', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">headresult <b>nivel_evaluador</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('version_form') }}</label>
    <div>
        {{ Form::text('version_form', $headresult->version_form, ['class' => 'form-control' .
        ($errors->has('version_form') ? ' is-invalid' : ''), 'placeholder' => 'Version Form']) }}
        {!! $errors->first('version_form', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">headresult <b>version_form</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('periodo_inicio') }}</label>
    <div>
        {{ Form::text('periodo_inicio', $headresult->periodo_inicio, ['class' => 'form-control' .
        ($errors->has('periodo_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Periodo Inicio']) }}
        {!! $errors->first('periodo_inicio', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">headresult <b>periodo_inicio</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('periodo_final') }}</label>
    <div>
        {{ Form::text('periodo_final', $headresult->periodo_final, ['class' => 'form-control' .
        ($errors->has('periodo_final') ? ' is-invalid' : ''), 'placeholder' => 'Periodo Final']) }}
        {!! $errors->first('periodo_final', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">headresult <b>periodo_final</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
