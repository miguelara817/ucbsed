
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('factores') }}</label>
    <div>
        {{ Form::text('factores', $formulario->factores, ['class' => 'form-control' .
        ($errors->has('factores') ? ' is-invalid' : ''), 'placeholder' => 'Factores']) }}
        {!! $errors->first('factores', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">formulario <b>factores</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion') }}</label>
    <div>
        {{ Form::text('descripcion', $formulario->descripcion, ['class' => 'form-control' .
        ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">formulario <b>descripcion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('puntuacion') }}</label>
    <div>
        {{ Form::text('puntuacion', $formulario->puntuacion, ['class' => 'form-control' .
        ($errors->has('puntuacion') ? ' is-invalid' : ''), 'placeholder' => 'Puntuacion']) }}
        {!! $errors->first('puntuacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">formulario <b>puntuacion</b> instruction.</small>
    </div>
</div>
<!-- Radio Buttons -->
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('Débil') }}</label>
    <div>
        {{ Form::radio('puntuacion', $formulario->puntuacion, ['class' => 'form-control' .
        ($errors->has('puntuacion') ? ' is-invalid' : ''), 'placeholder' => 'Puntuacion']) }}
        {!! $errors->first('puntuacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">formulario <b>puntuacion</b> instruction.</small>
    </div>
    <label class="form-label">   {{ Form::label('Bueno') }}</label>
    <div>
        {{ Form::radio('puntuacion', $formulario->puntuacion, ['class' => 'form-control' .
        ($errors->has('puntuacion') ? ' is-invalid' : ''), 'placeholder' => 'Puntuacion']) }}
        {!! $errors->first('puntuacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">formulario <b>puntuacion</b> instruction.</small>
    </div>
    <label class="form-label">   {{ Form::label('Muy bueno') }}</label>
    <div>
        {{ Form::radio('puntuacion', $formulario->puntuacion, ['class' => 'form-control' .
        ($errors->has('puntuacion') ? ' is-invalid' : ''), 'placeholder' => 'Puntuacion']) }}
        {!! $errors->first('puntuacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">formulario <b>puntuacion</b> instruction.</small>
    </div>
    <label class="form-label">   {{ Form::label('Excelente') }}</label>
    <div>
        {{ Form::radio('puntuacion', $formulario->puntuacion, ['class' => 'form-control' .
        ($errors->has('puntuacion') ? ' is-invalid' : ''), 'placeholder' => 'Puntuacion']) }}
        {!! $errors->first('puntuacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">formulario <b>puntuacion</b> instruction.</small>
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
