<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mutasi;
use App\Models\Item;
use DB;

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mutasi = Mutasi::orderBy('id', 'desc')->paginate(10);

        $data = DB::table('items')
                ->join('mutasis','items.id','=','mutasis.item_id')
                // ->orderBy('id', 'desc')
                ->get();
                // dd($data);
        return view('mutasi.index', compact('data'));
        // return view ('mutasi.index',[
        //     'mutasi' => $mutasi
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mutasi = Mutasi::all();

        return view('mutasi.create', compact('mutasi'));
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
        
        Mutasi::create($data);
        #return redirect()->route('mutasi.index');
        return redirect()->back();
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
    public function destroy(Mutasi $mutasi)
    {
        $mutasi->delete();

        return redirect()->route('mutasi.index');
    }
    public function addmutasi()
    {
       
        $items = Item::all();
        return view('mutasi.addmutasi', [
            'items' => $items
        ]);
        #return view('mutasi.addmutasi', compact('mutasi'));
    }
    public function storeAddMutasi (Request $request)
    { 
        $data = $request->all();
        
        Mutasi::create($data);
        #return response()->json($data);
        return redirect()->route('mutasi.index');
    }
}
