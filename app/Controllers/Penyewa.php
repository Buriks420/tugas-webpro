<?php

namespace App\Controllers;
use App\Models\PenyewaModel;

class Penyewa extends BaseController
{
    protected $penyewaModel;

    public function __construct()
    {
        $this->penyewaModel = new PenyewaModel();
    }

    public function index()
    {
        $userModel = new \App\Models\UserModel();
        $renters = $this->penyewaModel->findAll();
        $users = $userModel->where('is_admin', 0)->findAll();

        $pengguna = [];
        foreach($renters as $r) {
            $pengguna[] = [
                'tipe' => 'Penyewa',
                'id' => $r['id_penyewa'],
                'nama' => $r['nama_penyewa'],
                'kontak' => $r['kontak'],
                'info' => $r['alamat']
            ];
        }
        foreach($users as $u) {
            $pengguna[] = [
                'tipe' => 'User Register',
                'id' => $u['id'],
                'nama' => $u['nama_lengkap'],
                'kontak' => $u['email'],
                'info' => 'Username: ' . $u['username']
            ];
        }

        $data = [
            'title' => 'Data Pengguna',
            'pengguna' => $pengguna
        ];

        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('penyewa/index', $data);
        echo view('layout/footer');
    }

    public function create()
    {
        $data = ['title' => 'Tambah Penyewa'];
        
        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('penyewa/create');
        echo view('layout/footer');
    }

    public function store()
    {
        $this->penyewaModel->save([
            'nama_penyewa' => $this->request->getVar('nama_penyewa'),
            'kontak' => $this->request->getVar('kontak'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        
        return redirect()->to('/penyewa');
    }
}