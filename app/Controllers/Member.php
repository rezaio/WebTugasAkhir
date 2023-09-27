<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\RegistrasiModel;

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
        $registrasi = new RegistrasiModel();
        $isi = $registrasi->where('no_member', $data)->first();
        
        $tanggal_tujuan = ($isi['tgl_berakhir']);

        // Tanggal hari ini
        $tanggal_hari_ini = date("Y-m-d");

        if ($tanggal_tujuan < $tanggal_hari_ini) {

            session()->setFlashdata('pesan', 'Tanggal member sudah berakhir');
            return redirect()->to('member');
            exit;
        }

        $member->save([
            'id_registrasi' => $isi['id_registrasi'],
            'tanggal' => date("Y-m-d"),
            'waktu' => date("H:i:s"),
        ]);

        return redirect()->to('member');
    }

    public function delete()
    {
        $member = new MemberModel();
        $member->delete($this->request->getPost('id_km'));

        return redirect()->to('member');
    }

  
}
