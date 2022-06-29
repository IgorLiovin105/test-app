@extends('layouts.app')
@section('title', $book->name)

@section('content')
	<div class="mb-3">
		<h1>Название книги: {{ $book->name }}</h1>
		<h3>Имя автора: {{ $book->author->name }}</h3>
	</div>
	<hr>
	<form action="{{ route('create-comment', $book->id) }}" method="get">
		<div class="mb-3">
			<label for="text" class="form-label">Напишите комментарий</label>
			<textarea class="form-control" id="text" name="text"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Оставить комментарий</button>
	</form>
	@forelse($comments as $comment)
		<div class="row border p-2 mt-3">
			<div class="col-md-10">
				<h5 class="title">{{ $comment->user->name }}</h5>
				<p class="text">{{ $comment->text }}</p>
			</div>
			<div class="col-md-2">
				@can('delete_comment', $comment)
					<a href="{{ route('delete-comment', $comment->id) }}" class="btn btn-danger">Удалить комментарий</a>
				@endcan
			</div>
		</div>
	@empty
		<p>Тут пока нет комментариев</p>
	@endforelse
@endsection
