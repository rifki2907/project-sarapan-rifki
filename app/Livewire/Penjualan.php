<?php

namespace App\Livewire;

use App\Models\Penjualans;
use Livewire\Component;
use App\Models\Pembeli;
use App\Models\Transaksis;
use Illuminate\Support\Facades\Auth;

class Penjualan extends Component
{
    public $pembeli_id;
    public function render()
    {
        return view('livewire.penjualan',[
            'data'=>Pembeli::orderBy('id','desc')->get()
        ]);   
    }

    public function store()
    {
        $this->validate([
            'pembeli_id'=>'required'
        ]);
    

    Transaksi::create([
        'invoice'=>$this->invoice(),
        'pembeli_id'=>$this->pembeli_id,
        'user_id'=>Auth::user()->id,
        'total'=>'0'
    ]);
    $this->pembeli_id=NULL;
    return redirect()->to('transaksi');
    }

    public function invoice()
    {
        $pembeli=Transaksi::orderBy('created_at','DESC');
        if($pembeli->count()>0){
            $pembeli=$pembeli->first();
            $explode=explode('-',$pembeli->invoice);
            return 'INV-'.$explode[1]+1;
        }
        return 'INV-1';
    }
}
