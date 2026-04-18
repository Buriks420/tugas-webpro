<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }
        echo view('auth/login');
    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();
        
        $loginInput = $this->request->getVar('username'); // Can be email or username
        $password = $this->request->getVar('password');

        // Check if input is email or username
        $user = $userModel->where('email', $loginInput)
                          ->orWhere('username', $loginInput)
                          ->first();

        if ($user) {
            // Verify password
            // First check if it's a plain text password from the old admin system
            if ($password === $user['password'] || password_verify($password, $user['password'])) {
                $ses_data = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'is_admin' => $user['is_admin'],
                    'avatar' => $user['avatar'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                
                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Password salah');
                return redirect()->to('/auth');
            }
        } else {
            $session->setFlashdata('msg', 'Username atau Email tidak ditemukan');
            return redirect()->to('/auth');
        }
    }

    public function register()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }
        echo view('auth/register');
    }

    public function processRegister()
    {
        $session = session();
        $userModel = new UserModel();

        $rules = [
            'nama_lengkap' => 'required|min_length[3]|max_length[100]',
            'username'     => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'email'        => 'required|valid_email|is_unique[users.email]',
            'password'     => 'required|min_length[6]',
            'pass_confirm' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            $session->setFlashdata('validation', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'username'     => $this->request->getVar('username'),
            'email'        => $this->request->getVar('email'),
            'password'     => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'is_admin'     => 0
        ];

        $userModel->save($data);

        $session->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
        return redirect()->to('/auth');
    }
    
    public function profile()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }
        
        $userModel = new UserModel();
        $data['user'] = $userModel->find(session()->get('id'));
        echo view('auth/profile', $data);
    }
    
    public function updateProfile()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }
        
        $session = session();
        $userModel = new UserModel();
        $id = session()->get('id');

        $rules = [
            'nama_lengkap' => 'required|min_length[3]|max_length[100]',
            'email'        => "required|valid_email|is_unique[users.email,id,{$id}]"
        ];

        // Only validate password if user attempts to change it
        if (!empty($this->request->getVar('password'))) {
            $rules['password'] = 'min_length[6]';
            $rules['pass_confirm'] = 'matches[password]';
        }

        if (!$this->validate($rules)) {
            $session->setFlashdata('validation', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $updateData = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email'        => $this->request->getVar('email')
        ];

        if (!empty($this->request->getVar('password'))) {
            $updateData['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $avatarFile = $this->request->getFile('avatar');
        if ($avatarFile && $avatarFile->isValid() && !$avatarFile->hasMoved()) {
            $newName = $avatarFile->getRandomName();
            $avatarFile->move('uploads/avatars', $newName);
            $updateData['avatar'] = $newName;
        }

        $userModel->update($id, $updateData);
        
        // Fetch fresh user data to update session completely
        $freshUser = $userModel->find($id);
        
        // Update session
        $session->set([
            'email' => $freshUser['email'],
            'nama_lengkap' => $freshUser['nama_lengkap'],
            'avatar' => $freshUser['avatar']
        ]);

        $session->setFlashdata('success', 'Profil berhasil diupdate!');
        return redirect()->to('/auth/profile');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}