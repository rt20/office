<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Makro;
use App\Models\User;

class MakroController extends Controller
{
    public function __construct(
        protected Makro $makro
    ){}
    public function index(Request $request)
    {
        $read = $request->get('read');
        $getContent = $this->makro->find($read);
       
        if ($getContent && !$this->user()->alreadyRead($getContent->id)) {
            auth()->user()->makro()->attach($getContent->id)->orderBy('id', 'DESC');
        }
        //  dd($getContent);
        return view('makro.index', [
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
        $makro = Makro::findOrFail($id);
        $sop = Makro::all();
       
        $isRead = 1;

        #insert ke status read ke tabel qms details
        $user = Auth::user()->id; 
        $makrodetail = new Makrodetails;
        $makrodetail -> user_id = $user;
        $makrodetail -> makro_id = $id;
        $makrodetail -> isRead = $isRead;
        
        $makrodetail->save();
 
        return view('makro.show', compact('makro','sop'));
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
        $getContent = $this->makro->find($read);
        
        if ($getContent && !$this->user()->alreadyRead($getContent->id)) {
            auth()->user()->makro()->attach($getContent->id);
        }
        
        return view('makro.champ', [
            'judul' => $this->getAllTitle(),
            'file' => optional($getContent)->file,
            'id' => optional($getContent)->id
        ]);
    }
    private function getAllTitle()
    {
        return $this->makro->newQuery()->get(['id', 'judul']);
    }

    private function user()
    {
        return auth()->user();
    }
    public function makro(Request $request)
    {
        $read = $request->get('read');
        $getContent = $this->makro->find($read);
        
        if ($getContent && !$this->user()->alreadyRead($getContent->id)) {
            auth()->user()->makro()->attach($getContent->id);
        }
        
        return view('makro.akro', [
            'judul' => $this->getAllTitle(),
            'file' => optional($getContent)->file,
            'id' => optional($getContent)->id
        ]);

       
    }
}
