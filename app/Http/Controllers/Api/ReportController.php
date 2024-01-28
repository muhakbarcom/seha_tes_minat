<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Test;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Response;
use App\Models\LKPD_answer;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class ReportController extends Controller
{
    public $response = [
        'success' => true,
        'message' => 'Success',
        'data' => []
    ];

    public function getLastCodeTestbyUserId($user_id)
    {
        try {
            $res = Test::where('USER_ID', $user_id)
                ->orderBy('ID', 'DESC')
                ->first();

            if ($res) {
                $response = [
                    'success' => true,
                    'message' => 'Success',
                    'data' => $res->CODE_TEST ?? '',
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Data not found',
                    'data' => '',
                ];
            }

            return response()->json($response);
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => '',
            ];

            return response()->json($response, 500);
        }
    }


    public function getResult(Request $req) // generate result
    {
        try {

            $validator = Validator::make($req->all(), [
                'dataTestKecerdasan' => 'required|string',
                'dataTestBakat' => 'required|string',
                'dataForm' => 'required|string',
                'codeTest' => 'required|string',
            ]);

            if ($validator->fails()) {
                $this->response['success'] = false;
                $this->response['message'] = $validator->errors();
                return response()->json($this->response, 200);
            }

            $dataTestKecerdasan = $req->dataTestKecerdasan;
            $dataTestBakat = $req->dataTestBakat;
            $dataForm = $req->dataForm;
            $codeTest = $req->codeTest;

            // ubah string object json ke array
            $dataTestKecerdasan = json_decode($dataTestKecerdasan, true);
            $dataTestBakat = json_decode($dataTestBakat, true);
            $dataForm = json_decode($dataForm, true);

            $FULL_NAME = $dataForm['name'];
            $BIRTHDAY = $dataForm['date'];
            $SCHOOL = $dataForm['education'];
            $EMAIL = $dataForm['email'];

            

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
            // $max_presentase_dataTestKecerdasan = $max_presentase_dataTestKecerdasan[0]['aspek_id'];
            $max_presentase_dataTestKecerdasan = array_slice($max_presentase_dataTestKecerdasan, 0, 2);
            
            $max_presentase_dataTestBakat = $this->sortByBiggest($group_dataTestBakat);
            $max_presentase_dataTestBakat = array_slice($max_presentase_dataTestBakat, 0, 3);

            $result_tes_kecerdasan = [];
            foreach ($max_presentase_dataTestKecerdasan as $data) {
                $result_tes_kecerdasan[] = [
                    'aspek_id' => $data['aspek_id'],
                    'info' => $this->getDataInfoByAspekId($data['aspek_id']),
                    'presentase' => $data['presentase'],
                    'aspek_name' => $this->getDataAspekByID($data['aspek_id'])->NAME
                ];
            }

            // $result_tes_kecerdasan = [
            //     'aspek_id' => $max_presentase_dataTestKecerdasan,
            //     'info' => $this->getDataInfoByAspekId($max_presentase_dataTestKecerdasan),
            //     'presentase' => $group_dataTestKecerdasan[$max_presentase_dataTestKecerdasan]['presentase'],
            //     'aspek_name' => $this->getDataAspekByID($max_presentase_dataTestKecerdasan)->NAME
            // ];

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
                'kc_aspek_id' => $result_tes_kecerdasan[0]['aspek_id'],
                'kc_presentase' => $result_tes_kecerdasan[0]['presentase'],
                'kc_2_aspek_id' => $result_tes_kecerdasan[1]['aspek_id'],
                'kc_2_presentase' => $result_tes_kecerdasan[1]['presentase'],
                'bk_1_aspek_id' => $result_tes_bakat[0]['aspek_id'],
                'bk_1_presentase' => $result_tes_bakat[0]['presentase'],
                'bk_2_aspek_id' => $result_tes_bakat[1]['aspek_id'],
                'bk_2_presentase' => $result_tes_bakat[1]['presentase'],
                'bk_3_aspek_id' => $result_tes_bakat[2]['aspek_id'],
                'bk_3_presentase' => $result_tes_bakat[2]['presentase'],
                'FULL_NAME' => $FULL_NAME ?? '',
                'BIRTHDAY' => $BIRTHDAY ?? '',
                'SCHOOL' => $SCHOOL ?? '',
                'EMAIL' => $EMAIL ?? '',
            ];

            $save = $this->saveToTest($prepareDataToSave,$codeTest);

            if (!$save['success']) {
                throw new \Exception($save['message']);
            }

            Request()->request->add(['codeTest' => $codeTest]);
            
            $result_final = $this->getResultByCodeTest( Request());
            $result_final = json_decode($result_final->getContent(), true);
            if (!$result_final['success']) {
                throw new \Exception($result_final['message']);
            }
            
            $result_final = $result_final['data'];

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

            $result_tes_kecerdasan = [];
            $result_tes_kecerdasan[] = [
                'aspek_id' => $data->KC_ASPEK_ID,
                'info' => $this->getDataInfoByAspekId($data->KC_ASPEK_ID),
                'presentase' => $data->KC_PRESENTASE,
                'aspek_name' => $this->getDataAspekByID($data->KC_ASPEK_ID)->NAME
            ];

            $result_tes_kecerdasan[] = [
                'aspek_id' => $data->KC_2_ASPEK_ID,
                'info' => $this->getDataInfoByAspekId($data->KC_2_ASPEK_ID) ?? null,
                'presentase' => $data->KC_2_PRESENTASE,
                'aspek_name' => $this->getDataAspekByID($data->KC_2_ASPEK_ID)->NAME ?? null
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

            $result_data_form = [
                'FULL_NAME' => $data->FULL_NAME,
                'BIRTHDAY' => $data->BIRTHDAY,
                'SCHOOL' => $data->SCHOOL,
                'EMAIL' => $data->EMAIL,
            ];

            $result_final = [
                'tes_kecerdasan' => $result_tes_kecerdasan,
                'tes_bakat' => $result_tes_bakat,
                'data_form' => $result_data_form,
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

    private function saveToTest($data,$codeTest)
    {
        try {
            $prepare_data = [
                'USER_ID' => auth()->user()->id ?? '',
                'KC_ASPEK_ID' => $data['kc_aspek_id'],
                'KC_PRESENTASE' => $data['kc_presentase'],
                'KC_2_ASPEK_ID' => $data['kc_2_aspek_id'],
                'KC_2_PRESENTASE' => $data['kc_2_presentase'],
                'BK_1_ASPEK_ID' => $data['bk_1_aspek_id'],
                'BK_1_PRESENTASE' => $data['bk_1_presentase'],
                'BK_2_ASPEK_ID' => $data['bk_2_aspek_id'],
                'BK_2_PRESENTASE' => $data['bk_2_presentase'],
                'BK_3_ASPEK_ID' => $data['bk_3_aspek_id'],
                'BK_3_PRESENTASE' => $data['bk_3_presentase'],
                'FULL_NAME' => $data['FULL_NAME'],
                'BIRTHDAY' => $data['BIRTHDAY'],
                'SCHOOL' => $data['SCHOOL'],
                'EMAIL' => $data['EMAIL'],
            ];
            
            // update
            $res = Test::where('CODE_TEST', $codeTest)
                ->update($prepare_data);
            
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

    // private function getDataInfoByAspekId($aspek_id)
    // {
    //     $res = DB::table('tb_m_info')
    //         ->where('CODE', $aspek_id)
    //         ->first();

    //     return $res;
    // }

    private function getDataInfoByAspekId($aspek_id)
    {
        // ambil data dari tb_m_aspek berdasarkan tb_m_aspek.ID untuk mengambil tb_m_aspek.DESKRIPSI_HASIL_TES.
        $res = DB::table('tb_m_aspek')
            ->where('ID', $aspek_id)
            ->first();

        // Ambil jurusan dari tb_m_aspek_jurusan berdasarkan tb_m_aspek_jurusan.ASPEK_ID dan relasikan ke tb_m_jurusan.ID untuk mengambil tb_m_jurusan.NAMA_JURUSAN
        $jurusan = DB::table('tb_m_aspek_jurusan')
                ->join('tb_m_jurusan', 'tb_m_jurusan.ID', '=', 'tb_m_aspek_jurusan.JURUSAN_ID')
                ->where('tb_m_aspek_jurusan.ASPEK_ID', $aspek_id)
                ->get();
                
        // masukan jurusan ke aspek
        $res->JURUSAN = $jurusan;

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

    public function downloadReportWithDomPDFByHTML(Request $req)
    {
        $data = $this->getResultByCodeTest($req);
        $data = json_decode($data->getContent(), true);

        if(!$data['success']){
            return response()->json($data, 500);
        }

        $data = $data['data'];

        // return view('v_report', ['data' => $data]);

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);
        $dompdf->setPaper('A4', 'potrait');

        $datetime = date('YmdHis');

        $filename = 'report_'.$data['CodeTest'].'_'.$datetime;
        // load view
        $html = View::make('v_report', ['data' => $data, 'filename' => $filename]);
        $html = $html->render();

        // load html
        $dompdf->loadHtml($html);

        // file name

        // Render the HTML as PDF
        $dompdf->render();

        $dompdf->stream($filename);
    }


    public function downloadResultLkdp(Request $req)
    {
        $codeTest = $req->codeTest;

        // ambil data LKPD Answer by code test. Relasikan dengan tb_m_lkpd.ID = tb_r_lkpd.QUESTION_ID
        $lkpd_answer = LKPD_answer::selectRaw('tb_m_lkpd.ID, tb_m_lkpd.QUESTION, tb_r_lkpd.ANSWER')
            ->join('tb_m_lkpd', 'tb_m_lkpd.ID', '=', 'tb_r_lkpd.QUESTION_ID')
            ->where('tb_r_lkpd.CODE_TEST', $codeTest)
            ->get();

        $html = $this->generateHtmlLKPD($lkpd_answer,$codeTest);


        $pdf = PDF::loadHTML($html);
        $datetime = date('YmdHis');

        $filename = 'result_lkdp_feedback_'.$codeTest.'_'.$datetime.'.pdf';

        return $pdf->download($filename, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    private function generateHtmlLKPD($data,$codeTest){
        $que = '';
        foreach ($data as $key => $value) {
            $que .= '<li>';
            $que .= '<b>'.$value['QUESTION'].'</b>';
            $que .= '<p>Jawab : '.$value['ANSWER'].'</p>';
            $que .= '</li>';
        }

        $html = '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                    <title>Lembar Kerja Peserta Didik (LPDK)</title>
                    </head>
                    <body>

                    <div style="margin: 0 auto; width: 500px;">
                        <div style="padding: 10px; background-color: #FC6736;">
                        <h1>Lembar Kerja Peserta Didik (LPDK)</h1>
                        </div>
                        <hr>
                        <small>Code Test: '.$codeTest.'</small>
                        <ol>
                        '.$que.'
                        </ol>

                    </div>

                    </body>
                    </html>
                    ';

        

        return $html;
    }

    public function generateCodeTest()
    {
        try {
            $code_test = Test::generateCodeTest();

            $data = [
                'codeTest' => $code_test
            ];

            Response::$response['success'] = true;
            Response::$response['message'] = 'Success';
            Response::$response['data'] = $data;

            return response()->json(Response::$response, 200);
        } catch (\Exception $e) {
            Response::$response['success'] = false;
            Response::$response['message'] = $e->getMessage();
            Response::$response['data'] = [];

            return response()->json(Response::$response, 500);
        }
    }


}
