@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('incidences.update',$incidence)}}" method="POST"
        enctype="multipart/form-data"> @csrf @method('PUT') <div class="form-group mb-3"> <label for="titulo"
        class="form-label">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required value="{{$incidence->title}}"/> </div>
        <div class="form-group mb-3"> <label for="texto" class="form-label">Texto</label> <textarea type="textarea"
            rows="5" class="form-control" id="texto" name="texto">
            {{$incidence->text}}
            </textarea>
        </div>
        <div class="form-group mb-3">
            <label for="category_id" class="form-label">Id de Categoria (1 = Baja, 2 = Media, 3 = Alta)</label>
            <input type="text" class="form-control" id="category_id" name="category_id" required value="{{$incidence->category_id}}"/>
        </div>
        <div class="form-group mb-3">
            <label for="department_id" class="form-label">Id de Departamento (1 = Informatica, 2 = Veterinaria, 3 = Mecanica)</label>
            <input type="text" class="form-control" id="department_id" name="department_id" required value="{{$incidence->department_id}}"/>
        </div>
        <div class="form-check"> <input class="form-check-input" type="checkbox" id="publicado" name="publicado"
            @checked($incidence->publicado)>
            <label class="form-check-label" for="publicado">
                ¿Publicar?
            </label>
        </div>
        <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection