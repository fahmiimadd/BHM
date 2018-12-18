@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pilih Item Bayaran</div>
                <!-- <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                You are logged in!
                            </div> --> 
                            <div class="card-body">
                                    {{ Form::open(['action' => 'BayarController@step2', 'method' => 'POST']) }}
                                    <!-- text input field -->                            
                                                              
                                    
                                    <p>Nama : {{$bayars->siswa->namaSiswa}}     </p>  
                                    <p>NIS : {{$bayars->siswa->nis}}     </p>     
                                    <p>ID Bayar : {{$bayars->id_bayar}}     </p>  
                                                                 
                                    <div class="form-group">
                                        {{ Form::label('pilihanAttr','Tambah Atribut Pembayaran',array('id'=>'','class'=>'')) }}
                                        {{ Form::select('pilihanAttr[]', $bayars->siswa->attrPembayaran()->wherePivot('status', 0)->pluck('namaAttr','id_pembayaran'), NULL, ['id' => '', 'multiple' => 'multiple', 'class'=>'form-control' ]) }}
                                    </div>
                                  
                                    {{Form::hidden('bayar', $bayars->id_bayar)}}
                                    <div class="row">
                                        {{Form::submit('BAYAR',array('class'=>'col-sm-12 btn float-right btn-primary'))}}
                                    </div>                                   
                                    {{ Form::close() }}


                            </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection