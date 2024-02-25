<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LKPD extends Model
{
    protected $table = 'tb_m_lkpd'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'ID'; // Ganti dengan nama primary key yang sesuai

    // Kolom-kolom yang bisa diisi
    protected $fillable = ['ID',  'QUESTION'];

    // Tidak menggunakan timestamp (created_at, updated_at)
    public $timestamps = false;

    // check if codeTest is exist
    public static function checkCodeTest($codeTest)
    {
        $checkCodeTest = LKPD_answer::where('CODE_TEST', $codeTest)->first();
        $result = $checkCodeTest ? true : false;
        return $result;
    }
}
