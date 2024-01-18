<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Skor;
use Illuminate\Http\Request;

class SkorController extends Controller
{
    public $response = [
        'success' => true,
        'message' => 'Success',
        'data' => []
    ];

    public function getAll(){
        try {
            $skors = Skor::all();

            $this->response['success'] = true;
            $this->response['message'] = 'Success';
            $this->response['data'] = $skors;

            return response()->json($this->response, 200);
        } catch (\Exception $e) {
            $this->response['success'] = false;
            $this->response['message'] = $e->getMessage();
            $this->response['data'] = [];

            return response()->json($this->response, 500);
        }
    }
}
