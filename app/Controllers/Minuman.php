<?php

namespace App\Controllers;

use App\Models\MinumanModel;


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

   
}
