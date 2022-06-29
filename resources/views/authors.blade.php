@extends('layouts.app')
@section('title', 'Авторы')

@section('content')
	@foreach($authors as $author)
		<div class="row border p-2 mb-3">
			<div class="col-md-10">
				<h5 class="title">Имя автора: {{ $author->name }}</h5>
				<p class="text">Количество написанных книг: {{ $author->books_count }}</p>
			</div>
			<div class="col-md-2">
				@can('admin')
					<a href="{{ route('author', $author->id) }}" class="btn btn-primary mb-2" style="width: 100%">Посмотреть информацию об авторе</a>
				@endcan
			</div>
		</div>
	@endforeach
@endsection
