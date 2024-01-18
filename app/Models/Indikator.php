<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $table = 'tb_m_indikator'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'ID'; // Ganti dengan nama primary key yang sesuai

    // Kolom-kolom yang bisa diisi
    protected $fillable = ['ID', 'CODE', 'INDIKATOR', 'ASPEK_ID'];

    // Tidak menggunakan timestamp (created_at, updated_at)
    public $timestamps = false;

    // Relasi dengan model Aspek
    public function aspek()
    {
        return $this->belongsTo(Aspek::class, 'ASPEK_ID', 'ID');
    }
}
