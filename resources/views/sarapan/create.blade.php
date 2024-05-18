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
 
    <div class="card card-success"> 
        <div class="card-header"> 
            <h3 class="card-title">Tambah Data Sarapan</h3> 
        </div> 
        <!-- /.card-header --> 

        <!-- form start -->         
        <form action="{{ route('sarapan.store') }}" method="POST"> 
            @csrf 
 
            <div class=" card-body"> 
                <div class="form-group"> 
                    <label for="name">name Sarapan</label> 
                    <input 	type="text"class="form-control" id="name" name="name" placeholder=""> 
                </div> 
                <div class="form-group"> 
                    <label for="stock">Stok</label> 
                    <input type="number" class="form-control" id="stock" name="stock"> 
                </div> 
            
                <div class="form-group"> 
                    <label for="price">price</label> 
                    <input type="number" class="form-control" id="price" name="price"> 
                </div> 
                <div class="form-group"> 
                    <label for="description">Deskripsi</label> 
                    <textarea id="description" name="description" class=" formcontrol" rows="4"></textarea> 
                </div> 
            </div> 
            <!-- /.card-body --> 
            <div class="card-footer"> 
                <button type="submit" 	class="btn 	btn-success float-right">Simpan</button> 
            </div> 
        </form> 
    </div> 
</div> 

@endsection 	
