
<div class="form-group mb-3">
    <label class="form-label">Competencia</label>
    <div>
        {{ Form::text('competencias', $competencia->competencias, ['class' => 'form-control' .
        ($errors->has('competencias') ? ' is-invalid' : ''), 'placeholder' => 'Escribe la nueva competencia']) }}
        {!! $errors->first('competencias', '<div class="invalid-feedback">:message</div>') !!}
       
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('competencias.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
