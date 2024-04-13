
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('tipo_formulario') }}</label>
    <div>
        {{ Form::text('tipo_formulario', $tipo->tipo_formulario, ['class' => 'form-control' .
        ($errors->has('tipo_formulario') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de formulario']) }}
        {!! $errors->first('tipo_formulario', '<div class="invalid-feedback">:message</div>') !!}
        
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
