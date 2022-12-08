@extends('layouts.backend')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Form Acc</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Masjid</li>
            <li class="breadcrumb-item ">{{$acc->nama}}</li>
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
                <form action="/data/masjid/acc/{{$acc->id}}/update" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row mt-4">
                        <div class="col-6 col-sm-6">
                            <label for="inputEmailAddress">Jumlah Pengajuan</label>
                            <input type="text" value="{{$acc->rp}}" disabled class="form-control">
                        </div>
                        <div class="col-6 col-sm-6">
                            <label for="inputEmailAddress">Jumlah ACC</label>
                            <input type="number" min="1" name="acc" value="{{$acc->email}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-row mt-4">
                        <div class="col-12 col-sm-12">
                            <label for="inputPassword">Status</label>
                            <select name="status" class="multisteps-form__select form-control">
                                {{-- <option value="">-- PILIH --</option> --}}
                                    <option value="ACC">ACC</option>
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
