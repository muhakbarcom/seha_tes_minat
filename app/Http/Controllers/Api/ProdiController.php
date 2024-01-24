<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public $response = [
        'success' => true,
        'message' => 'Success',
        'data' => []
    ];

    public function index(Request $request)
    {
        try {
            $start = $request->input('start', 0);
            $end = $request->input('end', PHP_INT_MAX);
            $keyword = $request->input('keyword', '');

            // ambil ke model Prodi saja
            $prodi = Prodi::where('NAMA_JURUSAN', 'LIKE', "%$keyword%")
                ->whereBetween('ID', [$start, $end])
                ->paginate(9);

            // Memotong deskripsi menjadi 15 kata
            foreach ($prodi as $item) {
                $item->DESKRIPSI = $this->limitWords($item->DESKRIPSI, 15);
            }

            $this->response['success'] = true;
            $this->response['message'] = 'Success';
            $this->response['data'] = $prodi;

            return response()->json($this->response, 200);
        } catch (\Exception $e) {
            $this->response['success'] = false;
            $this->response['message'] = $e->getMessage();
            $this->response['data'] = [];

            return response()->json($this->response, 500);
        }
    }

// Fungsi untuk memotong deskripsi menjadi jumlah kata tertentu
private function limitWords($string, $word_limit)
{
    // hilangkan format html
    $string = strip_tags($string);
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}


    // get by id
    public function getById($id)
    {
        try {
            $prodi = Prodi::find($id);

            if (!$prodi) throw new \Exception('Prodi not found');

            $this->response['success'] = true;
            $this->response['message'] = 'Success';
            $this->response['data'] = $prodi;

            return response()->json($this->response, 200);
        } catch (\Exception $e) {
            $this->response['success'] = false;
            $this->response['message'] = $e->getMessage();
            $this->response['data'] = [];

            return response()->json($this->response, 404);
        }
    }


}
