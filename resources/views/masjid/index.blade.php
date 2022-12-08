@extends('layouts.backend')

@section('content')
    @if (auth()->user()->role == 'Admin')
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Data Masjid</h1>
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
                                        <th>Id Masjid</th>
                                        <th>Status</th>
                                        <th width="16%">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($masjid as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama ?? '-' }}</td>
                                            <td>{{ $item->id_masjid ?? '-' }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td nowrap>
                                                <a href="/data/masjid/detail/{{ $item->id }}/"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-info-circle"></i> Detail
                                                </a>
                                                {{-- <a href="/bidang/{{$item->id}}/" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a> --}}
                                                <a href="/data/masjid/{{ $item->id }}/delete"
                                                    class="btn btn-danger btn-sm"
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Masjid</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ url('/data/masjid/store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-12 col-sm-12">
                                    <label for="inputEmailAddress">Nama Masjid</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Masjid">
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <div class="col-12 col-sm-12">
                                    <label for="inputEmailAddress">Id Masjid</label>
                                    <input type="text" name="id_masjid" class="form-control" placeholder="ID Masjid">
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <div class="col-12 col-sm-12">
                                    <label for="inputEmailAddress">Kabupaten / Kota</label>
                                    <select name="kabko" class="multisteps-form__select form-control">
                                        <option value="">-- PILIH --</option>
                                        <option value="Kabupaten Batanghari">Kabupaten Batanghari</option>
                                        <option value="Kabupaten Bungo">Kabupaten Bungo</option>
                                        <option value="Kabupaten Kerinci">Kabupaten Kerinci</option>
                                        <option value="Kabupaten Merangin">Kabupaten Merangin</option>
                                        <option value="Kabupaten Muaro Jambi">Kabupaten Muaro Jambi</option>
                                        <option value="Kabupaten Sarolangun">Kabupaten Sarolangun</option>
                                        <option value="Kabupaten Tanjung Jabung Barat">Kabupaten Tanjung Jabung Barat
                                        </option>
                                        <option value="Kabupaten Tanjung Jabung Timur">Kabupaten Tanjung Jabung Timur
                                        </option>
                                        <option value="Kabupaten Tebo">Kabupaten Tebo</option>
                                        <option value="Kota Jambi">Kota Jambi</option>
                                        <option value="Kota Sungai Penuh">Kota Sungai Penuh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <div class="col-12 col-sm-12">
                                    <label for="inputEmailAddress">Lokasi Masjid</label>
                                    <textarea class="form-control" placeholder="Lokasi Masjid" name="lokasi" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <div class="col-6 col-sm-6">
                                    <label for="inputEmailAddress">Jumlah Pengajuan</label>
                                    <input type="number" min="1" name="rp" class="form-control"
                                        placeholder="Rp. xxx">
                                </div>
                                <div class="col-6 col-sm-6">
                                    <label for="inputEmailAddress">Foto Masjid</label>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                            </div>
                            <label class="form-label">
                                <span class="badge border-dark border-1 text-dark"><i>Note : Format foto JPG/JPEG/PNG Min :
                                        2 Mb</i></span>
                            </label>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal tambah -->
    @endif
    @if (auth()->user()->role == '0')
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Belum ACC</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Data Masjid</li>
                    <li class="breadcrumb-item ">Belum ACC</li>
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
                                        <th>Id Masjid</th>
                                        <th width="10%">Detail</th>
                                        <th width="8%">ACC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blm as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama ?? '-' }}</td>
                                            <td>{{ $item->id_masjid ?? '-' }}</td>
                                            <td>
                                                <a href="/data/masjid/detail/{{ $item->id }}/"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-info-circle"></i> Detail
                                                </a>
                                            </td>
                                            <td nowrap>
                                                <a href="/data/masjid/acc/{{ $item->id }}/"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa fa-info-circle"></i> ACC
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
    @endif
@endsection
