<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Qms;
use App\Models\User;

class QmsController extends Controller
{
    public function __construct(
        protected Qms $qms
    ){}
    public function index(Request $request)
    {
        $read = $request->get('read');
        $getContent = $this->qms->find($read);
        
        if ($getContent && !$this->user()->alreadyRead($getContent->id)) {
            auth()->user()->qms()->attach($getContent->id);
        }
        
        return view('qms.index', [
            'judul' => $this->getAllTitle(),
            'file' => optional($getContent)->file,
            'id' => optional($getContent)->id
        ]);

       
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
    public function champ(Request $request)
    {
        $read = $request->get('read');
        $getContent = $this->qms->find($read);
        
        if ($getContent && !$this->user()->alreadyRead($getContent->id)) {
            auth()->user()->qms()->attach($getContent->id);
        }
        
        return view('qms.champ', [
            'judul' => $this->getAllTitle(),
            'file' => optional($getContent)->file,
            'id' => optional($getContent)->id
        ]);
    }
    private function getAllTitle()
    {
        return $this->qms->newQuery()->get(['id', 'judul']);
    }

    private function user()
    {
        return auth()->user();
    }
    public function mikro(Request $request)
    {
        $read = $request->get('read');
        $getContent = $this->qms->find($read);
        
        if ($getContent && !$this->user()->alreadyRead($getContent->id)) {
            auth()->user()->qms()->attach($getContent->id);
        }
        
        return view('qms.mikro', [
            'judul' => $this->getAllTitle(),
            'file' => optional($getContent)->file,
            'id' => optional($getContent)->id
        ]);

       
    }
}
