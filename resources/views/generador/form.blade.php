
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('creador') }}</label>
    <div>
        {{ Form::text('creador', $generador->creador, ['class' => 'form-control' .
        ($errors->has('creador') ? ' is-invalid' : ''), 'placeholder' => 'Creador']) }}
        {!! $errors->first('creador', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">generador <b>creador</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('contrato') }}</label>
    <div>
        {{ Form::text('contrato', $generador->contrato, ['class' => 'form-control' .
        ($errors->has('contrato') ? ' is-invalid' : ''), 'placeholder' => 'Contrato']) }}
        {!! $errors->first('contrato', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">generador <b>contrato</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evaluado') }}</label>
    <div>
        {{ Form::text('evaluado', $generador->evaluado, ['class' => 'form-control' .
        ($errors->has('evaluado') ? ' is-invalid' : ''), 'placeholder' => 'Evaluado']) }}
        {!! $errors->first('evaluado', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">generador <b>evaluado</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('puesto') }}</label>
    <div>
        {{ Form::text('puesto', $generador->puesto, ['class' => 'form-control' .
        ($errors->has('puesto') ? ' is-invalid' : ''), 'placeholder' => 'Puesto']) }}
        {!! $errors->first('puesto', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">generador <b>puesto</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evaluador') }}</label>
    <div>
        {{ Form::text('evaluador', $generador->evaluador, ['class' => 'form-control' .
        ($errors->has('evaluador') ? ' is-invalid' : ''), 'placeholder' => 'Evaluador']) }}
        {!! $errors->first('evaluador', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">generador <b>evaluador</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evaluador_puesto') }}</label>
    <div>
        {{ Form::text('evaluador_puesto', $generador->evaluador_puesto, ['class' => 'form-control' .
        ($errors->has('evaluador_puesto') ? ' is-invalid' : ''), 'placeholder' => 'Evaluador Puesto']) }}
        {!! $errors->first('evaluador_puesto', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">generador <b>evaluador_puesto</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_evaluacion') }}</label>
    <div>
        {{ Form::text('fecha_evaluacion', $generador->fecha_evaluacion, ['class' => 'form-control' .
        ($errors->has('fecha_evaluacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Evaluacion']) }}
        {!! $errors->first('fecha_evaluacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">generador <b>fecha_evaluacion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_cumplimiento') }}</label>
    <div>
        {{ Form::text('fecha_cumplimiento', $generador->fecha_cumplimiento, ['class' => 'form-control' .
        ($errors->has('fecha_cumplimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Cumplimiento']) }}
        {!! $errors->first('fecha_cumplimiento', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">generador <b>fecha_cumplimiento</b> instruction.</small>
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
