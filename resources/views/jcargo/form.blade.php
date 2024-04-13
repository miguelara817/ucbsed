
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cargo') }}</label>
    <div>
        {{ Form::text('cargo', $jcargo->cargo, ['class' => 'form-control' .
        ($errors->has('cargo') ? ' is-invalid' : ''), 'placeholder' => 'Cargo']) }}
        {!! $errors->first('cargo', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">jcargo <b>cargo</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nivel_id') }}</label>
    <div>
        {{ Form::select('nivel_id', $nivel, $jcargo->nivel_id, ['class' => 'form-control' .
        ($errors->has('nivel_id') ? ' is-invalid' : ''), 'placeholder' => 'Nivel Id']) }}
        {!! $errors->first('nivel_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">jcargo <b>nivel_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('area_id') }}</label>
    <div>
        {{ Form::select('area_id',$area, $jcargo->area_id, ['class' => 'form-control' .
        ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Area Id']) }}
        {!! $errors->first('area_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">jcargo <b>area_id</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{route('jcargos.index')}}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
