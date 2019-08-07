<?php

namespace App\Http\Controllers\Customer;

use App\Cart;
use App\Delivery;
use App\DetailTransaksi;
use App\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::where('user_id', auth()->user()->id)->get();
        $totalPayment = 0;
        foreach($data['carts'] as $cart){
            $totalPayment += $cart->qty * $cart->barang->harga;
        }
        $data['totalPayment'] = $totalPayment;
        $data['delivery'] = auth()->user()->delivery()->orderBy('id', 'desc')->first();
        return view('customer.checkout', $data);
    }

    public function checkout(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'nama' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'no_telp' => 'required',
            'email' => 'email|required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else{
            unset($input['_token']);
            $carts = Cart::where('user_id', auth()->user()->id)->get();
            if($carts->count() == 0){
                return redirect('cart')->with('error', 'Checkout gagal! tidak ada produk dalam cart.');
            }

            //create or update delivery data
            $input['user_id'] = auth()->user()->id;
            $delivery = Delivery::updateOrCreate($input, $input);

            $totalPayment = 0;
            foreach($carts as $key => $cart){
                $totalPayment += $cart->qty * $cart->barang->harga;
            }

            //create transaksi data
            $transaksi['user_id'] = auth()->user()->id;
            $transaksi['delivery_id'] = $delivery->id;
            $transaksi['status'] = 1;
            $transaksi['total_harga'] = $totalPayment;
            $queryTransaksi = Transaksi::create($transaksi);

            //create detail transaksi data
            foreach($carts as $cart){
                $data['barang_id'] =  $cart->barang_id;
                $data['qty'] =  $cart->qty;
                $data['transaksi_id'] =  $queryTransaksi->id;
                $query = DetailTransaksi::create($data);
            }

            if($query){
                $carts = Cart::where('user_id', auth()->user()->id);
                $carts->delete();
                return redirect('/payment-info/'.$queryTransaksi->id)->with('info', 'Checkout berhasil!');
            }else{
                return redirect()->back()->with('error', 'Data checkout gagal disimpan.')->withInput($input);
            }
        }
    }
}
