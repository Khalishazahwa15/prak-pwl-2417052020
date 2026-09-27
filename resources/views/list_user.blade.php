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

            <span class="data-count">
                {{ $users->count() }} Data
            </span>

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
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($users as $user)

                            <tr>

                                <td>
                                    <span class="user-number">
                                        {{ $user->id }}
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
                                        {{ $user->nama_kelas }}
                                    </span>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="text-center py-5">
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