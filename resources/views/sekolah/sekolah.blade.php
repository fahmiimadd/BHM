@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">SEKOLAH</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Sekolah</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($sekolah)>0)
                        @foreach($sekolah as $sekolah)
                        <tr>
                            <td>
                                {{$sekolah->id_sekolah}}        
                            </td>
                            <td>
                                {{$sekolah->namaSekolah}}        
                            </td>
                            <td>
                                {{$sekolah->alamat}}        
                            </td>
                            <td>
                            <a class="btn btn-default" href="/sekolah/{{$sekolah->id_sekolah}}/edit">Edit</a>        
                            </td>
                            <td>
                                {{ Form::open(['action' => 'SekolahController@delete', 'method' => 'POST']) }}
                                {{ Form::hidden('id', $sekolah->id_sekolah)}} 
                                {{ Form::submit('Delete',array('class'=>''))}}                                                      
                                {{ Form::close() }}
                            </td>
                        </tr>
                        @endforeach
                        @else
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

