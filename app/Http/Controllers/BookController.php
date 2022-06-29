<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
	public function deleteBook($id)
	{
		Book::find($id)->delete();
		return redirect('/');
	}

	public function editBook(Request $request, $id) {
		if(!$request->input('name'))
			return back();

		Book::find($id)->update([
			'name' => $request->input('name')
		]);
		return redirect('/');
	}

	public function createBook(Request $request)
	{
		if(!$request->input('name') || !$request->input('author'))
			return back();

		$author = Author::firstOrCreate(['name' => $request->input('author')]);
		Book::create([
			'name' => $request->input('name'),
			'author_id' => $author->id
		]);
		return redirect('/');
	}

	public function authors()
	{
		$authors = Author::withCount('books')->get();
		return view('authors', compact('authors'));
	}

	public function showAuthor($id)
	{
		$author = Author::find($id);
		return view('show-author', compact('author'));
	}
}
