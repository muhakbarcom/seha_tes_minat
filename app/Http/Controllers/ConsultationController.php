<?php

namespace App\Http\Controllers;

use App\Models\HomeModel;
use Illuminate\Http\Request;
use App\Models\Test;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($codeTest = null)
    {
        // jika $codeTest tidak ada, maka getCodeTest
        if (!$codeTest || $codeTest  === null) {
            $user_id = auth()->user()->id;
            $codeTest = Test::getCodeTest($user_id)->CODE_TEST ?? null;

            // jika getCodeTest tidak ada, maka generateCodeTest
            if (!$codeTest || $codeTest  === null) {
                $codeTest = Test::generateCodeTest();
            }
        }

        $step = Test::getStep($codeTest);

        return view('v_consultation', ['codeTest' => $codeTest, 'step' => $step]);
    }
}
