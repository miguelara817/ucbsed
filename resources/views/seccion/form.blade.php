
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('seccion') }}</label>
    <div>
        {{ Form::text('seccion', $seccion->seccion, ['class' => 'form-control' .
        ($errors->has('seccion') ? ' is-invalid' : ''), 'placeholder' => 'Seccion']) }}
        {!! $errors->first('seccion', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">seccion <b>seccion</b> instruction.</small> --}}
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
