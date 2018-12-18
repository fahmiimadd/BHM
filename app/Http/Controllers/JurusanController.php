<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jurusan;
use App\sekolah;

class JurusanController extends Controller
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
        $jurusan = jurusan::with('sekolah')->get();
        return view('jurusan.jurusan')->with('jurusan', $jurusan);
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
            'namaJurusan' => 'required',
            'id_sekolah' => 'required'
        ]);

        $jurusan = new jurusan;
        $jurusan->namaJurusan = $request->input('namaJurusan');
        $jurusan->id_sekolah = $request->input('id_sekolah');
        $jurusan->save();

        return redirect('/jurusan')->with('message', 'Jurusan telah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function edit($id_jurusan)
    {
        //
        $sekolah = sekolah::pluck('namaSekolah','id_sekolah');
        $jurusan = jurusan::find($id_jurusan);
        return view('jurusan.edit')->with('jurusan', $jurusan)->with('sekolah', $sekolah);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jurusan)
    { 
        //
        $this->validate($request,[
            'namaJurusan' => 'required',
            'id_sekolah' => 'required'
        ]);

        $jurusan = jurusan::find($id_jurusan);
        $jurusan->namaJurusan = $request->input('namaJurusan');
        $jurusan->id_sekolah = $request->input('id_sekolah');
        $jurusan->save();

        return redirect('/jurusan')->with('message', 'Jurusan telah dibuat');
    }

     public function delete(Request $request){

        $content = 'JurusanController@destroy';
        $this->validate($request,[
            'id' => 'required',
        ]);
        return view('layouts.deleteConfirm')->with('id', $request->input('id'))->with('content',$content);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jurusan)
    {
        //
        $jurusan = jurusan::find($id_jurusan);
        $jurusan->delete();
        return redirect('/jurusan')->with('message', 'Jurusan sudah di delete');
    }
}
