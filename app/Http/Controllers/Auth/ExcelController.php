<?php

namespace App\Http\Controllers\Auth;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\NamedRange;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Material;
use App\Models\Material_detail;
use App\Models\Fruit_detail;
use App\Models\Material_composition;
use App\Models\Storing_test;
use App\Models\Storing_multiple_test;
use App\Models\Film_condition;
use App\Models\Viscosity_test;
use App\Models\Wvp_test;
use App\Models\Enzyme_test;
use App\Models\Enzyme_value;


use App\Http\Controllers\Controller;
use App\Models\Charactaristic_test;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function export($experiment_id, $type)
    {
        // 新しいスプレッドシートを作成
        $spreadsheet = new Spreadsheet();
        
        // アクティブなシートを取得
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1 -> setTitle('home');

        $composition_count = Material_composition::where('experiment_id', $experiment_id)->count();
        
        function generateColumnNames_export() {
            $columns = [];
            for ($i = 0; $i < 2; $i++) {  // A to ZZ
                foreach (range('A', 'Z') as $first) {
                    if ($i == 0) {
                        $columns[] = $first;
                    } else {
                        foreach (range('A', 'Z') as $second) {
                            $columns[] = $first . $second;
                        }
                    }
                }
            }
            return $columns;
        }
        $column_list = generateColumnNames_export();


        if($type === 'storing_test'){         
         

                $sheet2_name = 'multiple_test';
                $sheet2 = new Worksheet($spreadsheet, $sheet2_name);
                $spreadsheet->addSheet($sheet2, 1);  
    
                $sheet3_name = 'enzyme_test';
                $sheet3 = new Worksheet($spreadsheet, $sheet3_name);
                $spreadsheet->addSheet($sheet3, 2);  
    
                // データをシートに設定
                
                $storing_test = Storing_test::where('experiment_id', $experiment_id)->first();
                if (!$storing_test || !$storing_test->storing_fruit_id) {
                    return response()->json(['error' => 'Please entry basic information first'], 400);
                }
                $fruit_name = Fruit_detail::where('id', $storing_test->storing_fruit_id)->first();
                //組成の数に影響を受けないデータ
                $sheet1->setCellvalue('A1', 'Experiment No.');
                $sheet1->setCellValue('B1', $experiment_id);
                $sheet1->setCellValue('A2', 'Composition Count');
                $sheet1->setCellValue('B2', $composition_count);
                $sheet1->setCellValue('E1', 'Temperature(℃)');
                $sheet1->setCellValue('E2', $storing_test->storing_temperature);
                $sheet1->setCellValue('F1', 'Storing Humidity(%RH)');
                $sheet1->setCellValue('F2', $storing_test->storing_humidity);
                $sheet1->setCellValue('D1', 'Fruit name');
                $sheet1->setCellValue('D2', $fruit_name->name);
                $sheet2->setCellValue('A1', 'Multiple Storing test');
                $sheet3->setCellValue('A1', 'Enzyme test');
                //組成の数に影響を受けるデータ
                $composition_ids = Material_composition::where('experiment_id', $experiment_id)->get(['id']);
                $composition_number = 1;
                $composition_row = 4;
                // $column_list = generateColumnNames();
                $multiple_composition_start = 0;
                $enzyme_composition_start = 0;
    
                foreach($composition_ids as $composition){
                    $composition_id = $composition->id;
                    //homeの設定
                    $sheet1->setCellValue('A'.$composition_row, 'Composition:'.$composition_number);
                    $sheet1->setCellValue('A'.($composition_row+1), 'Material');
                    $sheet1->setCellValue('B'.($composition_row+1), 'Concentration(%)');
                    // multiple_testの設定
                    $sheet2->setCellValue($column_list[$multiple_composition_start] . '3', 'composition:'.$composition_number);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+1] . '3', 'id=');
                    $sheet2->setCellValue($column_list[$multiple_composition_start+2] . '3', $composition_id);
                    $multiple_columns = range($multiple_composition_start, $multiple_composition_start+14);
                    $multiple_values = ['Day', 'Mass loss rate(%)', 'L*', 'a*', 'b*','⊿E','pH','TSS','Hardness(N)','Moisture content(%)','TA(%)', 'Vitamin C(%)','Respirtry rate(mgCO^2/(kg*h)','Phenolic Content(mg GAE/L)', 'memo'];
                    foreach ($multiple_columns as $index => $column) {
                        $sheet2->setCellValue($column_list[$column] . '4', $multiple_values[$index]);
                    }
                    // //enzyme_testの設定
                    $sheet3->setCellValue($column_list[$enzyme_composition_start] . '3', 'composition:'.$composition_number);
                    $sheet3->setCellValue($column_list[$enzyme_composition_start+1] . '3', 'id=');
                    $sheet3->setCellValue($column_list[$enzyme_composition_start+2] . '3', $composition_id);
                    $enzyme_columns = range($enzyme_composition_start, $enzyme_composition_start+2);
                    $enzyme_values = ['Day','Enzyme Actibity', 'memo'];
                    foreach ($enzyme_columns as $index => $column) {
                        $sheet3->setCellValue($column_list[$column] . '4', $enzyme_values[$index]);
                    }
                    //tgaは後で
    
                    //選択した材料組成の表示
                    $material_row = $composition_row+2;
                    $material_list = Material::where('composition_id', $composition_id)->get(['material_id']);
    
                    foreach($material_list as $material){
                        $material_id = $material->material_id;
                        $material_name = Material_detail::where('id', $material_id)->first()->name;
                        $sheet1->setCellValue('A' . $material_row, $material_name);
                        $material_concentration = Material::where('material_id', $material_id)->first()->concentration;
                        $sheet1->setCellValue('B' . $material_row, $material_concentration);
                        $material_row += 1;
                    }
                    $composition_row = $material_row + 1;
                    $composition_number++;
                    $multiple_composition_start = $multiple_composition_start + 16;
                    $enzyme_composition_start = $enzyme_composition_start + 4;
                }     
                //セルの横幅調整           
                foreach($column_list as $column){
                    $sheet1->getColumnDimension($column)->setAutoSize(true);
                    // $sheet1->getStyle('D:E')->getNumberFormat()->setFormatCode('0.0');
                    $sheet2->getColumnDimension($column)->setAutoSize(true);
                    // $sheet2->getStyle('C:I')->getNumberFormat()->setFormatCode('0.0');
                    $sheet3->getColumnDimension($column)->setAutoSize(true);
                    // $sheet3->getStyle('C:I')->getNumberFormat()->setFormatCode('0.0'); 
                    }
                 
                  
                
                // 出力設定
                $writer = new Xlsx($spreadsheet);
    
                $response = new StreamedResponse(function() use ($writer) {
                    $writer->save('php://output');
                }, 200, [
                    'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'Content-Disposition' => 'attachment;filename="storing_test.xlsx"',
                    'Cache-Control' => 'max-age=0',
                ]);
    
            
            }

        
        elseif($type ==='film_condition'){
       
            //２枚目のワークシートの枠組みを作成する
            $sheet2_name = 'film_condition';
            $sheet2 = new Worksheet($spreadsheet, $sheet2_name);
            $spreadsheet->addSheet($sheet2, 1);  

            // 主にシート1のデータを設定
            $sheet1->setCellvalue('A1', 'Experiment No.');
            $sheet1->setCellValue('B1', $experiment_id);
            $sheet1->setCellValue('A2', 'Film Condition');

            $composition_ids = Material_composition::where('experiment_id', $experiment_id)->get(['id']);
            $composition_number = 1;
            $composition_row = 4;
            
            foreach($composition_ids as $composition){
                $composition_id = $composition->id;
                $sheet1->setCellValue('A'.$composition_row, 'Composition:'.$composition_number);
                $sheet1->setCellValue('A'.($composition_row+1), 'Material');
                $sheet1->setCellValue('B'.($composition_row+1), 'Concentration(%)');
                // $sheet2->setCellValue('A'.($composition_number+2), 'composition:'.$composition_number);
                // $sheet2->setCellValue('B'.($composition_number+2), $composition_id);
                //選択した材料組成の表示
                $material_row = $composition_row+2;
                $material_list = Material::where('composition_id', $composition_id)->get(['material_id']);

                foreach($material_list as $material){
                    $material_id = $material->material_id;
                    $material_name = Material_detail::where('id', $material_id)->first()->name;
                    $sheet1->setCellValue('A' . $material_row, $material_name);
                    $material_concentration = Material::where('material_id', $material_id)->first()->concentration;
                    $sheet1->setCellValue('B' . $material_row, $material_concentration);
                    $material_row += 1;
                }
                $composition_row = $material_row + 1;
                $composition_number++;
            }

            
            //２枚目のワークシートの設定
            $sheet2->setCellValue('A1', 'film_condition');
            $columns = range('A','F');
            $values = ['cating amount(ml)', 'petri dish area(cm^2)', 'degasting temperature(℃)', 'drying temperature(℃)', 'drying humidity(%RH)','drying time(h)'];
            foreach ($columns as $index => $column) {
                $sheet2->setCellValue($column . 2, $values[$index]);
            }

            //セルの横幅調整
            $startColumn = 'A';
            $endColumn = 'F';

            foreach(range($startColumn, $endColumn) as $column){
                $sheet1->getColumnDimension($column)->setAutoSize(true);
                $sheet2->getColumnDimension($column)->setAutoSize(true);
                $sheet2->getStyle('A:F')->getNumberFormat()->setFormatCode('0.0');
                }
                

                // 出力設定
                $writer = new Xlsx($spreadsheet);

                $response = new StreamedResponse(function() use ($writer) {
                    $writer->save('php://output');
                }, 200, [
                    'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'Content-Disposition' => 'attachment;filename="film_condition.xlsx"',
                    'Cache-Control' => 'max-age=0',
                ]);
    
            return $response;
    }
            
            elseif($type ==='characteristic_test'){
                //２枚目以降のワークシートの枠組みを作成する
                $sheet2_name = 'fundation';
                $sheet2 = new Worksheet($spreadsheet, $sheet2_name);
                $spreadsheet->addSheet($sheet2, 1); 
                $sheet3_name = 'viscosity';
                $sheet3 = new Worksheet($spreadsheet, $sheet3_name);
                $spreadsheet->addSheet($sheet3, 2); 
                $sheet4_name = 'wvp';
                $sheet4 = new Worksheet($spreadsheet, $sheet4_name);
                $spreadsheet->addSheet($sheet4, 3); 
                $sheet5_name = 'tga';
                $sheet5 = new Worksheet($spreadsheet, $sheet5_name);
                $spreadsheet->addSheet($sheet5, 4); 
    
                // 組成の数に影響されないデータ
                $sheet1->setCellvalue('A1', 'Experiment No.');
                $sheet1->setCellValue('B1', $experiment_id);
                $sheet1->setCellValue('A2', 'Composition Count');
                $sheet1->setCellValue('B2', $composition_count);
                $sheet2->setCellValue('A1', 'solution');
                $sheet2->setCellValue('G1', 'film');
                $sheet3->setCellValue('A1', 'viscosity');
                $sheet4->setCellValue('A1', 'wvp');
                

                //２枚目のカラム設定
                $columns = range('B','E');
                $values = ['id','pH', 'contact angle(°)', 'water solubility(%)'];
                foreach ($columns as $index => $column) {
                    $sheet2->setCellValue($column . 2, $values[$index]);
                }
                $columns = range('H','O');
                $values = ['id','tensile strength(MPa)', 'eab(%)', 'light transmittance(%)', 'thickness(mm)', 'moisture content(%)', 'd43(μm)', 'd32(μm)'];
                foreach ($columns as $index => $column) {
                    $sheet2->setCellValue($column . 2, $values[$index]);
                }

              

                $composition_ids = Material_composition::where('experiment_id', $experiment_id)->get(['id']);
                $composition_number = 1;
                $composition_row = 4;
                $composition_start_solution = 3;
                $viscosity_composition_start = 0;
                $wvp_composition_start = 0;
                // function generateColumnNames() {
                //     $columns = [];
                //     for ($i = 0; $i < 2; $i++) {  // A to ZZ
                //         foreach (range('A', 'Z') as $first) {
                //             if ($i == 0) {
                //                 $columns[] = $first;
                //             } else {
                //                 foreach (range('A', 'Z') as $second) {
                //                     $columns[] = $first . $second;
                //                 }
                //             }
                //         }
                //     }
                //     return $columns;
                // }
                // $column_list = generateColumnNames();

                // $column_list = range('A', 'Z');

                // dd($column_list);
                
                foreach($composition_ids as $composition){
                    $composition_id = $composition->id;
                    //homeの設定
                    $sheet1->setCellValue('A'.$composition_row, 'Composition:'.$composition_number);
                    $sheet1->setCellValue('A'.($composition_row+1), 'Material');
                    $sheet1->setCellValue('B'.($composition_row+1), 'Concentration(%)');
                    //fundationの設定
                    $sheet2->setCellValue('A'.($composition_start_solution), 'composition:'.$composition_number);
                    $sheet2->setCellValue('B'.($composition_start_solution), $composition_id);
                    $sheet2->setCellValue('G'.($composition_start_solution), 'composition:' .$composition_number);
                    $sheet2->setCellValue('H'.($composition_start_solution), $composition_id);
                    // //viscosityの設定
                    $sheet3->setCellValue($column_list[$viscosity_composition_start] . '3', 'composition:'.$composition_number);
                    $sheet3->setCellValue($column_list[$viscosity_composition_start+1] . '3', 'id=');
                    $sheet3->setCellValue($column_list[$viscosity_composition_start+2] . '3', $composition_id);
                    $viscosity_columns = range($viscosity_composition_start, $viscosity_composition_start+5);
                    $viscosity_values = ['temperature(℃)','viscosity(cP)', 'shear stress(Pa)', 'shear rate(s^-1)', 'rotation speed(rpm)', 'memo'];
                    foreach ($viscosity_columns as $index => $column) {
                        $sheet3->setCellValue($column_list[$column] . '4', $viscosity_values[$index]);
                    }
                    // //wvpの設定
                    $sheet4->setCellValue($column_list[$wvp_composition_start] . '3', 'composition:'.$composition_number);
                    $sheet4->setCellValue($column_list[$wvp_composition_start+1] . '3', 'id=');
                    $sheet4->setCellValue($column_list[$wvp_composition_start+2] . '3', $composition_id);
                    $wvp_columns = range($wvp_composition_start, $wvp_composition_start+3);
                    $wvp_values = ['humidity(%)','wvp(g/m²/day)', 'temperature(℃)', 'memo'];
                    foreach ($wvp_columns as $index => $column) {
                        $sheet4->setCellValue($column_list[$column] . '4', $wvp_values[$index]);
                    }
                    //tgaは後で

                    //選択した材料組成の表示
                    $material_row = $composition_row+2;
                    $material_list = Material::where('composition_id', $composition_id)->get(['material_id']);
    
                    foreach($material_list as $material){
                        $material_id = $material->material_id;
                        $material_name = Material_detail::where('id', $material_id)->first()->name;
                        $sheet1->setCellValue('A' . $material_row, $material_name);
                        $material_concentration = Material::where('material_id', $material_id)->first()->concentration;
                        $sheet1->setCellValue('B' . $material_row, $material_concentration);
                        $material_row += 1;
                    }
                    $composition_row = $material_row + 1;
                    $composition_number++;
                    $composition_start_solution++;
                    $viscosity_composition_start = $viscosity_composition_start + 7;
                    $wvp_composition_start = $wvp_composition_start + 5;
                }                
               
    
                //セルの横幅調整
              
    
                foreach($column_list as $column){
                    $sheet1->getColumnDimension($column)->setAutoSize(true);
                    // $sheet1->getStyle('D:E')->getNumberFormat()->setFormatCode('0.0');
                    $sheet2->getColumnDimension($column)->setAutoSize(true);
                    // $sheet2->getStyle('C:I')->getNumberFormat()->setFormatCode('0.0');
                    $sheet3->getColumnDimension($column)->setAutoSize(true);
                    // $sheet3->getStyle('C:I')->getNumberFormat()->setFormatCode('0.0'); 
                    $sheet4->getColumnDimension($column)->setAutoSize(true);
                    }
                }     
                
            // 出力設定
            $writer = new Xlsx($spreadsheet);

            $response = new StreamedResponse(function() use ($writer) {
                $writer->save('php://output');
            }, 200, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment;filename="characteristic_test.xlsx"',
                'Cache-Control' => 'max-age=0',
            ]);

        return $response;
}


    public function store(Request $request)
    {

        function generateColumnNames_store() {
            $columns = [];
            for ($i = 0; $i < 2; $i++) {  // A to ZZ
                foreach (range('A', 'Z') as $first) {
                    if ($i == 0) {
                        $columns[] = $first;
                    } else {
                        foreach (range('A', 'Z') as $second) {
                            $columns[] = $first . $second;
                        }
                    }
                }
            }
            return $columns;
        }

        $request->validate([
            'file' => 'required|file|mimes:xlsx'
        ]);

        //実行時間を延長
        ini_set('max_execution_time', 300);

        $path = $request->file('file')->store('temp');
        $filePath = storage_path('app') . '/' . $path;

        $spreadsheet = IOFactory::load($filePath);

        $column_list = generateColumnNames_store();

        if($request->type === 'storing_test'){
            //シート1を得る
            $sheet1 = $spreadsheet->getSheet(0);
            //シート1で得られるデータ
            $experiment_id = $sheet1->getCell('B1')->getvalue();
            $composition_count = $sheet1->getCell('B2')->getValue();
            
            //multiple_testの保存     
            $sheet2 = $spreadsheet->getSheet(1);
            $multiple_highestRow = $sheet2->getHighestRow();
            $multiple_tests = [];
            // dd($column_list);
            for ($column = 0; $column <= $composition_count*16-1; $column += 16 ){
                for ($row = 5; $row <= $multiple_highestRow; $row++){
                    $multiple_tests[] = [
                        'composition_id' => $sheet2->getCell($column_list[$column + 2] . '3')->getValue(),
                        'day' => $sheet2->getCell($column_list[$column] . $row)->getValue(),
                        'mass_loss_rate' => $sheet2->getCell($column_list[$column + 1] . $row)->getValue(),
                        'l' => $sheet2->getCell($column_list[$column + 2] . $row)->getValue(),
                        'a' => $sheet2->getCell($column_list[$column + 3] . $row)->getValue(),
                        'b' => $sheet2->getCell($column_list[$column + 4] . $row)->getValue(),
                        'e' => $sheet2->getCell($column_list[$column + 5] . $row)->getValue(),
                        'ph' => $sheet2->getCell($column_list[$column + 6] . $row)->getValue(),
                        'tss' => $sheet2->getCell($column_list[$column + 7] . $row)->getValue(),
                        'hardness' => $sheet2->getCell($column_list[$column + 8] . $row)->getValue(),
                        'moisture_content' => $sheet2->getCell($column_list[$column + 9] . $row)->getValue(),
                        'ta' => $sheet2->getCell($column_list[$column + 10] . $row)->getValue(),
                        'vitamin_c' => $sheet2->getCell($column_list[$column + 11] . $row)->getValue(),
                        'rr' => $sheet2->getCell($column_list[$column + 12] . $row)->getValue(),
                        'phenolic_content' => $sheet2->getCell($column_list[$column + 13] . $row)->getValue(),
                        'memo' => $sheet2->getCell($column_list[$column + 14] . $row)->getValue()
                    ];
                }
            }
            Storing_multiple_test::insert($multiple_tests);

                //enzyme_testの保存
                $sheet3 = $spreadsheet->getSheet(2);
                $enzyme_highestRow = $sheet3->getHighestRow();
                $enzyme_tests = [];

            for ($column = 0; $column <= $composition_count*4-1; $column += 4 ){
                    for ($row = 5; $row <= $enzyme_highestRow; $row++){
                        $enzyme_tests[] = [
                            'composition_id' => $sheet3->getCell($column_list[$column + 2] . '3')->getValue(),
                            'day' => $sheet3->getCell($column_list[$column] . $row)->getValue(),
                            'enzyme_activity' => $sheet3->getCell($column_list[$column + 1] . $row)->getValue(),
                            'memo' => $sheet3->getCell($column_list[$column + 2] . $row)->getValue()
                        ];
                    }
            }
            Enzyme_value::insert($enzyme_tests);
        }
        
        elseif($request->type === 'film_condition'){
          
            //シート1を得る
            $sheet1 = $spreadsheet->getSheet(0);
            //データの保存
            $experiment_id = $sheet1->getCell('B1')->getvalue();
            $sheet2 = $spreadsheet->getSheet(1);
            $highestRow = $sheet2->getHighestRow();
            //日付ごとにデータを保存する
        
            $film_condition = new Film_condition;
            $film_condition-> experiment_id = $sheet1->getCell('B1')->getValue();
            $film_condition-> casting_amount = $sheet2->getCell('A3')->getValue();
            $film_condition-> petri_dish_area = $sheet2->getCell('B3')->getValue();
            $film_condition-> degas_temperature = $sheet2->getCell('C3')->getValue();
            $film_condition-> drying_temperature = $sheet2->getCell('D3')->getValue();
            $film_condition-> drying_humidity = $sheet2->getCell('E3')->getValue();
            $film_condition-> drying_time = $sheet2->getCell('F3')->getValue();
            $film_condition->save();
            
        }
        elseif($request->type === 'characteristic_test'){
          
            //シート1を得る
            $sheet1 = $spreadsheet->getSheet(0);
            //シート1で得られるデータ
            $experiment_id = $sheet1->getCell('B1')->getvalue();
            $composition_count = $sheet1->getCell('B2')->getValue();
            
            //fundationの保存     
            $sheet2 = $spreadsheet->getSheet(1);
            $fundation_highestRow = $sheet2->getHighestRow();
            $fundation_tests = [];
           
            for ($row = 3; $row <= $fundation_highestRow; $row++){
                $fundation_tests[] = [
                    'composition_id' => $sheet2->getCell('B' . $row)->getValue(),
                    'ph' => $sheet2->getCell('C' . $row)->getValue(),
                    'ws' => $sheet2->getCell('E' . $row)->getValue(),
                    'ca' => $sheet2->getCell('D' . $row)->getValue(),
                    'ts' => $sheet2->getCell('I' . $row)->getValue(),
                    'eab' => $sheet2->getCell('J' . $row)->getValue(),
                    'light_transmittance' => $sheet2->getCell('K' . $row)->getValue(),
                    'thickness' => $sheet2->getCell('L' . $row)->getValue(),
                    'mc' => $sheet2->getCell('M' . $row)->getValue(),
                    'd43' => $sheet2->getCell('N' . $row)->getValue(),
                    'd32' => $sheet2->getCell('O' . $row)->getValue(),
                ];
            }
            // dd($fundation_tests);
            Charactaristic_test::insert($fundation_tests);

            //viscosityの保存
            $sheet3 = $spreadsheet->getSheet(2);
            $viscosity_highestRow = $sheet3->getHighestRow();
            $viscosity_tests = [];

            for ($column = 0; $column <= $composition_count*7-1; $column +=7 ){
                 for ($row = 5; $row <= $viscosity_highestRow; $row++){
                    $viscosity_tests[] = [
                        'composition_id' => $sheet3->getCell($column_list[$column + 2] . '3')->getValue(),
                        'temperature' => $sheet3->getCell($column_list[$column] . $row)->getValue(),
                        'viscosity' => $sheet3->getCell($column_list[$column + 1] . $row)->getValue(),
                        'shear_stress' => $sheet3->getCell($column_list[$column + 2] . $row)->getValue(),
                        'shear_rate' => $sheet3->getCell($column_list[$column + 3] . $row)->getValue(),
                        'rotation_speed' => $sheet3->getCell($column_list[$column + 4] . $row)->getValue(),
                        'memo' => $sheet3->getCell($column_list[$column + 5] . $row)->getValue()
                    ];
                }
            }
            Viscosity_test::insert($viscosity_tests);
            //wvpの保存
            $sheet4 = $spreadsheet->getSheet(3);
            $wvp_highestRow = $sheet4->getHighestRow();
            $wvp_tests = [];

            for ($column = 0; $column <= $composition_count*5-1; $column += 5 ){
                 for ($row = 5; $row <= $wvp_highestRow; $row++){
                    $wvp_tests[] = [
                        'composition_id' => $sheet4->getCell($column_list[$column + 2] . '3')->getValue(),
                        'humidity' => $sheet4->getCell($column_list[$column] . $row)->getValue(),
                        'wvp' => $sheet4->getCell($column_list[$column + 1] . $row)->getValue(),
                        'temperature' => $sheet4->getCell($column_list[$column + 2] . $row)->getValue(),
                        'memo' => $sheet4->getCell($column_list[$column + 3] . $row)->getValue()
                    ];
                }
            }
            Wvp_test::insert($wvp_tests);
               
        }
        return redirect()->route('user.experiment_register', compact('experiment_id'))
        ->with(['message'=>'Registration Complete',
        'status'=>'info'] );
    }
    public function edit_export($experiment_id, $type)
    {
        // 新しいスプレッドシートを作成
        $spreadsheet = new Spreadsheet();
        
        // アクティブなシートを取得
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1 -> setTitle('home');

        $composition_count = Material_composition::where('experiment_id', $experiment_id)->count();
        
        function generateColumnNames_edit() {
            $columns = [];
            for ($i = 0; $i < 2; $i++) {  // A to ZZ
                foreach (range('A', 'Z') as $first) {
                    if ($i == 0) {
                        $columns[] = $first;
                    } else {
                        foreach (range('A', 'Z') as $second) {
                            $columns[] = $first . $second;
                        }
                    }
                }
            }
            return $columns;
        }
        $column_list = generateColumnName_edit();


        if($type === 'storing_test'){
            // function generateColumnList($end) {
            //     $columns = [];
            //     for ($i = 1; $i <= $end; $i++) {
            //         $column = '';
            //         $current = $i;
            //         while ($current > 0) {
            //             $current--; // 1-based index
            //             $column = chr($current % 26 + 65) . $column;
            //             $current = intval($current / 26);
            //         }
            //         $columns[] = $column;
            //     }
            //     return $columns;
            // }
                       

            $sheet2_name = 'multiple_test';
            $sheet2 = new Worksheet($spreadsheet, $sheet2_name);
            $spreadsheet->addSheet($sheet2, 1);  

            $sheet3_name = 'enzyme_test';
            $sheet3 = new Worksheet($spreadsheet, $sheet3_name);
            $spreadsheet->addSheet($sheet3, 2);  

            // データをシートに設定
            $storing_test = Storing_test::where('experiment_id', $experiment_id)->first();
            $fruit_name = Fruit_detail::where('id', $storing_test->storing_fruit_id)->first();
            //組成の数に影響を受けないデータ
            $sheet1->setCellvalue('A1', 'Experiment No.');
            $sheet1->setCellValue('B1', $experiment_id);
            $sheet1->setCellValue('A2', 'Composition Count');
            $sheet1->setCellValue('B2', $composition_count);
            $sheet1->setCellValue('E1', 'Temperature(℃)');
            $sheet1->setCellValue('E2', $storing_test->storing_temperature);
            $sheet1->setCellValue('F1', 'Storing Humidity(%RH)');
            $sheet1->setCellValue('F2', $storing_test->storing_humidity);
            $sheet1->setCellValue('D1', 'Fruit name');
            $sheet1->setCellValue('D2', $fruit_name->name);
            $sheet2->setCellValue('A1', 'Multiple Storing test');
            $sheet3->setCellValue('A1', 'Enzyme test');
            //組成の数に影響を受けるデータ
            $composition_ids = Material_composition::where('experiment_id', $experiment_id)->get(['id']);
            $composition_number = 1;
            $composition_row = 4;
            // $column_list = generateColumnList(78); // A-Z, AA-AZ
            $multiple_composition_start = 0;
            $enzyme_composition_start = 0;

            foreach($composition_ids as $composition){
                $composition_id = $composition->id;
                //homeの設定
                $sheet1->setCellValue('A'.$composition_row, 'Composition:'.$composition_number);
                $sheet1->setCellValue('A'.($composition_row+1), 'Material');
                $sheet1->setCellValue('B'.($composition_row+1), 'Concentration(%)');
                // multiple_testの設定
                $sheet2->setCellValue($column_list[$multiple_composition_start] . '3', 'composition:'.$composition_number);
                $sheet2->setCellValue($column_list[$multiple_composition_start+1] . '3', 'id=');
                $sheet2->setCellValue($column_list[$multiple_composition_start+2] . '3', $composition_id);
                $multiple_columns = range($multiple_composition_start, $multiple_composition_start+14);
                $multiple_values = ['Day', 'Mass loss rate(%)', 'L*', 'a*', 'b*','⊿E','pH','TSS','Hardness(N)','Moisture content(%)','TA(%)', 'Vitamin C(%)','Respirtry rate(mgCO^2/(kg*h)','Phenolic Content(mg GAE/L)', 'memo'];
                foreach ($multiple_columns as $index => $column) {
                    $sheet2->setCellValue($column_list[$column] . '4', $multiple_values[$index]);
                }
                $multiple_tests = Storing_multiple_test::where('composition_id', $composition_id)->get();
                foreach ($multiple_tests as $index => $multiple_test){
                    $sheet2->setCellValue($column_list[$multiple_composition_start] . $index+5, $multiple_test->day);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+1] . $index+5, $multiple_test->mass_loss_rate);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+2] . $index+5, $multiple_test->l);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+3] . $index+5, $multiple_test->a);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+4] . $index+5, $multiple_test->b);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+5] . $index+5, $multiple_test->e);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+6] . $index+5, $multiple_test->ph);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+7] . $index+5, $multiple_test->tss);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+8] . $index+5, $multiple_test->hardness);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+9] . $index+5, $multiple_test->moisture_content);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+10] . $index+5, $multiple_test->ta);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+11] . $index+5, $multiple_test->vitamin_c);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+12] . $index+5, $multiple_test->rr);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+13] . $index+5, $multiple_test->phenolic_content);
                    $sheet2->setCellValue($column_list[$multiple_composition_start+14] . $index+5, $multiple_test->memo);
                }
                // //enzyme_testの設定
                $sheet3->setCellValue($column_list[$enzyme_composition_start] . '3', 'composition:'.$composition_number);
                $sheet3->setCellValue($column_list[$enzyme_composition_start+1] . '3', 'id=');
                $sheet3->setCellValue($column_list[$enzyme_composition_start+2] . '3', $composition_id);
                $enzyme_columns = range($enzyme_composition_start, $enzyme_composition_start+2);
                $enzyme_values = ['Day','Enzyme Actibity', 'memo'];
                foreach ($enzyme_columns as $index => $column) {
                    $sheet3->setCellValue($column_list[$column] . '4', $enzyme_values[$index]);
                }
                $enzyme_tests = enzyme_value::where('composition_id', $composition_id)->get();
                foreach($enzyme_tests as $index => $enzyme_test){
                    $sheet3->setCellValue($column_list[$enzyme_composition_start] . $index+5, $enzyme_test->day);
                    $sheet3->setCellValue($column_list[$enzyme_composition_start+1] . $index+5, $enzyme_test->enzyme_activity);
                    $sheet3->setCellValue($column_list[$enzyme_composition_start+2] . $index+5, $enzyme_test->memo);
                }
                //tgaは後で

                //選択した材料組成の表示
                $material_row = $composition_row+2;
                $material_list = Material::where('composition_id', $composition_id)->get(['material_id']);

                foreach($material_list as $material){
                    $material_id = $material->material_id;
                    $material_name = Material_detail::where('id', $material_id)->first()->name;
                    $sheet1->setCellValue('A' . $material_row, $material_name);
                    $material_concentration = Material::where('material_id', $material_id)->first()->concentration;
                    $sheet1->setCellValue('B' . $material_row, $material_concentration);
                    $material_row += 1;
                }
                $composition_row = $material_row + 1;
                $composition_number++;
                $multiple_composition_start = $multiple_composition_start + 16;
                $enzyme_composition_start = $enzyme_composition_start + 4;
            }     
            //セルの横幅調整           
            foreach($column_list as $column){
                $sheet1->getColumnDimension($column)->setAutoSize(true);
                // $sheet1->getStyle('D:E')->getNumberFormat()->setFormatCode('0.0');
                $sheet2->getColumnDimension($column)->setAutoSize(true);
                // $sheet2->getStyle('C:I')->getNumberFormat()->setFormatCode('0.0');
                $sheet3->getColumnDimension($column)->setAutoSize(true);
                // $sheet3->getStyle('C:I')->getNumberFormat()->setFormatCode('0.0'); 
                }
             
              
            
            // 出力設定
            $writer = new Xlsx($spreadsheet);

            $response = new StreamedResponse(function() use ($writer) {
                $writer->save('php://output');
            }, 200, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment;filename="storing_test_edit.xlsx"',
                'Cache-Control' => 'max-age=0',
            ]);

            return $response;
        }
        elseif($type ==='film_condition'){
            
            //２枚目のワークシートの枠組みを作成する
            $sheet2_name = 'film_condition';
            $sheet2 = new Worksheet($spreadsheet, $sheet2_name);
            $spreadsheet->addSheet($sheet2, 1);  

            // 主にシート1のデータを設定
            $sheet1->setCellvalue('A1', 'Experiment No.');
            $sheet1->setCellValue('B1', $experiment_id);
            $sheet1->setCellValue('A2', 'Film Condition');

            $composition_ids = Material_composition::where('experiment_id', $experiment_id)->get(['id']);
            $composition_number = 1;
            $composition_row = 4;
            
            foreach($composition_ids as $composition){
                $composition_id = $composition->id;
                $sheet1->setCellValue('A'.$composition_row, 'Composition:'.$composition_number);
                $sheet1->setCellValue('A'.($composition_row+1), 'Material');
                $sheet1->setCellValue('B'.($composition_row+1), 'Concentration(%)');
                // $sheet2->setCellValue('A'.($composition_number+2), 'composition:'.$composition_number);
                // $sheet2->setCellValue('B'.($composition_number+2), $composition_id);
                //選択した材料組成の表示
                $material_row = $composition_row+2;
                $material_list = Material::where('composition_id', $composition_id)->get(['material_id']);

                foreach($material_list as $material){
                    $material_id = $material->material_id;
                    $material_name = Material_detail::where('id', $material_id)->first()->name;
                    $sheet1->setCellValue('A' . $material_row, $material_name);
                    $material_concentration = Material::where('material_id', $material_id)->first()->concentration;
                    $sheet1->setCellValue('B' . $material_row, $material_concentration);
                    $material_row += 1;
                }
                $composition_row = $material_row + 1;
                $composition_number++;
            }

            
            //２枚目のワークシートの設定
            $sheet2->setCellValue('A1', 'film_condition');
            $columns = range('A','F');
            $values = ['cating amount(ml)', 'petri dish area(cm^2)', 'degasting temperature(℃)', 'drying temperature(℃)', 'drying humidity(%RH)','drying time(h)'];
            foreach ($columns as $index => $column) {
                $sheet2->setCellValue($column . 2, $values[$index]);
            }
            //今登録されているフィルム条件の設置
            $film_condition = Film_condition::where('experiment_id', $experiment_id)->first();
            $sheet2->setCellValue('A3', $film_condition->casting_amount);
            $sheet2->setCellValue('B3', $film_condition->petri_dish_area);
            $sheet2->setCellValue('C3', $film_condition->degas_temperature);
            $sheet2->setCellValue('D3', $film_condition->drying_temperature);
            $sheet2->setCellValue('E3', $film_condition->drying_humidity);
            $sheet2->setCellValue('F3', $film_condition->drying_time);

            //セルの横幅調整
            $startColumn = 'A';
            $endColumn = 'F';

            foreach(range($startColumn, $endColumn) as $column){
                $sheet1->getColumnDimension($column)->setAutoSize(true);
                $sheet2->getColumnDimension($column)->setAutoSize(true);
                $sheet2->getStyle('A:F')->getNumberFormat()->setFormatCode('0.0');
                }
                

                // 出力設定
                $writer = new Xlsx($spreadsheet);

                $response = new StreamedResponse(function() use ($writer) {
                    $writer->save('php://output');
                }, 200, [
                    'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'Content-Disposition' => 'attachment;filename="film_condition_edit.xlsx"',
                    'Cache-Control' => 'max-age=0',
                ]);
    
            return $response;
    }
            
            elseif($type ==='characteristic_test'){
                 // ワークシートの枠組みを作成する関数
                function createSheet($spreadsheet, $sheet_name, $index) {
                    $sheet = new Worksheet($spreadsheet, $sheet_name);
                    $spreadsheet->addSheet($sheet, $index);
                    return $sheet;
                }

                // ワークシートの作成
                $sheet2 = createSheet($spreadsheet, 'fundation', 1);
                $sheet3 = createSheet($spreadsheet, 'viscosity', 2);
                $sheet4 = createSheet($spreadsheet, 'wvp', 3);
                $sheet5 = createSheet($spreadsheet, 'tga', 4);
    
                // 組成の数に影響されないデータ
                $sheet1->setCellvalue('A1', 'Experiment No.');
                $sheet1->setCellValue('B1', $experiment_id);
                $sheet1->setCellValue('A2', 'Composition Count');
                $sheet1->setCellValue('B2', $composition_count);
                $sheet2->setCellValue('A1', 'solution');
                $sheet2->setCellValue('G1', 'film');
                $sheet3->setCellValue('A1', 'viscosity');
                $sheet4->setCellValue('A1', 'wvp');
                

                 // カラム設定関数
                function setColumns($sheet, $columns, $values, $start_row) {
                    foreach ($columns as $index => $column) {
                        $sheet->setCellValue($column . $start_row, $values[$index]);
                    }
                }

                // 2枚目のカラム設定
                setColumns($sheet2, range('B', 'E'), ['id', 'pH', 'contact angle(°)', 'water solubility(%)'], 2);
                setColumns($sheet2, range('H', 'O'), ['id', 'tensile strength(MPa)', 'eab(%)', 'light transmittance(%)', 'thickness(mm)', 'moisture content(%)', 'd43(μm)', 'd32(μm)'], 2);

                //A~AZまでの配列を作成
                // function generateColumnList($end) {
                //     $columns = [];
                //     for ($i = 1; $i <= $end; $i++) {
                //         $column = '';
                //         $current = $i;
                //         while ($current > 0) {
                //             $current--; // 1-based index
                //             $column = chr($current % 26 + 65) . $column;
                //             $current = intval($current / 26);
                //         }
                //         $columns[] = $column;
                //     }
                //     return $columns;
                // }
                // $column_list = generateColumnList(78); 
    
                $composition_ids = Material_composition::where('experiment_id', $experiment_id)->get(['id']);
                
                $fundations = [];

                // $fundation = Charactaristic_test::where('composition_id', 3)->first();
                // dd($fundation);


                foreach($composition_ids as $composition_number => $composition_id){
                    $composition_number++;
                    $composition_id = $composition_id->id;
                    $fundation = Charactaristic_test::where('composition_id', $composition_id)->first();
                    $viscosity_tests = Viscosity_test::where('composition_id', $composition_id)->get();
                    $wvp_tests = Wvp_test::where('composition_id', $composition_id)->get();
                    $material_list = Material::where('composition_id', $composition_id)->get(['material_id']);                    //homeの設定
                   
                    //homeの設定
                    $sheet1->setCellValue('A' . (4 + $composition_number), 'Composition:' . $composition_number);
                    $sheet1->setCellValue('A' . (5 + $composition_number), 'Material');
                    $sheet1->setCellValue('B' . (5 + $composition_number), 'Concentration(%)');
                    $sheet2->setCellValue('A' . (3 + $composition_number), 'composition:' . $composition_number);
                    $sheet2->setCellValue('B' . (3 + $composition_number), $composition_id);
                    $sheet2->setCellValue('G' . (3 + $composition_number), 'composition:' . $composition_number);
                    $sheet2->setCellValue('C' . (3 + $composition_number), $fundation->ph);
                    $sheet2->setCellValue('D' . (3 + $composition_number), $fundation->ca);
                    $sheet2->setCellValue('E' . (3 + $composition_number), $fundation->ws);
                    $sheet2->setCellValue('I' . (3 + $composition_number), $fundation->ts);
                    $sheet2->setCellValue('J' . (3 + $composition_number), $fundation->eab);
                    $sheet2->setCellValue('K' . (3 + $composition_number), $fundation->light_trasmittance);
                    $sheet2->setCellValue('L' . (3 + $composition_number), $fundation->thickness);
                    $sheet2->setCellValue('M' . (3 + $composition_number), $fundation->ms);
                    $sheet2->setCellValue('N' . (3 + $composition_number), $fundation->d43);
                    $sheet2->setCellValue('O' . (3 + $composition_number), $fundation->d32);
            
                    // //viscosityの設定
                    $viscosity_start_row = 4;
                    $sheet3->setCellValue($column_list[($composition_number-1) * 7] . '3', 'composition:' . $composition_number);
                    $sheet3->setCellValue($column_list[($composition_number-1) * 7 + 1] . '3', 'id=');
                    $sheet3->setCellValue($column_list[($composition_number-1) * 7 + 2] . '3', $composition_id);
                    setColumns($sheet3, array_slice($column_list, ($composition_number-1) * 7, 6), ['temperature', 'viscosity(cP)', 'shear stress', 'shear rate', 'rotation speed', 'memo'], $viscosity_start_row);
            
                    foreach ($viscosity_tests as $index => $test) {
                        $sheet3->setCellValue($column_list[($composition_number-1) * 7] . ($viscosity_start_row + $index+1), $test->temperature);
                        $sheet3->setCellValue($column_list[($composition_number-1) * 7 + 1] . ($viscosity_start_row + $index+1), $test->viscosity);
                        $sheet3->setCellValue($column_list[($composition_number-1) * 7 + 2] . ($viscosity_start_row + $index+1), $test->shear_stress);
                        $sheet3->setCellValue($column_list[($composition_number-1) * 7 + 3] . ($viscosity_start_row + $index+1), $test->shear_rate);
                        $sheet3->setCellValue($column_list[($composition_number-1) * 7 + 4] . ($viscosity_start_row + $index+1), $test->rotation_speed);
                        $sheet3->setCellValue($column_list[($composition_number-1) * 7 + 5] . ($viscosity_start_row + $index+1), $test->memo);
                    }

                    // //wvpの設定
                    $wvp_start_row = 4;
                    $sheet4->setCellValue($column_list[($composition_number-1) * 5] . '3', 'composition:' . $composition_number);
                    $sheet4->setCellValue($column_list[($composition_number-1) * 5 + 1] . '3', 'id=');
                    $sheet4->setCellValue($column_list[($composition_number-1) * 5 + 2] . '3', $composition_id);
                    setColumns($sheet4, array_slice($column_list, ($composition_number-1) * 5, 4), ['humidity', 'wvp', 'temperature', 'memo'], $wvp_start_row);

                    foreach ($wvp_tests as $index => $test) {
                        $sheet4->setCellValue($column_list[($composition_number-1) * 5] . ($wvp_start_row + $index + 1), $test->humidity);
                        $sheet4->setCellValue($column_list[($composition_number-1) * 5 + 1] . ($wvp_start_row + $index + 1), $test->wvp);
                        $sheet4->setCellValue($column_list[($composition_number-1) * 5 + 2] . ($wvp_start_row + $index + 1), $test->temperature);
                        $sheet4->setCellValue($column_list[($composition_number-1) * 5 + 3] . ($wvp_start_row + $index + 1), $test->memo);
                    }
                    //tgaは後で

                    //選択した材料組成の表示
                    $material_row = 6 + $composition_number;
                    foreach($material_list as $material) {
                        $material_id = $material->material_id;
                        $material_name = Material_detail::where('id', $material_id)->value('name');
                        $sheet1->setCellValue('A' . $material_row, $material_name);
                        $material_concentration = Material::where('material_id', $material_id)->value('concentration');
                        $sheet1->setCellValue('B' . $material_row, $material_concentration);
                        $material_row++;
                    } 
                }                
               
    
                //セルの横幅調整
              
    
                foreach($column_list as $column){
                    $sheet1->getColumnDimension($column)->setAutoSize(true);
                    $sheet2->getColumnDimension($column)->setAutoSize(true);
                    $sheet3->getColumnDimension($column)->setAutoSize(true);
                    $sheet4->getColumnDimension($column)->setAutoSize(true);
                    }
                }     
                
            // 出力設定
            $writer = new Xlsx($spreadsheet);

            $response = new StreamedResponse(function() use ($writer) {
                $writer->save('php://output');
            }, 200, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment;filename="characteristic_test_edit.xlsx"',
                'Cache-Control' => 'max-age=0',
            ]);

        return $response;
}
}