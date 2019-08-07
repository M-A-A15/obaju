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
                                    <li><a href="{{ url('/produk') }}" class="nav-link {{ empty(request()->kategori) ? 'active' : '' }}">All</a></li>
                                    @foreach($kategoris as $kategori)
                                        <li><a href="{{ url('/produk?kategori='.$kategori->id) }}" class="nav-link {{ request()->kategori == $kategori->id ? 'active' : '' }}">{{ $kategori->nama_kategori }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        @if(@request()->search)
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="m-0"><i class="fa fa-search"></i> Menampilkan hasil pencarian <strong>"{{ @request()->search }}"</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row products">
                            @foreach($produks as $produk)
                            <div class="col-lg-4 col-md-6">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front"><a href="{{ asset('uploads/barang/'.$produk->gambar) }}"><img src="{{ asset('uploads/barang/'.$produk->gambar) }}" alt="" class="img-fluid"></a></div>
                                        </div>
                                    </div>
                                    <a href="{{ url('produk/'.$produk->id) }}" class="invisible">
                                        <img src="{{ asset('customer/img') }}/product1.jpg" alt="" class="img-fluid">
                                    </a>
                                    <div class="text">
                                        <h3><a href="{{ url('produk/'.$produk->id) }}">{{ $produk->nama_barang }}</a></h3>
                                        <p class="price">
                                            <del></del>@rupiah($produk->harga)
                                        </p>
                                        <p class="buttons">
                                            <a href="{{ url('produk/'.$produk->id) }}" class="btn btn-outline-secondary">View detail</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="pages">
                            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                {{ $produks->links() }}
                            </nav>
                        </div>
                    </div>
                    <!-- /.col-lg-9-->
                </div>
            </div>
        </div>
    </div>
@endsection
