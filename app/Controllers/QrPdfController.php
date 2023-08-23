<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;
use Endroid\QrCode\QrCode;
use App\Models\RegistrasiModel;


class QrPdfController extends BaseController
{
    public function index()
    {
        // Ambil data dari model registrasi berdasarkan no_member
        $noMember = '1003'; // Ganti dengan no_member yang sesuai
        $registrasiModel = new RegistrasiModel();
        $registrasiData = $registrasiModel->getDataByNoMember($noMember);
        
        if ($registrasiData) {
            // Buat objek QrCode dengan data dari model
            $qrCode = new QrCode($registrasiData['no_member']); // Contoh: menggunakan email dari data registrasi
            $qrCode->setSize(150);
            
            // Simpan gambar QR code sebagai file sementara
            $qrImagePath = WRITEPATH . 'uploads/temp_qr.png';
            $qrCode->getEncoding($qrImagePath);
            
            // Buat objek Dompdf
            $dompdf = new Dompdf();

            // Tambahkan konten ke PDF
            $html = view('qr_pdf', ['qrImagePath' => $qrImagePath, 'registrasiData' => $registrasiData]);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            // Tampilkan PDF di browser
            $dompdf->stream('qr_code_pdf.pdf', ['Attachment' => false]);
        } else {
            // Handle jika data registrasi tidak ditemukan
            return "Data registrasi tidak ditemukan.";
        }
    }
}
