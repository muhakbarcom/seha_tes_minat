<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public $response = [
        'success' => true,
        'message' => 'Success',
        'data' => []
    ];

    public function getResult(Request $req)
    {
        try {

            $validator = Validator::make($req->all(), [
                'dataTestKecerdasan' => 'required|string',
                'dataTestBakat' => 'required|string',
            ]);

            if ($validator->fails()) {
                $this->response['success'] = false;
                $this->response['message'] = $validator->errors();
                return response()->json($this->response, 200);
            }

            $dataTestKecerdasan = $req->dataTestKecerdasan;
            $dataTestBakat = $req->dataTestBakat;

            // ubah string object json ke array
            $dataTestKecerdasan = json_decode($dataTestKecerdasan, true);
            $dataTestBakat = json_decode($dataTestBakat, true);

            // set point data test kecerdasan
            $dataTestBakat_point = $this->getBulkPointByCode($dataTestBakat);
            $dataTestKecerdasan_point = $this->getBulkPointByCode($dataTestKecerdasan);
            
            // set aspek id data test kecerdasan
            $set_dataTestBakat = $this->getBulkAspekIdByIndikatorId($dataTestBakat_point);
            $set_dataTestKecerdasan = $this->getBulkAspekIdByIndikatorId($dataTestKecerdasan_point);

            // grouping data test kecerdasan berdasarkan aspek id
            $group_dataTestBakat = $this->groupByAspekId($set_dataTestBakat);
            $group_dataTestKecerdasan = $this->groupByAspekId($set_dataTestKecerdasan);

            // ambil aspek_id dari $group_dataTestKecerdasan berdasarkan presentase tertinggi
            $max_presentase_dataTestKecerdasan = $this->sortByBiggest($group_dataTestKecerdasan);
            $max_presentase_dataTestKecerdasan = $max_presentase_dataTestKecerdasan[0]['aspek_id'];

            // ambil 3 aspek_id dari $group_dataTestBakat berdasarkan presentase tertinggi
            $max_presentase_dataTestBakat = $this->sortByBiggest($group_dataTestBakat);
            $max_presentase_dataTestBakat = array_slice($max_presentase_dataTestBakat, 0, 3);
            



           \dd($max_presentase_dataTestBakat);

            $this->response['success'] = true;
            $this->response['message'] = 'Success';
            $this->response['data'] = $req;

            return response()->json($this->response, 200);
        } catch (\Exception $e) {
            $this->response['success'] = false;
            $this->response['message'] = $e->getMessage();
            $this->response['data'] = [];

            return response()->json($this->response, 500);
        }
    }

    private function sortByBiggest($array)
    {
        $res = [];
        foreach ($array as $key => $value) {
            $res[$key] = $value['presentase'];
        }

        array_multisort($res, SORT_DESC, $array);

        return $array;
    }

    private function getPointByCode($code)
    {
        $res = DB::table('tb_m_skor')
            ->where('CODE', $code)
            ->first();

        return $res;
    }

    private function getBulkPointByCode($array){
        $res = [];
        foreach ($array as $data) {
            $point = $this->getPointByCode($data['indikator_res']);
            
            $res[] = [
                'indikator_id' => $data['indikator_id'],
                'point' => $point->POINT
            ];
        }

        return $res;
    }

    private function getAspekIdByIndikatorId($indikator_id)
    {
        $res = DB::table('tb_m_indikator')
            ->where('ID', $indikator_id)
            ->first();

        return $res->ASPEK_ID;
    }

    private function getBulkAspekIdByIndikatorId($array)
    {
        $res = [];
        foreach ($array as $data) {
            $aspek_id = $this->getAspekIdByIndikatorId($data['indikator_id']);

            $res[] = [
                'indikator_id' => $data['indikator_id'],
                'point' => $data['point'], // 'point' => $data['point'] ?? '0',
                'aspek_id' => $aspek_id
            ];
        }

        return $res;
    }

    private function groupByAspekId($array)
    {
        $res = [];
        foreach ($array as $data) {
            $max_point_by_aspek_id = $this->getTotalPointFromSkorByAspekId($data['aspek_id']);
            $res[$data['aspek_id']][] = $data;
            $res[$data['aspek_id']]['total_point'] = array_sum(array_column($res[$data['aspek_id']], 'point'));
            // hitung presentase
            $res[$data['aspek_id']]['presentase'] = $res[$data['aspek_id']]['total_point'] / $max_point_by_aspek_id * 100;
            $res[$data['aspek_id']]['aspek_id'] = $data['aspek_id'];
        }

        return $res;
    }

    private function getTotalPointFromSkorByAspekId($aspek_id)
    {
        // count indikator by aspek id
        $count_indikator = DB::table('tb_m_indikator')
            ->where('ASPEK_ID', $aspek_id)
            ->count();

        // get max point from tb_m_skor
        $max_point = DB::table('tb_m_skor')
            ->max('POINT');

        $max_point = $max_point * $count_indikator;
        
        return $max_point;
    }


}
