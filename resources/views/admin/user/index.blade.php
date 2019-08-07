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
<h2 class="content-heading">Daftar User</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-header block-header-default">
        <a href="{{ url('admin/user/create') }}" class="btn btn-success btn-sm mb-25"><i class="fa fa-plus"></i> Tambah user</a>
    </div>
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Level</th>
                <th>Tanggal dibuat</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <strong>{{ $user->nama }}</strong>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="badge badge-{{ app('user_level')['color'][$user->level] }}">
                            {{ app('user_level')['name'][$user->level] }}
                        </div>
                    </td>
                    <td>@datetime($user->created_at)</td>
                    <td class="text-center">
                        <a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btnDelete" data-url="{{ url('/admin/user/'.$user->id) }}"><i class="fa fa-trash"></i></a>
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
