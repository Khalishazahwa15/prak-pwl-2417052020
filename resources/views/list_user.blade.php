@extends('layouts.app')

@section('content')

<div class="container page-content">

    {{-- Heading --}}
    <div class="page-heading">
        <div class="eyebrow">User Management</div>

        <h1>Daftar Pengguna</h1>

        <p>
            Kelola data pengguna dan informasi kelas dengan mudah.
        </p>
    </div>


    {{-- Statistik --}}
    <div class="row g-3">

        <div class="col-md-4">
            <div class="stat-card">

                <div class="stat-icon people">
                    ♙
                </div>

                <div class="stat-label">
                    Total Pengguna
                </div>

                <div class="stat-value">
                    {{ $users->count() }}
                </div>

            </div>
        </div>


        <div class="col-md-4">
            <div class="stat-card">

                <div class="stat-icon active">
                    ✓
                </div>

                <div class="stat-label">
                    Data Aktif
                </div>

                <div class="stat-value">
                    {{ $users->count() }}
                </div>

            </div>
        </div>


        <div class="col-md-4">
            <div class="stat-card">

                <div class="stat-icon online">
                    •
                </div>

                <div class="stat-label">
                    Status Sistem
                </div>

                <div class="stat-value">
                    Online
                </div>

            </div>
        </div>

    </div>


    {{-- Data Pengguna --}}
    <div class="data-section">

        <div class="d-flex justify-content-between align-items-end data-heading">

            <div>
                <h4>Data Pengguna</h4>

                <p>
                    Daftar pengguna yang tersimpan dalam sistem.
                </p>
            </div>

            <div class="d-flex align-items-center gap-3">
                <span class="data-count">
                    {{ $users->count() }} Data
                </span>

                <a href="{{ route('user.create') }}" class="btn-add-user">
                    + Tambah User
                </a>
            </div>
        </div>


        <div class="table-card">

            <div class="table-responsive">

                <table class="table custom-table">

                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Kelas</th>
                            <th width="20%" class="text-end">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($users as $user)

                            <tr>

                                <td>
                                    <span class="user-number" title="{{ $user->id }}">
                                        {{ \Illuminate\Support\Str::limit($user->id, 8, '…') }}
                                    </span>
                                </td>

                                <td>
                                    <span class="user-name">
                                        {{ $user->nama }}
                                    </span>
                                </td>

                                <td>
                                    <span class="npm-text">
                                        {{ $user->nim }}
                                    </span>
                                </td>

                                <td>
                                    <span class="class-badge">
                                        {{ $user->nama_kelas ?? '-' }}
                                    </span>
                                </td>

                                <td class="text-end">
                                    <div class="action-group">

                                        <a href="{{ route('user.edit', $user->id) }}" class="btn-action btn-edit">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('user.destroy', $user->id) }}"
                                            method="POST"
                                            data-confirm="Data {{ $user->nama }} akan dihapus permanen dari database."
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-action btn-delete">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    Belum ada data pengguna.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection