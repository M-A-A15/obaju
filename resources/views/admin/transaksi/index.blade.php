@extends('admin.layout')

@section('js')
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
@endsection
@section('script')
    <script src="{{ asset('admin-asset/assets') }}/js/pages/be_tables_datatables.js"></script>
    <script>
        $('.selectStatus').on('change', function(){
            var val = $(this).val();

            $(this).parents('form').submit();
        });
    </script>
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
<h2 class="content-heading">Daftar Transaksi</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>No. Struk</th>
                <th>User</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Dibuat</th>
                {{--                            <th>Barang</th>--}}
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transaksis as $transaksi)
                <tr>
                    <td>#{{ $transaksi->id }}</td>
                    <td>
                        <a href="{{ url('admin/user/'.$transaksi->user_id.'/edit') }}">{{ $transaksi->user->nama }}</a>
                    </td>
                    <td>{{ $transaksi->delivery->nama }}</td>
                    <td>{{ $transaksi->created_at }}</td>
                    <td>
                        <form action="{{ url('admin/transaksi/'.$transaksi->id) }}" method="post">
                            @csrf
                            @method('put')
                            <select name="status" class="form-control select2 selectStatus">
                                <option value="1" {{ $transaksi->status == 1 ? 'selected' : '' }}>Belum dibayar</option>
                                <option value="2" {{ $transaksi->status == 2 ? 'selected' : '' }}>Sudah Bayar</option>
                                <option value="3" {{ $transaksi->status == 3 ? 'selected' : '' }}>Dalam Pengiriman</option>
                                <option value="4" {{ $transaksi->status == 4 ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </td>
                    <td class="text-center">
                        <a href="{{ url('/admin/transaksi/'.$transaksi->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-danger btnDelete" data-url="{{ url('/admin/transaksi/'.$transaksi->id) }}"><i class="fa fa-trash"></i></a>
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
