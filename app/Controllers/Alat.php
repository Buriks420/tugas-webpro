<?php

namespace App\Controllers;
use App\Models\AlatModel;
use App\Models\KategoriModel;

class Alat extends BaseController
{
    protected $alatModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->alatModel = new AlatModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Alat',
            'alat' => $this->alatModel->getAlatWithKategori()
        ];

        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('alat/index', $data);
        echo view('layout/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Alat',
            'kategori' => $this->kategoriModel->findAll()
        ];

        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('alat/create', $data);
        echo view('layout/footer');
    }

    public function store()
    {
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = $fileFoto->getRandomName();
        $fileFoto->move('uploads', $namaFoto);
        
        $tags = $this->request->getVar('tags') ? implode(',', $this->request->getVar('tags')) : '';

        $this->alatModel->save([
            'nama_alat' => $this->request->getVar('nama_alat'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $namaFoto,
            'tags' => $tags
        ]);

        return redirect()->to('/alat');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Alat',
            'alat' => $this->alatModel->find($id),
            'kategori' => $this->kategoriModel->findAll()
        ];
        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('alat/edit', $data);
        echo view('layout/footer');
    }

    public function update($id)
    {
        $alatLama = $this->alatModel->find($id);
        $fileFoto = $this->request->getFile('foto');
        
        if ($fileFoto->getError() == 4) {
            $namaFoto = $alatLama['foto'];
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads', $namaFoto);
            // Optionally delete old photo: unlink('uploads/' . $alatLama['foto']);
        }
        
        $tags = $this->request->getVar('tags') ? implode(',', $this->request->getVar('tags')) : '';

        $this->alatModel->update($id, [
            'nama_alat' => $this->request->getVar('nama_alat'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $namaFoto,
            'tags' => $tags
        ]);
        return redirect()->to('/alat');
    }

    public function delete($id)
    {
        $this->alatModel->delete($id);
        return redirect()->to('/alat');
    }

    public function toggleHide($id)
    {
        $alat = $this->alatModel->find($id);
        if ($alat) {
            $this->alatModel->update($id, [
                'is_hidden' => $alat['is_hidden'] ? 0 : 1
            ]);
        }
        return redirect()->to('/alat');
    }
}