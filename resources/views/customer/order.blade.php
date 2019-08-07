@extends('customer.layout')

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div id="basket" class="col-lg-12">
                        <div class="box">
                            @include('message')
                            <h1>List Order</h1>
                            <p class="text-muted">You currently have {{ $orders->count() }} order(s).</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>No. Inv</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Detail Order</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($orders->count() == 0)
                                        <tr>
                                            <th colspan="6">No data order.</th>
                                        </tr>
                                    @endif
                                    @foreach($orders as $key => $order)
                                    <tr>
                                        <td><strong>#{{ $order->id }}</strong></td>
                                        <td>{{ $order->delivery->nama }}</td>
                                        <td>{{ $order->delivery->alamat }}</td>
                                        <td>
                                            <ol>
                                                @foreach($order->detail as $detail)
                                                    <li>{{ @$detail->barang->nama_barang }} ({{ $detail->qty }} pcs)</li>
                                                @endforeach
                                            </ol>
                                        </td>
                                        <td>@rupiah($order->total_harga)</td>
                                        <td>
                                            <span class="d-block">
                                                {{ app('order_status')['name'][$order->status] }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($order->status == 1)
                                                <a href="{{ url('/payment-info/'.$order->id) }}" class="btn btn-primary btn-sm mt-2">Bayar</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
