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
<h2 class="content-heading">{{ $title }} User</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-header block-header-default">
        <a href="{{ url('admin/user') }}" class="btn btn-success btn-sm mb-25"><i class="fa fa-list"></i> Daftar User</a>
    </div>
    <div class="block-content">
        @include('message')
        <form class="form-horizontal" action="{{ $url }}" method="post" enctype="multipart/form-data">
            @csrf
            @if($title != 'Tambah')
                @method('put')
            @endif
            <div class="form-group row">
                <label class="col-12">Nama</label>
                <div class="col-md-12">
                    <input type="text" name="nama" value="{{ @old('nama') ?? @$user->nama }}" class="form-control" placeholder="Masukan nama user">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12">Email</label>
                <div class="col-md-12">
                    <input type="email" name="email" value="{{ @old('email') ?? @$user->email }}" class="form-control" placeholder="Masukan email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12">Level</label>
                <div class="col-md-12">
                    <select class="select2 form-control" name="level">
                        @foreach(app('user_level')['name'] as $key => $status)
                            @if($key == 0)
                                @continue
                            @endif
                            <option value="{{ $key }}" {{ (@old('level') && old('level') == $key) ? 'selected' : ((@$user->level && $user->level == $key) ? 'selected' : '') }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12">Password</label>
                <div class="col-md-12">
                    <input type="password" name="password" value="{{ @old('password') ?? @$user->password }}" class="form-control" placeholder="Masukan Password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END Dynamic Table Full -->
@endsection
