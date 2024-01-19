<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public $response = [
        'success' => true,
        'message' => 'Success',
        'data' => []
    ];

    public function getAll(){
        try {
            $Infos = Info::all();

            $this->response['success'] = true;
            $this->response['message'] = 'Success';
            $this->response['data'] = $Infos;

            return response()->json($this->response, 200);
        } catch (\Exception $e) {
            $this->response['success'] = false;
            $this->response['message'] = $e->getMessage();
            $this->response['data'] = [];

            return response()->json($this->response, 500);
        }
    }

    public function getByType($type){
        try {
            $Infos = Info::where('TYPE', $type)->get();

            $this->response['success'] = true;
            $this->response['message'] = 'Success';
            $this->response['data'] = $Infos;

            return response()->json($this->response, 200);
        } catch (\Exception $e) {
            $this->response['success'] = false;
            $this->response['message'] = $e->getMessage();
            $this->response['data'] = [];

            return response()->json($this->response, 500);
        }

    }
}
