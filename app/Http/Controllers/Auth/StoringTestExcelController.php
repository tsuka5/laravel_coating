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


use App\Http\Controllers\Controller;
use App\Models\Charactaristic_test;
use Illuminate\Http\Request;

class StoringTestExcelController extends Controller
{
    public function export($experiment_id, $type)
    {
        // 新しいスプレッドシートを作成
        $spreadsheet = new Spreadsheet();
        
        // アクティブなシートを取得
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1 -> setTitle('home');

        if($type === 'storing_test'){
    // データをシートに設定
            $sheet1->setCellvalue('A1', 'Experiment No.');
            $sheet1->setCellValue('B1', $experiment_id);
            $sheet1->setCellValue('A2', 'Storing Test');

            $composition_ids = Material_composition::where('experiment_id', $experiment_id)->get(['id']);
            $composition_number = 1;
            $composition_row = 4;

            foreach($composition_ids as $composition){
                $composition_id = $composition->id;
                $sheet1->setCellValue('A'.$composition_row, 'Composition:'.$composition_number);
                $sheet1->setCellValue('A'.($composition_row+1), 'Material');
                $sheet1->setCellValue('B'.($composition_row+1), 'Concentration(%)');
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
        
            $sheet1->setCellValue('D1', 'Temperature(℃)');
            $sheet1->setCellValue('E1', 'Storing Humidity(%RH)');
            $sheet1->setCellValue('F1', 'Fruit name');
            $sheet1->setCellValue('G2', '← Please select below');
            $sheet1->setCellValue('G3', 'If there is not fruit in this list, please register a new fruit');
            $sheet1->getStyle('G3')->getFont()->setColor(new Color(Color::COLOR_RED));

            // 青果物のリストの表示
            $fruit_list_start_number = 4;
            $fruit_list = Fruit_detail::orderBy('name', 'asc')->get(['name']);
            foreach($fruit_list as $fruit){
                $sheet1->setCellValue('G' . $fruit_list_start_number, $fruit->name);
                $fruit_list_start_number += 1;
            }

            
            //２つ目以降のワークシートの追加

            $sheets = [];
            $sheet_number = 2;
            $composition_count = 1;

            foreach($composition_ids as $composition){
                $composition_id = $composition->id;
                $sheet_name = 'composition_' . $composition_count;
                // 新しいWorksheetを作成して、すぐにスプレッドシートに追加
                $newSheet = new Worksheet($spreadsheet, $sheet_name);
                $spreadsheet->addSheet($newSheet, $sheet_number - 1); // $sheet_number - 1 で正しい位置に追加

                $sheets[$sheet_number] = $newSheet; // 配列に追加して管理
                $sheets[$sheet_number]->setCellValue('A1', $composition_id);
                $columns = range('B','N');
                $values = ['Days', 'Mass loss rate(%)', 'L*', 'a*', 'b*','⊿E','pH','TSS','Hardness(N)','Moisture content(%)','TA(%)', 'Vitamin C(%)','Respirtry rate(mgCO^2/(kg*h)'];
                foreach ($columns as $index => $column) {
                    $sheets[$sheet_number]->setCellValue($column . 1, $values[$index]);
                }

                $sheet_number++;
                $composition_count++;
            }

            //セルの横幅調整
            $startColumn = 'A';
            $endColumn = 'N';

            foreach(range($startColumn, $endColumn) as $column){
                $sheet1->getColumnDimension($column)->setAutoSize(true);
                $sheet1->getStyle('D:F')->getNumberFormat()->setFormatCode('0.0');
                foreach($sheets as $sheet){
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                    $sheet->getStyle('B:F')->getNumberFormat()->setFormatCode('0.0');
                    $sheet->getStyle('I','J','L','M')->getNumberFormat()->setFormatCode('0.0');
                    $sheet->getStyle('G','K')->getNumberFormat()->setFormatCode('0.00');
                    $sheet->getStyle('H')->getNumberFormat()->setFormatCode('0.000');
                    
                }
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

            return $response;
        }
        elseif($type ==='characteristic_test'){
    //２枚目以降のワークシートの枠組みを作成する
    $sheet2_name = 'solution';
    $sheet2 = new Worksheet($spreadsheet, $sheet2_name);
    $spreadsheet->addSheet($sheet2, 1); 
    $sheet3_name = 'film';
    $sheet3 = new Worksheet($spreadsheet, $sheet3_name);
    $spreadsheet->addSheet($sheet3, 2); 

    // 主にシート1のデータを設定
    $sheet1->setCellvalue('A1', 'Experiment No.');
    $sheet1->setCellValue('B1', $experiment_id);
    $sheet1->setCellValue('A2', 'Characteristic Test');

    $composition_ids = Material_composition::where('experiment_id', $experiment_id)->get(['id']);
    $composition_number = 1;
    $composition_row = 4;
    
    foreach($composition_ids as $composition){
        $composition_id = $composition->id;
        $sheet1->setCellValue('A'.$composition_row, 'Composition:'.$composition_number);
        $sheet1->setCellValue('A'.($composition_row+1), 'Material');
        $sheet1->setCellValue('B'.($composition_row+1), 'Concentration(%)');
        $sheet2->setCellValue('A'.($composition_number+2), 'composition:'.$composition_number);
        $sheet3->setCellValue('A'.($composition_number+2), 'composition:'.$composition_number);
        $sheet2->setCellValue('B'.($composition_number+2), $composition_id);
        $sheet3->setCellValue('B'.($composition_number+2), $composition_id);
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

    $sheet1->setCellValue('D1', 'Temperature(℃)');
    $sheet1->setCellValue('E1', 'Humidity(%RH)');


    
    //２枚目のワークシートの設定
    $sheet2->setCellValue('A1', 'solution');
    $columns = range('B','I');
    $values = ['id','pH', 'viscosity', 'water solubility', 'wvp', 'contact angle','shear rate','shear stress'];
    foreach ($columns as $index => $column) {
        $sheet2->setCellValue($column . 2, $values[$index]);
    }

    //３枚目のワークシートの設定
    $sheet3->setCellValue('A1', 'film');
    $columns = range('B','I');
    $values = ['id','tensile strength', 'eab', 'light transmittance', 'thickness', 'moisture content','d43','d32'];
    foreach ($columns as $index => $column) {
        $sheet3->setCellValue($column . 2, $values[$index]);
    }

    //セルの横幅調整
    $startColumn = 'A';
    $endColumn = 'I';

    foreach(range($startColumn, $endColumn) as $column){
        $sheet1->getColumnDimension($column)->setAutoSize(true);
        $sheet1->getStyle('D:E')->getNumberFormat()->setFormatCode('0.0');
        $sheet2->getColumnDimension($column)->setAutoSize(true);
        $sheet2->getStyle('C:I')->getNumberFormat()->setFormatCode('0.0');
        $sheet3->getColumnDimension($column)->setAutoSize(true);
        $sheet3->getStyle('C:I')->getNumberFormat()->setFormatCode('0.0');            
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
        $request->validate([
            'file' => 'required|file|mimes:xlsx'
        ]);

        $path = $request->file('file')->store('temp');
        $filePath = storage_path('app') . '/' . $path;

        $spreadsheet = IOFactory::load($filePath);

        if($request->type === 'storing_test'){
            //シート1を得る
            $sheet1 = $spreadsheet->getSheet(0);
            //シート1で得られるデータ
            $storing_temperature = $sheet1->getCell('D2')->getValue();
            $storing_humidity = $sheet1->getCell('E2')->getValue();
            $fruit_name = $sheet1->getCell('F2')->getValue();
            $experiment_id = $sheet1->getCell('B1')->getvalue();


            //シート１以外のシートを得る
            $sheetCount = $spreadsheet->getSheetCount();
        

            //データの保存
            //各シートでループを回す
            for($sheetIndex = 1; $sheetIndex < $sheetCount; $sheetIndex++) {
                $sheet = $spreadsheet->getSheet($sheetIndex);
                $composition_id = $sheet->getCell('A1')->getValue();
                $highestRow = $sheet->getHighestRow();
                //日付ごとにデータを保存する
                for ($row = 2; $row <= $highestRow; $row++){
                    $storing_test = new Storing_test;
                    $storing_test-> composition_id = $composition_id;
                    $fruitDetail = Fruit_detail::where('name', $fruit_name)->first()->id;
                    $storing_test-> storing_fruit_id = $fruitDetail;
                    $storing_test-> storing_temperature = $storing_temperature;
                    $storing_test-> storing_humidity = $storing_humidity;
                    $storing_test->storing_day = $sheet->getCell('B'.$row)->getValue();
                    $storing_test->mass_loss_rate = $sheet->getCell('C'.$row)->getValue();
                    $storing_test->l = $sheet->getCell('D'.$row)->getValue();
                    $storing_test->a = $sheet->getCell('E'.$row)->getValue();
                    $storing_test-> b = $sheet->getCell('F'.$row)->getValue();
                    $storing_test-> e = $sheet->getCell('G'.$row)->getValue();
                    $storing_test-> ph = $sheet->getCell('H'.$row)->getValue();
                    $storing_test-> tss = $sheet->getCell('I'.$row)->getValue();
                    $storing_test-> hardness = $sheet->getCell('J'.$row)->getValue();
                    $storing_test-> moisture_content = $sheet->getCell('K'.$row)->getValue();
                    $storing_test-> ta = $sheet->getCell('L'.$row)->getValue();
                    $storing_test-> vitamin_c = $sheet->getCell('M'.$row)->getValue();
                    $storing_test-> rr = $sheet->getCell('N'.$row)->getValue();
                    $storing_test->save();
        
                }
            }
        }
        elseif($request->type === 'characteristic_test'){
          
            //シート1を得る
            $sheet1 = $spreadsheet->getSheet(0);
            //シート1で得られるデータ
            $storing_temperature = $sheet1->getCell('D2')->getValue();
            $storing_humidity = $sheet1->getCell('E2')->getValue();
            $experiment_id = $sheet1->getCell('B1')->getvalue();

            //データの保存
            //各シートでループを回す
            // for($sheetIndex = 1; $sheetIndex < 3; $sheetIndex++) {
                $sheet2 = $spreadsheet->getSheet(1);
                $sheet3 = $spreadsheet->getSheet(2);
                $highestRow = $sheet2->getHighestRow();
                //日付ごとにデータを保存する
                for ($row = 3; $row <= $highestRow; $row++){
                    $characterisice_test = new Charactaristic_test;
                    $characterisice_test-> composition_id = $sheet2->getCell('B'. $row)->getValue();
                    $characterisice_test-> ph = $sheet2->getCell('C'. $row)->getValue();
                    $characterisice_test-> viscosity = $sheet2->getCell('D'. $row)->getValue();
                    $characterisice_test-> ws = $sheet2->getCell('E'. $row)->getValue();
                    $characterisice_test-> wvp = $sheet2->getCell('F'. $row)->getValue();
                    $characterisice_test-> ca = $sheet2->getCell('G'. $row)->getValue();
                    $characterisice_test-> shear_rate = $sheet2->getCell('H'. $row)->getValue();
                    $characterisice_test-> shear_stress = $sheet2->getCell('I'. $row)->getValue();
                    $characterisice_test-> ts = $sheet2->getCell('C'. $row)->getValue();
                    $characterisice_test-> eab = $sheet3->getCell('D'. $row)->getValue();
                    $characterisice_test-> light_transmittance = $sheet3->getCell('E'. $row)->getValue();
                    $characterisice_test-> thickness = $sheet3->getCell('F'. $row)->getValue();
                    $characterisice_test-> mc = $sheet3->getCell('G'. $row)->getValue();
                    $characterisice_test-> d43 = $sheet3->getCell('H'. $row)->getValue();
                    $characterisice_test-> d32 = $sheet3->getCell('I'. $row)->getValue();
                    $characterisice_test->save();
        
                }
            // }
        }
        return redirect()->route('user.experiment_register', compact('experiment_id'))
        ->with(['message'=>'Registration Complete',
        'status'=>'info'] );
    }
}