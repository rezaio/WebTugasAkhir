<?php

namespace App\Controllers;

use App\Models\HarianModel;


class Harian extends BaseController
{
    public function index()
    {
        $harian = new HarianModel();
        $data = [
            // 'harian' => $harian->findAll(),
            'harian' => $harian->findAll(),
            // 'harian' => $harian->paginate(4, 'harian'),

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
            'tanggal' => $this->request->getPost('tanggal'),
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
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu' => $this->request->getPost('waktu'),
            'kelas' => $this->request->getPost('kelas'),
            'harga' => $this->request->getPost('harga'),

        ]);

        session()->setFlashdata('pesan', 'Pengunjung Harian berhasil diedit');
        return redirect()->to('harian');
    }



}