@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="mt-2" name="create_platform"
            action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="text" class="form-label">Texto</label>
            <input type="text" class="form-control" id="text" name="text" required/>
        </div>
        <div class="form-group mb-3">
            <label for="incidence_id" class="form-label">Confirma el id de la incidencia</label>
            <input type="incidence_id" class="form-control" id="incidence_id" name="incidence_id" required/>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="publicado"
           name="publicado">
        <label class="form-check-label" for="publicado">
        ¿Publicar Comentario?
        </label>
    </div>
    <button type="submit" class="btn btn-primary" name="">Publicar</button>
    </form>
</div>
@endsection