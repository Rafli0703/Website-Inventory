    @extends('layoutes.main')

@section('content')

<div class="container-fluid px-4">

    <h1 class="mt-4">Edit Produk</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit Data Produk</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <strong>Form Edit Produk</strong>
        </div>

        <div class="card-body">

            <form action="{{ route('index.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Nama Produk</label>
                        <input type="text" name="nama" value="{{ $produk->nama }}" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label>Jenis Produk</label>
                        <input type="text" name="jenis" value="{{ $produk->jenis }}" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Harga Jual</label>
                        <input type="number" name="harga_jual" value="{{ $produk->harga_jual }}" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label>Harga Beli</label>
                        <input type="number" name="harga_beli" value="{{ $produk->harga_beli }}" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ $produk->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Foto Produk</label><br>

                    @if ($produk->foto)
                        <img src="{{ asset('image/' . $produk->foto) }}" class="rounded mb-2" style="width: 120px;">
                    @endif

                    <input type="file" name="foto" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>

            </form>

        </div>
    </div>
</div>

@endsection
