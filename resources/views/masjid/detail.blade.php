@extends('layouts.backend')

@section('content')
    @if (auth()->user()->role == 'Admin')
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Detail Masjid</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ url('/data/masjid') }}"><i class="fa fa-arrow-circle-left"
                                aria-hidden="true"></i></a></li>
                    <li class="breadcrumb-item active">Data Masjid</li>
                </ol>
                @if (\Session::has('notif'))
                    <div class="alert alert-primary" align="center">
                        {!! \Session::get('notif') !!}
                    </div>
                @endif

                <div class="row">

                    <div class="col-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-0">
                            <div class="card-header">Foto Masjid</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <a href="{{ url('/file_foto/' . $det->foto) }}" target="_blank"><img class="img-fluid"
                                        style="width: 600px; height: auto;" src="{{ url('/file_foto/' . $det->foto) }}"
                                        alt="images" />
                                </a>
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">Klik Foto Untuk Lebih Jelas</div>
                                <!-- Profile picture upload button-->
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Detail Masjid</div>
                            <div class="card-body">
                                <form>
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label for="inputUsername">Nama Masjid</label>
                                        <input class="form-control" type="text" value="{{ $det->nama }}" disabled>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label for="inputEmailAddress">Kab / Kota</label>
                                        <input class="form-control" type="text" value="{{ $det->kabko }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputEmailAddress">Lokasi</label>
                                        <textarea class="form-control" rows="2" disabled>{{ $det->lokasi }}</textarea>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label for="inputPhone">Jumlah Pengajuan</label>
                                            <input class="form-control" type="text"
                                                value="Rp. {{ number_format($det->rp) }}" disabled>
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        <div class="col-md-6">
                                            <label for="inputBirthday">Jumlah ACC</label>
                                            <input class="form-control" type="text" name="birthday"
                                                value="Rp. {{ number_format($det->acc) }}" disabled>
                                        </div>

                                    </div>
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label for="inputUsername">Status</label>
                                        <input class="form-control" type="text" value="{{ $det->status }}" disabled>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </main>
    @endif
    @if (auth()->user()->role == '0')
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Detail Masjid</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ url('/data/masjid/') }}"><i class="fa fa-arrow-circle-left"
                                aria-hidden="true"></i></a></li>
                    <li class="breadcrumb-item active">Data Masjid</li>
                </ol>
                @if (\Session::has('notif'))
                    <div class="alert alert-primary" align="center">
                        {!! \Session::get('notif') !!}
                    </div>
                @endif

                <div class="row">

                    <div class="col-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-0">
                            <div class="card-header">Foto Masjid</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <a href="{{ url('/file_foto/' . $det->foto) }}" target="_blank"><img class="img-fluid"
                                        style="width: 600px; height: auto;" src="{{ url('/file_foto/' . $det->foto) }}"
                                        alt="images" />
                                </a>
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">Klik Foto Untuk Lebih Jelas</div>
                                <!-- Profile picture upload button-->
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Detail Masjid</div>
                            <div class="card-body">
                                <form>
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label for="inputUsername">Nama Masjid</label>
                                        <input class="form-control" type="text" value="{{ $det->nama }}" disabled>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label for="inputUsername">Kab / Kota</label>
                                        <input class="form-control" type="text" value="{{ $det->kabko }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputEmailAddress">Lokasi</label>
                                        <textarea class="form-control" rows="2" disabled>{{ $det->lokasi }}</textarea>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label for="inputPhone">Jumlah Pengajuan</label>
                                            <input class="form-control" type="text"
                                                value="Rp. {{ number_format($det->rp) }}" disabled>
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        <div class="col-md-6">
                                            <label for="inputBirthday">Jumlah ACC</label>
                                            <input class="form-control" type="text" name="birthday"
                                                value="Rp. {{ number_format($det->acc) }}" disabled>
                                        </div>

                                    </div>
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label for="inputUsername">Status</label>
                                        <input class="form-control" type="text" value="{{ $det->status }}" disabled>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </main>
    @endif
@endsection
