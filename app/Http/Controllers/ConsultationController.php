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
        if (!$codeTest) {
            $user_id = auth()->user()->id;
            $codeTest = Test::getCodeTest($user_id)->CODE_TEST;

            // jika getCodeTest tidak ada, maka generateCodeTest
            if (!$codeTest) {
                $codeTest = Test::generateCodeTest();
            }
        }

        return view('v_consultation', ['codeTest' => $codeTest]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function show(HomeModel $homeModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeModel $homeModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeModel  $homeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeModel $homeModel)
    {
        //
    }
}
