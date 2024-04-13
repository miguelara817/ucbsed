
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('departamento') }}</label>
    <div>
        {{ Form::text('departamento', $departamento->departamento, ['class' => 'form-control' .
        ($errors->has('departamento') ? ' is-invalid' : ''), 'placeholder' => 'Departamento']) }}
        {!! $errors->first('departamento', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">departamento <b>departamento</b> instruction.</small> --}}
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
