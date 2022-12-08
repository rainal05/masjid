@extends('layouts.backend')

@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit Data Akun</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <a href="{{ url('/data/akun', []) }}"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('/data/akun', []) }}">Data Akun</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <form action="/data/akun/{{ $user->id }}/update" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row mt-4">
                            <div class="col-6 col-sm-6">
                                <label for="inputEmailAddress">Nama Akun</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                    placeholder="Masukan Nama Bidang">
                            </div>
                            <div class="col-6 col-sm-6">
                                <label for="inputEmailAddress">Email</label>
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-row mt-4">
                            <div class="col-12 col-sm-12">
                                <label for="inputPassword">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukan Password Baru Jika Ingin Diganti"
                                    >
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
