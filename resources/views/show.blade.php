@extends('layouts.app')
@section('title', $book->name)

@section('content')
	<h1>{{ $book->name }}</h1>
@endsection
