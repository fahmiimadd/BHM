@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">

    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card">
                <div id="SVN" class="card-header">Edit siswa</div>

                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> -->
                <div class="card-body">
                    {{ Form::open(['action' => ['SiswaController@update', $siswa->id_siswa], 'method' => 'PUT']) }}
                    <!-- text input field -->
                    <div class="form-group">
                        {{ Form::label('namaSiswa','Nama Siswa',array('id'=>'','class'=>'')) }}
                        {{ Form::text('namaSiswa',$siswa->namaSiswa,array('id'=>'','class'=>'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('nis','NIS',array('id'=>'','class'=>'')) }}
                        {{ Form::number('nis',$siswa->nis,array('id'=>'','class'=>'form-control','min' => 0)) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('angkatan','Angkatan',array('id'=>'','class'=>'')) }}
                        {{ Form::number('angkatan',$siswa->angkatan,array('id'=>'','class'=>'form-control','min' => 0))
                        }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('id_jurusan','Jurusan',array('id'=>'','class'=>'')) }}
                        {{ Form::select('id_jurusan', $jurusan, NULL,array('class'=>'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('id_skema','Skema Pembayaran',array('id'=>'','class'=>'')) }}
                        {{ Form::select('id_skema', $skema, NULL,array('class'=>'form-control')) }}
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
