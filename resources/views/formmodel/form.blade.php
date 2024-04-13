
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('creador') }}</label>
    <div>
        {{ Form::text('creador', $formmodel->creador, ['class' => 'form-control' .
        ($errors->has('creador') ? ' is-invalid' : ''), 'placeholder' => 'Creador']) }}
        {!! $errors->first('creador', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">formmodel <b>creador</b> instruction.</small> --}}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('tipo_id') }}</label>
    <div>
        {{ Form::select('tipo_id', $tipos, $formmodel->tipo_id, ['class' => 'form-control' .
        ($errors->has('tipo_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de formulario']) }}
        {!! $errors->first('tipo_id', '<div class="invalid-feedback">:message</div>') !!}
        {{-- <small class="form-hint">formmodel <b>tipo_id</b> instruction.</small> --}}
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
