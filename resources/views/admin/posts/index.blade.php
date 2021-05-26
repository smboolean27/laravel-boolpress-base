@extends('layouts.base')

@section('pageTitle')
	Lista Articoli
@endsection

@section('content')

<div class="mb-3 text-right">
	<a href="{{route('admin.posts.create')}}"><button type="button" class="btn btn-success"><i class="fas fa-plus-square"></i> Aggiungi Post</button></a>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Immagine</th>
			<th scope="col">Titolo</th>
			<th scope="col">Data</th>
			<th scope="col">Pubblicato</th>
			<th scope="col">Azioni</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($posts as $post)
		<tr>
			<td><img src="{{$post->image ? $post->image : 'https://via.placeholder.com/200'}}" alt="{{$post->title}}" style="width: 100px"></td>
			<td>{{$post->title}}</td>
			<td>{{$post->date}}</td>
			<td>{!! $post->published ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>'!!}</td>
			<td>
				<a href="{{route('admin.posts.show', [ 'post' => $post->id ])}}"><button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button></a>
				<a href="{{route('admin.posts.edit', [ 'post' => $post->id ])}}"><button type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button></a>
				<form action="{{route('admin.posts.destroy', [ 'post' => $post->id ])}}" method="POST">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
				</form>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@if (session('message'))
    <div class="alert alert-success" style="position: fixed; bottom: 30px; right: 30px">
        {{ session('message') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
    </div>
@endif
@endsection