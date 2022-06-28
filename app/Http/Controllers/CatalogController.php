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
}
