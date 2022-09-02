<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanTiket extends Model
{
    use HasFactory;

    protected $table = 'pesan_tiket';
    protected $primaryKey = 'nomor_tiket';
}
