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
            <label for="estimated_time" class="form-label">Tiempo Estimado En Minutos</label>
            <input type="text" class="form-control" id="estimated_time" name="estimated_time" required value="{{$incidence->estimated_time}}"/>
        </div>
        <div class="form-group mb-3">
    <label for="category_id" class="form-label">{{ __('Categoría') }}</label>
    <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $incidence->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    @error('category_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="department_id" class="form-label">{{ __('Departamento') }}</label>
    <select id="department_id" class="form-control @error('department_id') is-invalid @enderror" name="department_id" required>
        @foreach($departments as $department)
            <option value="{{ $department->id }}" {{ $incidence->department_id == $department->id ? 'selected' : '' }}>
                {{ $department->name }}
            </option>
        @endforeach
    </select>
</div>
<div>
    @error('department_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="priority_id" class="form-label">{{ __('Prioridad') }}</label>
    <select id="priority_id" class="form-control @error('priority_id') is-invalid @enderror" name="priority_id" required>
        @foreach($priorities as $priority)
            <option value="{{ $priority->id }}" {{ $incidence->priority_id == $priority->id ? 'selected' : '' }}>
                {{ $priority->name }}
            </option>
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
    <select id="status_id" class="form-control @error('status_id') is-invalid @enderror" name="status_id" required>
        @foreach($statuses as $status)
            <option value="{{ $status->id }}" {{ $incidence->status_id == $status->id ? 'selected' : '' }}>
                {{ $status->name }}
            </option>
        @endforeach
    </select>

    @error('status_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

        <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection