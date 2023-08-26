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
    public function rekapHariantanggal($tanggal)
    {

        $filename = date('y-m-d') . '-rekapan-harian';
        $dompdf = new Dompdf();
        $harian = new HarianModel();

        $data = [
            'data' => $harian->where('tanggal', date("Y-m-d",strtotime($tanggal )))->findAll(),
        ];

        $dompdf->loadHtml(view('pdf/pdf_harian', array_merge($data, ['tanggal' => $tanggal])));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
        $dompdf->render();
        $dompdf->stream($filename); 
        exit();
    }
    public function rekapHariantgl()
    {
        $tanggal = $this->request->getVar('tanggal');
    
        $this->rekapHariantanggal($tanggal);
    }

    
    public function rekapHarianminggu()
    {
        $tanggala = $this->request->getVar('tanggal_awal'); 
        $tanggalb = $this->request->getVar('tanggal_akhir');    

        $filename = date('y-m-d') . '-rekapan harian per minggu';
        $dompdf = new Dompdf();
        $harianModel = new HarianModel();
    
        $data = [
            'data' => $harianModel->where('tanggal >=', $tanggala)->where('tanggal <=', $tanggalb)->findAll(),
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
        'data' => $harian->where('MONTH(tanggal)', date("n", strtotime($selectedMonth)))->findAll(),
        'selectedMonth' => $selectedMonth,
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
    public function rekapMinumantanggal($tanggal)
    {
        $filename = date('y-m-d') . '-rekapan minuman';
        $dompdf = new Dompdf();
        $minuman = new MinumanModel();

        $data = [
            'data' => $minuman->where('tanggal', date("Y-m-d",strtotime($tanggal )))->findAll(),
        ];

        $dompdf->loadHtml(view('pdf/pdf_minuman', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
    }

    public function rekapMinumantgl()
    {
        $tanggal = $this->request->getVar('tanggal');
        $this->rekapMinumantanggal($tanggal);
    }

    public function rekapMinumanmingggu()
    {
        $filename = date('y-m-d') . '-rekapan minuman per minggu';
        $dompdf = new Dompdf();
        $minuman = new MinumanModel();

        $tanggala = date('Y-m-d', strtotime('tanggal_awal')); // Tanggal awal minggu
        $tanggalb = date('Y-m-d', strtotime('tanggal_akhir'));   // Tanggal akhir minggu

          
        $data = [
            'data' => $minuman->where('tanggal >=', $tanggala)->where('tanggal <=', $tanggalb)->findAll(),
        ];

        $dompdf->loadHtml(view('pdf/pdf_minuman', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
    }

        public function rekapMinumanBulan($selectedMonth)
    {
        
        $filename = date('y-m') . '-rekapan-minuman perbulan';
        $dompdf = new Dompdf();
        $minuman = new MinumanModel();

        $data = [
            'data' => $minuman->where('MONTH(tanggal)', date("n", strtotime($selectedMonth)))->findAll(),
            'selectedMonth' => $selectedMonth,
        ];

        $dompdf->loadHtml(view('pdf/pdf_minuman', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
        
    }

    public function rekapMinumanBln()
    {
        $selectedMonth = $this->request->getVar('tanggal');
        $this->rekapMinumanBulan($selectedMonth);
    }


    // rekap registrasi
    public function rekapRegistrasitanggal($tanggal)
    {
        $filename = date('y-m-d') . '-rekapan registrasi';
        $dompdf = new Dompdf();
        $registrasi = new RegistrasiModel();

        $data = [
            'data' => $registrasi->where('tgl_aktivasi', date("Y-m-d",strtotime($tanggal )))->findAll(),
        ];

        $dompdf->loadHtml(view('pdf/pdf_registrasi', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
    }
    public function rekapRegistrasitgl()
    {
        $tanggal = $this->request->getVar('tgl_aktivasi');
        $this->rekapRegistrasitanggal($tanggal);
    }

    public function rekapRegistrasimingggu()
    {
        $filename = date('y-m-d') . '-rekapan minuman per minggu';
        $dompdf = new Dompdf();
        $registrasi = new RegistrasiModel();

        $tanggala = date('Y-m-d', strtotime('tanggal_awal')); // Tanggal awal minggu
        $tanggalb = date('Y-m-d', strtotime('tanggal_akhir'));   // Tanggal akhir minggu

          
        $data = [
            'data' => $registrasi->where('tanggal >=', $tanggala)->where('tanggal <=', $tanggalb)->findAll(),
        ];

        $dompdf->loadHtml(view('pdf/pdf_minuman', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
    }

        public function rekapRegistrasiBulan($selectedMonth)
    {
        
        $filename = date('y-m') . '-rekapan-minuman perbulan';
        $dompdf = new Dompdf();
        $registrasi = new RegistrasiModel();

        $data = [
            'data' => $registrasi->where('MONTH(tgl_aktivasi)', date("n", strtotime($selectedMonth)))->findAll(),
            'selectedMonth' => $selectedMonth,
        ];

        $dompdf->loadHtml(view('pdf/pdf_registrasi', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
        
    }

    public function rekapRegistrasiBln()
    {
        $selectedMonth = $this->request->getVar('tgl_aktivasi');
        $this->rekapRegistrasiBulan($selectedMonth);
    }

// rekap member
    public function rekapMembertanggal($tanggal)
    {
        $filename = date('y-m-d') . '-rekapan member';
        $dompdf = new Dompdf();
        $member = new MemberModel();

        $data = [
            'data' => $member->where('tanggal', date("Y-m-d",strtotime($tanggal )))->findAll(),
        ];

        $dompdf->loadHtml(view('pdf/pdf_member', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
    }

    public function rekapMembertgl()
    {
        $tanggal = $this->request->getVar('tanggal');
    
        $this->rekapMembertanggal($tanggal);
    }

    public function rekapMembermingggu()
    {
        $filename = date('y-m-d') . '-rekapan minuman per minggu';
        $dompdf = new Dompdf();
        $member = new MemberModel();

        $tanggala = date('Y-m-d', strtotime('tanggal_awal')); // Tanggal awal minggu
        $tanggalb = date('Y-m-d', strtotime('tanggal_akhir'));   // Tanggal akhir minggu

          
        $data = [
            'data' => $member->where('tanggal >=', $tanggala)->where('tanggal <=', $tanggalb)->findAll(),
        ];

        $dompdf->loadHtml(view('pdf/pdf_member', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
    }

        public function rekapMemberBulan($selectedMonth)
    {
        
        $filename = date('y-m') . '-rekapan-minuman perbulan';
        $dompdf = new Dompdf();
        $member = new MemberModel();

        $data = [
            'data' => $member->where('MONTH(tanggal)', date("n", strtotime($selectedMonth)))->findAll(),
            'selectedMonth' => $selectedMonth,
        ];

        $dompdf->loadHtml(view('pdf/pdf_member', $data));
        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
        
    }

    public function rekapMemberBln()
    {
        $selectedMonth = $this->request->getVar('tanggal');
        $this->rekapMemberBulan($selectedMonth);
    }

}