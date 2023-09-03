<?php

namespace App\Controllers;

use App\Models\HarianModel;
use App\Models\MemberModel;
use App\Models\MinumanModel;
use App\Models\RegistrasiModel;
use App\Models\UsersModel;

class User extends BaseController
{
    public function index()
    {
        $minuman = new MinumanModel();
        $harian = new HarianModel();
        $member = new MemberModel();
        $registrasi = new RegistrasiModel();

        $data = [
            'minuman' => $minuman->countAllResults(),
            'harian' => $harian->countAllResults(),
            'member' => $member->countAllResults(),
            'registrasi' => $registrasi->countAllResults(),


        ];
        return view('user/home', $data);
    }

    public function registrasi()
    {
        $registrasi = new RegistrasiModel();
        $data = [
            // 'registrasi' => $registrasi->findAll(),
            'registrasi' => $registrasi->findAll(),
            
        ];
        echo view('user/dataregistrasi', $data);
    }

    public function member()
    {
        $member = new MemberModel();
        $data = [
            
            'member' => $member->join('registrasi','registrasi.id_registrasi=kunjungan_member.id_registrasi')->findAll(),
            
        ];
        echo view('user/datamember', $data);
    }

    public function harian()
    {
        $harian = new HarianModel();
        $data = [
            // 'harian' => $harian->findAll(),
            'harian' => $harian->findAll(),
            // 'harian' => $harian->paginate(4, 'harian'),

        ];
        echo view('user/dataharian', $data);
    }

    public function minuman()
    {
        $minuman = new MinumanModel();
        $data = [
            // 'minuman' => $minuman->findAll(),
            'minuman' => $minuman->findAll(),
            'pager' => $minuman->pager
            
        ];
        echo view('user/dataminuman', $data);
    }

    public function rekap()
    {
        $minuman = new MinumanModel();
        $harian = new HarianModel();
        $member = new MemberModel();
        $registrasi = new RegistrasiModel();

        $data = [
            'minuman' => $minuman->countAllResults(),
            'harian' => $harian->countAllResults(),
            'member' => $member->countAllResults(),
            'registrasi' => $registrasi->countAllResults(),

        ];    
        return view('user/datarekap', $data);
    }

    public function kelasharian()
    {
        $harian = new HarianModel();
        $data = [
            
            'harian' => $harian->countAllResults(),
        ];
        // helper(['form']);
        echo view('user/rekap/rekapkelasharian', $data);
    }

    public function rekapmember()
    {
        $member = new MemberModel();
        $data = [
            
            'member' => $member->countAllResults(),
        ];
        // helper(['form']);
        echo view('user/rekap/rekapmember', $data);
    }

    public function rekapminuman()
    {
        $minuman = new MinumanModel();
        $data = [
            
            'minuman' => $minuman->countAllResults(),
        ];
        // helper(['form']);
        echo view('user/rekap/rekapminuman', $data);
    }

    public function rekapregistrasi()
    {    
        $registrasi = new RegistrasiModel();
        $data = [
            
            'registrasi' => $registrasi->countAllResults(),
        ];
        // helper(['form']);
        return view('user/rekap/rekapregistrasi', $data);
    }

    public function profil()
    {
        $profil = new UsersModel();
        $data =  $profil->find(session()->get('id_user'));

        echo view('user/profil', $data);
        
    }

    public function editprofil($id)
    {
        $profil = new UsersModel();
        $data = [
            'profil' => $profil->find($id),
            
        ];
        return view('user/editprofil', $data);
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
        return redirect()->to('user/profil');
    }

}