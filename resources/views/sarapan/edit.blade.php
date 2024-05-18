@extends('layouts.template') 
@section('judulh1','Admin - Sarapan') 
 
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
            <h3 class="card-title">Ubah Data Sarapan</h3> 
        </div> 
        <!-- /.card-header --> 
        <!-- form start --> 
        <form action="{{ route('sarapan.update',$sarapan->id) }}" method="POST"> 
            @csrf 
            @method('PUT') 
            <div class=" card-body"> 

                <div class="form-group"> 
                    <label for="name">Nama Sarapan</label> 
                    <input type="text" class="form-control" id="name" name="name" placeholder=""                         value="{{$sarapan->name}}"> 
                </div> 
                <div class="form-group"> 
                    <label for="stock">Stok</label> 
                    <input type="number" class="form-control" id="stock" name="stock" value="{{$sarapan->stock}}"> 
                </div> 
 
                
                <div class="form-group"> 
                    <label for="price">price</label> 
                    <input type="number" class="form-control" id="price" name="price" value="{{$sarapan->price}}"> 
                </div> 
                <div class=" form-group"> 
                    <label for="description">Deskripsi</label> 
                    <textarea id="description" name="description" class=" form-control"                         rows="4">{{ $sarapan->description }}</textarea> 
                </div> 
            </div> 
            <!-- /.card-body --> 
 
            <div class="card-footer"> 
                <button type="submit" class="btn btn-warning floatright">Ubah</button> 
            </div> 
        </form> 
    </div> 
 
 
</div> 
 
 
@endsection 
