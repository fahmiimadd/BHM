<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sekolah;
use App\attrPembayaran;
use App\period;
use App\jurusan;
use App\skema;
use Khill\Lavacharts\Lavacharts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sekolah = sekolah::pluck('namaSekolah','id_sekolah');  
        $jurusan = jurusan::pluck('namajurusan','id_jurusan');  
        $period = period::pluck('namaPeriod','id_period'); 
        $skema = skema::pluck('namaSkema','id_skema'); 
        $attrPembayaran = attrPembayaran::pluck('namaAttr','id_pembayaran');        
        return view('home')->with('sekolah', $sekolah)->with('period', $period)
                        ->with('attrPembayaran', $attrPembayaran)
                        ->with('jurusan', $jurusan)
                        ->with('skema', $skema);
    }
}
