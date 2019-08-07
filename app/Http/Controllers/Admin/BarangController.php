<?php

namespace App\Http\Controllers\Admin;

use App\Barang;
use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        $data['barangs'] = Barang::all();
        return view('admin.produk.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah';
        $data['url'] = url('/admin/barang');
        $data['kategoris'] = Kategori::all();
        return view('admin.produk.form', $data);
    }

    public function show($id){
        return abort(404);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'gambar' => 'sometimes|mimes:png,jpeg,jpg',
            'nama_barang' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {
            if ($request->has('gambar')) {
                $imageName = $input['nama_barang'].'-'.time() . '.' . $input['gambar']->getClientOriginalExtension();
                $input['gambar']->storeAs('barang', $imageName, 'public_uploads');
                $input['gambar'] = $imageName;
            }

            $input['kategori_id'] = implode(',', $input['kategori_id']);

            $query = Barang::create($input);
            if ($query) {
                return redirect()->back()->with('info', 'Data barang berhasil ditambahkan.');
            } else {
                return redirect()->back()->with('error', 'Data barang gagal ditambahkan.')->withInput($input);
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit';
        $data['url'] = url('/admin/barang/'.$id);
        $data['kategoris'] = Kategori::all();
        $data['barang'] = Barang::find($id);
        return view('admin.produk.form', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'gambar' => 'sometimes|mimes:png,jpeg,jpg',
            'nama_barang' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required'
        ]);

        if($validate->fails()){
            $input['kategori_id'] = implode(',', $input['kategori_id']);
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {
            $barang = Barang::find($id);

            if ($request->has('gambar')) {
                $imageName = $input['nama_barang'].'-'.time() . '.' . $input['gambar']->getClientOriginalExtension();
                $input['gambar']->storeAs('barang', $imageName, 'public_uploads');
                $input['gambar'] = $imageName;

                Storage::disk('public_uploads')->delete('barang/'.$barang->gambar);
            }

            $input['kategori_id'] = implode(',', $input['kategori_id']);

            $query = $barang->update($input);
            if ($query) {
                return redirect()->back()->with('info', 'Data barang berhasil diubah.');
            } else {
                return redirect()->back()->with('error', 'Data barang gagal diubah.')->withInput($input);
            }
        }
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        $query = $barang->delete();
        if ($query) {
            return redirect()->back()->with('info', 'Data barang berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data barang gagal dihapus.');
        }
    }
}
