<?php

namespace App\Controllers;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function index()
    {
        echo view('auth/login');
    }

    public function login()
    {
        $session = session();
        $adminModel = new AdminModel();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $adminModel->where('username', $username)->first();

        if ($data) {
            if ($password === $data['password']) {
                $ses_data = [
                    'id_admin' => $data['id_admin'],
                    'username' => $data['username'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password salah');
                return redirect()->to('/auth');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan');
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth');
    }
}