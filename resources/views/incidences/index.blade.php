<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body class="antialiased">
    @extends('layouts.app')
    @section('content')
    <h1 style="text-align: center">INCIDENCIAS</h1>
    <ul style="list-style: none;">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @auth
        @if($department->id === Auth::user()->department_id)
        <div class="d-flex flex-column flex-md-row p-1 gap-1 py-md-1 align-items-center justify-content-center">
        <a class="btn btn-primary" style="text-align: center" href="{{route('incidences.create')}}"
    role="button">Crear una nueva incidendia</a>
</div>
    @endif    
    @endauth
@forelse ($incidences as $incidence)

<li class="pt-1">
<div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
  <div class="list-group">
    <b><a href="{{route('incidences.show',$incidence)}}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true"> {{$incidence->title}}</a></b>
    <p class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">Escrito el {{$incidence->created_at}}</p>
    @auth
    @if($incidence->user_id === Auth::user()->id)
    <div class="d-flex flex-row">
        <a class="list-group-item list-group-item-action d-flex gap-3 py-3 btn btn-warning btn-sm" href="{{route('incidences.edit',$incidence)}}"
        role="button">Editar Incidencia</a>
        <form action="{{route('incidences.destroy',$incidence)}}" method="POST"
        enctype="multipart/form-data">
    @csrf
    @method('DELETE')
        <button style="background-color:#9c1111"class="list-group-item d-flex gap-3 py-3 btn btn-sm btn-danger" type="submit"
        onclick="return confirm('¿Estas seguro?')">Borrar
        </button>
    </form>
    </div>
 
</li>
        @endif
        @endauth
        @empty
        <h5 style= "text-align:center">No hay ninguna incidencia</h5>
@endforelse
        </ul>
        @endsection
    </body>
</html>