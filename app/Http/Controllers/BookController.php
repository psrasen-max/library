<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookController extends Controller
{
    public function index()
    {
        return Book::with(['author','category'])->get();
    }

    public function store(Request $request)
    {
        
    }

    public function show(Book $book)
    {

    }

    public function update(Book $book)
    {

    }

    public function destroy(Book $book)
    {

    }

}
