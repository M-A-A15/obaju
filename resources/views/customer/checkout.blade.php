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
                                <h1>Checkout</h1>
                                @include('message')
                                <div class="content py-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="checkout_name">Name</label>
                                                <input type="text" id="checkout_name" class="form-control" name="nama" placeholder="Name" required="required" value="{{ @$delivery->nama ? @$delivery->nama : auth()->user()->nama }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="checkout_email">Email</label>
                                                <input type="email" id="checkout_email" class="form-control" name="email" placeholder="Email" required="required" value="{{ @$delivery->email ? @$delivery->email : auth()->user()->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="checkout_address">Alamat</label>
                                                <input type="text" id="checkout_address" class="form-control" name="alamat" placeholder="Address" required="required" value="{{ @$delivery->alamat }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city">No. HP</label>
                                                <input type="text" id="checkout_phone" class="form-control" name="no_telp" placeholder="No. HP" required="required" value="{{ @$delivery->no_telp }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="checkout_zipcode">ZIP</label>
                                                <input type="text" id="checkout_zipcode" class="form-control" name="kode_pos" placeholder="ZIP Code" required="required" value="{{ @$delivery->kode_pos }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                </div>
                                <div class="box-footer d-flex justify-content-between"><a href="{{ url('/cart') }}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Basket</a>
                                    <button type="submit" class="btn btn-primary">Continue Checkout<i class="fa fa-chevron-right"></i></button>
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
                                            <th>@rupiah($totalPayment)</th>
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
