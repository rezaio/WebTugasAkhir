<?php

namespace App\Controllers;

use App\Models\MemberModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Member extends BaseController
{
    public function index()
    {
        $member = new MemberModel();
        $data = [
            
            'member' => $member->findAll(),
            
        ];
        echo view('datamember', $data);
    }

    public function add()
    {
        echo view('datamember');

    }

    public function save()
    {

        $member  = new MemberModel();
        $member->save([
            'id_km' => $this->request->getPost('id_member'),
            'nama' => $this->request->getPost('nama'),
            'no_member' => $this->request->getPost('no_member'),
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu' => $this->request->getPost('waktu'),
        ]);

        session()->setFlashdata('pesan', 'member berhasil ditambahkan');
        return redirect()->to('member');
    }

    public function delete()
    {
        $member = new MemberModel();
        $member->delete($this->request->getPost('id_member'));
        session()->setFlashdata('pesan', 'Pengunjung member berhasil dihapus');
        return redirect()->to('member');
    }

    public function export()
    {
        $memberModel = new MemberModel();
        $member = $memberModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'harga');
        $sheet->setCellValue('D1', 'jumlah');

        $column = 2;
        foreach ($member as $data) {
        $sheet->setCellValue('A'.$column, $column-1);
        $sheet->setCellValue('B'.$column, $data['nama']);   
        $sheet->setCellValue('C'.$column, $data['no_member']);
        $sheet->setCellValue('D'.$column, $data['waktu']);
        $column++;
        }

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
        

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=member.xlsx');
        header('Cache-Control: mag age-0');
        $writer->save('php://output');
        exit();
    } 
}
