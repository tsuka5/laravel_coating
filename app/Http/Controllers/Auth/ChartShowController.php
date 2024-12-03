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
use App\Models\Bacteria_detail;
use App\Models\Enzyme_detail;
use App\Models\Substrate_detail;
use App\Models\Gas_detail;
use App\Models\Material_composition;
use App\Models\Storing_test;
use App\Models\Storing_multiple_test;
use App\Models\Antibacteria_test;
use App\Models\Colony_test;
use App\Models\Cfu_test;
use App\Models\Growthcurve_test;
use App\Models\Mic_test;
use App\Models\Survivalrate_test;
use App\Models\Enzyme_test;
use App\Models\Enzyme_value;
use App\Models\Tga_test;
use App\Models\Tga_value;
use App\Models\Charactaristic_test;
use App\Models\Viscosity_test;
use App\Models\Wvp_test;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartShowController extends Controller
{
    public function show(string $id, $type)
    {
        $experiment = Experiment::where('id', $id)->first();
        $compositions = Material_composition::where('experiment_id', $id)->get();

        if ($type === 'storing_test') {
            $fruit_detail = Fruit_detail::get();

            // 結果を格納する配列の初期化
            $days = [];
            $mass_loss_rates = [];
            $color_es = [];
            $phs = [];
            $tsss = [];
            $moisture_contents = [];
            $materials = [];
            $tas = [];
            $hardnesses = [];
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
                $tss = [];
                $moisture_content = [];
                $ta = [];
                $hardness = [];
                $vitamin_c = [];
                $rr = [];

                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $multiple_tests[$composition->id] = Storing_multiple_test::where('composition_id', $composition->id)->get();
                $composition_count_list[] = $composition_count_number;

                //日にちの取得
                if (empty($days)) {
                    $storing_days[$composition->id] = $multiple_tests[$composition->id]->pluck('day')->all();
                    if ($storing_days[$composition->id] !== null) {
                        $days[] = $storing_days[$composition->id];
                    }
                }
                //質量損失などの取得
                foreach ($multiple_tests[$composition->id] as $multiple_test) {
                    $mass_loss_rate[] = $multiple_test->mass_loss_rate;
                    $color_e[] = $multiple_test->e;
                    $ph[] = $multiple_test->ph;
                    $tss[] = $multiple_test->tss;
                    $moisture_content[] = $multiple_test->moisture_content;
                    $ta[] = $multiple_test->ta;
                    $hardness[] = $multiple_test->hardness;
                    $vitamin_c[] = $multiple_test->vitamin_c;
                    $rr[] = $multiple_test->rr;
                }
                $mass_loss_rates[$composition_count_number] = $mass_loss_rate;
                $color_es[$composition_count_number] = $color_e;
                $phs[$composition_count_number] = $ph;
                $tsss[$composition_count_number] = $tss;
                $moisture_contents[$composition_count_number] = $moisture_content;
                $tas[$composition_count_number] = $ta;
                $hardnesses[$composition_count_number] = $hardness;
                $vitamin_cs[$composition_count_number] = $vitamin_c;
                $rrs[$composition_count_number] = $rr;

                $composition_count_number += 1;
            }
            // dd($days);
            $days = $days[0];
            // ビューにデータを渡す
            return view('user.profile.storing_test_chart_show', compact(
                'experiment',
                'compositions',
                'fruit_detail',
                'materials',
                'composition_count_list',
                'mass_loss_rates',
                'color_es',
                'phs',
                'tsss',
                'moisture_contents',
                'tas',
                'hardnesses',
                'vitamin_cs',
                'rrs',
                'days'
            ));
        } elseif ($type === 'characteristic_test') {

            //配列の初期化
            $temperature = [];
            $humidities = [];
            $ph = [];
            $viscosities = [];
            $water_solubility = [];
            $wvps = [];
            $contact_angle = [];
            $shear_rates = [];
            $shear_stresses = [];
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
                $x_label[] = 'composition:' . $composition_count_number + 1;

                //各値の取得
                $ph[] = $characteristic_tests[$composition->id]->ph;
                $water_solubility[] = $characteristic_tests[$composition->id]->ws;
                $contact_angle[] = $characteristic_tests[$composition->id]->ca;
                $ts[] = $characteristic_tests[$composition->id]->ts;
                $eab[] = $characteristic_tests[$composition->id]->eab;
                $light_transmittance[] = $characteristic_tests[$composition->id]->light_transmittance;
                $thickness[] = $characteristic_tests[$composition->id]->thickness;
                $moisture_content[] = $characteristic_tests[$composition->id]->mc;
                $d43[] = $characteristic_tests[$composition->id]->d43;
                $d32[] = $characteristic_tests[$composition->id]->d32;

                //配列の初期化
                $viscosity = [];
                $shear_stress = [];
                $wvp = [];
                $viscosity_tests[$composition->id] = Viscosity_test::where('composition_id', $composition->id)->get();
                $wvp_tests[$composition->id] = Wvp_test::where('composition_id', $composition->id)->get();

                //温度の取得
                if (empty($temperature)) {
                    $viscosity_temperature[$composition->id] = $viscosity_tests[$composition->id]->pluck('temperature')->all();
                    if ($viscosity_temperature[$composition->id] !== null) {
                        $temperature[] = $viscosity_temperature[$composition->id];
                    }
                }
                //せん断速度の取得
                if (empty($shear_rates)) {
                    $shear_rate[$composition->id] = $viscosity_tests[$composition->id]->pluck('shear_rate')->all();
                    if ($shear_rate[$composition->id] !== null) {
                        $shear_rates[] = $shear_rate[$composition->id];
                    }
                }
                //湿度の取得
                if (empty($humidities)) {
                    $humidity[$composition->id] = $wvp_tests[$composition->id]->pluck('humidity')->all();
                    if ($humidity[$composition->id] !== null) {
                        $humidities[] = $humidity[$composition->id];
                    }
                }

                //粘度などの取得
                foreach ($viscosity_tests[$composition->id] as $viscosity_test) {
                    $viscosity[] = $viscosity_test->viscosity;
                    $shear_stress[] = $viscosity_test->shear_stress;
                }

                //wvpの取得
                foreach ($wvp_tests[$composition->id] as $wvp_test) {
                    $wvp[] = $wvp_test->wvp;
                }


                $viscosities[$composition_count_number] = $viscosity;
                $shear_stresses[$composition_count_number] = $shear_stress;
                $wvps[$composition_count_number] = $wvp;


                $composition_count_number += 1;
            }
            // dd($temperature);
            $temperature = $temperature[0];
            $humidities = $humidities[0];
            $shear_rates = $shear_rates[0];
            // ビューにデータを渡す
            return view('user.profile.characteristic_test_chart_show', compact(
                'experiment',
                'compositions',
                'materials',
                'composition_count_list',
                'x_label',
                'ph',
                'viscosities',
                'water_solubility',
                'wvps',
                'contact_angle',
                'shear_rates',
                'shear_stresses',
                'ts',
                'eab',
                'light_transmittance',
                'temperature',
                'humidities',
                'thickness',
                'moisture_content',
                'd43',
                'd32'
            ));
        } elseif ($type === 'antibacteria_test') {

            //配列の初期化
            $colony_days = [];
            $cfu_days = [];
            $survival_rate_days = [];
            $growth_curve_days = [];

            $colony_diameters = [];
            $cfus = [];
            $survival_rates = [];
            $growth_curves = [];

            $x_label = [];


            $composition_count_list = [];
            $composition_count_number = 0;

            // 各composition_idに対してantibacteria_testのそれぞれのデータを取得し、配列に追加
            foreach ($compositions as $composition) {
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $composition_count_list[] = $composition_count_number + 1;
                $x_label[] = 'composition:' . $composition_count_number + 1;

                //配列の初期化
                $colony_diameter = [];
                $cfu = [];
                $survival_rate = [];
                $growth_curve = [];
                $colony_tests[$composition->id] = Colony_test::where('composition_id', $composition->id)->get();
                $cfu_tests[$composition->id] = Cfu_test::where('composition_id', $composition->id)->get();
                $survival_rate_tests[$composition->id] = Survivalrate_test::where('composition_id', $composition->id)->get();
                $growth_curve_tests[$composition->id] = Growthcurve_test::where('composition_id', $composition->id)->get();

                //コロニーテストの日にちの取得
                if (empty($colony_days)) {
                    $colony_day[$composition->id] = $colony_tests[$composition->id]->pluck('day')->all();
                    if ($colony_day[$composition->id] !== null) {
                        $colony_days[] = $colony_day[$composition->id];
                    }
                }
                //survival_testの日にちの取得
                if (empty($survival_rate_days)) {
                    $survival_rate_day[$composition->id] = $survival_rate_tests[$composition->id]->pluck('day')->all();
                    if ($survival_rate_day[$composition->id] !== null) {
                        $survival_rate_days[] = $survival_rate_day[$composition->id];
                    }
                }
                //cfuテストの日にちの取得
                if (empty($cfu_days)) {
                    $cfu_day[$composition->id] = $cfu_tests[$composition->id]->pluck('day')->all();
                    if ($cfu_day[$composition->id] !== null) {
                        $cfu_days[] = $cfu_day[$composition->id];
                    }
                }
                //growth_curveテストの日にちの取得
                if (empty($growth_curve_days)) {
                    $growth_curve_day[$composition->id] = $growth_curve_tests[$composition->id]->pluck('day')->all();
                    if ($growth_curve_day[$composition->id] !== null) {
                        $growth_curve_days[] = $growth_curve_day[$composition->id];
                    }
                }
                //コロニー直径の取得
                foreach ($colony_tests[$composition->id] as $colony_test) {
                    $colony_diameter[] = $colony_test->colony_diameter;
                }
                //cfuの取得
                foreach ($cfu_tests[$composition->id] as $cfu_test) {
                    $cfu[] = $cfu_test->cfu;
                }
                //survival_rateの取得
                foreach ($survival_rate_tests[$composition->id] as $survival_rate_test) {
                    $survival_rate[] = $survival_rate_test->survival_rate;
                }
                //growth_curveの取得
                foreach ($growth_curve_tests[$composition->id] as $growth_curve_test) {
                    $growth_curve[] = $growth_curve_test->concentration;
                }


                $colony_diameters[$composition_count_number] = $colony_diameter;
                $cfus[$composition_count_number] = $cfu;
                $survival_rates[$composition_count_number] = $survival_rate;
                $growth_curves[$composition_count_number] = $growth_curve;


                $composition_count_number += 1;
            }
            // dd($temperature);
            $colony_days = $colony_days[0];
            $cfu_days = $cfu_days[0];
            $survival_rate_days = $survival_rate_days[0];
            $growth_curve_days = $growth_curve_days[0];
            // ビューにデータを渡す
            return view('user.profile.antibacteria_test_chart_show', compact(
                'experiment',
                'compositions',
                'materials',
                'composition_count_list',
                'x_label',
                'colony_days',
                'cfu_days',
                'survival_rate_days',
                'growth_curve_days',
                'colony_diameters',
                'cfus',
                'survival_rates',
                'growth_curves'
            ));
        } elseif ($type === 'enzyme_test') {

            //配列の初期化
            $days = [];

            $enzyme_activities = [];

            $x_label = [];


            $composition_count_list = [];
            $composition_count_number = 0;

            // 各composition_idに対してantibacteria_testのそれぞれのデータを取得し、配列に追加
            foreach ($compositions as $composition) {
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $composition_count_list[] = $composition_count_number + 1;
                $x_label[] = 'composition:' . $composition_count_number + 1;

                //配列の初期化
                $enzyme_activity = [];

                $enzyme_tests[$composition->id] = Enzyme_value::where('composition_id', $composition->id)->get();

                //日にちの取得
                if (empty($days)) {
                    $day[$composition->id] = $enzyme_tests[$composition->id]->pluck('day')->all();
                    if ($day[$composition->id] !== null) {
                        $days[] = $day[$composition->id];
                    }
                }

                //酵素の取得
                foreach ($enzyme_tests[$composition->id] as $enzyme_test) {
                    $enzyme_activity[] = $enzyme_test->enzyme_activity;
                }

                $enzyme_activities[$composition_count_number] = $enzyme_activity;

                $composition_count_number += 1;
            }
            // dd($temperature);
            $days = $days[0];
            // ビューにデータを渡す
            return view('user.profile.enzyme_test_chart_show', compact(
                'experiment',
                'compositions',
                'materials',
                'composition_count_list',
                'x_label',
                'days',
                'enzyme_activities'
            ));
        } elseif ($type === 'tga_test') {

            //配列の初期化
            $temperatures = [];

            $mass_loss_rate = [];

            $x_label = [];


            $composition_count_list = [];
            $composition_count_number = 0;

            // 各composition_idに対してantibacteria_testのそれぞれのデータを取得し、配列に追加
            foreach ($compositions as $composition) {
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $composition_count_list[] = $composition_count_number + 1;
                $x_label[] = 'composition:' . $composition_count_number + 1;

                //配列の初期化
                $mass_loss_rate = [];

                $tga_tests[$composition->id] = Tga_value::where('composition_id', $composition->id)->get();

                //日にちの取得
                if (empty($temperatures)) {
                    $temperature[$composition->id] = $tga_tests[$composition->id]->pluck('temperature')->all();
                    if ($temperature[$composition->id] !== null) {
                        $temperatures[] = $temperature[$composition->id];
                    }
                }

                //質量損失の取得
                foreach ($tga_tests[$composition->id] as $tga_test) {
                    $mass_loss_rate[] = $tga_test->mass_loss_rate;
                }

                $mass_loss_rates[$composition_count_number] = $mass_loss_rate;

                $composition_count_number += 1;
            }
            // dd($temperature);
            $temperatures = $temperatures[0];
            // ビューにデータを渡す
            return view('user.profile.tga_test_chart_show', compact(
                'experiment',
                'compositions',
                'materials',
                'composition_count_list',
                'x_label',
                'temperatures',
                'mass_loss_rates'
            ));
        }
    }
    public function everyone_show(string $id, $type)
    {
        $experiment = Experiment::where('id', $id)->first();
        $compositions = Material_composition::where('experiment_id', $id)->get();

        if ($type === 'storing_test') {
            $fruit_detail = Fruit_detail::get();

            // 結果を格納する配列の初期化
            $days = [];
            $mass_loss_rates = [];
            $color_es = [];
            $phs = [];
            $moisture_contents = [];
            $materials = [];
            $tas = [];
            $hardnesses = [];
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
                $hardness = [];
                $vitamin_c = [];
                $rr = [];

                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $multiple_tests[$composition->id] = Storing_multiple_test::where('composition_id', $composition->id)->get();
                $composition_count_list[] = $composition_count_number;

                //日にちの取得
                if (empty($days)) {
                    $storing_days[$composition->id] = $multiple_tests[$composition->id]->pluck('day')->all();
                    if ($storing_days[$composition->id] !== null) {
                        $days[] = $storing_days[$composition->id];
                    }
                }
                //質量損失などの取得
                foreach ($multiple_tests[$composition->id] as $multiple_test) {
                    $mass_loss_rate[] = $multiple_test->mass_loss_rate;
                    $color_e[] = $multiple_test->e;
                    $ph[] = $multiple_test->ph;
                    $moisture_content[] = $multiple_test->moisture_content;
                    $ta[] = $multiple_test->ta;
                    $hardness[] = $multiple_test->hardness;
                    $vitamin_c[] = $multiple_test->vitamin_c;
                    $rr[] = $multiple_test->rr;
                }
                $mass_loss_rates[$composition_count_number] = $mass_loss_rate;
                $color_es[$composition_count_number] = $color_e;
                $phs[$composition_count_number] = $ph;
                $moisture_contents[$composition_count_number] = $moisture_content;
                $hardnesses[$composition_count_number] = $hardness;
                $tas[$composition_count_number] = $ta;
                $vitamin_cs[$composition_count_number] = $vitamin_c;
                $rrs[$composition_count_number] = $rr;

                $composition_count_number += 1;
            }

            $days = $days[0];
            // ビューにデータを渡す
            return view('user.search.storing_test_chart_show', compact(
                'experiment',
                'compositions',
                'fruit_detail',
                'materials',
                'composition_count_list',
                'mass_loss_rates',
                'color_es',
                'phs',
                'moisture_contents',
                'tas',
                'hardnesses',
                'vitamin_cs',
                'rrs',
                'days'
            ));
        } elseif ($type === 'characteristic_test') {

            //配列の初期化
            $temperature = [];
            $humidities = [];
            $ph = [];
            $viscosities = [];
            $water_solubility = [];
            $wvps = [];
            $contact_angle = [];
            $shear_rates = [];
            $shear_stresses = [];
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
                $x_label[] = 'composition:' . $composition_count_number + 1;

                //各値の取得
                $ph[] = $characteristic_tests[$composition->id]->ph;
                $water_solubility[] = $characteristic_tests[$composition->id]->ws;
                $contact_angle[] = $characteristic_tests[$composition->id]->ca;
                $ts[] = $characteristic_tests[$composition->id]->ts;
                $eab[] = $characteristic_tests[$composition->id]->eab;
                $light_transmittance[] = $characteristic_tests[$composition->id]->light_transmittance;
                $thickness[] = $characteristic_tests[$composition->id]->thickness;
                $moisture_content[] = $characteristic_tests[$composition->id]->mc;
                $d43[] = $characteristic_tests[$composition->id]->d43;
                $d32[] = $characteristic_tests[$composition->id]->d32;

                //配列の初期化
                $viscosity = [];
                $shear_stress = [];
                $wvp = [];
                $viscosity_tests[$composition->id] = Viscosity_test::where('composition_id', $composition->id)->get();
                $wvp_tests[$composition->id] = Wvp_test::where('composition_id', $composition->id)->get();

                //温度の取得
                if (empty($temperature)) {
                    $viscosity_temperature[$composition->id] = $viscosity_tests[$composition->id]->pluck('temperature')->all();
                    if ($viscosity_temperature[$composition->id] !== null) {
                        $temperature[] = $viscosity_temperature[$composition->id];
                    }
                }
                //せん断速度の取得
                if (empty($shear_rates)) {
                    $shear_rate[$composition->id] = $viscosity_tests[$composition->id]->pluck('shear_rate')->all();
                    if ($shear_rate[$composition->id] !== null) {
                        $shear_rates[] = $shear_rate[$composition->id];
                    }
                }
                //湿度の取得
                if (empty($humidities)) {
                    $humidity[$composition->id] = $wvp_tests[$composition->id]->pluck('humidity')->all();
                    if ($humidity[$composition->id] !== null) {
                        $humidities[] = $humidity[$composition->id];
                    }
                }

                //粘度などの取得
                foreach ($viscosity_tests[$composition->id] as $viscosity_test) {
                    $viscosity[] = $viscosity_test->viscosity;
                    $shear_stress[] = $viscosity_test->shear_stress;
                }

                //wvpの取得
                foreach ($wvp_tests[$composition->id] as $wvp_test) {
                    $wvp[] = $wvp_test->wvp;
                }


                $viscosities[$composition_count_number] = $viscosity;
                $shear_stresses[$composition_count_number] = $shear_stress;
                $wvps[$composition_count_number] = $wvp;


                $composition_count_number += 1;
            }
            // dd($temperature);
            $temperature = $temperature[0];
            $humidities = $humidities[0];
            $shear_rates = $shear_rates[0];
            // ビューにデータを渡す
            return view('user.search.characteristic_test_chart_show', compact(
                'experiment',
                'compositions',
                'materials',
                'composition_count_list',
                'x_label',
                'ph',
                'viscosities',
                'water_solubility',
                'wvps',
                'contact_angle',
                'shear_rates',
                'shear_stresses',
                'ts',
                'eab',
                'light_transmittance',
                'temperature',
                'humidities',
                'thickness',
                'moisture_content',
                'd43',
                'd32'
            ));
        } elseif ($type === 'antibacteria_test') {

            //配列の初期化
            $colony_days = [];
            $cfu_days = [];
            $survival_rate_days = [];
            $growth_curve_days = [];

            $colony_diameters = [];
            $cfus = [];
            $survival_rates = [];
            $growth_curves = [];

            $x_label = [];


            $composition_count_list = [];
            $composition_count_number = 0;

            // 各composition_idに対してantibacteria_testのそれぞれのデータを取得し、配列に追加
            foreach ($compositions as $composition) {
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $composition_count_list[] = $composition_count_number + 1;
                $x_label[] = 'composition:' . $composition_count_number + 1;

                //配列の初期化
                $colony_diameter = [];
                $cfu = [];
                $survival_rate = [];
                $growth_curve = [];
                $colony_tests[$composition->id] = Colony_test::where('composition_id', $composition->id)->get();
                $cfu_tests[$composition->id] = Cfu_test::where('composition_id', $composition->id)->get();
                $survival_rate_tests[$composition->id] = Survivalrate_test::where('composition_id', $composition->id)->get();
                $growth_curve_tests[$composition->id] = Growthcurve_test::where('composition_id', $composition->id)->get();

                //コロニーテストの日にちの取得
                if (empty($colony_days)) {
                    $colony_day[$composition->id] = $colony_tests[$composition->id]->pluck('day')->all();
                    if ($colony_day[$composition->id] !== null) {
                        $colony_days[] = $colony_day[$composition->id];
                    }
                }
                //survival_testの日にちの取得
                if (empty($survival_rate_days)) {
                    $survival_rate_day[$composition->id] = $survival_rate_tests[$composition->id]->pluck('day')->all();
                    if ($survival_rate_day[$composition->id] !== null) {
                        $survival_rate_days[] = $survival_rate_day[$composition->id];
                    }
                }
                //cfuテストの日にちの取得
                if (empty($cfu_days)) {
                    $cfu_day[$composition->id] = $cfu_tests[$composition->id]->pluck('day')->all();
                    if ($cfu_day[$composition->id] !== null) {
                        $cfu_days[] = $cfu_day[$composition->id];
                    }
                }
                //growth_curveテストの日にちの取得
                if (empty($growth_curve_days)) {
                    $growth_curve_day[$composition->id] = $growth_curve_tests[$composition->id]->pluck('day')->all();
                    if ($growth_curve_day[$composition->id] !== null) {
                        $growth_curve_days[] = $growth_curve_day[$composition->id];
                    }
                }
                //コロニー直径の取得
                foreach ($colony_tests[$composition->id] as $colony_test) {
                    $colony_diameter[] = $colony_test->colony_diameter;
                }
                //cfuの取得
                foreach ($cfu_tests[$composition->id] as $cfu_test) {
                    $cfu[] = $cfu_test->cfu;
                }
                //survival_rateの取得
                foreach ($survival_rate_tests[$composition->id] as $survival_rate_test) {
                    $survival_rate[] = $survival_rate_test->survival_rate;
                }
                //growth_curveの取得
                foreach ($growth_curve_tests[$composition->id] as $growth_curve_test) {
                    $growth_curve[] = $growth_curve_test->concentration;
                }


                $colony_diameters[$composition_count_number] = $colony_diameter;
                $cfus[$composition_count_number] = $cfu;
                $survival_rates[$composition_count_number] = $survival_rate;
                $growth_curves[$composition_count_number] = $growth_curve;


                $composition_count_number += 1;
            }
            // dd($temperature);
            $colony_days = $colony_days[0];
            $cfu_days = $cfu_days[0];
            $survival_rate_days = $survival_rate_days[0];
            $growth_curve_days = $growth_curve_days[0];
            // ビューにデータを渡す
            return view('user.search.antibacteria_test_chart_show', compact(
                'experiment',
                'compositions',
                'materials',
                'composition_count_list',
                'x_label',
                'colony_days',
                'cfu_days',
                'survival_rate_days',
                'growth_curve_days',
                'colony_diameters',
                'cfus',
                'survival_rates',
                'growth_curves'
            ));
        } elseif ($type === 'enzyme_test') {

            //配列の初期化
            $days = [];

            $enzyme_activities = [];

            $x_label = [];


            $composition_count_list = [];
            $composition_count_number = 0;

            // 各composition_idに対してantibacteria_testのそれぞれのデータを取得し、配列に追加
            foreach ($compositions as $composition) {
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $composition_count_list[] = $composition_count_number + 1;
                $x_label[] = 'composition:' . $composition_count_number + 1;

                //配列の初期化
                $enzyme_activity = [];

                $enzyme_tests[$composition->id] = Enzyme_value::where('composition_id', $composition->id)->get();

                //日にちの取得
                if (empty($days)) {
                    $day[$composition->id] = $enzyme_tests[$composition->id]->pluck('day')->all();
                    if ($day[$composition->id] !== null) {
                        $days[] = $day[$composition->id];
                    }
                }

                //酵素の取得
                foreach ($enzyme_tests[$composition->id] as $enzyme_test) {
                    $enzyme_activity[] = $enzyme_test->enzyme_activity;
                }

                $enzyme_activities[$composition_count_number] = $enzyme_activity;

                $composition_count_number += 1;
            }
            $days = $days[0];
            // ビューにデータを渡す
            return view('user.search.enzyme_test_chart_show', compact(
                'experiment',
                'compositions',
                'materials',
                'composition_count_list',
                'x_label',
                'days',
                'enzyme_activities'
            ));
        } elseif ($type === 'tga_test') {

            //配列の初期化
            $temperatures = [];

            $mass_loss_rate = [];

            $x_label = [];


            $composition_count_list = [];
            $composition_count_number = 0;

            // 各composition_idに対してantibacteria_testのそれぞれのデータを取得し、配列に追加
            foreach ($compositions as $composition) {
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $composition_count_list[] = $composition_count_number + 1;
                $x_label[] = 'composition:' . $composition_count_number + 1;

                //配列の初期化
                $mass_loss_rate = [];

                $tga_tests[$composition->id] = Tga_value::where('composition_id', $composition->id)->get();

                //日にちの取得
                if (empty($temperatures)) {
                    $temperature[$composition->id] = $tga_tests[$composition->id]->pluck('temperature')->all();
                    if ($temperature[$composition->id] !== null) {
                        $temperatures[] = $temperature[$composition->id];
                    }
                }

                //質量損失の取得
                foreach ($tga_tests[$composition->id] as $tga_test) {
                    $mass_loss_rate[] = $tga_test->mass_loss_rate;
                }

                $mass_loss_rates[$composition_count_number] = $mass_loss_rate;

                $composition_count_number += 1;
            }
            // dd($temperature);
            $temperatures = $temperatures[0];
            // ビューにデータを渡す
            return view('user.search.tga_test_chart_show', compact(
                'experiment',
                'compositions',
                'materials',
                'composition_count_list',
                'x_label',
                'temperatures',
                'mass_loss_rates'
            ));
        }
    }
}
