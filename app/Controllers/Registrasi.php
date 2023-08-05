<?php

namespace App\Controllers;

use App\Models\RegistrasiModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Registrasi extends BaseController
{
    public function index()
    {
        $registrasi = new RegistrasiModel();
        $data = [
            // 'registrasi' => $registrasi->findAll(),
            'registrasi' => $registrasi->findAll(),
            
        ];
        echo view('dataregistrasi', $data);
    }

    public function add()
    {
        echo view('tambahregistrasi');

    }

    public function save()
    {

        $registrasi  = new RegistrasiModel();
        $registrasi->save([
            'id_registrasi' => $this->request->getPost('id_registrasi'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'usia' => $this->request->getPost('usia'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'no_telp' => $this->request->getPost('no_telp'),
            'tipe_member' => $this->request->getPost('tipe_member'),
            'no_member' => $this->request->getPost('no_member'),
            'tgl_aktivasi' => $this->request->getPost('tgl_aktivasi'),
            'tgl_berakhir' => $this->request->getPost('tgl_berakhir'),
            'pelatih' => $this->request->getPost('pelatih'),
            'harga' => $this->request->getPost('harga'),
        ]);

        session()->setFlashdata('pesan', 'registrasi berhasil ditambahkan');
        return redirect()->to('registrasi');
    }

    public function delete()
    {
        $registrasi = new RegistrasiModel();
        $registrasi->delete($this->request->getPost('id_registrasi'));
        session()->setFlashdata('pesan', 'Pengunjung registrasi berhasil dihapus');
        return redirect()->to('registrasi');
    }

    public function edit($id)
    {
        $registrasi = new RegistrasiModel();
        $data = [
            'registrasi' => $registrasi->find($id),
            
        ];
        return view('editregistrasi', $data);
    }

    public function update()
    {
        $registrasi = new RegistrasiModel();
        $data = $registrasi->find($this->request->getVar('id_registrasi'));
        
        $registrasi->replace([


            'id_registrasi' => $this->request->getPost('id_registrasi'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'usia' => $this->request->getPost('usia'),
            'no_ktp' => $this->request->getPost('no_ktp'),
            'no_telp' => $this->request->getPost('no_telp'),
            'tipe_member' => $this->request->getPost('tipe_member'),
            'no_member' => $this->request->getPost('no_member'),
            'tgl_aktivasi' => $this->request->getPost('tgl_aktivasi'),
            'tgl_berakhir' => $this->request->getPost('tgl_berakhir'),
            'pelatih' => $this->request->getPost('pelatih'),
            'harga' => $this->request->getPost('harga'),

        ]);

        session()->setFlashdata('pesan', 'Pengunjung registrasi berhasil diedit');
        return redirect()->to('registrasi');
    }
    public function export()
    {
        $registrasiModel = new RegistrasiModel();
        $registrasi = $registrasiModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'alamat');
        $sheet->setCellValue('D1', 'tempat_lahir');
        $sheet->setCellValue('E1', 'tanggal_lahir');
        $sheet->setCellValue('F1', 'usia');
        $sheet->setCellValue('G1', 'no_ktp');
        $sheet->setCellValue('H1', 'no_telp');
        $sheet->setCellValue('I1', 'tipe_member');
        $sheet->setCellValue('J1', 'no_member');
        $sheet->setCellValue('K1', 'tgl_aktivasi');
        $sheet->setCellValue('L1', 'tgl_berakhir');
        $sheet->setCellValue('M1', 'pelatih');
        $sheet->setCellValue('N1', 'harga');


        $column = 2;
        $total = 0;
        foreach ($registrasi as $data) {
        $sheet->setCellValue('A'.$column, $column-1);
        $sheet->setCellValue('B'.$column, $data['nama']);   
        $sheet->setCellValue('C'.$column, $data['alamat']);
        $sheet->setCellValue('D'.$column, $data['tempat_lahir']);
        $sheet->setCellValue('E'.$column, $data['tanggal_lahir']);
        $sheet->setCellValue('F'.$column, $data['usia']);
        $sheet->setCellValue('G'.$column, $data['no_ktp']);
        $sheet->setCellValue('H'.$column, $data['no_telp']);
        $sheet->setCellValue('I'.$column, $data['tipe_member']);
        $sheet->setCellValue('J'.$column, $data['no_member']);
        $sheet->setCellValue('K'.$column, $data['tgl_aktivasi']);
        $sheet->setCellValue('L'.$column, $data['tgl_berakhir']);
        $sheet->setCellValue('M'.$column, $data['pelatih']);
        $sheet->setCellValue('N'.$column, $data['harga']);
        $column++;
        $total += $data['harga']; 
        }
        $sheet->setCellValue('N'.$column, $total);

        $sheet->getStyle('A1:N1')->getFont()->setBold(true);
        $sheet->getStyle('A1:N1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF00000'],
                ],
            ],
        ];

            $sheet->getStyle('A1:N'.($column-1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->getColumnDimension('N')->setAutoSize(true);
        

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=registrasi.xlsx');
        header('Cache-Control: mag age-0');
        $writer->save('php://output');
        exit();
    } 
}

