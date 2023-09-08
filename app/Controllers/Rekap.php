<?php

namespace App\Controllers;

use App\Models\HarianModel;
use App\Models\MemberModel;
use App\Models\MinumanModel;
use App\Models\RegistrasiModel;

class Rekap extends BaseController
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
        return view('datarekap', $data);
    }

    public function kelasharian()
    {
        $harian = new HarianModel();
        $data = [
            
            'harian' => $harian->countAllResults(),
        ];
        echo view('rekap/rekapkelasharian', $data);
    }

    public function rekapmember()
    {
        $member = new MemberModel();
        $data = [
            
            'member' => $member->countAllResults(),
        ];
        echo view('rekap/rekapmember', $data);
    }

    public function rekapminuman()
    {
        $minuman = new MinumanModel();
        $data = [
            
            'minuman' => $minuman->countAllResults(),
        ];
        echo view('rekap/rekapminuman', $data);
    }

    public function rekapregistrasi()
    {    
        $registrasi = new RegistrasiModel();
        $data = [
            
            'registrasi' => $registrasi->countAllResults(),
        ];
        return view('rekap/rekapregistrasi', $data);
    }
}