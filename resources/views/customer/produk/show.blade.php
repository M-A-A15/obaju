@extends('customer.layout')

@section('js')

@endsection

@section('css')

@endsection

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <!--
                        *** MENUS AND FILTERS ***
                        _________________________________________________________
                        -->
                        <div class="card sidebar-menu mb-4">
                            <div class="card-header">
                                <h3 class="h4 card-title">Categories</h3>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column category-menu">
                                    <li><a href="{{ url('/produk') }}" class="nav-link">All</a></li>
                                    @php
                                        $id = explode(',', $barang->kategori_id);
                                        $produkKategori = \App\Kategori::whereIn('id', $id)->get();
                                    @endphp
                                    @foreach($produkKategori as $pk)
                                        <li><a href="{{ url('/produk?kategori='.$pk->id) }}" class="nav-link">{{ $pk->nama_kategori }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div id="productMain" class="row">
                            <div class="col-md-6">
                                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                                    <div class="item"> <img src="{{ asset('uploads/barang/'.$barang->gambar) }}" alt="" class="img-fluid"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('message')
                                <form action="{{ url('/cart/'.$barang->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="box">
                                        <h1 class="text-center">{{ $barang->nama_barang }}</h1>
                                        <p class="price">@rupiah($barang->harga)</p>
                                        <div class="form-group text-center d-flex justify-content-center align-items-center flex-column mb-5">
                                            <label for="">Jumlah</label>
                                            <input type="number" class="form-control form-qty" style="width: 40%" name="qty" value="1" min="1">
                                        </div>
                                        <p class="text-center buttons">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                        </p>
                                        <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="details" class="box">
                            <p></p>
                            <h4>Product details</h4>
                            <p>{{ $barang->deskripsi }}</p>
                        </div>
                    </div>
                    <!-- /.col-md-9-->
                </div>
            </div>
        </div>
    </div>
@endsection
