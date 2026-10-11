@extends('layouts.app')

@section('content')

<div class="container page-content">

    <div class="page-heading text-center">
        <div class="eyebrow">User Management</div>

        <h1>Edit Pengguna</h1>

        <p>
            Perbarui informasi pengguna dan kelasnya.
        </p>
    </div>


    <div class="form-card">

        <form action="{{ route('user.update', $user->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama" class="form-label">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    class="form-control @error('nama') is-invalid @enderror"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    value="{{ old('nama', $user->nama) }}"
                    required
                >

                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-4">
                <label for="npm" class="form-label">
                    NPM
                </label>

                <input
                    type="text"
                    class="form-control @error('npm') is-invalid @enderror"
                    id="npm"
                    name="npm"
                    placeholder="Contoh: 2417052020"
                    value="{{ old('npm', $user->nim) }}"
                    required
                >

                @error('npm')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-4">
                <label for="kelas_id" class="form-label">
                    Kelas
                </label>

                <select
                    name="kelas_id"
                    id="kelas_id"
                    class="form-select @error('kelas_id') is-invalid @enderror"
                    required
                >
                    <option value="">
                        -- Pilih Kelas --
                    </option>

                    @foreach ($kelas as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('kelas_id', $user->kelas_id) == $item->id ? 'selected' : '' }}
                        >
                            {{ $item->nama_kelas }}
                        </option>

                    @endforeach

                </select>

                @error('kelas_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
