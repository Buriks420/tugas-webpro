<?php

namespace App\Controllers;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kategori',
            'kategori' => $this->kategoriModel->findAll()
        ];

        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('kategori/index', $data);
        echo view('layout/footer');
    }

    public function create()
    {
        $data = ['title' => 'Tambah Kategori'];
        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('kategori/create');
        echo view('layout/footer');
    }

    public function store()
    {
        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);
        return redirect()->to('/kategori');
    }
}