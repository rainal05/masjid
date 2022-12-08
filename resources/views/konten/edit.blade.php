@extends('layouts.backend')

@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit Data Konten</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <a href="{{ url('/data/konten', []) }}"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('/data/konten', []) }}">Data Konten</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <form action="/data/konten/{{ $masuk->id }}/update" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row mt-4">
                            <div class="col-12 col-sm-12">
                                <label for="inputPassword">Pilih Data Masjid</label>
                                <select name="masjid_id" class="multisteps-form__select form-control">
                                    <option value="">-- PILIH --</option>
                                    @foreach ($masjid as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
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
