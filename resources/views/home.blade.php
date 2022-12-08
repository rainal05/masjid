@extends('layouts.backend')

@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">BERANDA</h1>
            <ol class="breadcrumb mb-4">
                {{-- <li class="breadcrumb-item active"> --}}
                {{-- <a href="{{url('/stoks/mobil',[])}}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a></li> --}}
                <li class="breadcrumb-item">Beranda</li>
            </ol>
            @if (\Session::has('notif'))
                <div class="alert alert-primary" align="center">
                    {!! \Session::get('notif') !!}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">

                                @if (auth()->user()->role == 'Admin')
                                    <div class="row">
                                        <!-- Transaksi hari ini -->
                                        <div class="col-xl-4 col-md-6 mb-4">
                                            <div class="card border-left-info shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div
                                                                class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                                Di Setujui
                                                            </div>
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                                        {!! json_encode($acc) !!}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-check fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- BB -->
                                        <div class="col-xl-4 col-md-6 mb-4">
                                            <div class="card border-left-info shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div
                                                                class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                                Belum Disetujui
                                                            </div>
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                                        {!! json_encode($blm) !!} </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-times fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endif

                                @if (auth()->user()->role == 'mobil')
                                    <div class="row">
                                        <!-- Tunai -->
                                        <div class="col-xl-4 col-md-6 mb-4">
                                            <div class="card border-left-info shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div
                                                                class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                                {!! json_encode($lunas) !!} Transaksi
                                                            </div>
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                                        Rp. {{ number_format($total) }} </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-dolly-flatbed fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- BB -->
                                        <div class="col-xl-4 col-md-6 mb-4">
                                            <div class="card border-left-info shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div
                                                                class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                                {!! json_encode($bb) !!} BB
                                                            </div>
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                                        Rp. {{ number_format($tobb) }} </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Hutang -->
                                        <div class="col-xl-4 col-md-6 mb-4">
                                            <div class="card border-left-warning shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div
                                                                class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                                {!! json_encode($hutang) !!} Hutang</div>
                                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                                                {{ number_format($non) }}</div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
