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
    public function index(Request $request)
    {

        if($request->ajax()){           
            //Jika request from_date ada value(datanya) maka
            if(!empty($request->from_date))
            { 
                //Jika tanggal awal(from_date) hingga tanggal akhir(to_date) adalah sama maka
                if($request->from_date === $request->to_date){
                    //kita filter tanggalnya sesuai dengan request from_date
                    $book = Book::whereDate('date_start','=', $request->from_date)->get();
                }
                else{
                    //kita filter dari tanggal awal ke akhir
                    $book = Book::whereBetween('date_start', array($request->from_date, $request->to_date))->get();
                }                
            }
            //load data default
            else
            {
                $book = Book::all();
            }
            return datatables()->of($book)
                        ->addColumn('action', function($data){
                            $button = '<a href=" ./books/'.$data->id.'/edit" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);            
        }
        return view('books.index');
 
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
// dd($data);
        // $a = $request->room;
       
        // $date_start = $request->input('date_start');
        // $hours_start = $request->input('hours_start');
        // $minutes_start = $request->input('minutes_start');
        // $date_end = $request->input('date_end');
        // $hours_end = $request->input('hours_end');
        // $minutes_end = $request->input('minutes_end');
        
        // #konvert ke unix
        // $start = strtotime((string) $date_start." ".$hours_start.":".$minutes_start);
        // $end = strtotime((string) $date_end." ".$hours_end.":".$minutes_end);
        
        // $data['start']=$start;
        // $data['end']=$end;
        
        Book::create($data);
        // $book = Book::where('room',$request->room);

        // $book = DB::table('books')
        //         ->where('room', $request->room)
        //         ->select('books.start','books.end')
        //         ->get();
                 
        //         $stugas = Book::get();   
               
        //         $mulai = $stugas->start;
                 
        // $mulai = $book->start;
       
        // cara cek jadwal apakah masih available?
        // if ($start < $book->start and $end > $book->end){
        //     Book::create($data);
        // }
        // else{
            
        // }
        

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
    public function update(Request $request, Book $book)
    {
        $data = $request->all();

        $book->update($data);

        return redirect()->route('books.index');
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
