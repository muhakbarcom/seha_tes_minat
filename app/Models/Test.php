<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tb_r_test'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'ID'; // Ganti dengan nama primary key yang sesuai

    // Kolom-kolom yang bisa diisi
    protected $fillable = ['ID', 'CODE_TEST', 'USER_ID', 'KC_ASPEK_ID', 'KC_PRESENTASE','KC_2_ASPEK_ID', 'KC_2_PRESENTASE', 'BK_1_ASPEK_ID', 'BK_1_PRESENTASE', 'BK_2_ASPEK_ID', 'BK_2_PRESENTASE', 'BK_3_ASPEK_ID', 'BK_3_PRESENTASE','FULL_NAME','BIRTHDAY','SCHOOL','EMAIL'];

    // nullable
    protected $nullable = ['KC_ASPEK_ID', 'KC_PRESENTASE','KC_2_ASPEK_ID', 'KC_2_PRESENTASE', 'BK_1_ASPEK_ID', 'BK_1_PRESENTASE', 'BK_2_ASPEK_ID', 'BK_2_PRESENTASE', 'BK_3_ASPEK_ID', 'BK_3_PRESENTASE','FULL_NAME','BIRTHDAY','SCHOOL','EMAIL'];

    // Tidak menggunakan timestamp (created_at, updated_at)
    public $timestamps = true;

    // get latest codeTest by user_id login
    public static function getCodeTest($user_id)
    {
        $codeTest = Test::where('USER_ID', $user_id)->orderBy('ID', 'DESC')->first();
        return $codeTest;
    }

    // generate codeTest by uniqid()
    public static function generateCodeTest()
    {
        $codeTest = uniqid();

        // check if codeTest is exist
        $checkCodeTest = Test::where('CODE_TEST', $codeTest)->first();

        // if codeTest is exist, then generate again
        if ($checkCodeTest) {
            $codeTest = Test::generateCodeTest();
        }

        // save
        $res = Test::saveCodeTest($codeTest);

        return $codeTest;
    }

    // save generated codeTest to database
    public static function saveCodeTest($codeTest)
    {
        $user_id = auth()->user()->id;
        $test = Test::create([
            'CODE_TEST' => $codeTest,
            'USER_ID' => $user_id
        ]);

        return $test;
    }

}
