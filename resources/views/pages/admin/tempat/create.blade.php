@extends('layouts.main')

@section('content')

{{-- Content Row  --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-baseline">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Tempat</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('tempat.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                            name="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus
                            placeholder="Masukkan nama">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="nt">No Telp</label>
                        <input id="nt" type="number" class="form-control @error('nt') is-invalid @enderror"
                            name="nt" value="{{ old('nt') }}" autocomplete="nt" autofocus
                            placeholder="Masukkan nt">
                        @error('nt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                            name="alamat" autocomplete="alamat" autofocus
                            placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row mt-5">
                <div class="col">
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
