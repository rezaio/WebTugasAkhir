<?php

namespace App\Models;

use CodeIgniter\Model;

class HarianModel extends Model
{
    protected $table      = 'kelas_harian';
    protected $primaryKey = 'id_kh';
    protected $allowedFields = ['nama', 'no_telp', 'tanggal', 'waktu', 'kelas', 'harga'];
}