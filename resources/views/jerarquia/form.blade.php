<div class="form-group mb-3">
    {{-- <label class="form-label">   {{ Form::label('cargo_jefe') }}</label> --}}
    {{-- <div>
        {{ Form::select('cargo_jefe', $cargos, $jerarquia->cargo_jefe, ['class' => 'form-control' .
        ($errors->has('cargo_jefe') ? ' is-invalid' : ''), 'placeholder' => 'Cargo Jefe']) }}
        {!! $errors->first('cargo_jefe', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">jerarquia <b>cargo_jefe</b> instruction.</small>
    </div> --}}
    <div>
        <label class="form-label" for="cargo_jefe">Cargo de jefatura</label>
        <select name="cargo_jefe" id="" class="form-control" required>
            <option value="" disabled selected>Seleccione una opción</option>
            @foreach ($cargos as $cargo)
                <option value="{{$cargo->id}}">{{$cargo->cargo}} | ÁREA: {{$cargo->area->area}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group mb-3">
    {{-- <label class="form-label">   {{ Form::label('cargo_dependiente') }}</label> --}}
    {{-- <div>
        {{ Form::select('cargo_dependiente', $cargos, $jerarquia->cargo_dependiente, ['class' => 'form-control' .
        ($errors->has('cargo_dependiente') ? ' is-invalid' : ''), 'placeholder' => 'Cargo Dependiente']) }}
        {!! $errors->first('cargo_dependiente', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">jerarquia <b>cargo_dependiente</b> instruction.</small>
    </div> --}}
    <div>
        <label class="form-label" for="cargo_dependiente">Cargo dependiente</label>
        <select name="cargo_dependiente" id="" class="form-control" required>
            <option value="" disabled selected>Seleccione una opción</option>
            @foreach ($cargos as $cargo)
                <option value="{{$cargo->id}}">{{$cargo->cargo}} | ÁREA: {{$cargo->area->area}}</option>
            @endforeach
        </select>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{route('jerarquias.index')}}" class="btn btn-danger">Cancel</a>
                <input type="submit" class="btn btn-primary ms-auto ajax-submit" value="Enviar">
            </div>
        </div>
    </div>
