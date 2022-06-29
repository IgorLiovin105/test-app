@extends('layouts.app')
@section('title', $author->name)

@section('content')
	<h1>{{ $author->name }}</h1>
	@forelse($author->books as $book)
		<a href="{{ route('show', $book->id) }}" style="font-size: 20px; color: #1a202c; font-weight: 500; text-decoration:none;">{{ $book->name }}</a> <br>
	@empty
		<p class="col-md-10">У этого автора ещё нет книг</p>
	@endforelse
	<a href="{{ route('create-book', $author->name) }}" class="btn btn-primary mb-2">Создать книгу для этого автора</a>
@endsection
