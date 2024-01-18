<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    protected $table = 'tb_m_skor'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'ID'; // Ganti dengan nama primary key yang sesuai

    // Kolom-kolom yang bisa diisi
    protected $fillable = ['ID', 'NAME', 'CODE', 'POINT'];

    // Tidak menggunakan timestamp (created_at, updated_at)
    public $timestamps = false;
}
