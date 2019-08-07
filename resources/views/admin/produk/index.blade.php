@extends('admin.layout')

@section('js')
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
@endsection
@section('script')
    <script src="{{ asset('admin-asset/assets') }}/js/pages/be_tables_datatables.js"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.css">
@endsection
@section('style')
    <style>
        .table .img-preview{
            width: 70px;
            margin-right: 20px;
        }
    </style>
@endsection

@section('content')
<h2 class="content-heading">Daftar Produk</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-header block-header-default">
        <a href="{{ url('admin/barang/create') }}" class="btn btn-success btn-sm mb-25"><i class="fa fa-plus"></i> Tambah barang</a>
    </div>
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th class="text-center" style="width: 150px;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($barangs as $barang)
                <tr>
                    <td>
                        <img class="img-preview" src="{{ $barang->gambar ? asset('uploads/barang/'.$barang->gambar) : '' }}" alt="gambar barang" onerror="this.src='{{ asset('backend/assets/images/placeholder.jpg') }}'">
                        <strong>{{ $barang->nama_barang }}</strong>
                    </td>
                    <td>{{ $barang->deskripsi ?? '-' }}</td>
                    <td>
                        @php
                            $id = explode(',', $barang->kategori_id);
                            $produkKategori = \App\Kategori::whereIn('id', $id)->get();
                        @endphp
                        @foreach($produkKategori as $key => $pk)
                            {{ $pk->nama_kategori.($key+1 == sizeof($produkKategori) ? '' : ',') }}
                        @endforeach
                    </td>
                    <td>{{ $barang->stok }}</td>
                    <td class="text-center">
                        <a href="{{ url('admin/barang/'.$barang->id.'/edit') }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btnDelete" data-url="{{ url('/admin/barang/'.$barang->id) }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <form action="#" method="post" id="formDelete" class="d-none">
            @csrf
            @method('delete')
        </form>
    </div>
</div>
<!-- END Dynamic Table Full -->
@endsection
