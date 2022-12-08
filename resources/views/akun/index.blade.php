@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Akun</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="#" data-toggle="modal" data-target="#exampleModal">
                Tambah Akun</a>
            </li>
            <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
        </ol>
        <!-- notif -->
            @if (\Session::has('notif'))
                <div class="alert alert-primary" align="center">
                    {!! \Session::get('notif') !!}
                </div>
            @endif
        <!-- notif -->
        <!-- error -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <!-- end error -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                {{-- <th>Hak Akses</th> --}}
                                <th width="16%">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name ??'-'}}</td>
                            <td>{{$item->email ??'-'}}</td>
                            {{-- <td>{{$item->role}}</td> --}}
                            <td nowrap>
                                <a href="/data/akun/{{$item->id}}/" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="/data/akun/{{$item->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus ?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

                <form action="{{ url('/data/akun/store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-12 col-sm-12">
                            <label for="inputEmailAddress">Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukan Nama Akun" >
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-12 col-sm-12">
                            <label for="inputEmailAddress">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukan Email" >
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-12 col-sm-12">
                            <label for="inputEmailAddress">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan Password" >
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>

            </div>
        </div>
        </div>
    </div>
{{-- stop modal --}}
@endsection
