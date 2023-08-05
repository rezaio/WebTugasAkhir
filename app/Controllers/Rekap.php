<?php

namespace App\Controllers;

use App\Models\RekapModel;

class Rekap extends BaseController
{
    public function index()
    {
        $rekap = new RekapModel();
        $data = [
            // 'rekap' => $rekap->findAll(),
            'rekap' => $rekap->findAll(),
            
        ];
        echo view('datarekap', $data);
    }
}