
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('user_id') }}</label>
    <div>
        {{ Form::text('user_id', $bodyresult->user_id, ['class' => 'form-control' .
        ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">bodyresult <b>user_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('version_form') }}</label>
    <div>
        {{ Form::text('version_form', $bodyresult->version_form, ['class' => 'form-control' .
        ($errors->has('version_form') ? ' is-invalid' : ''), 'placeholder' => 'Version Form']) }}
        {!! $errors->first('version_form', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">bodyresult <b>version_form</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('factor') }}</label>
    <div>
        {{ Form::text('factor', $bodyresult->factor, ['class' => 'form-control' .
        ($errors->has('factor') ? ' is-invalid' : ''), 'placeholder' => 'Factor']) }}
        {!! $errors->first('factor', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">bodyresult <b>factor</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion') }}</label>
    <div>
        {{ Form::text('descripcion', $bodyresult->descripcion, ['class' => 'form-control' .
        ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">bodyresult <b>descripcion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('competencia') }}</label>
    <div>
        {{ Form::text('competencia', $bodyresult->competencia, ['class' => 'form-control' .
        ($errors->has('competencia') ? ' is-invalid' : ''), 'placeholder' => 'Competencia']) }}
        {!! $errors->first('competencia', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">bodyresult <b>competencia</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('ponderacion') }}</label>
    <div>
        {{ Form::text('ponderacion', $bodyresult->ponderacion, ['class' => 'form-control' .
        ($errors->has('ponderacion') ? ' is-invalid' : ''), 'placeholder' => 'Ponderacion']) }}
        {!! $errors->first('ponderacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">bodyresult <b>ponderacion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('puntuacion') }}</label>
    <div>
        {{ Form::text('puntuacion', $bodyresult->puntuacion, ['class' => 'form-control' .
        ($errors->has('puntuacion') ? ' is-invalid' : ''), 'placeholder' => 'Puntuacion']) }}
        {!! $errors->first('puntuacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">bodyresult <b>puntuacion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('comentario') }}</label>
    <div>
        {{ Form::text('comentario', $bodyresult->comentario, ['class' => 'form-control' .
        ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
        {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">bodyresult <b>comentario</b> instruction.</small>
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
