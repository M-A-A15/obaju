@extends('customer.layout')

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div id="basket" class="col-lg-9">
                        <div class="box">
                            @include('message')
                            <form action="{{ url('/cart/checkout') }}" method="post">
                                @csrf
                                <h1>Shopping cart</h1>
                                <p class="text-muted">You currently have {{ $carts->count() }} item(s) in your cart.</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($carts->count() == 0)
                                            <tr>
                                                <th colspan="6">No data cart.</th>
                                            </tr>
                                        @endif
                                        @php
                                            $total_harga = 0;
                                        @endphp
                                        @foreach($carts as $key => $cart)
                                        <tr>
                                            <td>
                                                <a href="{{ asset('uploads/barang/'.$cart->barang->gambar) }}"><img src="{{ asset('uploads/barang/'.$cart->barang->gambar) }}" alt=""></a>
                                            </td>
                                            <td>
                                                <a href="{{ url('produk/'.$cart->barang_id) }}">{{ $cart->barang->nama_barang }}</a>
                                            </td>
                                            <td>@rupiah($cart->barang->harga)</td>
                                            <td>
                                                <input type="number" value="{{ $cart->qty }}" name="qty[{{ $cart->id }}]" class="form-control">
                                            </td>
                                            <td>@rupiah($cart->qty*$cart->barang->harga)</td>
                                            <td>
                                                <a href="#" class="btnDelete" data-url="{{ url('cart/'.$cart->barang_id) }}"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        @php
                                            $total_harga += $cart->qty * $cart->barang->harga;
                                        @endphp
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan="4">Total</th>
                                            <th colspan="2">@rupiah($total_harga)</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.table-responsive-->
                                <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                                    <div class="left"><a href="{{ url('/produk') }}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                                    @if($carts->count() > 0)
                                    <div class="right">
                                        <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></button>
                                    </div>
                                    @endif
                                </div>
                            </form>

                            <form action="" method="post" id="formDelete" class="d-none">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                        <!-- /.box-->
                    </div>
                    <!-- /.col-lg-9-->
                    <div class="col-lg-3">
                        <div id="order-summary" class="box">
                            <div class="box-header">
                                <h3 class="mb-0">Order summary</h3>
                            </div>
                            <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>@rupiah($total_harga)</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-3-->
                </div>
            </div>
        </div>
    </div>
@endsection
