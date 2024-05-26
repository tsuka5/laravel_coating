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
use App\Models\Experiment;
use App\Models\Fruit_detail;
use App\Models\Material_composition;
use App\Models\Storing_test;
use App\Models\Charactaristic_test;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartShowController extends Controller
{
    public function show(string $id, $type)
    {
        $experiment = Experiment::where('id', $id)->first();
        $compositions = Material_composition::where('experiment_id', $id)->get();

        if($type === 'storing_test'){
            $fruit_detail = Fruit_detail::get();
            
            // 結果を格納する配列の初期化
            $days = [];
            $mass_loss_rates = [];
            $color_es = [];
            $phs = [];
            $moisture_contents = [];
            $materials = [];
            $tas = [];
            $vitamin_cs = [];
            $rrs = [];
        
            $composition_count_list = [];
            $composition_count_number = 0;
    
            // 各composition_idに対してStoring_testのデータを取得し、配列に追加
            foreach ($compositions as $composition) {
    
                //配列の初期化
                $mass_loss_rate = [];
                $color_e = [];
                $ph = [];
                $moisture_content = [];
                $ta = [];
                $vitamin_c = [];
                $rr = [];
                
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $storing_tests[$composition->id] = Storing_test::where('composition_id', $composition->id)->get();
                $composition_count_list[] = $composition_count_number;
    
                //日にちの取得
                if(empty($days)){
                    $storing_days[$composition->id] = $storing_tests[$composition->id]->pluck('storing_day')->all();
                    if ($storing_days[$composition->id] !== null) {  
                        $days[] = $storing_days[$composition->id];  
                    }
                }
                //質量損失の取得
                foreach($storing_tests[$composition->id] as $test) {
                    $mass_loss_rate[] = $test->mass_loss_rate;
                    $color_e[] = $test->e;
                    $ph[] = $test->ph;
                    $moisture_content[] = $test->moisture_content;
                    $ta[] = $test->ta;
                    $vitamin_c[] = $test->vitamin_c;
                    $rr[] = $test->rr;
                    }
                $mass_loss_rates[$composition_count_number] = $mass_loss_rate;
                $color_es[$composition_count_number] = $color_e;
                $phs[$composition_count_number] = $ph;
                $moisture_contents[$composition_count_number] = $moisture_content;
                $tas[$composition_count_number] = $ta;
                $vitamin_cs[$composition_count_number] = $vitamin_c;
                $rrs[$composition_count_number] = $rr;
                
            
    
                $composition_count_number += 1;
            }
    
            $days = $days[0];
            // ビューにデータを渡す
            return view('user.profile.storing_test_chart_show', compact('experiment','compositions', 'fruit_detail', 'materials', 'composition_count_list',
            'mass_loss_rates','color_es','phs','moisture_contents','tas','vitamin_cs','rrs', 'days'));
        }
        elseif($type === 'characteristic_test'){            
            
            //配列の初期化
            $ph = [];
            $viscosity = [];
            $water_solubility = [];
            $wvp = [];
            $contact_angle = [];
            $shear_rate = [];
            $shear_stress = [];
            $ts = [];
            $eab = [];
            $light_transmittance = [];
            $thickness = [];
            $moisture_content = [];
            $d43 = [];
            $d32 = [];
            $x_label = [];

        
            $composition_count_list = [];
            $composition_count_number = 0;
    
            // 各composition_idに対してCharacteristic_testのデータを取得し、配列に追加
            foreach ($compositions as $composition) {
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $characteristic_tests[$composition->id] = Charactaristic_test::where('composition_id', $composition->id)->first();
                $composition_count_list[] = $composition_count_number + 1;
                $x_label[] = 'composition:' . $composition_count_number+1;
    
                //各値の取得
                $ph[] = $characteristic_tests[$composition->id]-> ph;
                $viscosity[] = $characteristic_tests[$composition->id]-> viscosity;
                $water_solubility[] = $characteristic_tests[$composition->id]-> ws;
                $wvp[] = $characteristic_tests[$composition->id]-> wvp;
                $contact_angle[] = $characteristic_tests[$composition->id]-> ca;
                $shear_rate[] = $characteristic_tests[$composition->id]-> shear_rate;
                $shear_stress[] = $characteristic_tests[$composition->id]-> shear_stress;
                $ts[] = $characteristic_tests[$composition->id]-> ts;
                $eab[] = $characteristic_tests[$composition->id]-> eab;
                $light_transmittance[] = $characteristic_tests[$composition->id]-> light_transmittance;
                $thickness[] = $characteristic_tests[$composition->id]-> thickness;
                $moisture_content[] = $characteristic_tests[$composition->id]-> mc;
                $d43[] = $characteristic_tests[$composition->id]-> d43;
                $d32[] = $characteristic_tests[$composition->id]-> d32;           
           
                $composition_count_number += 1;
            }
    
            // ビューにデータを渡す
            return view('user.profile.characteristic_test_chart_show', compact('experiment','compositions', 'materials', 'composition_count_list','x_label',
            'ph', 'viscosity', 'water_solubility', 'wvp', 'contact_angle', 'shear_rate', 'shear_stress', 'ts', 'eab', 'light_transmittance',
            'thickness', 'moisture_content', 'd43', 'd32'));

        }
    }
    public function everyone_show(string $id, $type)
    {
        $experiment = Experiment::where('id', $id)->first();
        $compositions = Material_composition::where('experiment_id', $id)->get();
        $composition_id = $compositions->first();
        
        if($type === 'storing_test'){
            $fruit_detail = Fruit_detail::get();
            
            // 結果を格納する配列の初期化
            $days = [];
            $mass_loss_rates = [];
            $color_es = [];
            $phs = [];
            $moisture_contents = [];
            $materials = [];
            $tas = [];
            $vitamin_cs = [];
            $rrs = [];
        
            $composition_count_list = [];
            $composition_count_number = 0;
    
            // 各composition_idに対してStoring_testのデータを取得し、配列に追加
            foreach ($compositions as $composition) {
    
                //配列の初期化
                $mass_loss_rate = [];
                $color_e = [];
                $ph = [];
                $moisture_content = [];
                $ta = [];
                $vitamin_c = [];
                $rr = [];
                
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $storing_tests[$composition->id] = Storing_test::where('composition_id', $composition->id)->get();
                $composition_count_list[] = $composition_count_number;
    
                //日にちの取得
                if(empty($days)){
                    $storing_days[$composition->id] = $storing_tests[$composition->id]->pluck('storing_day')->all();
                    if ($storing_days[$composition->id] !== null) {  
                        $days[] = $storing_days[$composition->id];  
                    }
                }
                //質量損失の取得
                foreach($storing_tests[$composition->id] as $test) {
                    $mass_loss_rate[] = $test->mass_loss_rate;
                    $color_e[] = $test->e;
                    $ph[] = $test->ph;
                    $moisture_content[] = $test->moisture_content;
                    $ta[] = $test->ta;
                    $vitamin_c[] = $test->vitamin_c;
                    $rr[] = $test->rr;
                    }
                $mass_loss_rates[$composition_count_number] = $mass_loss_rate;
                $color_es[$composition_count_number] = $color_e;
                $phs[$composition_count_number] = $ph;
                $moisture_contents[$composition_count_number] = $moisture_content;
                $tas[$composition_count_number] = $ta;
                $vitamin_cs[$composition_count_number] = $vitamin_c;
                $rrs[$composition_count_number] = $rr;
                
            
    
                $composition_count_number += 1;
            }
    
            $days = $days[0];
            // ビューにデータを渡す
            return view('user.search.storing_test_chart_show', compact('experiment','compositions', 'fruit_detail', 'materials', 'composition_count_list',
            'mass_loss_rates','color_es','phs','moisture_contents','tas','vitamin_cs','rrs', 'days', 'composition_id'));
        }
        elseif($type === 'characteristic_test'){            
            
            //配列の初期化
            $ph = [];
            $viscosity = [];
            $water_solubility = [];
            $wvp = [];
            $contact_angle = [];
            $shear_rate = [];
            $shear_stress = [];
            $ts = [];
            $eab = [];
            $light_transmittance = [];
            $thickness = [];
            $moisture_content = [];
            $d43 = [];
            $d32 = [];
            $x_label = [];

        
            $composition_count_list = [];
            $composition_count_number = 0;
    
            // 各composition_idに対してCharacteristic_testのデータを取得し、配列に追加
            foreach ($compositions as $composition) {
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $characteristic_tests[$composition->id] = Charactaristic_test::where('composition_id', $composition->id)->first();
                $composition_count_list[] = $composition_count_number + 1;
                $x_label[] = 'composition:' . $composition_count_number+1;
    
                //各値の取得
                $ph[] = $characteristic_tests[$composition->id]-> ph;
                $viscosity[] = $characteristic_tests[$composition->id]-> viscosity;
                $water_solubility[] = $characteristic_tests[$composition->id]-> ws;
                $wvp[] = $characteristic_tests[$composition->id]-> wvp;
                $contact_angle[] = $characteristic_tests[$composition->id]-> ca;
                $shear_rate[] = $characteristic_tests[$composition->id]-> shear_rate;
                $shear_stress[] = $characteristic_tests[$composition->id]-> shear_stress;
                $ts[] = $characteristic_tests[$composition->id]-> ts;
                $eab[] = $characteristic_tests[$composition->id]-> eab;
                $light_transmittance[] = $characteristic_tests[$composition->id]-> light_transmittance;
                $thickness[] = $characteristic_tests[$composition->id]-> thickness;
                $moisture_content[] = $characteristic_tests[$composition->id]-> mc;
                $d43[] = $characteristic_tests[$composition->id]-> d43;
                $d32[] = $characteristic_tests[$composition->id]-> d32;           
           
                $composition_count_number += 1;
            }
    
            // ビューにデータを渡す
            return view('user.search.characteristic_test_chart_show', compact('experiment','compositions', 'materials', 'composition_count_list','x_label',
            'ph', 'viscosity', 'water_solubility', 'wvp', 'contact_angle', 'shear_rate', 'shear_stress', 'ts', 'eab', 'light_transmittance',
            'thickness', 'moisture_content', 'd43', 'd32', 'composition_id'));

        }
    }
        
        
    //     $fruit_detail = Fruit_detail::get();
    //     // 該当するexperiment_idを持つMaterial_compositionの取得
    //     $compositions = Material_composition::where('experiment_id', $id)->get();
        
    //     // 結果を格納する配列の初期化
    //     $days = [];
    //     $mass_loss_rates = [];
    //     $color_es = [];
    //     $phs = [];
    //     $moisture_contents = [];
    //     $materials = [];
    //     $tas = [];
    //     $vitamin_cs = [];
    //     $rrs = [];
    
    //     $composition_count_list = [];
    //     $composition_count_number = 0;

    //     // 各composition_idに対してStoring_testのデータを取得し、配列に追加
    //     foreach ($compositions as $composition) {

    //         //配列の初期化
    //         $mass_loss_rate = [];
    //         $color_e = [];
    //         $ph = [];
    //         $moisture_content = [];
    //         $ta = [];
    //         $vitamin_c = [];
    //         $rr = [];
            
    //         $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
    //         $storing_tests[$composition->id] = Storing_test::where('composition_id', $composition->id)->get();
    //         $composition_count_list[] = $composition_count_number;

    //         //日にちの取得
    //         if(empty($days)){
    //             $storing_days[$composition->id] = $storing_tests[$composition->id]->pluck('storing_day')->all();
    //             if ($storing_days[$composition->id] !== null) {  
    //                 $days[] = $storing_days[$composition->id];  
    //             }
    //         }
    //         //質量損失の取得
    //         foreach($storing_tests[$composition->id] as $test) {
    //             $mass_loss_rate[] = $test->mass_loss_rate;
    //             $color_e[] = $test->e;
    //             $ph[] = $test->ph;
    //             $moisture_content[] = $test->moisture_content;
    //             $ta[] = $test->ta;
    //             $vitamin_c[] = $test->vitamin_c;
    //             $rr[] = $test->rr;
    //             }
    //         $mass_loss_rates[$composition_count_number] = $mass_loss_rate;
    //         $color_es[$composition_count_number] = $color_e;
    //         $phs[$composition_count_number] = $ph;
    //         $moisture_contents[$composition_count_number] = $moisture_content;
    //         $tas[$composition_count_number] = $ta;
    //         $vitamin_cs[$composition_count_number] = $vitamin_c;
    //         $rrs[$composition_count_number] = $rr;
            
        

    //         $composition_count_number += 1;
    //     }

    //     $days = $days[0];
    //     // ビューにデータを渡す
    //     return view('user.profile.storing_test_chart_show', compact('experiment','compositions', 'fruit_detail', 'materials', 'composition_count_list',
    //     'mass_loss_rates','color_es','phs','moisture_contents','tas','vitamin_cs','rrs', 'days'));
    // }
    
    
}
