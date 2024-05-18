@extends('layouts.template') 
@section('judulh1','Admin - Pembeli') 
 
@section('konten') 
<div class="col-md-6"> 
    @if ($errors->any()) 
    <div class="alert alert-danger"> 
        <strong>Whoops!</strong> There were some problems with your input.<br><br> 
        <ul> 
            @foreach ($errors->all() as $error) 
            <li>{{ $error }}</li> 
            @endforeach 
        </ul> 
    </div> 
    @endif 
 
    <div class="card card-warning"> 
        <div class="card-header"> 
            <h3 class="card-title">Ubah Data Pembeli</h3> 
        </div> 
        <!-- /.card-header --> 
        <!-- form start --> 
        <form action="{{ route('pelanggan.update',$pelanggan->id) }}" method="POST">             @csrf 
            @method('PUT') 
            <div class=" card-body"> 
                <div class="form-group"> 
                    <label for="name">Nama Pembeli</label> 
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ $pelanggan->name }}"> 
                </div> 
                
                <div class="form-group"> 
                    <label for="hp">No Telepon</label> 
                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $pelanggan->hp }}"> 
                </div> 
                <div class="form-group"> 
                    <label for="alamat">Alamat</label> 
                    <textarea id="alamat" name="alamat" class=" formcontrol"                         rows="4">{{ $pelanggan->alamat }}</textarea> 
                </div> 
            </div> 
            <!-- /.card-body --> 
 
            <div class="card-footer"> 
                <button type="submit" class="btn btn-warning floatright">Simpan</button> 
            </div> 
        </form> 
    </div> 
</div> 
@endsection 
