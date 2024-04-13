
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('unidad') }}</label>
    <div>
        {{ Form::text('unidad', $unidade->unidad, ['class' => 'form-control' .
        ($errors->has('unidad') ? ' is-invalid' : ''), 'placeholder' => 'Escribe la unidad']) }}
        {!! $errors->first('unidad', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Área</label>
    <div>
        {{ Form::select('area_id',$area, $unidade->area_id, ['class' => 'form-control' .
        ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un área']) }}
        {!! $errors->first('area_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('unidades.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
