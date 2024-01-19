<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Test;

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

            $result_tes_kecerdasan = [
                'aspek_id' => $max_presentase_dataTestKecerdasan,
                'info' => $this->getDataInfoByAspekId($max_presentase_dataTestKecerdasan),
                'presentase' => $group_dataTestKecerdasan[$max_presentase_dataTestKecerdasan]['presentase'],
                'aspek_name' => $this->getDataAspekByID($max_presentase_dataTestKecerdasan)->NAME
            ];

            $result_tes_bakat = [];
            foreach ($max_presentase_dataTestBakat as $data) {
                $result_tes_bakat[] = [
                    'aspek_id' => $data['aspek_id'],
                    'info' => $this->getDataInfoByAspekId($data['aspek_id']),
                    'presentase' => $data['presentase'],
                    'aspek_name' => $this->getDataAspekByID($data['aspek_id'])->NAME
                ];
            }
            
            $prepareDataToSave = [
                'code_test' => uniqid(),
                'kc_aspek_id' => $result_tes_kecerdasan['aspek_id'],
                'kc_presentase' => $result_tes_kecerdasan['presentase'],
                'bk_1_aspek_id' => $result_tes_bakat[0]['aspek_id'],
                'bk_1_presentase' => $result_tes_bakat[0]['presentase'],
                'bk_2_aspek_id' => $result_tes_bakat[1]['aspek_id'],
                'bk_2_presentase' => $result_tes_bakat[1]['presentase'],
                'bk_3_aspek_id' => $result_tes_bakat[2]['aspek_id'],
                'bk_3_presentase' => $result_tes_bakat[2]['presentase'],
            ];

            $save = $this->saveToTest($prepareDataToSave);

            if (!$save['success']) {
                throw new \Exception($save['message']);
            }

            $result_final = [
                'tes_kecerdasan' => $result_tes_kecerdasan,
                'tes_bakat' => $result_tes_bakat,
                'CodeTest' => $save['data']['CODE_TEST'] ?? ''
            ];

            $this->response['success'] = true;
            $this->response['message'] = 'Success';
            $this->response['data'] = $result_final;

            return response()->json($this->response, 200);
        } catch (\Exception $e) {
            $this->response['success'] = false;
            $this->response['message'] = $e->getMessage();
            $this->response['data'] = [];

            return response()->json($this->response, 500);
        }
    }

    public function getResultByCodeTest(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'codeTest' => 'required|string',
            ]);

            if ($validator->fails()) {
                $this->response['success'] = false;
                $this->response['message'] = $validator->errors();
                return response()->json($this->response, 200);
            }

            $code_test = $req->codeTest;

            $data = DB::table('tb_r_test')
                ->where('CODE_TEST', $code_test)
                ->first();

            $result_tes_kecerdasan = [
                'aspek_id' => $data->KC_ASPEK_ID,
                'info' => $this->getDataInfoByAspekId($data->KC_ASPEK_ID),
                'presentase' => $data->KC_PRESENTASE,
                'aspek_name' => $this->getDataAspekByID($data->KC_ASPEK_ID)->NAME
            ];

            $result_tes_bakat = [];
            $result_tes_bakat[] = [
                'aspek_id' => $data->BK_1_ASPEK_ID,
                'info' => $this->getDataInfoByAspekId($data->BK_1_ASPEK_ID),
                'presentase' => $data->BK_1_PRESENTASE,
                'aspek_name' => $this->getDataAspekByID($data->BK_1_ASPEK_ID)->NAME
            ];

            $result_tes_bakat[] = [
                'aspek_id' => $data->BK_2_ASPEK_ID,
                'info' => $this->getDataInfoByAspekId($data->BK_2_ASPEK_ID),
                'presentase' => $data->BK_2_PRESENTASE,
                'aspek_name' => $this->getDataAspekByID($data->BK_2_ASPEK_ID)->NAME
            ];

            $result_tes_bakat[] = [
                'aspek_id' => $data->BK_3_ASPEK_ID,
                'info' => $this->getDataInfoByAspekId($data->BK_3_ASPEK_ID),
                'presentase' => $data->BK_3_PRESENTASE,
                'aspek_name' => $this->getDataAspekByID($data->BK_3_ASPEK_ID)->NAME
            ];

            $result_final = [
                'tes_kecerdasan' => $result_tes_kecerdasan,
                'tes_bakat' => $result_tes_bakat,
                'CodeTest' => $code_test
            ];

            $this->response['success'] = true;
            $this->response['message'] = 'Success';
            $this->response['data'] = $result_final;

            return response()->json($this->response, 200);
        } catch (\Exception $e) {
            $this->response['success'] = false;
            $this->response['message'] = $e->getMessage();
            $this->response['data'] = [];

            return response()->json($this->response, 500);
        }
    }

    private function saveToTest($data)
    {
        try {
            $prepare_data = [
                'USER_ID' => auth()->user()->id ?? '',
                'CODE_TEST' => $data['code_test'],
                'KC_ASPEK_ID' => $data['kc_aspek_id'],
                'KC_PRESENTASE' => $data['kc_presentase'],
                'BK_1_ASPEK_ID' => $data['bk_1_aspek_id'],
                'BK_1_PRESENTASE' => $data['bk_1_presentase'],
                'BK_2_ASPEK_ID' => $data['bk_2_aspek_id'],
                'BK_2_PRESENTASE' => $data['bk_2_presentase'],
                'BK_3_ASPEK_ID' => $data['bk_3_aspek_id'],
                'BK_3_PRESENTASE' => $data['bk_3_presentase'],
            ];
            
            $res = Test::create($prepare_data);
            
            $this->response['success'] = true;
            $this->response['message'] = 'Success';
            $this->response['data'] = $prepare_data;
        } catch (\Exception $e) {
            $this->response['success'] = false;
            $this->response['message'] = $e->getMessage();
            $this->response['data'] = [];
        }

        return $this->response;
    }

    private function getDataAspekByID($id)
    {
        $res = DB::table('tb_m_aspek')
            ->where('ID', $id)
            ->first();

        return $res;
    }

    private function getDataInfoByAspekId($aspek_id)
    {
        $res = DB::table('tb_m_info')
            ->where('CODE', $aspek_id)
            ->first();

        return $res;
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
