<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Schedule;

class DashboardController extends Controller
{
    
    public function index()
    {
        // return view ('dashboard');
        $book = Book::count();
        $borrowcount = Borrow::count();
        $schedule = Schedule::count();

        $borrow = Borrow::orderBy('id', 'desc')->paginate(5);
        
        return view ('dashboard',[
            'borrow' => $borrow,
            'book' => $book,
            'borrowcount' => $borrowcount,
            'schedule' => $schedule
    ]);
        
    }

    
}
