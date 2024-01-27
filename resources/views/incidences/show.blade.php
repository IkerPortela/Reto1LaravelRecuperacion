@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$incidence->title}}</h1>
    <p>Creado el {{$incidence->created_at}}</p>
    <p>{{$incidence->text}}</p>

    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="card text-dark">
                    <div class="card-body p-4">
                        <h4 class="mb-4 pb-2">Comentarios</h4>

                        @forelse($incidence->comments as $comment)
                            <hr class="my-0" style="height: 3px;" />
                            <div class="d-flex flex-start">
                                <img class="rounded-circle shadow-1-strong me-3"
                                    src="https://digitalpublicservices.gov.wales/sites/default/files/styles/profile/public/2023-04/person-placeholder.webp?h=228f0422&itok=wSjNaqvA"
                                    alt="avatar" width="60" height="60" />
                                <div>
                                    <p class="mb-0">{{$comment->text}}</p>
                                    @auth
                                    @if($comment->user_id === Auth::user()->id)
                                        <div class="d-flex flex-row">
                                            <a class="list-group-item list-group-item-action d-flex gap-3 py-3 btn btn-warning btn-sm"
                                                href="{{route('comments.edit',$comment)}}"
                                                role="button">Editar Comentario</a>
                                            <form action="{{route('comments.destroy',$comment)}}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button style="background-color:#9c1111"
                                                    class="list-group-item d-flex gap-3 py-3 btn btn-sm btn-danger" type="submit"
                                                    onclick="return confirm('¿Estas seguro?')">Borrar
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                    @endauth
                                </div>
                            </div>
                        @empty
                            <p>No hay comentarios</p>
                        @endforelse
                        @auth
                        @if($incidence->department_id === Auth::user()->department_id)
                        <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" id="incidence_id" name="incidence_id" value="{{ $incidence->id }}">
                        <div class="form-group mb-3">
                        <textarea class="form-control" id="text" name="text" placeholder="Escribe tu comentario aquí..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Publicar Comentario</button>
                        @endif
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
