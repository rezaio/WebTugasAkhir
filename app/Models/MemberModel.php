<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table      = 'kunjungan_member';
    protected $primaryKey = 'id_km';
    protected $allowedFields = ['id_registrasi', 'tanggal', 'waktu'];
}