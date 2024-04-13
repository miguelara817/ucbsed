@extends('tablar::master')
<div id="contenedor-carga">
    <div id="carga"></div>
</div>
<link rel="shortcut icon" href="assets/logoucb.png" type="image/x-icon">
@inject('layoutHelper', 'TakiElias\Tablar\Helpers\LayoutHelper')

@section('tablar_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@includeIf('tablar::layouts.'. config('tablar.layout'))

@section('tablar_js')
    @stack('js')
    @yield('js')
@stop