<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\period;
use App\attrPembayaran;


class periodController extends Controller
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
        $attrPembayaran = attrPembayaran::with('period')->get();
        $period = period::all();
        return view('attrPembayaran.attrPembayaran')->with('attrPembayaran', $attrPembayaran)->with('period', $period);     
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
            'namaPeriod' => 'required',
        ]);

        $period = new period;
        $period->namaperiod = $request->input('namaPeriod');
        $period->save();

        return redirect('/attrPembayaran')->with('message', 'Period telah dibuat');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 

    public function delete(Request $request){

        $content = 'PeriodController@destroy';
        $this->validate($request,[
            'id' => 'required',
        ]);
        return view('layouts.deleteConfirm')->with('id', $request->input('id'))->with('content',$content);;
    }



    public function destroy($id)
    {
        // 
        $period = period::find($id);
        $attrPembayaran = attrPembayaran::where('id_period',$id);
        $id_attrPembayaran = $attrPembayaran->pluck('id_pembayaran');
        foreach ($id_attrPembayaran as $value) {
            $attrPembayaran = attrPembayaran::find($value);
            $attrPembayaran->bayar()->detach();
            $attrPembayaran->skema()->detach();
            $attrPembayaran->siswa()->detach(); 
        }
      

        $attrPembayaran->delete();
        $period->delete(); 
      
       return redirect('/period')->with('message', 'period sudah di delete');
    
    }
}
