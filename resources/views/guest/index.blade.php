@extends('layouts.guest')

@section('pageTitle')
	Boolpress
@endsection

@section('content')
{{-- <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
	<div class="col-md-6 px-0">
		<h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
		<p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
		<p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
	</div>
</div>

  <div class="row mb-2">
	<div class="col-md-6">
	  <div class="card flex-md-row mb-4 box-shadow h-md-250">
		<div class="card-body d-flex flex-column align-items-start">
		  <strong class="d-inline-block mb-2 text-primary">World</strong>
		  <h3 class="mb-0">
			<a class="text-dark" href="#">Featured post</a>
		  </h3>
		  <div class="mb-1 text-muted">Nov 12</div>
		  <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
		  <a href="#">Continue reading</a>
		</div>
		<img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
	  </div>
	</div>
	<div class="col-md-6">
	  <div class="card flex-md-row mb-4 box-shadow h-md-250">
		<div class="card-body d-flex flex-column align-items-start">
		  <strong class="d-inline-block mb-2 text-success">Design</strong>
		  <h3 class="mb-0">
			<a class="text-dark" href="#">Post title</a>
		  </h3>
		  <div class="mb-1 text-muted">Nov 11</div>
		  <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
		  <a href="#">Continue reading</a>
		</div>
		<img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
	  </div>
	</div>
  </div> --}}
<div class="row">
  <div class="col-md-8 blog-main">

	@foreach ($posts as $post)
	<div class="blog-post">
		<h2 class="blog-post-title">{{$post->title}}</h2>
		<p class="blog-post-meta">{{$post->date}}</p>
		<p>
			{{$post->content}}
		</p>
		<div>
			<a href="{{route('guest.posts.show', ['slug' => $post->slug])}}">Leggi di più</a>
		</div>
	</div><!-- /.blog-post -->
	@endforeach


  </div><!-- /.blog-main -->

  <aside class="col-md-4 blog-sidebar">
	<div class="p-3 mb-3 bg-light rounded">
	  <h4 class="font-italic">About</h4>
	  <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
	</div>

	<div class="p-3">
	  <h4 class="font-italic">Archives</h4>
	  <ol class="list-unstyled mb-0">
		<li><a href="#">March 2014</a></li>
		<li><a href="#">February 2014</a></li>
		<li><a href="#">January 2014</a></li>
		<li><a href="#">December 2013</a></li>
	</div>
  </aside><!-- /.blog-sidebar -->

</div><!-- /.row -->

@endsection