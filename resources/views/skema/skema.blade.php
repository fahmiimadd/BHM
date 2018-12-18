@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">SKEMA PEMBAYARAN</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Skema</th>
                            <th>Attribute</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($skema)>0)
                        @foreach($skema as $skema)
                        <tr>
                            <td>
                                {{$skema->id_skema}}        
                            </td>
                            <td>
                                {{$skema->namaSkema}}        
                            </td>
                            <td>
                                <ul style="padding: 0; list-style:none;">
                                @foreach($skema->attrPembayaran as $value)
                                <li>{{$value->namaAttr}}</li>
                                @endforeach
                                </ul>        
                            </td>                            
                            <td>
                            <a class="btn btn-default" href="/skema/{{$skema->id_skema}}/edit">Edit</a>        
                            </td>
                            <td>
                            {{ Form::open(['action' => ['SkemaController@destroy', $skema->id_skema], 'method' => 'POST', 'class'=>'']) }} 
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
            </div>
        </div>
    </div>
</div>
@endsection