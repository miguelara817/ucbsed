@extends('tablar::page')

@section('title', 'Editar relación')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        {{ __('Editar relación ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('jerarquias.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12l.01 0" /><path d="M13 12l2 0" /><path d="M9 16l.01 0" /><path d="M13 16l2 0" /></svg>
                            Lista de relaciones
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST"
                                  action="{{ route('jerarquias.update', $jerarquia->id) }}" id="ajaxForm" role="form"
                                  enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                {{-- @include('jerarquia.form') --}}
                                <div class="form-group mb-3">
                                    <div>
                                        <label class="form-label" for="cargo_dependiente">Cargo dependiente</label>
                                        <select name="cargo_dependiente" id="" class="form-control" required>
                                            <option value="" disabled selected>{{$jerarquia->dependiente->cargo}} | ÁREA: {{$jerarquia->dependiente->area->area}}</option>
                                            @foreach ($cargos as $cargo)
                                                <option value="{{$cargo->id}}">{{$cargo->cargo}} | ÁREA: {{$cargo->area->area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <div>
                                        <label class="form-label" for="cargo_jefe">Cargo de jefatura</label>
                                        <select name="cargo_jefe" id="" class="form-control" required>
                                            <option value="" disabled selected>{{$jerarquia->jefe->cargo}} | ÁREA: {{$jerarquia->jefe->area->area}}</option>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



