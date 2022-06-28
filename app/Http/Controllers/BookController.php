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
		$book = Book::create([
			'name' => $request->input('name'),
			'author_id' => $author->id
		]);
		return redirect('/');
	}
}
