@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">

    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card">
                <div id="SVN" class="card-header">Edit Skema</div>

                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> -->
                <div class="card-body">
                        {{ Form::open(['action' => ['SkemaController@update', $skema->id_skema], 'method' => 'PUT']) }}
                        <!-- text input field -->
                        <div class="form-group">
                        {{ Form::label('namaSkema','Nama skema',array('id'=>'','class'=>'')) }}
                        {{ Form::text('namaSkema',$skema->namaSkema,array('id'=>'','class'=>'form-control')) }}
                        </div>
                        <div class="form-group">
                        {{ Form::label('pilihanAttr','Tambah Atribut Pembayaran',array('id'=>'','class'=>'')) }}
                        {{ Form::select('pilihanAttr[]', $attrPembayaran, NULL, ['id' => '', 'multiple' => 'multiple', 'class'=>'form-control' ]) }}
                        </div>
                        <p style="font-size:10px; color: grey;">Press CTRL for multiple select</p>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Edit',array('class'=>'btn float-right btn-primary'))}}
                        {{ Form::close() }}
                </div>          
            </div>
        </div>
    </div>
</div>

@endsection
