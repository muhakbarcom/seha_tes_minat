<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'tb_m_jurusan'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'ID'; // Ganti dengan nama primary key yang sesuai

    // Kolom-kolom yang bisa diisi
    protected $fillable = ['ID', 'NAMA_JURUSAN', 'DESKRIPSI', 'PENGETAHUIAN_DAN_KEAHLIAN', 'KENAPA_HARUS_JURUSAN_INI', 'PROSPEK_KERJA', 'DUNIA_PERKULIAHAN'];

    // Tidak menggunakan timestamp (created_at, updated_at)
    public $timestamps = true;
}
