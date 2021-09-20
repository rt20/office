<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Mail;
use App\Mail\ScheduleSuccess;

class ScheduleController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
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
                    $schedule = Schedule::whereDate('date_start','=', $request->from_date)->get();
                }
                else{
                    //kita filter dari tanggal awal ke akhir
                    $schedule = Schedule::whereBetween('date_start', array($request->from_date, $request->to_date))->get();
                }                
            }
            //load data default
            else
            {
                $schedule = Schedule::all();
            }
            return datatables()->of($schedule)
                        ->addColumn('action', function($data){
                            $button = '<a href=" ./schedules/'.$data->id.'/edit" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);            
        }
    //     $schedule = Schedule::orderBy('id', 'desc')->paginate(10);

        return view ('schedules.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
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
        $data['attachment'] = $request->file('attachment')->store(
            'assets/attachment','public'
        );

        // dd($data);
        Schedule::create($data);

        //    kirim email ke user 
        Mail::to('kaploks@gmail.com')->send(
            new ScheduleSuccess($data)
        );

        # Tampilin flash message
        flash('Selamat data telah berhasil ditambahkan')->success();

        return redirect()->route('schedules.index');
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
    public function edit(Schedule $schedule)
    {
        return view('schedules.edit',[
            'schedule' => $schedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $data = $request->all();

        $schedule->update($data);
        flash('Selamat data telah berhasil diupdate')->success();

        return redirect()->route('schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        flash('Data telah berhasil dihapus')->error();

        return redirect()->route('schedules.index');
    }
}
