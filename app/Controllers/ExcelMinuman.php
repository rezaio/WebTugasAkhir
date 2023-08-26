<?php

namespace App\Controllers;

use App\Models\MinumanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ExcelMinuman extends BaseController
{

public function exporthari()
    {
        if (isset($_GET['pdf']) =='pdf'){
            return redirect()->to('pdfcontroller/rekapMinumantgl?tanggal='.$this->request->getGet('tanggal'));
        }; 

        $tanggal = $this->request->getGet('tanggal'); 

        
        $minumanModel = new MinumanModel();
        $minuman = $minumanModel->where('tanggal', $tanggal)->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Harga');
        $sheet->setCellValue('D1', 'Jumlah');
        $sheet->setCellValue('E1', 'Tanggal');
        $sheet->setCellValue('F1', 'Total');

        $column = 2;
        $total = 0;

        foreach ($minuman as $data) {
        $sheet->setCellValue('A'.$column, $column-1);
        $sheet->setCellValue('B'.$column, $data['nama']);
        $formattedHarga = number_format($data['harga'], 3, ',', '.');
        $sheet->setCellValue('C' . $column, $formattedHarga);
        $sheet->setCellValue('D'.$column, $data['jumlah']);
        $sheet->setCellValue('E'.$column, $data['tanggal']);

        $subtotal = $data['harga'] * $data['jumlah'];
        $sheet->setCellValue('F' . $column, number_format($subtotal, 3, ',', '.'));
        
        $total += $subtotal;
        $column++;
        }

        $sheet->setCellValue('F' . ($column), 'Total :' . number_format($total, 3, ',', '.'));
        $sheet->getStyle('F'.$column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);


        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A1:F1')->getFill()
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

            $sheet->getStyle('A1:F'.($column-1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=minuman.xlsx');
        header('Cache-Control: mag age-0');
        $writer->save('php://output');
        exit();
    } 
    
    public function exportminggu()
    {

        $tanggala = $this->request->getGet('tanggal_awal'); // Ambil tanggal dari input
        $tanggalb = $this->request->getGet('tanggal_akhir'); // Ambil tanggal dari input

        $minumanModel = new MinumanModel();
        $minuman = $minumanModel->where('tanggal >=', $tanggala)
                            ->where('tanggal <=', $tanggalb)
                          ->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Harga');
        $sheet->setCellValue('D1', 'Jumlah');
        $sheet->setCellValue('E1', 'Tanggal');
        $sheet->setCellValue('F1', 'Total');

        $column = 2;
        $total = 0;
        foreach ($minuman as $data) {
        $sheet->setCellValue('A'.$column, $column-1);
        $sheet->setCellValue('B'.$column, $data['nama']);
        $formattedHarga = number_format($data['harga'], 3, ',', '.');
        $sheet->setCellValue('C' . $column, $formattedHarga);
        $sheet->setCellValue('D'.$column, $data['jumlah']);
        $sheet->setCellValue('E'.$column, $data['tanggal']);

        $subtotal = $data['harga'] * $data['jumlah'];
        $sheet->setCellValue('F' . $column, number_format($subtotal, 3, ',', '.'));
        
        $total += $subtotal;
        $column++;
        }

        $sheet->setCellValue('F' . ($column), 'Total :' . number_format($total, 3, ',', '.'));
        $sheet->getStyle('F'.$column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);


        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A1:F1')->getFill()
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

            $sheet->getStyle('A1:F'.($column-1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=minuman.xlsx');
        header('Cache-Control: mag age-0');
        $writer->save('php://output');
        exit();
    }


    public function exportbulan()
    {
        if (isset($_GET['pdf']) =='pdf'){
            return redirect()->to('pdfcontroller/rekapMinumanBln?tanggal='.$this->request->getGet('bulan'));
        };

        $minumanModel = new MinumanModel();
        $minuman = $minumanModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A2', 'No');
        $sheet->setCellValue('B2', 'Nama');
        $sheet->setCellValue('C2', 'Harga');
        $sheet->setCellValue('D2', 'Jumlah');
        $sheet->setCellValue('E2', 'Tanggal');
        $sheet->setCellValue('F2', 'Total');

        $column = 3;
        $total = 0;
        $currentMonth = '';
        $monthStartRow = 1;

        foreach ($minuman as $data) {
        $sheet->setCellValue('A'.$column, $column-2);
        $sheet->setCellValue('B'.$column, $data['nama']);
        $formattedHarga = number_format($data['harga'], 3, ',', '.');
        $sheet->setCellValue('C' . $column, $formattedHarga);
        $sheet->setCellValue('D'.$column, $data['jumlah']);
        $sheet->setCellValue('E'.$column, $data['tanggal']);

        $subtotal = $data['harga'] * $data['jumlah'];
        $sheet->setCellValue('F' . $column, number_format($subtotal, 3, ',', '.'));
        
        
        if ($currentMonth !== date('F Y', strtotime($data['tanggal']))) {
            if ($currentMonth !== '') {
                $sheet->setCellValue('F' . ($column), $total);
                $total = 0;
            }
    
            $currentMonth = date('F Y', strtotime($data['tanggal']));
            $sheet->mergeCells('A' . $monthStartRow . ':F' . $monthStartRow);
            $sheet->setCellValue('A' . $monthStartRow, $currentMonth);
            $sheet->getStyle('A' . $monthStartRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        }
    
        $total += $subtotal;
        $column++;
        }

        $sheet->setCellValue('F' . ($column), 'Total :' . number_format($total, 3, ',', '.'));
        $sheet->getStyle('F'.$column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);


        $sheet->getStyle('A2:F2')->getFont()->setBold(true);
        $sheet->getStyle('A2:F2')->getFill()
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

            $sheet->getStyle('A2:F'.($column-1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=minuman.xlsx');
        header('Cache-Control: mag age-0');
        $writer->save('php://output');
        exit();
    }
}