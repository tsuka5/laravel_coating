<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Experiment; 
use App\Models\Film_condition; 
use App\Models\Charactaristic_test; 
use App\Models\Material;
use App\Models\Additive;
use App\Models\Storing_test;
use App\Models\Antibacteria_test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;




class CsvController extends Controller
{
    public function show()
    {
        return view('user.csv.csv-export');
    }

    public function exportCsv()
    {
        // $data1 = Experiment::get();
        // $data2 = Material::select('experiment_id',
        //     DB::raw('group_concat(m_name)','concentration', 'heat', 'water_temperature','water_rate', 'material_rate', 'staler_speed', 'ph_adjustment', 'ph_material', 'ph_target'))
        //     ->groupBy('experiment_id')
        //     ->orderBy('experiment_id')
        //     ->get();
        // $data3 = Additive::select('experiment_id',
        // DB::raw('group_concat(ad_name)'))
        // ->groupBy('experiment_id')
        // ->orderBy('experiment_id')
        // ->get();
        // $data4 = Film_condition::get();
        // $data5 = Charactaristic_test::get();
        // $data6 = Storing_test::get();
        // $data7 = Antibacteria_test::get();

        // $mergedData = $data1->concat($data2)->concat($data3)
        // ->concat($data4)->concat($data5)->concat($data6)->concat($data7);




        $mergedData = Experiment::join('materials', 'experiments.id', '=', 'materials.experiment_id')
            ->join('additives', 'experiments.id', '=','additives.experiment_id')
            ->join('film_conditions', 'experiments.id', '=','film_conditions.experiment_id')
            ->join('charactaristic_tests', 'experiments.id', '=', 'charactaristic_tests.experiment_id')
            ->join('storing_tests', 'experiments.id', '=', 'storing_tests.experiment_id')
            ->join('antibacteria_tests', 'experiments.id', '=', 'antibacteria_tests.experiment_id')
            ->get();

        // $mergedData = Experiment::query()
        // ->with(['material','additive','film_condition','charactaristic_test','storing_test','antibacteria_test'])
        // ->get()
        // ->toArray();



        $csvFileName = 'exported_data.csv';
        $csvFilePath = storage_path($csvFileName); // ファイルパスを適切に変更
        
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        
        $handle = fopen($csvFilePath, 'w');
        fputcsv($handle, array_keys($mergedData[0]->toArray()));
        
        foreach ($mergedData as $row) {
            fputcsv($handle, $row->toArray());
        }
        
        fclose($handle);
        
        // ブラウザに直接ダウンロードさせる場合
        return Response::make(file_get_contents($csvFilePath), 200, $headers);
    }
}

