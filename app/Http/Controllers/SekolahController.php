<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sekolah;
use App\jurusan;
use App\siswa;

class SekolahController extends Controller
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
        $sekolah = sekolah::all();
        return view('sekolah.sekolah')->with('sekolah', $sekolah);     
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
            'namaSekolah' => 'required',
            'alamat' => 'required'
        ]);

        $sekolah = new sekolah;
        $sekolah->namaSekolah = $request->input('namaSekolah');
        $sekolah->alamat = $request->input('alamat');
        $sekolah->save();

        return redirect('/sekolah')->with('message', 'Sekolah telah dibuat');
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
        $sekolah = sekolah::find($id);
        return view('sekolah.edit')->with('sekolah', $sekolah);
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
            'namaSekolah' => 'required',
            'alamat' => 'required'
        ]);

        $sekolah = sekolah::find($id);
        $sekolah->namaSekolah = $request->input('namaSekolah');
        $sekolah->alamat = $request->input('alamat');
        $sekolah->save();

        return redirect('/sekolah')->with('message', 'Sekolah telah di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete(Request $request){

        $content = 'SekolahController@destroy';
        $this->validate($request,[
            'id' => 'required',
        ]);
        return view('layouts.deleteConfirm')->with('id', $request->input('id'))->with('content',$content);
    }


    public function destroy($id)
    {
        // 
        $sekolah = sekolah::find($id);
        $jurusan = jurusan::where('id_sekolah',$id);
        $id_jurusan = $jurusan->pluck('id_jurusan');   
        $siswa = siswa::whereIn('id_jurusan',$id_jurusan);
        $siswa->delete();
        $jurusan->delete();
        $sekolah->delete();

        return redirect('/sekolah')->with('message', 'Sekolah sudah di delete');

    }

}
