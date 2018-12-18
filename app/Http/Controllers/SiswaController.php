<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use App\jurusan;
use App\skema;


class SiswaController extends Controller
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
       
        $siswa = siswa::with(['jurusan.sekolah','skema.attrPembayaran'])->sortable()->paginate(100);
        $links = $siswa->links();
        return view('siswa.siswa')->with('siswa', $siswa)->with('links', $links);     
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
            'namaSiswa' => 'required', 
            'nis' => 'required',
            'id_jurusan' => 'required',
            'id_skema' => 'required',
            'angkatan' => 'required'
        ]);

        $siswa = new siswa;
        $siswa->namaSiswa = $request->input('namaSiswa');
        $siswa->nis = $request->input('nis');
        $siswa->id_jurusan = $request->input('id_jurusan');
        $siswa->id_skema = $request->input('id_skema');
        $siswa->angkatan = $request->input('angkatan');
        $siswa->save();

        foreach($siswa->skema->attrPembayaran as $value) {
            $siswa->attrPembayaran()->attach($value);
        } 

        return redirect('/siswa')->with('message', 'siswa telah dibuat');
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
        $jurusan = jurusan::pluck('namaJurusan','id_jurusan');
        $skema = skema::pluck('namaSkema','id_skema');
        $siswa = siswa::find($id);

        return view('siswa.edit')->with('siswa', $siswa)->with('jurusan', $jurusan)->with('skema', $skema);
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
            'namaSiswa' => 'required',
            'nis' => 'required',
            'id_jurusan' => 'required',
            'id_skema' => 'required',
            'angkatan' => 'required'
        ]);

        $siswa = siswa::find($id);
        $siswa->namaSiswa = $request->input('namaSiswa');
        $siswa->nis = $request->input('nis');
        $siswa->id_jurusan = $request->input('id_jurusan');
        $siswa->id_skema = $request->input('id_skema');
        $siswa->angkatan = $request->input('angkatan');
        $siswa->save();

        $siswa->attrPembayaran()->sync($siswa->skema->attrPembayaran);

        return redirect('/siswa')->with('message', 'siswa telah di update');
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
        $siswa = siswa::find($id);
        $siswa->delete();
        $siswa->attrPembayaran()->detach();
        return redirect('/siswa')->with('message', 'siswa sudah di delete');
    }
}
