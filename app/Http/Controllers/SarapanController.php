<?php

namespace App\Http\Controllers;

use App\Models\Sarapan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SarapanController extends Controller
{
    //
    public function index()
    {
        $product=Sarapan::all();
        return view('sarapan.index',[
            "title"=>"Sarapan",
            "data"=>$product
        ]);
    }

    public function create():View
    {
        return view('sarapan.create')->with([
            "title"=>"Tambah Data Sarapan",
            "data"=>Sarapan::all()
        ]);
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "description"=>"nullable",
            "stock"=>"required",
            "price"=>"required",
            "category_id"=>"nullable"
        ]);

       Sarapan::create($request->all());
        return redirect()->route('sarapan.index')->with('success','Data Sarapan Berhasil Ditambahkan');
    }

    public function edit(Sarapan $sarapan):View
    {
        return view('sarapan.edit',compact('sarapan'))->with([
            "title"=>"Ubah Data Sarapan",
            "data"=>Sarapan::all()
        ]);
    }
    public function update(Sarapan $sarapan, Request $request):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "description"=>"nullable",
            "stock"=>"required",
            "price"=>"required",
            "category_id"=>"nullable"
        ]);
        $sarapan->update($request->all());
        return redirect()->route('sarapan.index')->with('updated','Data Sarapan Berhasil Diubah');
    }
    public function show():View
    {
        $sarapan=Sarapan::all();
        return view('sarapan.show')->with([
            "title"=>"Tampil Data Sarapan",
            "data"=>$sarapan
        ]);
    }

    public function destroy($id):RedirectResponse
    {
        Sarapan::where('id',$id)->delete();
        return redirect()->route('sarapan.index')->with('deleted','Data Sarapan Berhasil Dihapus');
    }
}
