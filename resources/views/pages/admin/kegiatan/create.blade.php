@extends('layouts.main')

@section('content')

{{-- Content Row  --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-baseline">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Kegiatan</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('kegiatan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror"
                        name="user_id" value="{{ Auth::user()->id }}" autocomplete="user_id" autofocus
                        placeholder="Masukkan user_id">
                        @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input id="tempat_pkl_id" type="text" class="form-control @error('tempat_pkl_id') is-invalid @enderror"
                        name="tempat_pkl_id" value="{{ Auth::user()->profile->tempat_pkl_id }}" autocomplete="tempat_pkl_id" autofocus
                        placeholder="Masukkan tempat_pkl_id">
                        @error('tempat_pkl_id')
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
                        <label for="title">Judul</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                            name="title" value="{{ old('title') }}" autocomplete="title" autofocus
                            placeholder="Masukkan Title">
                        @error('title')
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
                        <label for="description">Keterangan</label>
                        <textarea id="editor1" name="description"
                            class="form-control @error('description') is-invalid @enderror"
                            value="{{ old('description') }}" placeholder="Masukkan description"></textarea>
                        @error('description')
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
                        <label for="image">Gambar</label>
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                            name="image" value="{{ old('image') }}" required autocomplete="image"
                            placeholder="Masukkan image ">
                        @error('image')
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
{{-- end content --}}
<script>
    CKEDITOR.replace('editor1');

</script>
@endsection
