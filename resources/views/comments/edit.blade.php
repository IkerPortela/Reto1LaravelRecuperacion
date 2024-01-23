@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('comments.update',$commentary)}}" method="POST"
        enctype="multipart/form-data"> @csrf @method('PUT') <div class="form-group mb-3"> <label for="text"
        class="form-label">Texto</label>
        <input type="text" class="form-control" id="text" name="text" required value="{{$commentary->text}}"/> </div>
        <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection