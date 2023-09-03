<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Profil extends BaseController
{
    public function index()
    {
        $profil = new UsersModel();
        $data =  $profil->find(session()->get('id_user'));
        echo view('profil', $data);
        
    }


    public function add()
    {
        echo view('tambahuser');

    }

    public function save()
    {

        $profil  = new UsersModel();
        $profil->save([
            'id_user' => $this->request->getPost('id_user'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getVar('email'),
            'jabatan' => $this->request->getVar('jabatan'),
            'role' => $this->request->getPost('role')
        ]);

        session()->setFlashdata('pesan', ' User berhasil ditambahkan');
        return redirect()->to('profil');
    }

    public function edit($id)
    {
        $profil = new UsersModel();
        $data = [
            'profil' => $profil->find($id),
            
        ];
        return view('editprofil', $data);
    }

    public function update()
    {
        $profil = new UsersModel();
        $data = $profil->find($this->request->getVar('id_user'));
        $profil->replace([

            'id_user' => $this->request->getPost('id_user'),    
            'username' => $this->request->getVar('username') ? $this->request->getVar('username') : $data['username'],
            'password' => empty($this->request->getVar('password')) ? $data['password'] : password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getVar('email') ? $this->request->getVar('email') : $data['email'],
            'jabatan' => $this->request->getVar('jabatan') ? $this->request->getVar('jabatan') : $data['jabatan'],

        ]);

        session()->setFlashdata('pesan', 'profil berhasil diedit');
        return redirect()->to('profil');
    }
}