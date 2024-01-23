@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="mt-2" name="create_platform"
            action="{{route('departments.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required/>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="publicado"
           name="publicado">
        <label class="form-check-label" for="publicado">
        ¿Crear Departamento?
        </label>
    </div>
    <button type="submit" class="btn btn-primary" name="">Crear</button>
    </form>
</div>
@endsection