@extends('layouts.main')

@section('content')

{{-- @section('title', 'Edit Program') --}}

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-baseline">
        <h6 class="m-0 font-weight-bold text-primary">Edit Laporan</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('laporan.update', $item->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
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
                            name="title" value="{{ $item->title }}" autocomplete="title" autofocus
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
                            class="form-control rounded-pill @error('description') is-invalid @enderror"
                            value="{{ old('description') }}" placeholder="Masukkan description">{{ $item->description }}</textarea>
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
                        <label for="file" class="d-block">File</label>
                        <a href="{{asset('file/'.$item->file)}}" class="mb-2"><i class="fa fa-file fa-lg"></i></a>
                        <input id="file" type="file" class="form-control mt-2 @error('file') is-invalid @enderror"
                            name="file" value="{{ old('file') }}" autocomplete="file"
                            placeholder="Masukkan Gambar 1">
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace('editor1');
</script>
@endsection
