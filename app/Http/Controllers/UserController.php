<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $data = [
            'tittle' => 'Create User',
            'kelas' => $kelas
        ];
        return view('user.create', $data);
    }
}