
<div class="form-group mb-3">
    <label class="form-label">Tipo de contrato</label>
    <div>
        {{ Form::text('tipo_contrato', $contrato->tipo_contrato, ['class' => 'form-control' .
        ($errors->has('tipo_contrato') ? ' is-invalid' : ''), 'placeholder' => 'Escribe el nuevo tipo de contrato']) }}
        {!! $errors->first('tipo_contrato', '<div class="invalid-feedback">:message</div>') !!}
       
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('contratos.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
            </div>
        </div>
    </div>
