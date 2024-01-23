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
    <h1 style="text-align: center">DEPARTAMENTOS</h1>
    <ul style="list-style: none;">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@auth  
        <div class="d-flex flex-column flex-md-row p-1 gap-1 py-md-1 align-items-center justify-content-center">
        <a class="btn btn-primary" href="{{route('departments.create')}}"
    role="button">Crear un nuevo departamento</a>
</div>
    @endauth
@forelse ($departments as $department)
<li class="pt-1">
<div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
  <div class="list-group">
    <i><p class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">{{$department->name}}</p></i>
    <b><a href="{{route('departments.show', $department)}}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true"> Ver Incidencias</a></b>

    <div class="d-flex flex-row">
    @auth
        <a class="list-group-item list-group-item-action d-flex gap-3 py-3 btn btn-warning btn-sm" href="{{route('departments.edit',$department)}}"
        role="button">Editar Departamento</a>
        <form action="{{route('departments.destroy',$department)}}" method="POST"
        enctype="multipart/form-data">
    @csrf
    @method('DELETE')
        <button style="background-color:#9c1111"class="list-group-item d-flex gap-3 py-3 btn btn-sm btn-danger" type="submit"
        onclick="return confirm('¿Estas seguro?')">Borrar
        </button>
    </form>
    </div>
 
</li>
        @endauth
        @empty
        <h5 style= "text-align:center">No hay departamentos</h5>
@endforelse
        </ul>
        @endsection
    </body>
</html>