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

        $fotoLainnyaPaths = [];
        if ($files = $this->request->getFiles()) {
            if (isset($files['foto_lainnya'])) {
                foreach($files['foto_lainnya'] as $file) {
                    if ($file->isValid() && ! $file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move('uploads', $newName);
                        $fotoLainnyaPaths[] = $newName;
                    }
                }
            }
        }

        $this->alatModel->save([
            'nama_alat' => $this->request->getVar('nama_alat'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'harga' => $this->request->getVar('harga') ?: 0,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $namaFoto,
            'foto_lainnya' => json_encode($fotoLainnyaPaths),
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
        }
        
        $tags = $this->request->getVar('tags') ? implode(',', $this->request->getVar('tags')) : '';

        $fotoLainnyaPaths = !empty($alatLama['foto_lainnya']) ? json_decode($alatLama['foto_lainnya'], true) : [];
        if ($files = $this->request->getFiles()) {
            if (isset($files['foto_lainnya'])) {
                foreach($files['foto_lainnya'] as $file) {
                    if ($file->isValid() && ! $file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move('uploads', $newName);
                        $fotoLainnyaPaths[] = $newName;
                    }
                }
            }
        }

        $this->alatModel->update($id, [
            'nama_alat' => $this->request->getVar('nama_alat'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'harga' => $this->request->getVar('harga') ?: 0,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $namaFoto,
            'foto_lainnya' => json_encode($fotoLainnyaPaths),
            'tags' => $tags
        ]);
        return redirect()->to('/alat');
    }

    public function deleteFotoLainnya($id, $index)
    {
        $index = (int)$index;
        $alat = $this->alatModel->find($id);
        if ($alat) {
            $fotoLainnya = !empty($alat['foto_lainnya']) ? json_decode($alat['foto_lainnya'], true) : [];
            
            if (array_key_exists($index, $fotoLainnya)) {
                $filename = $fotoLainnya[$index];
                
                if (file_exists('uploads/' . $filename)) {
                    unlink('uploads/' . $filename);
                }
                
                unset($fotoLainnya[$index]);
                $fotoLainnya = array_values($fotoLainnya);
                
                $this->alatModel->update($id, [
                    'foto_lainnya' => json_encode($fotoLainnya)
                ]);
                
                return $this->response->setJSON(['success' => true, 'message' => 'Foto berhasil dihapus.']);
            }
        }
        return $this->response->setJSON(['success' => false, 'message' => 'Foto tidak ditemukan.']);
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