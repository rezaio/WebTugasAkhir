<?php

namespace App\Controllers;

use App\Models\HarianModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ExcelHarian extends BaseController
{
    public function exporthari()
    { 
     
        $tanggal = $this->request->getGet('tanggal'); // Ambil tanggal dari input
   
        $harianModel = new HarianModel();
        $harian = $harianModel->where('tanggal', $tanggal)->findAll(); // Sesuaikan dengan kolom tanggal di model 


    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Nomor Telepon');
    $sheet->setCellValue('D1', 'Tanggal');
    $sheet->setCellValue('E1', 'Waktu');
    $sheet->setCellValue('F1', 'Kelas');
    $sheet->setCellValue('G1', 'Harga');

    $column = 2;
    $total = 0;

    foreach ($harian as $data) {
            $sheet->setCellValue('A' . $column, $column - 1);
            $sheet->setCellValue('B' . $column, $data['nama']);
            $sheet->setCellValue('C' . $column, $data['no_telp']);
            $sheet->setCellValue('D' . $column, $data['tanggal']);
            $sheet->setCellValue('E' . $column, $data['waktu']);
            $sheet->setCellValue('F' . $column, $data['kelas']);

            $formattedHarga = number_format($data['harga'], 3, ',', '.');
            $sheet->setCellValue('G' . $column, $formattedHarga);
            
            $total += $data['harga'];
            $column++;
        }

        $sheet->setCellValue('G' . ($column), 'Total :' . number_format($total, 3, ',', '.'));
        $sheet->getStyle('G'.$column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);


    $sheet->getStyle('A1:G1')->getFont()->setBold(true);
    $sheet->getStyle('A1:G1')->getFill()
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

    $sheet->getStyle('A1:G' . ($column - 1))->applyFromArray($styleArray);

    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    $sheet->getColumnDimension('F')->setAutoSize(true);
    $sheet->getColumnDimension('G')->setAutoSize(true);
    

    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=harian.xlsx');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit();

}

public function exportminggu()
{
        
    $tanggala = $this->request->getGet('tanggal_awal'); 
    $tanggalb = $this->request->getGet('tanggal_akhir');
    

    $harianModel = new HarianModel();
        $harian = $harianModel->where('tanggal >=', $tanggala)
                            ->where('tanggal <=', $tanggalb)
                          ->findAll();

        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Nomor Telepon');
        $sheet->setCellValue('D1', 'Tanggal');
        $sheet->setCellValue('E1', 'Waktu');
        $sheet->setCellValue('F1', 'Kelas');
        $sheet->setCellValue('G1', 'Harga');

        $column = 2;
        $total = 0;
        foreach ($harian as $data) {
        $sheet->setCellValue('A'.$column, $column-1);
        $sheet->setCellValue('B'.$column, $data['nama']);   
        $sheet->setCellValue('C'.$column, $data['no_telp']);
        $sheet->setCellValue('D'.$column, $data['tanggal']);
        $sheet->setCellValue('E'.$column, $data['waktu']);
        $sheet->setCellValue('F'.$column, $data['kelas']);

        $formattedHarga = number_format($data['harga'], 3, ',', '.');
            $sheet->setCellValue('G' . $column, $formattedHarga);
            
            $total += $data['harga'];
            $column++;
        }

        $sheet->setCellValue('G' . ($column), 'Total :' . number_format($total, 3, ',', '.'));
        $sheet->getStyle('G'.$column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);


        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        $sheet->getStyle('A1:G1')->getFill()
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

            $sheet->getStyle('A1:G'.($column-1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=harian.xlsx');
        header('Cache-Control: mag age-0');
        $writer->save('php://output');
        exit();
}

public function exportbulan(){

    $harianModel = new HarianModel();
    $harian = $harianModel->findAll();
    
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    $sheet->setCellValue('A2', 'No');
    $sheet->setCellValue('B2', 'Nama');
    $sheet->setCellValue('C2', 'Nomor Telepon');
    $sheet->setCellValue('D2', 'Tanggal');
    $sheet->setCellValue('E2', 'Waktu');
    $sheet->setCellValue('F2', 'Kelas');
    $sheet->setCellValue('G2', 'Harga');
    
    $column = 3;
    $total = 0;
    $currentMonth = '';
    $monthStartRow = 1;
    
    foreach ($harian as $data) {
        $sheet->setCellValue('A' . $column, $column - 2);
        $sheet->setCellValue('B' . $column, $data['nama']);
        $sheet->setCellValue('C' . $column, $data['no_telp']);
        $sheet->setCellValue('D' . $column, $data['tanggal']);
        $sheet->setCellValue('E' . $column, $data['waktu']);
        $sheet->setCellValue('F' . $column, $data['kelas']);

        $formattedHarga = number_format($data['harga'], 3, ',', '.');
            $sheet->setCellValue('G' . $column, $formattedHarga);
            
    
        if ($currentMonth !== date('F Y', strtotime($data['tanggal']))) {
            if ($currentMonth !== '') {
                $sheet->setCellValue('G' . ($column), $total);
                $total = 0;
            }
    
            $currentMonth = date('F Y', strtotime($data['tanggal']));
            $sheet->mergeCells('A' . $monthStartRow . ':G' . $monthStartRow);
            $sheet->setCellValue('A' . $monthStartRow, $currentMonth);
            $sheet->getStyle('A' . $monthStartRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        }
    
        $total += $data['harga'];
        $column++;
    }

        $sheet->setCellValue('G' . ($column), 'Total :' . number_format($total, 3, ',', '.'));
        $sheet->getStyle('G'.$column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

    $sheet->getStyle('A2:G2')->getFont()->setBold(true);
    $sheet->getStyle('A2:G2')->getFill()
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
    
    $sheet->getStyle('A2:G' . ($column - 1))->applyFromArray($styleArray);
    
    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    $sheet->getColumnDimension('F')->setAutoSize(true);
    $sheet->getColumnDimension('G')->setAutoSize(true);
    
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=harian.xlsx');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit();
    
}

}
