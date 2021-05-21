<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Book;
use Illuminate\Http\Request;

use DB;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::orderBy('id', 'desc')->paginate(10);
    
        return view ('books.index',[
            'book' => $book
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
       
        $date_start = $request->input('date_start');
        $hours_start = $request->input('hours_start');
        $minutes_start = $request->input('minutes_start');
        $date_end = $request->input('date_end');
        $hours_end = $request->input('hours_end');
        $minutes_end = $request->input('minutes_end');
        
        #konvert ke unix
        $start = strtotime((string) $date_start." ".$hours_start.":".$minutes_start);
        $end = strtotime((string) $date_end." ".$hours_end.":".$minutes_end);
        
        $data['start']=$start;
        $data['end']=$end;
        // dd($data);
        Book::create($data);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit',[
            'item' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
