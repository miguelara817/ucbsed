
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cargo_dependiente') }}</label>
    <div>
        {{ Form::text('cargo_dependiente', $arbolcargo->cargo_dependiente, ['class' => 'form-control' .
        ($errors->has('cargo_dependiente') ? ' is-invalid' : ''), 'placeholder' => 'Cargo Dependiente']) }}
        {!! $errors->first('cargo_dependiente', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">arbolcargo <b>cargo_dependiente</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nivel_id') }}</label>
    <div>
        {{ Form::select('nivel_id',$nivel, $arbolcargo->nivel_id, ['class' => 'form-control' .
        ($errors->has('nivel_id') ? ' is-invalid' : ''), 'placeholder' => 'Nivel Id']) }}
        {!! $errors->first('nivel_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">arbolcargo <b>nivel_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cargo_jefe') }}</label>
    <div>
        {{ Form::select('cargo_jefe',$jcargo, $arbolcargo->cargo_jefe, ['class' => 'form-control' .
        ($errors->has('cargo_jefe') ? ' is-invalid' : ''), 'placeholder' => 'Cargo Jefe']) }}
        {!! $errors->first('cargo_jefe', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">arbolcargo <b>cargo_jefe</b> instruction.</small>
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
