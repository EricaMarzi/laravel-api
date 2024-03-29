@extends('layouts.app')

@section('title', 'Posts')

@section('content')

<header class="d-flex align-items-center justify-content-between">
    <h1>Posts</h1>

    <form action="{{route('admin.post.index')}}" method="GET">
        <div class="input-group">
            <select class="form-select" name="filter">
                <option value="">Tutti</option>
                <option value="published" @if($filter==='published' ) selected @endif>Pubblicati</option>
                <option value="drafts" @if($filter==='drafts' ) selected @endif>Bozze</option>
            </select>
            <button class="btn btn-outline-primary" type="submit">Cerca</button>
        </div>
    </form>
</header>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Slug</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tag</th>
            <th scope="col">Stato</th>
            <th scope="col">Data creazione</th>
            <th scope="col">Ultima modifica</th>
            <th>
                <a href="{{route('admin.post.create')}}" class="btn btn-sm btn-success px-4">
                    <i class="fas fa-plus me-2"></i>Nuovo
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->slug}}</td>
            <td>@if($post->category)
                <span class="badge rounded-pill" style="background-color: {{$post->category->color}}">{{$post->category->label}}</span>
                @else
                <p class="text-center">-</p>
                @endif
            </td>
            <td>
                @forelse($post->tags as $tag)
                <span class="badge" style="background-color: {{$tag->color}}">{{$tag->label}}</span>
                @empty
                <p class="text-center">-</p>
                @endforelse
            </td>
            <td>{{$post->is_published ? 'Pubblicato' : 'Bozza'}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
            <td>
                <div class="d-flex gap-2">
                    <a href="{{route('admin.post.show', $post->id)}}" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{route('admin.post.edit', $post)}}" class="btn btn-sm btn-warning">
                        <i class="fas fa-pencil"></i>
                    </a>

                    <form action="{{route('admin.post.destroy', $post)}}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type='submit' class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">
                <h2 class="text-center">Non ci sono post da visualizzare</h2>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@if($posts->hasPages())
{{$posts->links()}}
@endif

@endsection

@section('scripts')
<!-- <script src="{{Vite::asset('js/delete_confirmation.js')}}"></script> -->
@vite('resources/js/delete_confirmation.js')
@endsection