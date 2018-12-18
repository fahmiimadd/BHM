@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div style="margin-right:5%; margin-left:5%;">
    <div class="row justify-content-center">
        <div  class="col-md-12">
            <div class="card">
                <div class="card-header">Siswa</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>@sortablelink('id_siswa')</th>
                            <th>@sortablelink('namaSiswa')</th>
                            <th>NIS</th>
                            <th>Jurusan dan Sekolah</th>
                            <th>Skema</th>
                            <th>Atribute Pembayran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($siswa)>0)
                        @foreach($siswa as $siswas)
                        <tr>
                            <td>
                                {{$siswas->id_siswa}}
                            </td>
                            <td>
                                {{$siswas->namaSiswa}}
                            </td>
                            <td>
                                {{$siswas->nis}}
                            </td>
                            <td>
                                {{$siswas->jurusan->namaJurusan}} - {{$siswas->jurusan->sekolah->namaSekolah}}
                            </td>
                            <td>
                                {{$siswas->skema->namaSkema}}
                            </td>
                            <td>
                                <ul style="padding: 0;">
                                    @foreach($siswas->skema->attrPembayaran as $value)
                                    <li style="list-style:none;">{{$value->namaAttr}}
                                        @if(DB::table('attr_pembayaran_siswa')->where('siswa_id_siswa',$siswas->id_siswa)->first()->status === 1)
                                        (yes)
                                        @else
                                        (no)
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a class="btn btn-default" href="/siswa/{{$siswas->id_siswa}}/edit">Edit</a>
                            </td>
                            <td>
                                {{ Form::open(['action' => ['SiswaController@destroy', $siswas->id_siswa], 'method' =>
                                'POST', 'class'=>'']) }}
                                {{ Form::hidden('_method', 'DELETE')}}
                                {{ Form::submit('Delete',array('class'=>''))}}
                                {{ Form::close() }}
                            </td>
                        </tr>
                        @endforeach
                        @else
                        @endif
                    </tbody>
                </table>
               
                        {{ $links }}
                   
            </div>
        </div>
    </div>
</div>
</div>
@endsection