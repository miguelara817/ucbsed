
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nivel') }}</label>
    <div>
        {{ Form::text('nivel', $nivele->nivel, ['class' => 'form-control' .
        ($errors->has('nivel') ? ' is-invalid' : ''), 'placeholder' => 'Nivel']) }}
        {!! $errors->first('nivel', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">nivele <b>nivel</b> instruction.</small>
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
