@extends('layouts.app')
@section('title', 'Главная')

@section('content')
	@foreach($books as $book)
		<div class="row border p-2 mb-3">
			<div class="col-md-10">
				<h5 class="title">{{ $book->name }}</h5>
				<p class="text">{{ $book->author->name }}</p>
			</div>
			<div class="col-md-2">
				<a href="{{ route('show', $book->id) }}" class="btn btn-primary mb-2" style="width: 100%">Посмотреть книгу</a>
				@can('admin')
					<a href="{{ route('edit-book', $book->id) }}" class="btn btn-primary mb-2" style="width: 100%">Редактировать</a>
					<a href="{{ route('delete-book', $book->id) }}" class="btn btn-danger" style="width: 100%">Удалить</a>
				@endcan
			</div>
		</div>
	@endforeach
	@can('admin')
		<a href="{{ route('create-book') }}" class="btn btn-primary mb-2">Создать книгу</a>
	@endcan
@endsection
