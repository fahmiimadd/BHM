<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\bayar;
use App\skema;
use Auth;
use App\siswa;
use App\attrPembayaran;
use PDF;

class BayarController extends Controller
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
    public function destroy($id)
    {
        //
    }

    public function step1(Request $request)
    {
        //
        $this->validate($request,[
            'nis' => 'required'
        ]);

        if (!is_null(siswa::where('nis', $request->input('nis'))->first())) {
            $siswaNis = siswa::where('nis', $request->input('nis'))->first();
            $bayar = new bayar;
            $bayar->id_siswa = $siswaNis->id_siswa;
            $bayar->save();                   
            $bayars             = bayar::find($bayar->id_bayar);
            $siswa              = siswa::all(); 
            $attrPembayaran     = attrPembayaran::all(); 
            $skema              = skema::all(); 
    
            return view('bayar.step1')->with('bayars', $bayars)->with('siswa', $siswa)->with('skema', $skema)->with('attrPembayaran', $attrPembayaran); 
        } else {
            return redirect('/home')->with('error', 'siswa tidak ditemukan');
        }
     
       

    }

    public function step2(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'pilihanAttr' => 'required',
            'bayar' => 'required' 
        ]);

        if ($validator->fails()) {
            return redirect('/inputBayaran')
                        ->withErrors($validator)
                        ->withInput();
        }
           
        $bayar              = bayar::find($request->input('bayar'));
        $siswa              = siswa::all(); 
        $attrPembayaran     = attrPembayaran::all(); 
        $skema              = skema::all();  

        $pilihanAttr = $request->input('pilihanAttr');

        foreach ($pilihanAttr as $value) {
            $bayar->siswa->attrPembayaran()->detach($pilihanAttr);
            $bayar->siswa->attrPembayaran()->attach($pilihanAttr , ['status'=>'1','id_admin'=> Auth::user()->id]);
        }
            
        foreach($pilihanAttr as $value) {
            if( !$bayar->attrPembayaran->contains($value)){
                $bayar->attrPembayaran()->attach($value);
            } else {
                return redirect('/home')->with('error', 'Pembayaran sudah dilakukan');
            }
        }                

        return view('bayar.step2')->with('bayar', $bayar)->with('message','Pembayaran berhasil');
    }


    public function downloadPDF($id){
       

        $bayar              = bayar::find($id);
        $siswa              = $bayar->siswa;
        $waktu              = $bayar->created_at->format('d M Y') ;
        $i                  = 1;
        $total              = 0;
       // $pdf                = PDF::loadView('pdf', compact('bayar','siswa','i','total')); 
      
       // return $pdf->download('invoice.pdf');
      
       // return view('pdf')->with('bayar',$bayar)->with('i',$i)->with('total',$total);

        foreach ($bayar->attrPembayaran as $value) {
            $total = $total + $value->jumlah;
        }

       $pdf = PDF::loadView('pdf', compact('bayar','siswa','i','total','waktu')); 
       return $pdf->download('invoice.pdf');
      
      

      }

      public function inputBayaran()
      {
          //
          return view('bayar.bayar');
      }
  
    
}
