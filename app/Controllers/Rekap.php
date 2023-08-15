<?php

namespace App\Controllers;

class Rekap extends BaseController
{
    public function index()
    {
        return view('datarekap');
    }

    public function kelasharian()
    {
        // helper(['form']);
        echo view('rekap/rekapkelasharian');
    }

    public function rekapkunjungan()
    {
        // helper(['form']);
        echo view('rekap/rekapkunjungan');
    }

    public function rekapminuman()
    {
        // helper(['form']);
        echo view('rekap/rekapminuman');
    }

    public function rekapregistrasi()
    {
        // helper(['form']);
        return view('rekap/rekapregistrasi');
    }
}