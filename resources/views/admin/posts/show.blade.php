@extends('layouts.app')

@section('title', 'Post')

@section('content')

<header>
    <h1>{{$post->title}}</h1>
    <div class="d-flex justify-content-between">
        @if($post->category)
        <div>
            Categoria:
            <span class="badge rounded-pill" style="background-color: {{$post->category->color}}">{{$post->category->label}}</span>
        </div>
        @else
        No Category
        @endif

        <div class="d-flex gap-2">
            @forelse($post->tags as $tag)
            <span class="badge" style="background-color: {{$tag->color}}">{{$tag->label}}</span>
            @empty
            @endforelse
        </div>
    </div>
    <hr>
</header>


<div class="clearfix">
    @if($post->image)
    <img src="{{asset('storage/' . $post->image)}}" alt="$post->title" class="float-start me-2 img-fluid">
    @endif
    <p>{{$post->content}}</p>
    <div>
        <strong>Data di creazione:</strong> {{$post->created_at}}
        <strong>Ultima modifica:</strong> {{$post->updated_at}}
    </div>
</div>
<hr>
<footer class="d-flex justify-content-between align-items-center mt-5">
    <a href="{{route('admin.post.index')}}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i>
    </a>
    <div class="d-flex gap-2">
        <a href="{{route('admin.post.edit', $post)}}" class="btn btn-sm btn-warning">
            <i class="fas fa-pencil me-2"></i>Modifica
        </a>

        <form action="{{route('admin.post.destroy', $post)}}" method="POST" class="delete-form">
            @csrf
            @method('DELETE')
            <button type='submit' class="btn btn-sm btn-danger">
                <i class="fas fa-trash me-2"></i>Elimina
            </button>
        </form>
    </div>
</footer>

@endsection

@section('scripts')
@vite('resources/js/delete_confirmation.js')
@endsection