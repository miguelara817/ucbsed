
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evalprocess_id') }}</label>
    <div>
        {{ Form::text('evalprocess_id', $assignment->evalprocess_id, ['class' => 'form-control' .
        ($errors->has('evalprocess_id') ? ' is-invalid' : ''), 'placeholder' => 'Evalprocess Id']) }}
        {!! $errors->first('evalprocess_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">assignment <b>evalprocess_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evaluador_id') }}</label>
    <div>
        {{ Form::text('evaluador_id', $assignment->evaluador_id, ['class' => 'form-control' .
        ($errors->has('evaluador_id') ? ' is-invalid' : ''), 'placeholder' => 'Evaluador Id']) }}
        {!! $errors->first('evaluador_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">assignment <b>evaluador_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evaluado_id') }}</label>
    <div>
        {{ Form::text('evaluado_id', $assignment->evaluado_id, ['class' => 'form-control' .
        ($errors->has('evaluado_id') ? ' is-invalid' : ''), 'placeholder' => 'Evaluado Id']) }}
        {!! $errors->first('evaluado_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">assignment <b>evaluado_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evaluador_calificacion') }}</label>
    <div>
        {{ Form::text('evaluador_calificacion', $assignment->evaluador_calificacion, ['class' => 'form-control' .
        ($errors->has('evaluador_calificacion') ? ' is-invalid' : ''), 'placeholder' => 'Evaluador Calificacion']) }}
        {!! $errors->first('evaluador_calificacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">assignment <b>evaluador_calificacion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evaluado_calificacion') }}</label>
    <div>
        {{ Form::text('evaluado_calificacion', $assignment->evaluado_calificacion, ['class' => 'form-control' .
        ($errors->has('evaluado_calificacion') ? ' is-invalid' : ''), 'placeholder' => 'Evaluado Calificacion']) }}
        {!! $errors->first('evaluado_calificacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">assignment <b>evaluado_calificacion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('finalizacion') }}</label>
    <div>
        {{ Form::text('finalizacion', $assignment->finalizacion, ['class' => 'form-control' .
        ($errors->has('finalizacion') ? ' is-invalid' : ''), 'placeholder' => 'Finalizacion']) }}
        {!! $errors->first('finalizacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">assignment <b>finalizacion</b> instruction.</small>
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
