@extends('layouts.app')

@section('content')
@include('inc.sidebar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-danger">
                <h1> <strong>Perhatian!</strong> </h1> 
                <br>
                <br>
                <h3>Menghapus Sekolah</h3> 
                <p>akan menghapus juga jurusan dan siswa didalamnya.</p>
                <h3>Menghapus jurusan</h3> 
                <p>akan menghapus juga siswa didalamnya.</p>
                <h3>Menghapus Periode Pembayaran</h3> 
                <p>akan menghapus item pembayaran didalamnya. dan melepaskan item pembayaran tersebut dari seluruh siswa yang bersangkutan.</p>
                <h3>Menghapus Item Pembayaran</h3> 
                <p>akan melepaskan item pembayaran tersebut dari seluruh siswa yang bersangkutan.</p>
                <h3>Menghapus skema Pembayaran</h3> 
                <p>akan menghapus siswa yang menggunakan skema tersebut.</p>
                <br>
                <br>
                <h3><strong>Silahkan edit data bersangkutan sebelum melakukan delete</strong></h3>


                {{ Form::open(['action' => [$content, $id], 'method' => 'POST', 'class'=>'']) }} 
                {{ Form::hidden('_method', 'DELETE')}}
                {{ Form::submit('Delete',array('class'=>'btn btn-default mt-3'))}}
                <a class="btn btn-default mt-3" href="/sekolah">Cancel</a>
                {{ Form::close() }} 
              </div>
        </div>
        </div>
    </div>
</div>

@endsection

