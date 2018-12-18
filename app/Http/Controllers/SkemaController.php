<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\skema;
use App\attrPembayaran;


class skemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $skema = skema::all();
        return view('skema.skema')->with('skema', $skema);     
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
        $this->validate($request,[
            'namaSkema' => 'required',
            'pilihanAttr' => 'required'
        ]);

        $skema = new skema;
        $skema->namaSkema = $request->input('namaSkema');
        $skema->save();
        foreach($request->input('pilihanAttr') as $value) {
            $skema->attrPembayaran()->attach($value);
        }          

        return redirect('/skema')->with('message', 'skema telah dibuat');
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
        $skema = skema::find($id);
        $attrPembayaran = attrPembayaran::pluck('namaAttr','id_pembayaran');      
        return view('skema.edit')->with('skema', $skema)->with('attrPembayaran', $attrPembayaran);
        
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
          $this->validate($request,[
            'namaSkema' =>   'required',
            'pilihanAttr' =>   'required'
        ]);

        $skema = skema::find($id);
        $skema->namaSkema = $request->input('namaSkema');
        $skema->save();

        $skema->attrPembayaran()->sync($request->input('pilihanAttr'));


        return redirect('/skema')->with('message', 'Skema telah di update');
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
        $skema = skema::find($id);
        $skema->delete();
        $skema->attrPembayaran()->detach(); 
        return redirect('/skema')->with('message', 'skema sudah di delete');
    }
}
