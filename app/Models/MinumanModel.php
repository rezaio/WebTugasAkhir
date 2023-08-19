<?php

namespace App\Models;

use CodeIgniter\Model;

class MinumanModel extends Model
{
    protected $table      = 'data_minuman';
    protected $primaryKey = 'id_minuman';
    protected $allowedFields = ['nama', 'harga', 'jumlah', 'tanggal'];

}
