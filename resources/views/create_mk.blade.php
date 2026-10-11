@extends('layouts.app')

@section('content')

<div class="container page-content">

    <div class="page-heading text-center">
        <div class="eyebrow">Mata Kuliah</div>

        <h1>Tambah Mata Kuliah</h1>

        <p>
            Masukkan nama mata kuliah dan jumlah SKS.
        </p>
    </div>


    <div class="form-card">

        <form action="{{ route('matakuliah.store') }}" method="POST">

            @csrf

            <div class="mb-4">
                <label for="nama_mk" class="form-label">
                    Nama Mata Kuliah
                </label>

                <input
                    type="text"
                    class="form-control"
                    id="nama_mk"
                    name="nama_mk"
                    placeholder="Contoh: Pemrograman Web Lanjut"
                    value="{{ old('nama_mk') }}"
                    required
                >
            </div>


            <div class="mb-4">
                <label for="sks" class="form-label">
                    SKS
                </label>

                <input
                    type="number"
                    class="form-control"
                    id="sks"
                    name="sks"
                    min="1"
                    max="6"
                    placeholder="Contoh: 3"
                    value="{{ old('sks') }}"
                    required
                >
            </div>


            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('matakuliah.index') }}"
                    class="btn btn-light border"
                >
                    Batal
                </a>

                <button type="submit" class="btn btn-add-user">
                    Simpan Mata Kuliah
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
