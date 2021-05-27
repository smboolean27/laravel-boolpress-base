@extends('layouts.base')

@section('pageTitle')
	{{$post->title}}
@endsection

@section('content')
	<p><strong>data:</strong> {{$post->date}}</p>
	<p><strong>stato:</strong> {{$post->published ? 'pubblicato' : 'non pubblicato'}}</p>
	<div><strong>tags: </strong>
		@foreach ($post->tags as $tag)
			<span class="badge badge-primary">{{$tag->name}}</span>
		@endforeach
	</div>
	<hr>
	<p>{{$post->content}}</p>
	
	@if ($post->comments->isNotEmpty())
	<div class="mt-5">
		<h3>Commenti</h3>
		<ul>
			@foreach ($post->comments as $comment)
				<li>
					<h5>{{$comment->name ? $comment->name : 'Anonimo'}}</h5>
					<p>{{$comment->content}}</p>
					<div>
						<form action="{{route('admin.comments.destroy', [ 'comment' => $comment->id ])}}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
						</form>
					</div>
				</li>
			@endforeach
		</ul>
	</div>
	@endif
	<a href="{{route('admin.posts.index')}}">Torna alla lista degli articoli</a>

	@if (session('message'))
    <div class="alert alert-success" style="position: fixed; bottom: 30px; right: 30px">
        {{ session('message') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
    </div>
	@endif
@endsection