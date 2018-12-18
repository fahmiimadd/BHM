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
                        {{ Form::open(['action' => ['AttrPembayaranController@update', $attrPembayaran->id_pembayaran], 'method' => 'PUT']) }}
                    <!-- text input field -->
                    <div class="form-group">                            
                    {{ Form::label('namaAttr','Nama Atribute',array('id'=>'','class'=>'')) }}
                    {{ Form::text('namaAttr',$attrPembayaran->namaAttr,array('id'=>'','class'=>'form-control')) }}
                    </div>
                    <div class="form-group">
                    {{ Form::label('jumlah','Jumlah (Rp)',array('id'=>'','class'=>'')) }}
                    {{ Form::number('jumlah',$attrPembayaran->jumlah,array('id'=>'','class'=>'form-control','min' => 0)) }}
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
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Submit',array('class'=>'btn float-right btn-primary'))}}
                    {{Form::close() }}
            </div>           
            </div>
        </div>
    </div>
</div>

@endsection
