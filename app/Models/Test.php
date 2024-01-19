<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tb_r_test'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'ID'; // Ganti dengan nama primary key yang sesuai

    // Kolom-kolom yang bisa diisi
    protected $fillable = ['ID', 'CODE_TEST', 'USER_ID', 'KC_ASPEK_ID', 'KC_PRESENTASE', 'BK_1_ASPEK_ID', 'BK_1_PRESENTASE', 'BK_2_ASPEK_ID', 'BK_2_PRESENTASE', 'BK_3_ASPEK_ID', 'BK_3_PRESENTASE'];

    // Tidak menggunakan timestamp (created_at, updated_at)
    public $timestamps = true;
}
