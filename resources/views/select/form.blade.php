
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('factor_id') }}</label>
    <div>
        {{ Form::select('factor_id', $factor, $select->factor_id, ['class' => 'form-control' .
        ($errors->has('factor_id') ? ' is-invalid' : ''), 'placeholder' => 'Factor Id']) }}
        {!! $errors->first('factor_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">select <b>factor_id</b> instruction.</small>
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
