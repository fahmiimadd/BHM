@extends('layouts.app2')

@section('content')
@include('inc.sidebar')
        <div class="container">

            <div class="row justify-content-center" style="margin-top: 0px;">
                    <div class="">
                        <div id="SVN" class="">                       
                            <h3 class="" style="font-size:13px; text-align:center;border-top:8px double grey;border-bottom:8px double grey">KWITANSI PEMBAYARAN</h3>    
                            <table class="table border-bottom">
                                    <tbody style="line-height:0px; font-size:8px;">
                                            <tr>
                                                <td><strong>{{$bayar->siswa->jurusan->sekolah->namaSekolah}}</strong></td>
                                                <td>{{$bayar->siswa->jurusan->namaJurusan}}</td>
                                            </tr>
                                        <tr> <td style="padding: 8px 0px 3px 0px;">Tanggal Bayar </td><td style="padding: 8px 0px 3px 0px;">: {{$waktu}}</td> </tr>
                                            <tr> <td style="padding: 8px 0px 3px 0px;">Nomor Invoice</td ><td style="padding: 8px 0px 3px 0px;">: {{$bayar->id_bayar}}</td> </tr>
                                            <tr> <td style="padding: 8px 0px 3px 0px;">Nama Siswa</td><td     style="padding: 8px 0px 3px 0px;">: {{$bayar->siswa->namaSiswa}}</td> </tr>
                                            <tr> <td style="padding: 8px 0px 3px 0px;">Nama Admin</td><td     style="padding: 8px 0px 3px 0px;">: {{  Auth::user()->name }} </td> </tr>
                                    </tbody>
                            </table>
                            <div class="row">
                                    <table class="table border-bottom" style="line-height:1px; font-size:8px;">
                                            <thead>
                                              <tr>
                                                <th></th>
                                                <th style="padding: 8px 0px 3px 0px;">No.</th>
                                                <th style="padding: 8px 0px 3px 0px;">Item</th>
                                                <th style="padding: 8px 0px 3px 0px;">Jumlah</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($bayar->attrPembayaran as $value)
                                                    <tr>
                                                        <td style="padding: 8px 0px 3px 0px;"></td>
                                                        <td style="padding: 8px 0px 3px 0px;">{{$i++}}</td>
                                                        <td style="padding: 8px 0px 3px 0px;">{{$value->namaAttr}}</td>
                                                        <td style="padding: 8px 0px 3px 0px;">{{rupiah($value->jumlah)}}</td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td style="padding: 14px 0px 3px 0px;"></td>
                                                        <td style="padding: 14px 0px 3px 0px;"><strong>TOTAL</strong></td>
                                                        <td style="padding: 14px 0px 3px 0px;"><strong>{{rupiah($total)}}</strong></td>
                                                        <td style="padding: 14px 0px 3px 0px;"></td>
                                                    </tr>   
                                            </tbody>
                                    </table>
                            </div>                          
                        </div>
                    </div>
            </div>

        </div>
   
@endsection
