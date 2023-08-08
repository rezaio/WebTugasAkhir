<?php

namespace App\Controllers;

use App\Models\HarianModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Harian extends BaseController
{
    public function index()
    {
        $harian = new HarianModel();
        $data = [
            // 'harian' => $harian->findAll(),
            'harian' => $harian->findAll(),

        ];
        echo view('dataharian', $data);
    }

    public function add()
    {
        echo view('tambahharian');

    }

    public function save()
    {

        $harian  = new HarianModel();
        $harian->save([
            'id_kh' => $this->request->getPost('id_kh'),
            'nama' => $this->request->getPost('nama'),
            'no_telp' => $this->request->getPost('no_telp'),
            'waktu' => $this->request->getPost('waktu'),
            'kelas' => $this->request->getPost('kelas'),
            'harga' => $this->request->getPost('harga'),

        ]);

        session()->setFlashdata('pesan', 'Pengunjung Harian berhasil ditambahkan');
        return redirect()->to('harian');
    }

    public function delete()
    {
        $harian = new HarianModel();
        $harian->delete($this->request->getPost('id_kh'));
        session()->setFlashdata('pesan', 'Pengunjung Harian berhasil dihapus');
        return redirect()->to('harian');
    }

    public function edit($id)
    {
        $harian = new HarianModel();
        $data = [
            'harian' => $harian->find($id),
            
        ];
        return view('editharian', $data);
    }

    public function update()
    {
        $harian = new HarianModel();
        $data = $harian->find($this->request->getVar('id_kh'));
        
        $harian->replace([


            'id_kh' => $this->request->getPost('id_kh'),
            'nama' => $this->request->getPost('nama'),
            'no_telp' => $this->request->getPost('no_telp'),
            'waktu' => $this->request->getPost('waktu'),
            'kelas' => $this->request->getPost('kelas'),
            'harga' => $this->request->getPost('harga'),

        ]);

        session()->setFlashdata('pesan', 'Pengunjung Harian berhasil diedit');
        return redirect()->to('harian');
    }


    public function export()
    {
        $harianModel = new HarianModel();
        $harian = $harianModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Nomor Telepon');
        $sheet->setCellValue('D1', 'Waktu');
        $sheet->setCellValue('E1', 'Kelas');
        $sheet->setCellValue('F1', 'Harga');

        $column = 2;
        $total = 0;
        foreach ($harian as $data) {
        $sheet->setCellValue('A'.$column, $column-1);
        $sheet->setCellValue('B'.$column, $data['nama']);   
        $sheet->setCellValue('C'.$column, $data['no_telp']);
        $sheet->setCellValue('D'.$column, $data['waktu']);
        $sheet->setCellValue('E'.$column, $data['kelas']);
        $sheet->setCellValue('F'.$column, $data['harga']);
        $column++;
        $total += $data['harga']; 
        }
        $sheet->setCellValue('F'.$column, $total);

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
        header('Content-Disposition: attachment;filename=harian.xlsx');
        header('Cache-Control: mag age-0');
        $writer->save('php://output');
        exit();
    }
}
