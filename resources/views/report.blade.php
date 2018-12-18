@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>
                <div id="stock-div" class="mb-5"></div>
                {!! \Lava::render('LineChart', 'this_is_the_label', 'stock-div') !!}
                
                {{ Form::open(['action' => 'ReportController@getReport', 'method' => 'POST']) }}
                <div class="row justify-content-center form-group">
                    <div class="col-md-2">
                        {{ Form::date('startDate', '',array('id'=>'','class'=>'form-control')) }}
                    </div>
                    <div class="col-md-2">
                        {{ Form::date('endDate', '',array('id'=>'','class'=>'form-control')) }}
                    </div>
                    <div class="col-md-2">
                        {{ Form::submit('Tampilkan Laporan',array('class'=>'btn float-right btn-primary'))}}
                    </div>
                </div>
                {{Form::close() }}


                @if(empty($startDate) && empty($endDate))
                </div>
                @else
                </div>
                <div class="card mt-3 row">
                    <table class="col-md-4 table">
                    <tr>
                        <th>Interval</th>
                        <th>:{{Carbon\Carbon::parse($startDate)->format('d M Y')}}<span> sampai </span> {{Carbon\Carbon::parse($endDate)->format('d M Y')}}</th>
                    </tr>
                    <tr>
                        <th>Laporan dibuat</th>
                        <th>:{{Carbon\Carbon::now()->format('d M Y')}}</th>
                        </tr>   
                    <tr>
                        <th>Jumlah uang masuk</th>
                        <th style="color:red;">:{{rupiah(mountRange($startDate,$endDate))}}</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th> <a href="{{action('ReportController@export', ['start' => $startDate, 'end' => $endDate])}}" class="btn btn-primary" role="button">DOWNLOAD EXCEL LAPORAN</a></th>
                    </tr>     
                    </table>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Item Pembayaran</th>
                            <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(dataReport($startDate,$endDate) as $value)
                        <tr>
                                <td>
                                    {{$value->nis}}
                                </td>
                                <td>
                                    {{$value->namaSiswa}}
                                </td>
                                <td>
                                    {{$value->namaAttr}}
                                </td>
                                <td>
                                    {{$value->updated_at}} 
                                </td>
                            </tr>   
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endif   
        </div>
    </div>
</div>

@endsection