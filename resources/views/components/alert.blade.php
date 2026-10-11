{{-- Notifikasi flash (sukses / error) + error validasi --}}
@if (session('success') || session('error') || $errors->any())
    <div class="container pt-4" id="flash-area">

        @if (session('success'))
            <div class="alert alert-flash alert-flash-success alert-dismissible fade show" role="alert">
                <span class="alert-flash-icon">✓</span>
                <div class="flex-grow-1">
                    <strong>Berhasil!</strong> {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-flash alert-flash-error alert-dismissible fade show" role="alert">
                <span class="alert-flash-icon">!</span>
                <div class="flex-grow-1">
                    <strong>Gagal!</strong> {{ session('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-flash alert-flash-error alert-dismissible fade show" role="alert">
                <span class="alert-flash-icon">!</span>
                <div class="flex-grow-1">
                    <strong>Periksa kembali isian kamu:</strong>
                    <ul class="mb-0 mt-1 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

    </div>
@endif
