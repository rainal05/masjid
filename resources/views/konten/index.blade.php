@extends('layouts.backend')

@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Data Konten</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="#" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data</a>
                </li>
                <li class="breadcrumb-item"><a href="#" data-toggle="modal" data-target="#exampleModal"> <i
                            class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
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
                                    <th>Nama Masjid</th>
                                    <th>Lokasi</th>
                                    <th>Foto</th>
                                    <th width="16%">Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konten as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->masjid->nama ?? '-' }}</td>
                                        <td>{{ $item->masjid->lokasi ?? '-' }}</td>
                                        <td><a href="{{ url('/file_foto/' . $item->masjid->foto) }}" target="_blank">Lihat
                                                <i class="fa fa-image"></i></a></td>
                                        <td nowrap>
                                            <a href="/data/konten/{{ $item->id }}/" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href="/bidang/{{ $item->id }}/delete" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Anda yakin ingin menghapus ?')">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Konten</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ url('/data/konten/store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-12 col-sm-12">
                                <label for="inputEmailAddress">Pilih Data Masjid</label>
                                <select name="masjid_id" class="multisteps-form__select form-control">
                                    <option value="">-- PILIH --</option>
                                    @foreach ($masjid as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="text-center mt-3"> --}}
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        {{-- <button type="reset" class="btn btn-secondary">Reset</button>
                        </div> --}}
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- stop modal --}}
@endsection
