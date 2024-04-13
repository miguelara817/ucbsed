
<div class="form-group mb-3">
    <label class="form-label">Área</label>
    <div>
        {{ Form::text('area', $area->area, ['class' => 'form-control' .
        ($errors->has('area') ? ' is-invalid' : ''), 'placeholder' => 'Escribe la nueva área']) }}
        {!! $errors->first('area', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">area <b>area</b> instruction.</small> --}}
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('areas.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
