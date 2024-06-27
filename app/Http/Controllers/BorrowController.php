<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Item;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        #$items = Item::all(); 
        $data = DB::table('items')
                ->join('borrows','items.id','=','borrows.item_id')
                ->orderBy('start', 'desc')
                ->get();

        $now = Carbon::now();
  
        return view('borrows.index', compact('data','now'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $items = Item::all();

        return view('borrows.create', [
            'items' => $items
        ]);
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

        $data['bensin_start'] = $request->file('bensin_start')->store(
            'assets/bensin','public'
        );
        $data['bensin_end'] = $request->file('bensin_end')->store(
            'assets/bensin','public'
        );
        // dd($data);
        Borrow::create($data);

        return redirect()->route('borrows.index');
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
    public function edit(Borrow $borrow)
    {
        $items = Item::all();

        return view('borrows.edit',[
            'borrow' => $borrow,
            'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        $data = $request->all();

        $borrow->update($data);

        return redirect()->route('borrows.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
 
        return redirect()->route('borrows.index');
    }
    public function setStatus (Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:DIPINJAM,KEMBALI',
        ]);

        $item = Borrow::findOrFail($id);
        $item->status = $request->status;
        $item->end = Carbon::now();

        $item->save();
       
        return redirect()->route('borrows.index');
    }

}
