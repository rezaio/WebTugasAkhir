<?php

namespace App\Models;

use CodeIgniter\Model;

class RekapModel extends Model
{
    protected $table      = 'rekap_data';
    protected $primaryKey = 'id_rekap';
    protected $allowedFields = ['hari', 'tanggal'];
}