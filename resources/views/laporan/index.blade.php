@extends('layouts.backend')

@section('content')
    @if (auth()->user()->role == 'Admin')
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Laporan Data Masjid</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Laporan</li>
                    <li class="breadcrumb-item">Hibah</li>
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
                {{-- Filter --}}
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Cetak Laporan Filter - Harian - Bulan - Tahun</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-row mt-4">
                            <div class="col-6 col-sm-6">
                                <label>Tanggal Awal </label>
                                <input class=" form-control" min="2022-01-01" name="start" id="start"
                                    type="date" />
                            </div>
                            <div class="col-6 col-sm-6">
                                <label>Tanggal Akhir</label>
                                <input class=" form-control" min="2022-01-01" name="end" id="end"
                                    type="date" />
                            </div>
                        </div>
                        {{-- Tanggal --}}
                        <div class="input-group" style="margin-top: 10px">
                            <a href="#"
                                onclick="this.href='/laporan/masjid/'+document.getElementById('start').value +
                            '/' + document.getElementById('end').value"
                                target="_blank" class="btn btn-primary">Cetak
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif


@endsection
