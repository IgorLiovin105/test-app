@extends('layouts.app')
@section('title', 'Изменение книги '. $id)

@section('content')
	<form action="{{ route('editBook', $id) }}" method="get">
		<div class="mb-3">
			<label for="name" class="form-label">Введите название книги</label>
			<input type="text" class="form-control" id="name" name="name">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection
