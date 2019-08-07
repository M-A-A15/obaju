@extends('admin.layout')

@section('js')
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2.full.min.js"></script>
@endsection
@section('script')
    <script>
        $('.select2').select2();

        $('.gambar').on('change', function(){
            var input = this;
            var url = $(this).val();
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2-bootstrap.min.css">

@endsection
@section('style')
    <style>
        .img-preview{
            width: 100px;
            margin-bottom: 20px;
            display: block;
        }
    </style>
@endsection

@section('content')
<h2 class="content-heading">Detail Transaksi</h2>

<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">#{{ $transaksi->id }}</h3>
        <div class="block-options">
            <!-- Print Page functionality is initialized in Codebase() -> uiHelperPrint() -->
            <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
                <i class="si si-printer"></i> Print Invoice
            </button>
        </div>
    </div>
    <div class="block-content">
        <!-- Invoice Info -->
        <div class="row my-20">
            <!-- Company Info -->
            <div class="col-6">
                <p class="h3">Obaju</p>
                <address>
                    Komp. Cibiru Indah<br>
                    Bandung<br>
                    40291<br>
                    <a href="mailto:obaju@gmail.com">obaju@gmail.com</a>
                </address>
            </div>
            <!-- END Company Info -->

            <!-- Client Info -->
            <div class="col-6 text-right">
                <p class="h3">{{ $transaksi->delivery->nama }}</p>
                <address>
                    {{ $transaksi->delivery->alamat }}<br>
                    {{ $transaksi->delivery->kode_pos }}<br>
                    {{ $transaksi->delivery->no_telp }}<br>
                    <a href="mailto:{{ $transaksi->delivery->email }}">{{ $transaksi->delivery->email }}</a>
                </address>
            </div>
            <!-- END Client Info -->
        </div>
        <!-- END Invoice Info -->

        <!-- Table -->
        <div class="table-responsive push">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="text-center" style="width: 60px;"></th>
                    <th>Product</th>
                    <th class="text-center" style="width: 90px;">Qty</th>
                    <th class="text-right" style="width: 120px;">Unit</th>
                    <th class="text-right" style="width: 120px;">Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transaksi->detail as $key => $detail)
                <tr>
                    <td class="text-center">{{ $key+1 }}</td>
                    <td>
                        <p class="font-w600 mb-5">{{ $detail->barang->nama_barang }}</p>
                        <div class="text-muted">{{ $detail->barang->deskripsi }}</div>
                    </td>
                    <td class="text-center">
                        <span class="badge badge-pill badge-primary">{{ $detail->qty }}</span>
                    </td>
                    <td class="text-right">@rupiah($detail->barang->harga)</td>
                    <td class="text-right">@rupiah($detail->barang->harga*$detail->qty)</td>
                </tr>
                @endforeach
                <tr class="table-warning">
                    <td colspan="4" class="font-w700 text-uppercase text-right">Total</td>
                    <td class="font-w700 text-right">@rupiah($transaksi->total_harga)</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- END Table -->
    </div>
</div>
<!-- END Invoice -->
@endsection
