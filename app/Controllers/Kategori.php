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

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Kategori',
            'kategori' => $this->kategoriModel->find($id)
        ];
        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('kategori/edit', $data);
        echo view('layout/footer');
    }

    public function update($id)
    {
        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);
        return redirect()->to('/kategori');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/kategori');
    }

    public function toggleHide($id)
    {
        $kategori = $this->kategoriModel->find($id);
        if ($kategori) {
            $this->kategoriModel->update($id, [
                'is_hidden' => $kategori['is_hidden'] ? 0 : 1
            ]);
        }
        return redirect()->to('/kategori');
    }
}