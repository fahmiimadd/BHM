@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div id="" class="container">
    <div class="row">
        <div class="sideNav card col-md-3 mr-3">
            <div class="row">
                <div class="col-md-12 pt-2 listNav ">
                    <a href="/sekolah">
                        <h5>Sekolah</h5>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pt-2 listNav ">
                    <a href="/jurusan">
                        <h5>Jurusan</h5>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pt-2 listNav ">
                    <a href="/attrPembayaran">
                        <h5>Item Pembayaran</h5>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pt-2 listNav ">
                    <a href="skema">
                        <h5>Skema</h5>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pt-2 listNav ">
                    <a href="siswa">
                        <h5>Siswa</h5>
                    </a>
                </div>

            </div>
        </div>

        <div class="col-md-8 card">
            <ul class="nav nav-tabs mt-3">
                <li class="active">
                    <a class="nav-link" href="#1a" data-toggle="tab">Buat Sekolah</a>
                </li>
                <li>
                    <a class="nav-link" href="#2a" data-toggle="tab">Buat Jurusan</a>
                </li>
                <li>
                    <a class="nav-link" href="#3a" data-toggle="tab">Buat Item Pembayaran</a>
                </li>
                <li>
                    <a class="nav-link" href="#4a" data-toggle="tab">Buat Skema</a>
                </li>
                <li>
                    <a class="nav-link" href="#5a" data-toggle="tab">Input Siswa</a>
                </li>
            </ul>

            <div class="tab-content clearfix mt-3">

                <div id="1a" class="col-md-12 justify-content-center mb-3 tab-pane active">
                    <div class="col-xs-12">
                        <div class="card">
                            <div id="SVN" class="card-header">Buat Sekolah Baru</div>

                            <!-- <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            You are logged in!
                        </div> -->
                            <div class="card-body">
                                {{ Form::open(['action' => 'SekolahController@store', 'method' => 'POST']) }}
                                <!-- text input field -->
                                <div class="form-group">
                                    {{ Form::label('namaSekolah','Nama Sekolah',array('id'=>'','class'=>'')) }}
                                    {{ Form::text('namaSekolah',' ',array('id'=>'','class'=>'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('alamat','Alamat',array('id'=>'','class'=>'')) }}
                                    {{ Form::text('alamat',' ',array('id'=>'','class'=>'form-control')) }}
                                </div>
                                {{Form::submit('Submit',array('class'=>'btn float-right btn-primary'))}}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div id="2a" class="col-md-12 justify-content-center mb-3 tab-pane">
                    <div class="col-xs-12">
                        <div class="card">
                            <div id="SVN" class="card-header">Buat Jurusan Baru</div>

                            <!-- <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                You are logged in!
                            </div> -->
                            <div class="card-body">
                                {{ Form::open(['action' => 'JurusanController@store', 'method' => 'POST']) }}
                                <!-- text input field -->
                                <div class="form-group">
                                    {{ Form::label('namaJurusan','Nama Jurusan',array('id'=>'','class'=>'')) }}
                                    {{ Form::text('namaJurusan',' ',array('id'=>'','class'=>'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('sekolah','Sekolah',array('id'=>'','class'=>'')) }}
                                    {{ Form::select('id_sekolah', $sekolah, NULL,array('class'=>'form-control')) }}
                                </div>
                                {{Form::submit('Submit',array('class'=>'btn float-right btn-primary'))}}
                                {{Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div id="3a" class="col-md-12 justify-content-center mb-3 tab-pane">
                    <div class="col-xs-12">
                        <div class="card">
                            <div id="SVN" class="card-header">Buat Item Pembayaran</div>

                            <!-- <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                You are logged in!
                            </div> -->
                            <div class="card-body">
                                {{ Form::open(['action' => 'AttrPembayaranController@store', 'method' => 'POST']) }}
                                <!-- text input field -->
                                <div class="form-group">
                                    {{ Form::label('namaAttr','Nama Item',array('id'=>'','class'=>'')) }}
                                    {{ Form::text('namaAttr',' ',array('id'=>'','class'=>'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('jumlah','Jumlah (Rp)',array('id'=>'','class'=>'')) }}
                                    {{ Form::number('jumlah',' ',array('id'=>'','class'=>'form-control','min' => 0)) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('periode','Periode',array('id'=>'','class'=>'')) }}
                                    {{ Form::select('id_period', $period, NULL,array('class'=>'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('waktuBayar','Waktu Bayar',array('id'=>'','class'=>'')) }}
                                    {{ Form::date('startDate', '',array('id'=>'','class'=>'form-control')) }}
                                    {{ Form::date('endDate', '',array('id'=>'','class'=>'form-control')) }}
                                </div>

                                {{Form::submit('Submit',array('class'=>'btn float-right btn-primary'))}}
                                {{Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div id="4a" class="col-md-12 justify-content-center mb-3 tab-pane">
                    <div class="col-xs-12">
                        <div class="card">
                            <div id="SVN" class="card-header">Buat Skema Pembayaran</div>

                            <!-- <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                You are logged in!
                            </div> -->
                            <div class="card-body">
                                {{ Form::open(['action' => 'SkemaController@store', 'method' => 'POST']) }}
                                <!-- text input field -->
                                <div class="form-group">
                                    {{ Form::label('namaSkema','Nama Skema Pembayaran',array('id'=>'','class'=>'')) }}
                                    {{ Form::text('namaSkema',' ',array('id'=>'','class'=>'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('pilihanAttr','Pilih Atribut
                                    Pembayaran',array('id'=>'','class'=>'')) }}
                                    {{ Form::select('pilihanAttr[]', $attrPembayaran, NULL, ['id' => '', 'multiple' =>
                                    'multiple', 'class'=>'form-control' ]) }}
                                </div>
                                <p style="font-size:10px; color: grey;">Press CTRL for multiple select</p>
                                {{Form::submit('Submit',array('class'=>'btn float-right btn-primary'))}}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div id="5a" class="col-md-12 justify-content-center mb-3 tab-pane">
                    <div class="col-xs-12">
                        <div class="card">
                            <div id="SVN" class="card-header">Input Siswa</div>

                            <!-- <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                You are logged in!
                            </div> -->
                            <div class="card-body">
                                {{ Form::open(['action' => 'SiswaController@store', 'method' => 'POST']) }}
                                <!-- text input field -->
                                <div class="form-group">
                                    {{ Form::label('namaSiswa','Nama Siswa',array('id'=>'','class'=>'')) }}
                                    {{ Form::text('namaSiswa',' ',array('id'=>'','class'=>'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('nis','NIS',array('id'=>'','class'=>'')) }}
                                    {{ Form::number('nis',' ',array('id'=>'','class'=>'form-control','min' => 0))
                                    }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('angkatan','Angkatan',array('id'=>'','class'=>'')) }}
                                    {{ Form::number('angkatan',' ',array('id'=>'','class'=>'form-control','min' => 0))
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
                                {{Form::submit('Submit',array('class'=>'btn float-right btn-primary'))}}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
