
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('unidad') }}</label>
    <div>
        {{ Form::text('unidad', $unidad->unidad, ['class' => 'form-control' .
        ($errors->has('unidad') ? ' is-invalid' : ''), 'placeholder' => 'Unidad']) }}
        {!! $errors->first('unidad', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">unidad <b>unidad</b> instruction.</small> --}}
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
