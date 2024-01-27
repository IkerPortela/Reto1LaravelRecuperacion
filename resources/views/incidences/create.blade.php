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
            <label for="estimated_time" class="form-label">Tiempo Estimado En Minutos</label>
            <input type="text" class="form-control" id="estimated_time" name="estimated_time" required/>
        </div>
        <div class="form-group mb-3">
                <label for="category_id" class="form-label">{{ __('Categoria') }}</label>
                                <select id="category_id" class="form-control @error('category_id') is-invalid @enderror " name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                </select>

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="form-group mb-3">
                <label for="priority_id" class="form-label">{{ __('Prioridad') }}</label>
                                <select id="priority_id" class="form-control @error('priority_id') is-invalid @enderror " name="priority_id" required>
                                @foreach($priorities as $priority)
                                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                                @endforeach
                                </select>

                                @error('priority_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="form-group mb-3">
                <label for="status_id" class="form-label">{{ __('Estado') }}</label>
                                <select id="status_id" class="form-control @error('status_id') is-invalid @enderror " name="status_id" required>
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                                </select>

                                @error('status_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
    <button type="submit" class="btn btn-primary" name="">Crear</button>
    </form>
</div>
@endsection