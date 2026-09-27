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

        return redirect()->route('user.index');
    }
}
