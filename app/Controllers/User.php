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
            'harian' => $harian->findAll(),

        ];
        echo view('user/dataharian', $data);
    }

    public function minuman()
    {
        $minuman = new MinumanModel();
        $data = [
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
        echo view('user/rekap/rekapkelasharian', $data);
    }

    public function rekapmember()
    {
        $member = new MemberModel();
        $data = [
            
            'member' => $member->countAllResults(),
        ];
        echo view('user/rekap/rekapmember', $data);
    }

    public function rekapminuman()
    {
        $minuman = new MinumanModel();
        $data = [
            
            'minuman' => $minuman->countAllResults(),
        ];
        echo view('user/rekap/rekapminuman', $data);
    }

    public function rekapregistrasi()
    {    
        $registrasi = new RegistrasiModel();
        $data = [
            
            'registrasi' => $registrasi->countAllResults(),
        ];
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

}