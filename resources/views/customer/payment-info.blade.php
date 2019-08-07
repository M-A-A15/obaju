@extends('customer.layout')

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div id="checkout" class="col-lg-9">
                        <div class="box">
                            <form method="post" action="{{ url('/checkout') }}">
                                @csrf
                                <h1>Payment Information</h1>
                                @include('message')
                                <div class="content py-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>Segera lakukan pembayaran dalam waktu 1 x 24 Jam agar pembelian anda dapat langsung diproses.</p>
                                            <p><strong>Account : Atas Nama PT. Obaju Sejahtera</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box payment-method text-center">
                                                <img src="{{ asset('customer/img/jenius.png') }}" alt="payment" style="max-height: 80px">
                                                <p>No. Rek : 34351 22312 3431</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box payment-method text-center">
                                                <img src="{{ asset('customer/img/ovo.png') }}" alt="payment" style="max-height: 80px">
                                                <p>No. Rek : 34351 22312 3431</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box payment-method text-center">
                                                <img src="{{ asset('customer/img/cimb.png') }}" alt="payment" style="max-height: 90px">
                                                <p>No. Rek : 1273812 31638 72</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                </div>
                                <div class="box-footer d-flex justify-content-end">
                                    <a href="{{ url('/order') }}" class="btn btn-primary">My Orders<i class="fa fa-chevron-right"></i></a>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-->
                    </div>
                    <!-- /.col-lg-9-->
                    <div class="col-lg-3">
                        <div id="order-summary" class="card">
                            <div class="card-header">
                                <h3 class="mt-4 mb-4">Order summary</h3>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr class="total">
                                            <td>Total</td>
                                            <th>@rupiah($transaksi->total_harga)</th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-3-->
                </div>
            </div>
        </div>
    </div>
@endsection
