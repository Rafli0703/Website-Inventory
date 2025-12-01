@extends('layoutes.main')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Produk</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Data Produk</li>
    </ol>
    

    <div class="card mb-4">
        <div class="card-header">
            <strong>List Produk</strong>
            <a href="{{ route('index.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>

        </div>

        <div class="card-body table-responsive">

            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th width="120px">Foto</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($produk as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->jenis }}</td>
                        <td>{{ number_format($k->harga_jual) }}</td>
                        <td>{{ number_format($k->harga_beli) }}</td>
                        <td>
                            @empty($k->foto)
                                <img src="{{ asset('image/nophoto.jpg') }}"
                                     class="rounded"
                                     style="width: 100px;">
                            @else
                                <img src="{{ asset('image/'.$k->foto) }}"
                                     class="rounded"
                                     style="width: 100px;">
                            @endempty
                        </td>
                        <td>
                            <a href="#" class="btn btn-secondary btn-sm">Show</a>
                            <a href="{{ route('index.edit', $k->id) }}" class="btn btn-sm btn-warning">edit</a>

                            <button class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#hapus{{ $k->id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="hapus{{ $k->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    Yakin ingin menghapus produk <b>{{ $k->nama }}</b>?
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                                    <form action="{{ route('index.destroy', $k->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection
