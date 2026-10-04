<div class="table-card">

    <div class="table-header">
        <div>
            <h5>Data Pengguna</h5>
            <p>Daftar pengguna yang tersimpan dalam sistem.</p>
        </div>

        <span class="badge text-bg-light">
            {{ $users->count() }} Data
        </span>
    </div>

    @if ($users->count() > 0)

        <div class="table-responsive">

            <table class="table custom-table">

                <thead>
                    <tr>
                        <th width="90">ID</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Kelas</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($users as $user)

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

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="empty-state">

            <div class="empty-icon">
                U
            </div>

            <h6 class="fw-bold mb-2">
                Belum ada data pengguna
            </h6>

            <p class="mb-3">
                Tambahkan pengguna pertama untuk mulai menggunakan sistem.
            </p>

            <a href="{{ route('user.create') }}" class="btn btn-add-user">
                + Tambah User
            </a>

        </div>

    @endif

</div>