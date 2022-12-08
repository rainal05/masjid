@extends('layouts.backend')

@section('content')

    @if (auth()->user()->role == '0')
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">ACC</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Data Masjid</li>
                    <li class="breadcrumb-item ">ACC</li>
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
                                        {{-- <th width="8%">ACC</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($acc as $item)
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
                                            {{-- <td nowrap>
                                        <a href="/data/masjid/acc/{{$item->id}}/" class="btn btn-success btn-sm">
                                            <i class="fa fa-info-circle"></i> ACC
                                        </a>
                                    </td> --}}
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
