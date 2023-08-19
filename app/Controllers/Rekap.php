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
        // helper(['form']);
        echo view('rekap/rekapkelasharian', $data);
    }

    public function rekapkunjungan()
    {
        $member = new MemberModel();
        $data = [
            
            'member' => $member->countAllResults(),
        ];
        // helper(['form']);
        echo view('rekap/rekapkunjungan', $data);
    }

    public function rekapminuman()
    {
        $minuman = new MinumanModel();
        $data = [
            
            'minuman' => $minuman->countAllResults(),
        ];
        // helper(['form']);
        echo view('rekap/rekapminuman', $data);
    }

    public function rekapregistrasi()
    {    
        $registrasi = new RegistrasiModel();
        $data = [
            
            'registrasi' => $registrasi->countAllResults(),
        ];
        // helper(['form']);
        return view('rekap/rekapregistrasi', $data);
    }
}