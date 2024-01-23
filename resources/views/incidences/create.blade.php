@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="mt-2" name="create_platform"
            action="{{route('incidences.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="title" name="title" required/>
        </div>
        <div class="form-group mb-3">
            <label for="text" class="form-label">Texto</label>
            <textarea type="textarea" rows="5" class="form-control" id="text" name="text">
            </textarea>
        </div>
        <div class="form-group mb-3">
            <label for="category_id" class="form-label">Id de Categoria (1 = Critica, 2 = Imprevista, 3 = Menor)</label>
            <input type="text" class="form-control" id="category_id" name="category_id" required/>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="publicado"
           name="publicado">
        <label class="form-check-label" for="publicado">
        ¿Publicar?
        </label>
    </div>
    <button type="submit" class="btn btn-primary" name="">Crear</button>
    </form>
</div>
@endsection