<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->getUser();

        return view('list_user', compact('users'));
    }

    public function create()
    {
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();

        return view('create_user', [
            'title' => 'Create User',
            'kelas' => $kelas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'npm' => ['required', 'string', 'max:50'],
            'kelas_id' => ['required', 'integer', 'exists:kelas,id'],
        ]);

        UserModel::create([
            'nama' => $request->nama,
            'nim' => $request->npm,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index')
            ->with('success', 'Pengguna baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = UserModel::find($id);

        if (!$user) {
            return redirect()->route('user.index')
                ->with('error', 'Data pengguna tidak ditemukan.');
        }

        return view('edit_user', [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => (new Kelas())->getKelas(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'npm' => ['required', 'string', 'max:50'],
            'kelas_id' => ['required', 'integer', 'exists:kelas,id'],
        ]);

        $user = UserModel::find($id);

        if (!$user) {
            return redirect()->route('user.index')
                ->with('error', 'Data pengguna tidak ditemukan, update dibatalkan.');
        }

        $user->update([
            'nama' => $request->nama,
            'nim' => $request->npm,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index')
            ->with('success', 'Data ' . $user->nama . ' berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = UserModel::find($id);

        if (!$user) {
            return redirect()->route('user.index')
                ->with('error', 'Data pengguna tidak ditemukan atau sudah terhapus.');
        }

        $nama = $user->nama;
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Data ' . $nama . ' berhasil dihapus!');
    }
}
