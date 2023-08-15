<?php

namespace App\Controllers;

use App\Models\HarianModel;
use App\Models\MemberModel;
use App\Models\MinumanModel;
use App\Models\RegistrasiModel;

class Home extends BaseController
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
        return view('home', $data);
    }

    public function statistic()
    {
        function bulan($a) {
            $visitor = new RegistrasiModel();
            $bulan = $visitor->where('MONTH(tgl_aktivasi)', $a)->where('YEAR(tgl_aktivasi)', date('Y'))->countAllResults();
            return $bulan;
        };
        $month = array(bulan(1), bulan(2), bulan(3), bulan(4), bulan(5), bulan(6), bulan(7), bulan(8), bulan(9), bulan(10), bulan(11), bulan(12));
        return print_r(json_encode(array_values($month)));
    }
}
