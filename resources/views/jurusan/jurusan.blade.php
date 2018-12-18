@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Jurusan</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Jurusan</th>
                            <th>Sekolah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($jurusan)>0)
                        @foreach($jurusan as $jurusan)
                        <tr>
                            <td>
                                {{$jurusan->id_jurusan}}        
                            </td>
                            <td>
                                {{$jurusan->namaJurusan}}        
                            </td>
                            <td>
                                {{$jurusan->sekolah->namaSekolah}}        
                            </td>
                            <td>
                            <a class="btn btn-default" href="/jurusan/{{$jurusan->id_jurusan}}/edit">Edit</a>        
                            </td>
                            <td>
                            {{ Form::open(['action' => 'JurusanController@delete', 'method' => 'POST']) }}
                            {{ Form::hidden('id', $jurusan->id_jurusan)}} 
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