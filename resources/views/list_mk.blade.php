@extends('layouts.app')

@section('content')

<div class="container page-content">

    {{-- Heading --}}
    <div class="page-heading">
        <div class="eyebrow">Mata Kuliah</div>

        <h1>Daftar Mata Kuliah</h1>

        <p>
            Kelola data mata kuliah beserta jumlah SKS dengan mudah.
        </p>
    </div>


    {{-- Statistik --}}
    <div class="row g-3">

        <div class="col-md-4">
            <div class="stat-card">

                <div class="stat-icon people">
                    ≡
                </div>

                <div class="stat-label">
                    Total Mata Kuliah
                </div>

                <div class="stat-value">
                    {{ $mks->count() }}
                </div>

            </div>
        </div>


        <div class="col-md-4">
            <div class="stat-card">

                <div class="stat-icon active">
                    ✓
                </div>

                <div class="stat-label">
                    Total SKS
                </div>

                <div class="stat-value">
                    {{ $mks->sum('sks') }}
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


    {{-- Data Mata Kuliah --}}
    <div class="data-section">

        <div class="d-flex justify-content-between align-items-end data-heading">

            <div>
                <h4>Data Mata Kuliah</h4>

                <p>
                    Daftar mata kuliah yang tersimpan dalam sistem.
                </p>
            </div>

            <div class="d-flex align-items-center gap-3">
                <span class="data-count">
                    {{ $mks->count() }} Data
                </span>

                <a href="{{ route('matakuliah.create') }}" class="btn-add-user">
                    + Tambah Mata Kuliah
                </a>
            </div>

        </div>


        <div class="table-card">

            <div class="table-responsive">

                <table class="table custom-table">

                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th width="20%" class="text-end">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($mks as $mk)

                            <tr>

                                <td>
                                    <span class="user-number" title="{{ $mk->id }}">
                                        {{ \Illuminate\Support\Str::limit($mk->id, 8, '…') }}
                                    </span>
                                </td>

                                <td>
                                    <span class="user-name">
                                        {{ $mk->nama_mk }}
                                    </span>
                                </td>

                                <td>
                                    <span class="class-badge">
                                        {{ $mk->sks }} SKS
                                    </span>
                                </td>

                                <td class="text-end">
                                    <div class="action-group">

                                        <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn-action btn-edit">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('matakuliah.destroy', $mk->id) }}"
                                            method="POST"
                                            data-confirm="Data mata kuliah {{ $mk->nama_mk }} akan dihapus permanen dari database."
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
                                <td colspan="4" class="text-center py-5">
                                    Belum ada data mata kuliah.
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
