@extends('tablar::page')

@section('title', 'Create Evalproce')

@section('content')

{{$version_id}}
{{$fecha_inicio}}
{{$fecha_conclusion}}
{{-- {{print_r($jefes_asignados)}}

{{print_r($jefes)}} --}}
{{$user_id}}
{{$cargo_jefe}}
{{$evaluador->id}}
@dump($evaluador)
@endsection