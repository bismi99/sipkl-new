@extends('layouts.main')

@section('content')
    <div class="page-header d-flex justify-content-between mb-2">
        <h3 class="page-title">Create Users</h3>
        <a href="{{ route('users.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"> Back</i></a>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" />
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Role</label>
                                    <select class="form-control" name="role">
                                        <option value="Admin">Admin</option>
                                        <option value="Pembimbing">Pembimbing</option>
                                        <option value="Siswa">Siswa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="ttl">Tanggal lahir</label>
                                    <input type="date" class="form-control" name="ttl" placeholder="tanggal" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-control" name="jk">
                                        <option value="laki-laki">Laki - laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="nt">No Telp</label>
                                    <input type="number" class="form-control" name="nt" placeholder="No Telp" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Tempat PKL</label>
                                    <select class="form-control" name="tempat_pkl_id">
                                        @foreach ($tempat as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="alamat"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
