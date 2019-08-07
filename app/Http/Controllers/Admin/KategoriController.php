<?php

namespace App\Http\Controllers\Admin;

use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $data['kategoris'] = Kategori::all();
        return view('admin.kategori.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah';
        $data['url'] = url('/admin/kategori');
        return view('admin.kategori.form', $data);
    }

    public function show($id){
        return abort(404);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'nama_kategori' => 'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {
            $query = Kategori::create($input);
            if ($query) {
                return redirect()->back()->with('info', 'Data kategori berhasil ditambahkan.');
            } else {
                return redirect()->back()->with('error', 'Data kategori gagal ditambahkan.')->withInput($input);
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit';
        $data['url'] = url('/admin/kategori/'.$id);
        $data['kategori'] = Kategori::find($id);
        return view('admin.kategori.form', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'nama_kategori' => 'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {
            $kategori = Kategori::find($id);
            $query = $kategori->update($input);
            if ($query) {
                return redirect()->back()->with('info', 'Data kategori berhasil diubah.');
            } else {
                return redirect()->back()->with('error', 'Data kategori gagal diubah.')->withInput($input);
            }
        }
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        $query = $kategori->delete();
        if ($query) {
            return redirect()->back()->with('info', 'Data kategori berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data kategori gagal dihapus.');
        }
    }
}
