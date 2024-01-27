<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LKPD_answer extends Model
{
    protected $table = 'tb_r_lkpd'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'ID'; // Ganti dengan nama primary key yang sesuai

    // Kolom-kolom yang bisa diisi
    protected $fillable = ['ID', 'CODE_TEST', 'QUESTION_ID','ANSWER'];

    // Tidak menggunakan timestamp (created_at, updated_at)
    public $timestamps = false;

    // relasi ke tabel tb_m_lkpd
    public function lkpd()
    {
        return $this->belongsTo('App\Models\LKPD', 'QUESTION_ID', 'ID');
    }
}
