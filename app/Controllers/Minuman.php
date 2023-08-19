<?php

namespace App\Controllers;

use App\Models\MinumanModel;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;

class Minuman extends BaseController
{
    public function index()
    {
        $minuman = new MinumanModel();
        $data = [
            // 'minuman' => $minuman->findAll(),
            'minuman' => $minuman->findAll(),
            'pager' => $minuman->pager
            
        ];
        echo view('dataminuman', $data);
    }

    public function add()
    {
        echo view('dataminuman');
    }

    public function save()
    {

        $minuman  = new MinumanModel();
        $minuman->save([
            'id_minuman' => $this->request->getPost('id_minuman'),
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal'),
        ]);

        session()->setFlashdata('pesan', 'Minuman berhasil ditambahkan');
        return redirect()->to('minuman');
    }
    public function delete()
    {
        $minuman = new MinumanModel();
        $minuman->delete($this->request->getPost('id_minuman'));
        session()->setFlashdata('pesan', 'Data minuman berhasil dihapus');
        return redirect()->to('minuman');
    }

    public function export()
    {
        $minumanModel = new MinumanModel();
        $minuman = $minumanModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'harga');
        $sheet->setCellValue('D1', 'jumlah');

        $column = 2;
        $total = 0;
        foreach ($minuman as $data) {
        $sheet->setCellValue('A'.$column, $column-1);
        $sheet->setCellValue('B'.$column, $data['nama']);   
        $sheet->setCellValue('C'.$column, $data['harga']);
        $sheet->setCellValue('D'.$column, $data['jumlah']);
        $column++;
        $total += $data['harga']; 
        }
        $sheet->setCellValue('E'.$column, $total);

        $sheet->getStyle('A1:D1')->getFont()->setBold(true);
        $sheet->getStyle('A1:D1')->getFill()
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

            $sheet->getStyle('A1:D'.($column-1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        

        $writer = new WriterXlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=minuman.xlsx');
        header('Cache-Control: mag age-0');
        $writer->save('php://output');
        exit();
    } 
}
