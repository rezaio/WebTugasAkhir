<?php

namespace App\Controllers;

use App\Models\RegistrasiModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ExcelRegistrasi extends BaseController
{
    public function exporthari()
    {
        $tanggal = $this->request->getGet('tgl_aktivasi'); 

        $registrasiModel = new RegistrasiModel();
        $registrasi = $registrasiModel->where('tgl_aktivasi', $tanggal)->findAll();

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

        $formattedHarga = number_format($data['harga'], 3, ',', '.');
        $sheet->setCellValue('N' . $column, $formattedHarga);
        
        $total += $data['harga'];
        $column++;
    }

        $sheet->setCellValue('N' . ($column), 'Total :' . number_format($total, 3, ',', '.'));
        $sheet->getStyle('N'.$column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
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

    public function exportminggu()
    {
        $tanggala = $this->request->getGet('tanggal_awal'); 
        $tanggalb = $this->request->getGet('tanggal_akhir');

        $registrasiModel = new RegistrasiModel();
        $registrasi = $registrasiModel->where('tgl_aktivasi >=', $tanggala)
                            ->where('tgl_aktivasi <=', $tanggalb)
                          ->findAll();

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

        $formattedHarga = number_format($data['harga'], 3, ',', '.');
        $sheet->setCellValue('N' . $column, $formattedHarga);
        
        $total += $data['harga'];
        $column++;
    }

        $sheet->setCellValue('N' . ($column), 'Total :' . number_format($total, 3, ',', '.'));
        $sheet->getStyle('N'.$column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

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

    public function exportbulan()
    {
        $registrasiModel = new RegistrasiModel();
        $registrasi = $registrasiModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A2', 'No');
        $sheet->setCellValue('B2', 'Nama');
        $sheet->setCellValue('C2', 'alamat');
        $sheet->setCellValue('D2', 'tempat_lahir');
        $sheet->setCellValue('E2', 'tanggal_lahir');
        $sheet->setCellValue('F2', 'usia');
        $sheet->setCellValue('G2', 'no_ktp');
        $sheet->setCellValue('H2', 'no_telp');
        $sheet->setCellValue('I2', 'tipe_member');
        $sheet->setCellValue('J2', 'no_member');
        $sheet->setCellValue('K2', 'tgl_aktivasi');
        $sheet->setCellValue('L2', 'tgl_berakhir');
        $sheet->setCellValue('M2', 'pelatih');
        $sheet->setCellValue('N2', 'harga');


        $column = 3;
        $total = 0;
        $currentMonth = '';
        $monthStartRow = 1;
    
        
        foreach ($registrasi as $data) {
        $sheet->setCellValue('A'.$column, $column-2);
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

                $formattedHarga = number_format($data['harga'], 3, ',', '.');
        $sheet->setCellValue('N' . $column, $formattedHarga);

        if ($currentMonth !== date('F Y', strtotime($data['tgl_aktivasi']))) {
            if ($currentMonth !== '') {
                $sheet->setCellValue('N' . ($column), $total);
                $total = 0;
            }
    
            $currentMonth = date('F Y', strtotime($data['tgl_aktivasi']));
            $sheet->mergeCells('A' . $monthStartRow . ':N' . $monthStartRow);
            $sheet->setCellValue('A' . $monthStartRow, $currentMonth);
            $sheet->getStyle('A' . $monthStartRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        }
    
        $total += $data['harga'];
        $column++;
    }

        $sheet->setCellValue('N' . ($column), 'Total :' . number_format($total, 3, ',', '.'));
        $sheet->getStyle('N'.$column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        $sheet->getStyle('A2:N2')->getFont()->setBold(true);
        $sheet->getStyle('A2:N2')->getFill()
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

            $sheet->getStyle('A2:N'.($column-1))->applyFromArray($styleArray);

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