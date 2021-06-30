<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
       
        // $book = Book::orderBy('id', 'desc')->paginate(10);
        $book = Book::whereDate ('date_start',date('Y-m-d'))->paginate(10);
        // dd($book);
        return view ('home.index',[
            'book' => $book
    ]);
    }
}
