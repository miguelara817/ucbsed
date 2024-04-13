
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('departamento') }}</label>
    <div>
        {{ Form::text('departamento', $depto->departamento, ['class' => 'form-control' .
        ($errors->has('departamento') ? ' is-invalid' : ''), 'placeholder' => 'Escribe el departamento']) }}
        {!! $errors->first('departamento', '<div class="invalid-feedback">:message</div>') !!}
    
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Área</label>
    <div>
        {{ Form::select('area_id',$area, $depto->area_id, ['class' => 'form-control' .
        ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un área']) }}
        {!! $errors->first('area_id', '<div class="invalid-feedback">:message</div>') !!}
        
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('deptos.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
