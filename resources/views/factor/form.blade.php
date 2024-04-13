
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('factor') }}</label>
    <div>
        {{ Form::text('factor', $factor->factor, ['class' => 'form-control' .
        ($errors->has('factor') ? ' is-invalid' : ''), 'placeholder' => 'Escribe el nuevo factor']) }}
        {!! $errors->first('factor', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">factor <b>factor</b> instruction.</small> --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion') }}</label>
    <div>
        {{ Form::text('descripcion', $factor->descripcion, ['class' => 'form-control' .
        ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Escribe su descripción']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">factor <b>descripcion</b> instruction.</small> --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('competencia') }}</label>
    <div>
        {{ Form::select('competencia_id', $competencias, $factor->competencia_id, ['class' => 'form-control' .
        ($errors->has('competencia_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una opción']) }}
        {!! $errors->first('competencia_id', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">factor <b>competencia_id</b> instruction.</small> --}}
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('factors.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
