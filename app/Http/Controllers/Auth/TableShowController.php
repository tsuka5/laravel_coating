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
use App\Models\Film_condition;
use App\Models\Material_composition;
use App\Models\Storing_test;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableShowController extends Controller
{
    public function show(string $id, $type)
    {
        $experiment = Experiment::where('id', $id)->first();
        
        if($type === 'film_condition'){
            $compositions = Material_Composition::where('experiment_id', $experiment->id)->orderby('id', 'asc')->get();
            $film_condition = Film_condition::where('experiment_id', $experiment->id)->first();

            // $one_composition = Material_Composition::where('experiment_id', $experiment->id)->first();
            // $one_film_condition = Film_condition::where('composition_id', $one_composition->id)->first();
           
        
            foreach($compositions as $composition) {
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                // $film_conditions[$composition->id] = Film_condition::where('composition_id', $composition->id)->get();
            }
            // ビューにデータを渡す
            return view('user.profile.film_condition_table_show', compact('experiment', 'compositions', 'materials', 'film_condition'));
            }
    }
    public function everyone_show(string $id, $type)
    {
        $experiment = Experiment::where('id', $id)->first();
        
        if($type === 'film_condition'){
            $compositions = Material_Composition::where('experiment_id', $experiment->id)->orderby('id', 'asc')->get();
            $film_condition = Film_condition::where('experiment_id', $experiment->id)->first();

            // $one_composition = Material_Composition::where('experiment_id', $experiment->id)->first();
            // $one_film_condition = Film_condition::where('composition_id', $one_composition->id)->first();
           
        
            foreach($compositions as $composition) {
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                // $film_conditions[$composition->id] = Film_condition::where('composition_id', $composition->id)->get();
            }
            // ビューにデータを渡す
            return view('user.search.film_condition_table_show', compact('experiment', 'compositions', 'materials', 'film_condition'));
            }

        // $storings_tests = [];
        // $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
    
        // $compositions = Material_Composition::where('experiment_id', $experiment->id)->orderby('id', 'asc')->get();

        // $one_composition = Material_Composition::where('experiment_id', $experiment->id)->first();
        // $one_storing_test = Storing_test::where('composition_id', $one_composition->id)->first();
       

        // foreach($compositions as $composition) {
        //     $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
        //     $storing_tests[$composition->id] = Storing_test::where('composition_id', $composition->id)->get();
        // }
        // // ビューにデータを渡す
        // return view('user.profile.storing_test_table_show', compact('experiment', 'storing_tests', 'compositions', 'materials', 'one_storing_test'));
    }
    
    

}
