
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cargo') }}</label>
    <div>
        {{ Form::text('cargo', $cargo->cargo, ['class' => 'form-control' .
        ($errors->has('cargo') ? ' is-invalid' : ''), 'placeholder' => 'Escribe el cargo']) }}
        {!! $errors->first('cargo', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Nivel</label>
    <div>
        {{ Form::select('nivel_id',$niveles, $cargo->nivel_id, ['class' => 'form-control',
        'placeholder' => 'Seleccionar nivel']) }}
        {{-- {!! $errors->first('nivel_id', '<div class="invalid-feedback">:message</div>') !!} --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Área</label>
    <div>
        {{ Form::select('area_id',$areas, $cargo->area_id, ['class' => 'form-control' .
        ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar área']) }}
        {!! $errors->first('area_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('cargos.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
