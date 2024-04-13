
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evalresult_id') }}</label>
    <div>
        {{ Form::text('evalresult_id', $evaldetailsresult->evalresult_id, ['class' => 'form-control' .
        ($errors->has('evalresult_id') ? ' is-invalid' : ''), 'placeholder' => 'Evalresult Id']) }}
        {!! $errors->first('evalresult_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evaldetailsresult <b>evalresult_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('factor') }}</label>
    <div>
        {{ Form::text('factor', $evaldetailsresult->factor, ['class' => 'form-control' .
        ($errors->has('factor') ? ' is-invalid' : ''), 'placeholder' => 'Factor']) }}
        {!! $errors->first('factor', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evaldetailsresult <b>factor</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion') }}</label>
    <div>
        {{ Form::text('descripcion', $evaldetailsresult->descripcion, ['class' => 'form-control' .
        ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evaldetailsresult <b>descripcion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('competencia') }}</label>
    <div>
        {{ Form::text('competencia', $evaldetailsresult->competencia, ['class' => 'form-control' .
        ($errors->has('competencia') ? ' is-invalid' : ''), 'placeholder' => 'Competencia']) }}
        {!! $errors->first('competencia', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evaldetailsresult <b>competencia</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('ponderacion') }}</label>
    <div>
        {{ Form::text('ponderacion', $evaldetailsresult->ponderacion, ['class' => 'form-control' .
        ($errors->has('ponderacion') ? ' is-invalid' : ''), 'placeholder' => 'Ponderacion']) }}
        {!! $errors->first('ponderacion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evaldetailsresult <b>ponderacion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nota') }}</label>
    <div>
        {{ Form::text('nota', $evaldetailsresult->nota, ['class' => 'form-control' .
        ($errors->has('nota') ? ' is-invalid' : ''), 'placeholder' => 'Nota']) }}
        {!! $errors->first('nota', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evaldetailsresult <b>nota</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('comentario') }}</label>
    <div>
        {{ Form::text('comentario', $evaldetailsresult->comentario, ['class' => 'form-control' .
        ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
        {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evaldetailsresult <b>comentario</b> instruction.</small>
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
