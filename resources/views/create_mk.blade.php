@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Mata Kuliah</h1>
        <form action="{{ route('matakuliah.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_mk">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="nama_mk" name="nama_mk" required><br><br>
            </div>
            <div class="form-group">
                <label for="sks">SKS</label>
                <input type="number" class="form-control" id="sks" name="sks" required><br><br>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection