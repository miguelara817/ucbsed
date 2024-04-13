
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evalprocess_id') }}</label>
    <div>
        {{ Form::text('evalprocess_id', $evalresult->evalprocess_id, ['class' => 'form-control' .
        ($errors->has('evalprocess_id') ? ' is-invalid' : ''), 'placeholder' => 'Evalprocess Id']) }}
        {!! $errors->first('evalprocess_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evalresult <b>evalprocess_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evaluado_id') }}</label>
    <div>
        {{ Form::text('evaluado_id', $evalresult->evaluado_id, ['class' => 'form-control' .
        ($errors->has('evaluado_id') ? ' is-invalid' : ''), 'placeholder' => 'Evaluado Id']) }}
        {!! $errors->first('evaluado_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evalresult <b>evaluado_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evaluado_nivel_id') }}</label>
    <div>
        {{ Form::text('evaluado_nivel_id', $evalresult->evaluado_nivel_id, ['class' => 'form-control' .
        ($errors->has('evaluado_nivel_id') ? ' is-invalid' : ''), 'placeholder' => 'Evaluado Nivel Id']) }}
        {!! $errors->first('evaluado_nivel_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evalresult <b>evaluado_nivel_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('evaluador_id') }}</label>
    <div>
        {{ Form::text('evaluador_id', $evalresult->evaluador_id, ['class' => 'form-control' .
        ($errors->has('evaluador_id') ? ' is-invalid' : ''), 'placeholder' => 'Evaluador Id']) }}
        {!! $errors->first('evaluador_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evalresult <b>evaluador_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fortalezas') }}</label>
    <div>
        {{ Form::text('fortalezas', $evalresult->fortalezas, ['class' => 'form-control' .
        ($errors->has('fortalezas') ? ' is-invalid' : ''), 'placeholder' => 'Fortalezas']) }}
        {!! $errors->first('fortalezas', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evalresult <b>fortalezas</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('debilidades') }}</label>
    <div>
        {{ Form::text('debilidades', $evalresult->debilidades, ['class' => 'form-control' .
        ($errors->has('debilidades') ? ' is-invalid' : ''), 'placeholder' => 'Debilidades']) }}
        {!! $errors->first('debilidades', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evalresult <b>debilidades</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('comentarios_evaluador') }}</label>
    <div>
        {{ Form::text('comentarios_evaluador', $evalresult->comentarios_evaluador, ['class' => 'form-control' .
        ($errors->has('comentarios_evaluador') ? ' is-invalid' : ''), 'placeholder' => 'Comentarios Evaluador']) }}
        {!! $errors->first('comentarios_evaluador', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evalresult <b>comentarios_evaluador</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('propuestas') }}</label>
    <div>
        {{ Form::text('propuestas', $evalresult->propuestas, ['class' => 'form-control' .
        ($errors->has('propuestas') ? ' is-invalid' : ''), 'placeholder' => 'Propuestas']) }}
        {!! $errors->first('propuestas', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evalresult <b>propuestas</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nota_final') }}</label>
    <div>
        {{ Form::text('nota_final', $evalresult->nota_final, ['class' => 'form-control' .
        ($errors->has('nota_final') ? ' is-invalid' : ''), 'placeholder' => 'Nota Final']) }}
        {!! $errors->first('nota_final', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evalresult <b>nota_final</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('comentarios_evaluado') }}</label>
    <div>
        {{ Form::text('comentarios_evaluado', $evalresult->comentarios_evaluado, ['class' => 'form-control' .
        ($errors->has('comentarios_evaluado') ? ' is-invalid' : ''), 'placeholder' => 'Comentarios Evaluado']) }}
        {!! $errors->first('comentarios_evaluado', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">evalresult <b>comentarios_evaluado</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
