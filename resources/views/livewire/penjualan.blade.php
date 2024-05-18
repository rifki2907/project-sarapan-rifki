<div class="row"> 
<div class="d-flex aligns-items-center justify-content-center"> 
<div class="col-6"> 
    <div class="card "> 
        <div class="card-header"> 
            <h5 class="card-title">Invoice</h5> 
        </div> 
        <!-- /.card-header --> 
        <!-- form start --> 
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
        <form wire:submit.prevent="store" method="POST"> 
          
            @csrf 
            <div class=" card-body">
            <body class="hold-transition login-page" style="background-image: url('4.jpg'); background-repeat: no-repeat; background-size: cover;">
                <div class="form-group"> 
                    <label for="name">Pembeli</label> 
                    <select class="form-control" wire:model="pembeli_id"> 
                        <option hidden>--Pilih Pembeli--</option> 
                        @foreach($data as $dt ) 
                        <option value="{{ $dt->id }}">{{ $dt->name }}</option> 
                        @endforeach 
                    </select> 
                    
                </div> 
            
            </div> 
            <!-- /.card-body --> 
 
            <div class="card-footer text-end"> 
            <button type="submit" class="btn btn-success btnsm">Submit</button>             </div> 
        </form> 
    </div> 
</div> 
</div> 
</div> 
