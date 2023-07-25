<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Qms;
use App\Models\User;
use App\Models\Qmsdetails;

class QmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qms = Qms::all();
        $data = DB::table('qms')
        ->join('qmsdetails','qms.id','=','qmsdetails.qms_id')
        ->get();
// dd($data);
        $userlogin = Auth::user()->id;
        $dibaca = DB::table('users')
                ->join('qmsdetails','users.id','=','qmsdetails.user_id')
                ->join('qms','qmsdetails.qms_id','=','qms.id')
                ->where('qmsdetails.user_id','=', $userlogin)
                ->orderBy('qms.id', 'asc')
                ->get();
                // dd($dibaca);

        return view('qms.index', compact('qms','data','dibaca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $qms = Qms::findOrFail($id);
        $sop = Qms::all();
       
        $isRead = 1;

        #insert ke status read ke tabel qms details
        $user = Auth::user()->id; 
        $qmsdetail = new Qmsdetails;
        $qmsdetail -> user_id = $user;
        $qmsdetail -> qms_id = $id;
        $qmsdetail -> isRead = $isRead;
        $qmsdetail->save();
 
        return view('qms.show', compact('qms','sop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
    public function champ()
    {
        $qms = Qms::all();
        
        return view('qms.champ', compact('qms'));
    }
}
