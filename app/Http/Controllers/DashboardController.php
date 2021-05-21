<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;

class DashboardController extends Controller
{
    
    public function index()
    {
        // return view ('dashboard');
        $borrow = Borrow::orderBy('id', 'desc')->paginate(10);
        
        return view ('dashboard',[
            'borrow' => $borrow
    ]);
        
    }

    
}
