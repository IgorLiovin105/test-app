<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
		return view('show', compact('book'));
	}
}
