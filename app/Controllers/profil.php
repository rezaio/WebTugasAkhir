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
            'profil' => $profil->findAll(),
            
        ];
        echo view('profil', $data);
    }
}