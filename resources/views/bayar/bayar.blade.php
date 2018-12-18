@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-6 justify-content-center mb-3">
                    <div class="col-xs-12">
                        <div class="card">
                            <div id="SVN" class="card-header">Input Bayar</div>
            
                            <!-- <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                You are logged in!
                            </div> -->
                            <div class="card-body">
                                    {{ Form::open(['action' => 'BayarController@step1', 'method' => 'POST']) }}
                                    <!-- text input field -->
                                    <div class="form-group">
                                    {{ Form::label('nis','Nomor Induk Siswa',array('id'=>'','class'=>'')) }}
                                    {{ Form::text('nis',' ',array('id'=>'','class'=>'form-control')) }}
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
@endsection