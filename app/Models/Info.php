<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'tb_m_info'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'ID'; // Ganti dengan nama primary key yang sesuai

    // Kolom-kolom yang bisa diisi
    protected $fillable = ['ID', 'CODE', 'DESKRIPSI_BIDANG_MINAT', 'KETERAMPILAN_KUNCI', 'KOMPONEN_PEKERJAAN', 'PROGRAM_STUDY', 'TYPE'];

    // Tidak menggunakan timestamp (created_at, updated_at)
    public $timestamps = false;
}
