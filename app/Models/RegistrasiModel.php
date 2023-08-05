<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrasiModel extends Model
{
    protected $table      = 'registrasi';
    protected $primaryKey = 'id_registrasi';
    protected $allowedFields = ['nama', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'usia', 'no_ktp', 'no_telp', 'tipe_member', 'no_member', 'tgl_aktivasi', 'tgl_berakhir', 'pelatih', 'harga'];
}