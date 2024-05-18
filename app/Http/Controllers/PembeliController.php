<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

class PembeliController extends Controller
{
    
    public function index()
    {
        return view('pembeli.tabel',
        ["title"=>"Pembeli",
        "data"=> Pembeli::all()
        ]);
    }

    public function create():View
    {
        return view('pembeli.tambah')->with
        (["title"=>"Tambah Data Pembeli"]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            
            "hp"=>"required",
            "alamat"=>"nullable"
        ]);
        Pembeli::create($request->all());
        return redirect()->route('pelanggan.index')->with
        ('succes','Data Pembeli Berhasil Ditambahkan');
    }

    public function edit(Pembeli $pelanggan):View
    {
        return view('pembeli.edit',compact('pelanggan'))->with
        (["title"=>"Ubah Data Pembeli"]);
    }

    public function update(Request $request, Pembeli $pelanggan):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            
            "hp"=>"required",
            "alamat"=>"nullable"
        ]);

        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')
        ->with('updated','Data Pembeli Berhasil Diubah');
    }

    public function show(Pembeli $pelanggan):View
    {
        return view('pembeli.tampil',compact('pelanggan'))->with
        (["title"=>"Data Pembeli"]);
    }
}
