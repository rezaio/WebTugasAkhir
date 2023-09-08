<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Auth extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $session  = session();
        $model    = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_user'   => $data['id_user'],
                    'username'  => $data['username'],
                    'role'      => $data['role'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
            
            if ($data['role'] == 'user') {
                return redirect()->to('/user'); 
            } else {
                return redirect()->to('/home'); 
            }
            
            } else {
                $session->setFlashdata('msg', 'Password Salah!');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username Tidak Ditemukan');
            return redirect()->to('/login');
        }
    }

    public function add()
    {
        $user = new UsersModel();
        $user->save([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getVar('email'),
            'jabatan' => $this->request->getVar('jabatan'),
            'role' => $this->request->getVar('role'),
        ]);

        session()->setFlashdata('pesan', 'User berhasil ditambahkan');
        return redirect()->to('auth');
    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}