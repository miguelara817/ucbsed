
<div class="form-group mb-3">
    <label class="form-label">Sección</label>
    <div>
        {{ Form::text('seccion', $seccione->seccion, ['class' => 'form-control' .
        ($errors->has('seccion') ? ' is-invalid' : ''), 'placeholder' => 'Escribe la sección']) }}
        {!! $errors->first('seccion', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Área</label>
    <div>
        {{ Form::select('area_id',$area, $seccione->area_id, ['class' => 'form-control' .
        ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un área']) }}
        {!! $errors->first('area_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('secciones.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
