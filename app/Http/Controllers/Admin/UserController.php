<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::all();
        return view('admin.user.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah';
        $data['url'] = url('/admin/user');
        return view('admin.user.form', $data);
    }

    public function show($id){
        return abort(404);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'nama' => 'required',
            'email' => 'required|email',
            'level' => 'required',
            'password' => 'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {
            $query = User::create($input);
            if ($query) {
                return redirect()->back()->with('info', 'Data user berhasil ditambahkan.');
            } else {
                return redirect()->back()->with('error', 'Data user gagal ditambahkan.')->withInput($input);
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit';
        $data['url'] = url('/admin/user/'.$id);
        $data['kategoris'] = Kategori::all();
        $data['user'] = User::find($id);
        return view('admin.user.form', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'nama' => 'required',
            'email' => 'required|email',
            'level' => 'required',
            'password' => 'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {
            $user = User::find($id);
            $query = $user->update($input);
            if ($query) {
                return redirect()->back()->with('info', 'Data user berhasil diubah.');
            } else {
                return redirect()->back()->with('error', 'Data user gagal diubah.')->withInput($input);
            }
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $query = $user->delete();
        if ($query) {
            return redirect()->back()->with('info', 'Data user berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data user gagal dihapus.');
        }
    }
}
