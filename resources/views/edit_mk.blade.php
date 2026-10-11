@extends('layouts.app')

@section('content')

<div class="container page-content">

    <div class="page-heading text-center">
        <div class="eyebrow">Mata Kuliah</div>

        <h1>Edit Mata Kuliah</h1>

        <p>
            Perbarui nama mata kuliah dan jumlah SKS.
        </p>
    </div>


    <div class="form-card">

        <form action="{{ route('matakuliah.update', $mk->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_mk" class="form-label">
                    Nama Mata Kuliah
                </label>

                <input
                    type="text"
                    class="form-control @error('nama_mk') is-invalid @enderror"
                    id="nama_mk"
                    name="nama_mk"
                    value="{{ old('nama_mk', $mk->nama_mk) }}"
                    required
                >

                @error('nama_mk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-4">
                <label for="sks" class="form-label">
                    SKS
                </label>

                <input
                    type="number"
                    class="form-control @error('sks') is-invalid @enderror"
                    id="sks"
                    name="sks"
                    min="1"
                    max="6"
                    value="{{ old('sks', $mk->sks) }}"
                    required
                >

                @error('sks')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('matakuliah.index') }}"
                    class="btn btn-light border"
                >
                    Batal
                </a>

                <button type="submit" class="btn btn-add-user">
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
