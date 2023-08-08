<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Profil extends BaseController
{
    public function index()
    {
        $profil = new UsersModel();
        $data = [
            // 'profil' => $profil->findAll(),
            'profil' => $profil->find(session()->get('id_users')),
            'profil' => $profil->paginate(1, 'users'),
            
        ];
        echo view('profil', $data);
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
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'email' => $this->request->getPost('email'),
            'jabatan' => $this->request->getPost('jabatan'),
            

        ]);

        session()->setFlashdata('pesan', 'profil berhasil diedit');
        return redirect()->to('profil');
    }
}