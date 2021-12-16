@extends('layouts.main')

@section('content')
<div class="page-header d-flex justify-content-between mb-2">
    <h3 class="page-title">Laporan</h3>
    <a href="{{ route('laporan.create') }}" class="btn btn-primary"><i class="fa fa-plus"> Tambah Laporan</i></a>

</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow mb-4">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                <strong>
                    <p>{{ $message }}</p>
                </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Revisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($items as $key => $item)
                            <tr>
                                <td style="width: 50px">{{ $key+1 }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <a href="{{ asset('file/'.$item->file) }}" download><i class="fa fa-file"></i></a>
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>{!! $item->revisi !!}</td>
                                <td style="width: 150px">
                                    <div class="text-center">
                                        <a href="{{ route('laporan.edit',$item->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit fa-sm text-white"></i>
                                        </a>
                                        <a
                                            onclick="return confirm('Yakin untuk menghapus laporan {{ $item->title }} ?? ')">
                                            <form action="{{ route('laporan.destroy',$item->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fa fa-fw fa-trash text-white"></i>
                                                </button>
                                            </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2 py-2 border-top d-flex justify-content-center">
                        {{ $items->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- end content --}}
@endsection
