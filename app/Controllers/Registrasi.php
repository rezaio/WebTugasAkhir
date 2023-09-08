<?php

namespace App\Controllers;

use App\Models\RegistrasiModel;

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
    
    
}

