<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
	public function index()
	{
		$books = Book::all();
		return view('index', compact('books'));
	}

	public function show($id)
	{
		$book = Book::find($id);
		$comments = Comment::all();
		return view('show', compact('book', 'comments'));
	}

	public function createComment(Request $request, $id)
	{
		if (!$request->input('text'))
			return back();

		$user = auth()->user();

		Comment::create([
			'user_id' => $user->id,
			'book_id' => $id,
			'text' => $request->input('text')
		]);
		return back();
	}

	public function deleteComment($id)
	{
		Comment::find($id)->delete();
		return back();
	}
}
