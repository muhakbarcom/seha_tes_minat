<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndikatorController extends Controller
{
    public $response = [
        'success' => true,
        'message' => 'Success',
        'data' => []
    ];

    public function getByAspekType($type, Request $request)
    {
        try {
            // Set default values for start and end if not provided
            $start = $request->input('start', 0);
            $end = $request->input('end', PHP_INT_MAX);

            // Menggunakan Eloquent untuk melakukan join dan mengambil data dengan pagination
            $indikators = Indikator::join('tb_m_aspek', 'tb_m_indikator.ASPEK_ID', '=', 'tb_m_aspek.ID')
                ->select(DB::raw('ROW_NUMBER() OVER () as row_number'), 'tb_m_indikator.*')
                ->where('tb_m_aspek.TYPE', $type)
                ->whereBetween('tb_m_indikator.ID', [$start, $end])
                ->paginate(10); // You can change 10 to the number of items you want per page

            $this->response['success'] = true;
            $this->response['message'] = 'Success';
            $this->response['data'] = $indikators;

            return response()->json($this->response, 200);
        } catch (\Exception $e) {
            $this->response['success'] = false;
            $this->response['message'] = $e->getMessage();
            $this->response['data'] = [];

            return response()->json($this->response, 500);
        }
    }
}
