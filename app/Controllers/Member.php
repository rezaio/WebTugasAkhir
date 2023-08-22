<?php

namespace App\Controllers;

use App\Models\MemberModel;


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

  
}
