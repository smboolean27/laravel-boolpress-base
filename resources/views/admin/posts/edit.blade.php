@extends('layouts.base')

@section('pageTitle')
	Modifica: {{$post->title}}
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="POST">
	@csrf
	@method('PUT')
	<div class="form-group">
		<label for="title">Titolo</label>
		<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$post->title}}">
	</div>
	<div class="form-group">
		<label for="date">Data</label>
		<input type="date" class="form-control" id="date" name="date" placeholder="Date" value="{{$post->date}}">
	</div>
	<div class="form-group">
		<label for="content">Contenuto</label>
		<textarea class="form-control"  name="content" id="content" cols="30" rows="10" placeholder="content">{{$post->content}}</textarea>
	</div>
	<div class="form-group">
		<label for="image">Immagine</label>
		<input type="text" class="form-control" id="image" name="image" placeholder="Image" value="{{$post->image}}">
	</div>
	<div class="form-check form-check-inline">
		<input class="form-check-input" type="checkbox" id="published" name="published" {{$post->published ? 'checked' : ''}}>
		<label class="form-check-label" for="published">Pubblicato</label>
	</div>
	<div class="mt-3">
		<h3>Tags</h3>
		@foreach ($tags as $tag)
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->name}}" name="tags[]" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
				<label class="form-check-label" for="{{$tag->name}}">
					{{$tag->name}}
				</label>
			</div>
		@endforeach
	</div>
	<div class="mt-3">
		<button type="submit" class="btn btn-primary">Modifica</button>
	</div>
</form>
	
@endsection