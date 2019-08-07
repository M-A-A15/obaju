<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Transaksi;

class PaymentInfoController extends Controller
{
    public function index($id)
    {
        $data['transaksi'] = Transaksi::findOrFail($id);
        return view('customer.payment-info', $data);
    }
}
