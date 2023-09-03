<?php

namespace App\Controllers;

use App\Models\MemberModel;


class Member extends BaseController
{
    public function index()
    {
        $member = new MemberModel();
        $data = [
            
            'member' => $member->join('registrasi','registrasi.id_registrasi=kunjungan_member.id_registrasi')->findAll(),
            
        ];
        echo view('datamember', $data);
    }


    public function add()
    {
        echo view('datamember');

    }

    public function save()
    {
       
        $data =  $this->request->getVar('nomor');


        $member  = new MemberModel();
        $isi = $member->join('registrasi','registrasi.id_registrasi=kunjungan_member.id_registrasi')->where('no_member', $data)->first();

        $member->save([
            'id_registrasi' => $isi['id_registrasi'],
            'tanggal' => date("Y-m-d"),
            'waktu' => date("H:i:s"),
        ]);

        session()->setFlashdata('pesan', 'member berhasil ditambahkan');
        return redirect()->to('member');
    }

    public function delete()
    {
        $member = new MemberModel();
        $member->delete($this->request->getPost('id_km'));
        session()->setFlashdata('pesan', 'Pengunjung member berhasil dihapus');
        return redirect()->to('member');
    }

  
}
