<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\attrPembayaran;
use App\period;
use Carbon\Carbon;

class AttrPembayaranController extends Controller
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
        //
        $this->validate($request,[
            'namaAttr' => 'required',
            'jumlah' => 'required',
            'id_period' => 'required',
            'startDate' => 'required',
            'endDate' => 'required'
        ]);

        $attrPembayaran = new attrPembayaran;
        $attrPembayaran->namaAttr = $request->input('namaAttr');
        $attrPembayaran->jumlah = $request->input('jumlah');
        $attrPembayaran->id_period = $request->input('id_period');
        $attrPembayaran->startDate = Carbon::parse($request->input('startDate'))->format('Y-m-d H:i:s');
        $attrPembayaran->endDate = Carbon::parse($request->input('endDate'))->format('Y-m-d H:i:s');
        $attrPembayaran->save();
        

        return redirect('/attrPembayaran')->with('attrPembayaran', $attrPembayaran);
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
        $attrPembayaran = attrPembayaran::find($id);
        $period = period::pluck('namaPeriod','id_period');        
        return view('attrPembayaran.edit')->with('attrPembayaran', $attrPembayaran)->with('period', $period);
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
            'namaAttr' => 'required',
            'jumlah' => 'required',
            'id_period' => 'required',
            'startDate' => 'required',
            'endDate' => 'required'
        ]);

        $attrPembayaran = attrPembayaran::find($id);
        $attrPembayaran->namaAttr = $request->input('namaAttr');
        $attrPembayaran->jumlah = $request->input('jumlah');
        $attrPembayaran->id_period = $request->input('id_period');
        $attrPembayaran->startDate = Carbon::parse($request->input('startDate'))->format('Y-m-d H:i:s');
        $attrPembayaran->endDate = Carbon::parse($request->input('endDate'))->format('Y-m-d H:i:s');
        $attrPembayaran->save();

      

        return redirect('/attrPembayaran')->with('message', 'Atribute telah di update');
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
        $attrPembayaran = attrPembayaran::find($id);
        $attrPembayaran->bayar()->detach();
        $attrPembayaran->skema()->detach();
        $attrPembayaran->siswa()->detach();
        $attrPembayaran->delete();
        return redirect('/attrPembayaran')->with('message', 'Attribute sudah di delete');
    }
}
