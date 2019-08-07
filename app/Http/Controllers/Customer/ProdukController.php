<?php

namespace App\Http\Controllers\Customer;

use App\Barang;
use App\Http\Controllers\Controller;
use App\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        $data['produks'] = new Barang();

        if(@request()->kategori){
            $kategori = request()->kategori;
            $data['produks'] = $data['produks']->where('kategori_id', 'like', '%'.$kategori.'%');
        }

        if(@request()->search){
            $q = request()->search;
            $data['produks'] = $data['produks']->where('nama_barang', 'like', '%'.$q.'%');
        }

        $data['produks'] = $data['produks']->paginate(10);
        $data['kategoris'] = Kategori::orderBy('nama_kategori')->get();
        return view('customer.produk.index', $data);
    }

    public function show($id)
    {
        $data['barang'] = Barang::findOrFail($id);
        $data['kategoris'] = Kategori::orderBy('nama_kategori')->get();
        return view('customer.produk.show', $data);
    }
}
