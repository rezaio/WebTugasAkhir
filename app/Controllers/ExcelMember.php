<?php

namespace App\Controllers;

use App\Models\MemberModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ExcelMember extends BaseController
{
    public function exporthari()
    {
        if (isset($_GET['pdf']) =='pdf'){
            return redirect()->to('pdfcontroller/rekapMembertgl?tanggal='.$this->request->getGet('tanggal'));
        }; 

        $tanggal = $this->request->getGet('tanggal'); 

        
        $memberModel = new MemberModel();
        $member = $memberModel->where('tanggal', $tanggal)->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'No Member');    
        $sheet->setCellValue('D1', 'Tanggal');
        $sheet->setCellValue('E1', 'Waktu');

        $column = 2;
        
        foreach ($member as $data) {
        $sheet->setCellValue('A'.$column, $column-1);
        $sheet->setCellValue('B'.$column, $data['nama']);   
        $sheet->setCellValue('C'.$column, $data['no_member']);
        $sheet->setCellValue('D'.$column, $data['tanggal']);
        $sheet->setCellValue('E'.$column, $data['waktu']);
        $column++;
        }

        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A1:E1')->getFill()
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

            $sheet->getStyle('A1:E'.($column-1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=member.xlsx');
        header('Cache-Control: mag age-0');
        $writer->save('php://output');
        exit();
    } 

    public function exportminggu()
    {  
        $tanggala = $this->request->getGet('tanggal_awal'); 
        $tanggalb = $this->request->getGet('tanggal_akhir');

        $memberModel = new MemberModel();
        $member = $memberModel->where('tanggal >=', $tanggala)
                            ->where('tanggal <=', $tanggalb)
                          ->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'No Member');    
        $sheet->setCellValue('D1', 'Tanggal');
        $sheet->setCellValue('E1', 'Waktu');

        $column = 2;
        foreach ($member as $data) {
        $sheet->setCellValue('A'.$column, $column-1);
        $sheet->setCellValue('B'.$column, $data['nama']);   
        $sheet->setCellValue('C'.$column, $data['no_member']);
        $sheet->setCellValue('D'.$column, $data['tanggal']);
        $sheet->setCellValue('E'.$column, $data['waktu']);
        $column++;
        }

        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A1:E1')->getFill()
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

            $sheet->getStyle('A1:E'.($column-1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=member.xlsx');
        header('Cache-Control: mag age-0');
        $writer->save('php://output');
        exit();
    }
    public function exportbulan()
    {
        if (isset($_GET['pdf']) =='pdf'){
            return redirect()->to('pdfcontroller/rekapMemberbln?tanggal='.$this->request->getGet('bulan'));
        }; 
        $memberModel = new MemberModel();
        $member = $memberModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A2', 'No');
        $sheet->setCellValue('B2', 'Nama');
        $sheet->setCellValue('C2', 'No Member');    
        $sheet->setCellValue('D2', 'Tanggal');
        $sheet->setCellValue('E2', 'Waktu');

        $column = 3;
        $currentMonth = '';
        $monthStartRow = 1;

        foreach ($member as $data) {
        $sheet->setCellValue('A'.$column, $column-2);
        $sheet->setCellValue('B'.$column, $data['nama']);   
        $sheet->setCellValue('C'.$column, $data['no_member']);
        $sheet->setCellValue('D'.$column, $data['tanggal']);
        $sheet->setCellValue('E'.$column, $data['waktu']);

        if ($currentMonth !== date('F Y', strtotime($data['tanggal']))) {
            if ($currentMonth !== '') {

            }
    
            $currentMonth = date('F Y', strtotime($data['tanggal']));
            $sheet->mergeCells('A' . $monthStartRow . ':E' . $monthStartRow);
            $sheet->setCellValue('A' . $monthStartRow, $currentMonth);
            $sheet->getStyle('A' . $monthStartRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        }
        $column++;
        }

        $sheet->getStyle('A2:E2')->getFont()->setBold(true);
        $sheet->getStyle('A2:E2')->getFill()
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

            $sheet->getStyle('A1:E'.($column-1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=member.xlsx');
        header('Cache-Control: mag age-0');
        $writer->save('php://output');
        exit();
    } 

}