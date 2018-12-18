@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Attribute Pembayaran</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Attribute</th>
                            <th>Jumlah</th>
                            <th>Periode</th>
                            <th>Waktu bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($attrPembayaran)>0)
                        @foreach($attrPembayaran as $attrPembayaran)
                        <tr>
                            <td>
                                {{$attrPembayaran->id_pembayaran}}        
                            </td>
                            <td>
                                {{$attrPembayaran->namaAttr}}        
                            </td>
                            <td>
                                {{$attrPembayaran->jumlah}}        
                            </td>
                            <td>
                                @if(isset($attrPembayaran->period->namaPeriod))
                                {{$attrPembayaran->period->namaPeriod}}
                                @else  
                                {{$attrPembayaran->id_period}}
                                @endif      
                            </td>
                            <td>
                                <span style="background-color:aquamarine;">{{$attrPembayaran->startDate}}</span>
                            <span> sampai </span>
                                <span style="background-color:aquamarine;">{{$attrPembayaran->endDate}}</span>        
                            </td>
                            <td>
                            <a class="btn btn-default" href="/attrPembayaran/{{$attrPembayaran->id_pembayaran}}/edit">Edit</a>        
                            </td>
                            <td>
                            {{ Form::open(['action' => ['AttrPembayaranController@destroy', $attrPembayaran->id_pembayaran], 'method' => 'POST', 'class'=>'']) }} 
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
                </div>
                <div class="row mt-3">
                <div class="col-md-6 justify-content-center mb-3">
                    <div class="col-xs-12">
                        <div class="card">
                            <div id="SVN" class="card-header">Tambah Tipe Periode Pembayaran</div>
            
                            <!-- <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                You are logged in!
                            </div> -->
                            <div class="card-body">
                                    {{ Form::open(['action' => 'PeriodController@store', 'method' => 'POST']) }}
                                    <!-- text input field -->
                                    <div class="form-group">
                                    {{ Form::label('namaPeriod','Nama Periode Pembayaran',array('id'=>'','class'=>'')) }}
                                    {{ Form::text('namaPeriod',' ',array('id'=>'','class'=>'form-control')) }}
                                    </div>
                                    {{Form::submit('Submit',array('class'=>'btn float-right btn-primary'))}}
                                    {{ Form::close() }}
                            </div>          
                        </div>
                    </div>
                </div>
                <div class="col-md-6 justify-content-center mb-3">
                    <div class="col-xs-12">
                        <div class="card">
                            <div id="SVN" class="card-header"> </div>
            
                            <!-- <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                You are logged in!
                            </div> -->
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Periode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($period)>0)
                                        @foreach($period as $period)
                                        <tr>
                                            <td>
                                                {{$period->id_period}}        
                                            </td>
                                            <td>
                                                {{$period->namaPeriod}}        
                                            </td> 
                                            <td>
                                                {{ Form::open(['action' => 'PeriodController@delete', 'method' => 'POST']) }}
                                                {{ Form::hidden('id', $period->id_period)}} 
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
            
            </div>
        </div>
    </div>
</div>
@endsection