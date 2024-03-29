@extends('layouts.app')

@section('title', 'Crea post')

@section('content')
<header>
    <h1>Nuovo Post</h1>
</header>

<form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="title" class="form-label">Titolo post</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title', '')}}" required>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="content" class="form-label">Contenuto post</label>
                <textarea class="form-control" id="content" rows="10" name="content">{{old('content', '')}}</textarea>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoria</label>
                <select name="category_id" id="category_id" class="form-select">
                    <option value="">Nessuna</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->label}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-5">
            <div class="mb-3">
                <label for="image" class="form-label">Immagine post</label>
                <input type="file" class="form-control" id="image" placeholder="http:// o https://" name="image">
            </div>
        </div>
        <div class="col-1">
            <div class="mb-3">
                <img src="{{old('image', 'https://marcolanci.it/boolean/assets/placeholder.png')}}" class="img-fluid" alt="Img post" id="preview">
            </div>
        </div>
        <div class="col-10">
            @foreach($tags as $tag)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="tags[]" id='{{"tag-$tag->id"}}' value="{{$tag->id}}" @if (in_array($tag->id, old('tags', [] ))) checked @endif>
                <label class="form-check-label" for='{{"tag-$tag->id"}}'>{{$tag->label}}</label>
            </div>
            @endforeach
        </div>
        <div class="col-2">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" value="" id="is_published" name="is_published" @if(old( 'is_published' , '' )) checked @endif>
                <label class="form-check-label" for="is_published" name="is_published">
                    Pubblica
                </label>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('admin.post.index')}}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Torna alla lista
        </a>
        <div class="d-flex align-items-center gap-2">
            <button type="reset" class="btn btn-sm btn-warning">
                <i class="fas fa-eraser me-2"></i>Svuota i campi
            </button>
            <button type="submit" class="btn btn-sm btn-success">
                <i class="fas fa-floppy-disk me-2"></i>Salva
            </button>
        </div>
    </div>
</form>
@endsection

@section('scritps')
<script>
    const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png';
    const input = document.getElementById('image');
    const preview = document.getElementById('preview');

    input.addEventListener('input', () => {
        preview.src = input.value || placeholder;
    })
</script>
@endsection