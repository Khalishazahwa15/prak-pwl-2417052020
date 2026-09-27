@extends('layouts.app')

@section('content')

<div class="container page-content">

    <div class="page-heading text-center">
        <div class="eyebrow">User Management</div>

        <h1>Tambah Pengguna</h1>

        <p>
            Masukkan informasi pengguna dan pilih kelas yang sesuai.
        </p>
    </div>


    <div class="form-card">

        <form action="{{ route('user.store') }}" method="POST">

            @csrf

            <div class="mb-4">
                <label for="nama" class="form-label">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    class="form-control"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    value="{{ old('nama') }}"
                    required
                >
            </div>


            <div class="mb-4">
                <label for="npm" class="form-label">
                    NPM
                </label>

                <input
                    type="text"
                    class="form-control"
                    id="npm"
                    name="npm"
                    placeholder="Contoh: 2417052020"
                    value="{{ old('npm') }}"
                    required
                >
            </div>


            <div class="mb-4">
                <label for="kelas_id" class="form-label">
                    Kelas
                </label>

                <select
                    name="kelas_id"
                    id="kelas_id"
                    class="form-select"
                    required
                >
                    <option value="">
                        -- Pilih Kelas --
                    </option>

                    @foreach ($kelas as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('kelas_id') == $item->id ? 'selected' : '' }}
                        >
                            {{ $item->nama_kelas }}
                        </option>

                    @endforeach

                </select>
            </div>


            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('user.index') }}"
                    class="btn btn-light border"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-add-user"
                >
                    Simpan User
                </button>

            </div>

        </form>

    </div>

</div>

@endsection