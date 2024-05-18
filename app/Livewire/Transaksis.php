<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use App\Models\Detiltransaksi;
use App\Models\Sarapan;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Transaksis extends Component
{
    public $total;
    public $transaksi_id;
    public $sarapan_id;
    public $qty=1;
    public $uang;
    public $kembali;
    public function render ()
    {
        $transaksi=Transaksi::select('*')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->first();

        $this->total=$transaksi->total;
        $this->kembali=$this->uang-$this->total;
        return view('livewire.transaksis')
        ->with("data", $transaksi)
        ->with("dataSarapan", Sarapan::where('stock','>','0')->get())
        ->with("dataDetiltransaksi",Detiltransaksi::where('transaksi_id','=',$transaksi->id)->get());
    }

    public function store()
    {
        $this->validate([
            'sarapan_id'=>'required'
        ]);
        $transaksi=Transaksi::select('*')->where('user_id','=',Auth::user()->id)->orderBy('id','desc')->first();
        $this->transaksi_id=$transaksi->id;
        $sarapan= Sarapan::where('id','=',$this->sarapan_id)->get();
        $price= $sarapan[0]->price;
        Detiltransaksi::create([
            'transaksi_id'=>$this->transaksi_id,
            'sarapan_id'=>$this->sarapan_id,
            'qty'=>$this->qty,
            'price'=>$price
        ]);

        $total=$transaksi->total;
        $total=$total+($price*$this->qty);
        Transaksi::where('id','=',$this->transaksi_id)->update([
            'total'=>$total
        ]);

        $this->sarapan_id=NULL;
        $this->qty=1;
    }

    public function delete($detiltransaksi_id)
    {
        $detiltransaksi=Detiltransaksi::find($detiltransaksi_id);
        $detiltransaksi->delete();

        //update total
        $detiltransaksi=Detiltransaksi::select('*')->where('transaksi_id','=',$this->transaksi_id)->get();
        $total=0;
        foreach($detiltransaksi as $od){
            $total+=$od->qty * $od->price;
        }
        try{
            Transaksi::where('id','=',$this->transaksi_id)->update([
                'total'=>$total
            ]);
        }
        catch(Exception $e){
            dd($e);
        }
    }

    public function receipt($id)
    {
        //update stok
        $detiltransaksi = Detiltransaksi::select('*')->where('transaksi_id','=',$id)->get();
        //dd($order)detail
        foreach ($detiltransaksi as $od) {
            $stocklama = Sarapan::select('stock')->where('id','=',$od->sarapan_id)->sum('stock');
            $stock = $stocklama - $od->qty;
            try {
                Sarapan::where('id','=', $od->sarapan_id)->update([
                    'stock' => $stock
                ]);
            }
            catch (Exception $e){
                dd($e);
            }
        }
        return Redirect::route('cetakReceipt')->with(['id' => $id]);
    }
}
