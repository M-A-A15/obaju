<?php

namespace App\Http\Controllers\Admin;

use App\Transaksi;
use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $data['transaksis'] = Transaksi::all();
        return view('admin.transaksi.index', $data);
    }

    public function show($id)
    {
        $data['transaksi'] = Transaksi::find($id);
        return view('admin.transaksi.show', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'status' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {
            $transaksi = Transaksi::find($id);
            $query = $transaksi->update($input);
            if ($query) {
                return redirect()->back()->with('info', 'Status transaksi berhasil diubah.');
            } else {
                return redirect()->back()->with('error', 'Status transaksi gagal diubah.')->withInput($input);
            }
        }
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $query = $transaksi->delete();
        if ($query) {
            return redirect()->back()->with('info', 'Data transaksi berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data transaksi gagal dihapus.');
        }
    }
}
