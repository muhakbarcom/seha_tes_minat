<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LKPD;
use App\Models\LKPD_answer;
use App\Models\Response;
use Illuminate\Http\Request;

class LKPDController extends Controller
{

    public function getAll(){
        try {
            // $LKPDs = LKPD::all();
            // get all and row number
            $LKPDs = LKPD::selectRaw('*, ROW_NUMBER() OVER(ORDER BY ID) AS NO')->get();

            Response::$response['data'] = $LKPDs;
            Response::$response['message'] = 'Success';
            Response::$response['success'] = true;
            
            return response()->json(Response::$response, 200);
        } catch (\Exception $e) {
            Response::$response['message'] = $e->getMessage();
            Response::$response['success'] = false;
            
            return response()->json(Response::$response, 500);
        }
    }

    // delete by code test and save new answer
    public function saveAnswer(Request $request){
        try {
            $codeTest = $request->codeTest;
            $dataLKPD = $request->dataLKPD;

            $answers = json_decode($dataLKPD, true);

            // delete by code test
            LKPD_answer::where('CODE_TEST', $codeTest)->delete();

            // save new answer
            foreach ($answers as $answer) {
                $lkpd_answer = new LKPD_answer();
                $lkpd_answer->CODE_TEST = $codeTest;
                $lkpd_answer->QUESTION_ID = $answer['QUESTION_ID'];
                $lkpd_answer->ANSWER = $answer['ANSWER'];
                $lkpd_answer->save();
            }

            Response::$response['message'] = 'Success';
            Response::$response['success'] = true;
            
            return response()->json(Response::$response, 200);
        } catch (\Exception $e) {
            Response::$response['message'] = $e->getMessage();
            Response::$response['success'] = false;
            
            return response()->json(Response::$response, 500);
        }
    }
}
