@extends('layouts.app')
@section('title', 'Создание книги')

@section('content')
	<form action="{{ route('createBook') }}" method="post">
		@csrf
		<div class="mb-3">
			<label for="name" class="form-label">Введите название книги</label>
			<input type="text" class="form-control" id="name" name="name">
		</div>
		<div class="mb-3">
			<label for="author" class="form-label">Введите имя автора</label>
			<input type="text" class="form-control" id="author" name="author" value="{{ $author_name }}">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
