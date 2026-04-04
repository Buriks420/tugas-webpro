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
        $data = [
            'title' => 'Data Penyewa',
            'penyewa' => $this->penyewaModel->findAll()
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