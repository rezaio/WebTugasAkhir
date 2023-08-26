<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;
use Dompdf\Dompdf;
use Endroid\QrCode\QrCode;
use App\Models\RegistrasiModel;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class QrPdfController extends BaseController
{
    public function index()
    {
        // Ambil data dari model registrasi berdasarkan no_member
        $noMember = $this->request->getVar('nomember'); // Ganti dengan no_member yang sesuai
        $registrasiModel = new RegistrasiModel();
        $registrasiData = $registrasiModel->getDataByNoMember($noMember);
        
        if ($registrasiData) {
            $dompdf = new Dompdf();
            // Buat objek QrCode dengan data dari model
            $writer = new PngWriter();
            $qrCode = QrCode::create($noMember)
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                ->setSize(300)
                ->setMargin(10)
                ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                ->setForegroundColor(new Color(0, 0, 0))
                ->setBackgroundColor(new Color(255, 255, 255));

            $result = $writer->write($qrCode);
            // return view('qr_pdf',);

            // Tambahkan konten ke PDF
            $html = view('qr_pdf', ['data' => $result->getDataUri(), 'registrasiData' => $registrasiData]);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            // Tampilkan PDF di browser
            $dompdf->stream('qr_code_member.pdf', ['Attachment' => false]);
        } else {
            // Handle jika data registrasi tidak ditemukan
            return "Data registrasi tidak ditemukan.";
        }
    }
    public function add() {
        
        $member  = new MemberModel();
        $member->save([
            'id_km' => $this->request->getPost('id_member'),
            'nama' => $this->request->getPost('nama'),
            'no_member' => $this->request->getPost('no_member'),
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu' => $this->request->getPost('waktu'),
        ]);
    }
}
