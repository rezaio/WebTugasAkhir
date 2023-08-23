<?php

namespace App\Controllers;

use App\Models\HarianModel;
use App\Models\MemberModel;
use App\Models\MinumanModel;
use App\Models\RegistrasiModel;
use Dompdf\Dompdf;


class PdfController extends BaseController
{
    // rekap harian 
    public function rekapHariantgl($tanggal)
    {

        $filename = date('y-m-d', strtotime($tanggal)) . '-rekapan-harian';
        $dompdf = new Dompdf();
        $harian = new HarianModel();

        $data = [
            'data' => $harian->where('tanggal', $tanggal)->findAll(),
        ];

        $dompdf->loadHtml(view('pdf/pdf_harian', array_merge($data, ['tanggal' => $tanggal])));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
    }

    public function rekapHarianmingggu()
    {
        $filename = date('y-m-d') . '-rekapan harian';
        $dompdf = new Dompdf();
        $harian = new HarianModel();

            $data = [
                'data'  => $harian->findAll(),
            ];

        $dompdf->loadHtml(view('pdf/pdf_harian', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
    }

    public function rekapHarianBulan($selectedMonth)
{
    $filename = date('y-m') . '-rekapan-harian perbulan';
    $dompdf = new Dompdf();
    $harian = new HarianModel();

    $data = [
        'data' => $harian->where('MONTH(tanggal)', $selectedMonth)->findAll(),
    ];

    $dompdf->loadHtml(view('pdf/pdf_harian', $data));
    $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
    $dompdf->render();
    $dompdf->stream($filename);
    exit();
}

public function rekapHarianBln()
{
    $selectedMonth = $this->request->getVar('tanggal');
    $this->rekapHarianBulan($selectedMonth);
}


    // rekap minuman 
    public function rekapMinuman()
    {
        $filename = date('y-m-d-H-i-s') . '-rekapan minuman';
        $dompdf = new Dompdf();
        $minuman = new MinumanModel();

            $data = [
                'data'  => $minuman->findAll(),
            ];

        $dompdf->loadHtml(view('pdf/pdf_minuman', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
    }


    // rekap registrasi
    public function rekapRegistrasi()
    {
        $filename = date('y-m-d-H-i-s') . '-rekapan regitrasi';
        $dompdf = new Dompdf();
        $registrasi = new RegistrasiModel();

            $data = [
                'data'  => $registrasi->findAll(),
            ];

        $dompdf->loadHtml(view('pdf/pdf_registrasi', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
    }


    // rekap member
    public function rekapMember()
    {
        $filename = date('y-m-d-H-i-s') . '-rekapan member';
        $dompdf = new Dompdf();
        $member = new MemberModel();

            $data = [
                'data'  => $member->findAll(),
            ];

        $dompdf->loadHtml(view('pdf/pdf_member', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
    }
}