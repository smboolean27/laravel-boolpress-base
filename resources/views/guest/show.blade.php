@extends('layouts.guest')

@section('pageTitle')
	{{$post->title}}
@endsection

@section('content')
<div class="mt-3 mb-3">
	<h1>{{$post->title}}</h1>
	<h4>{{$post->date}}</h4>
	<p>{{$post->content}}</p>

	<div class="mt-5">
		@if ($post->comments->isNotEmpty())
		<h3>Commenti</h3>
		<ul>
			@foreach ($post->comments as $comment)
				<li>
					<h5>{{$comment->name ? $comment->name : 'Leone da tastiera'}}</h5>
					<p>{{$comment->content}}</p>
				</li>
			@endforeach
		</ul>
		@endif
		<h3>Aggiungi Commento</h3>
		<form action="{{route('guest.posts.add-comment', ['post' => $post->id])}}" method="post">
			@csrf
			@method('POST')
			<div class="form-group">
				<label for="title">Nome</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Nome">
			</div>
			<div class="form-group">
				<label for="content">Commento</label>
				<textarea class="form-control"  name="content" id="content" cols="30" rows="4" placeholder="Commento"></textarea>
			</div>
			<div class="mt-3">
				<button type="submit" class="btn btn-primary">Inserisci</button>
			</div>
		</form>
	</div>
</div>
@endsection