@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="alert alert-success">
        PEMBAYARAN BERHASIL
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> 

                        <div class="card-body row justify-content-center">
                                <a href="{{action('BayarController@downloadPDF', $bayar->id_bayar)}}" class="btn btn-primary" role="button">DOWNLOAD PDF KWITANSI</a>                  
                        </div>
                         
                         

                </div>
                <!-- <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                You are logged in!
                            </div> -->
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection