@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">

    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div id="SVN" class="card-header">Edit Jurusan</div>

                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> -->
                <div class="card-body">
                        {{ Form::open(['action' => ['JurusanController@update', $jurusan->id_jurusan], 'method' => 'PUT']) }}
                        <!-- text input field -->
                        <div class="form-group">
                        {{ Form::label('namaJurusan','Nama Jurusan',array('id'=>'','class'=>'')) }}
                        {{ Form::text('namaJurusan',$jurusan->namaJurusan,array('id'=>'','class'=>'form-control')) }}
                        </div>
                        <div class="form-group">
                        {{ Form::label('id_sekolah','ID Sekolah',array('id'=>'','class'=>'')) }}
                        {{ Form::select('id_sekolah', $sekolah, NULL,array('class'=>'form-control')) }}
                        </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Edit',array('class'=>'btn float-right btn-primary'))}}
                        {{ Form::close() }}
                </div>          
            </div>
        </div>
    </div>
</div>

@endsection
