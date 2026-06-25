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
        $users = $userModel->findAll(); 

        $pengguna = [];
        foreach($renters as $r) {
            $pengguna[] = [
                'tipe' => 'Penyewa',
                'type_id' => 'penyewa',
                'id' => $r['id_penyewa'],
                'nama' => $r['nama_penyewa'],
                'kontak' => $r['kontak'],
                'info' => $r['alamat'],
                'is_admin' => null
            ];
        }
        foreach($users as $u) {
            $pengguna[] = [
                'tipe' => 'User Register',
                'type_id' => 'user',
                'id' => $u['id'],
                'nama' => $u['nama_lengkap'],
                'kontak' => $u['email'],
                'info' => 'Username: ' . $u['username'],
                'is_admin' => $u['is_admin']
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

    public function createUser()
    {
        $data = ['title' => 'Tambah Akun User'];
        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view('penyewa/create_user', $data);
        echo view('layout/footer');
    }

    public function storeUser()
    {
        $userModel = new \App\Models\UserModel();
        $userModel->save([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'username'     => $this->request->getVar('username'),
            'email'        => $this->request->getVar('email'),
            'password'     => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'is_admin'     => $this->request->getVar('is_admin')
        ]);
        
        return redirect()->to('/penyewa');
    }

    public function edit($type, $id)
    {
        $data = ['title' => 'Edit Data Pengguna'];
        
        if ($type === 'penyewa') {
            $data['penyewa'] = $this->penyewaModel->find($id);
            if (!$data['penyewa']) return redirect()->to('/penyewa');
            $viewName = 'penyewa/edit_penyewa';
        } else if ($type === 'user') {
            $userModel = new \App\Models\UserModel();
            $data['user'] = $userModel->find($id);
            if (!$data['user']) return redirect()->to('/penyewa');
            $viewName = 'penyewa/edit_user';
        } else {
            return redirect()->to('/penyewa');
        }

        echo view('layout/header', $data);
        echo view('layout/sidebar');
        echo view($viewName, $data);
        echo view('layout/footer');
    }

    public function update($type, $id)
    {
        if ($type === 'penyewa') {
            $this->penyewaModel->update($id, [
                'nama_penyewa' => $this->request->getVar('nama_penyewa'),
                'kontak' => $this->request->getVar('kontak'),
                'alamat' => $this->request->getVar('alamat')
            ]);
        } else if ($type === 'user') {
            $userModel = new \App\Models\UserModel();
            $updateData = [
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email')
            ];
            
            if ($this->request->getVar('is_admin') !== null) {
                $updateData['is_admin'] = $this->request->getVar('is_admin');
            }
            
            $userModel->update($id, $updateData);
        }
        
        return redirect()->to('/penyewa');
    }

    public function delete($type, $id)
    {
        if ($type === 'penyewa') {
            $this->penyewaModel->delete($id);
        } else if ($type === 'user') {
            $userModel = new \App\Models\UserModel();
            $userModel->delete($id);
        }
        
        return redirect()->to('/penyewa');
    }

    public function toggleRole($id)
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($id);
        if ($user) {
            $newRole = $user['is_admin'] ? 0 : 1;
            $userModel->update($id, ['is_admin' => $newRole]);
        }
        return redirect()->to('/penyewa');
    }
}