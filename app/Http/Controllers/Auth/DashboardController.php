<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Pdf_file; 
use App\Models\Material; 
use App\Models\Material_composition;
use App\Models\Experiment;
use App\Models\Storing_test; 
use App\Models\Antibacteria_test; 
 



class DashboardController extends Controller
{
    public function index()
{
    $pdfFile = Pdf_file::where('name', 'how_to_use_webdatabase')->first(); 

    $experiments = Experiment::orderby('id','desc')->paginate(5);
    $compositions = [];
    $materials=[];
    $fruits = [];
    $bacteria = [];

    foreach($experiments as $experiment){
        $compositions[$experiment->id] = Material_composition::where('experiment_id', $experiment->id)->get();
        foreach($compositions[$experiment->id] as $composition){
            $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
            $fruits[$composition->id] = Storing_test::where('composition_id', $composition->id)->get();
            $bacteria[$composition->id] = Antibacteria_test::where('composition_id', $composition->id)->get();
        }
    }
    // $selected_compositions = Material_composition::orderby('id','desc')->paginate(5);

    //     $materials=[];
    //     $fruits = [];
    //     $bacteria = [];

    //     foreach($selected_compositions as $composition){
    //         $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
    //         $fruits[$composition->id] = Storing_test::where('composition_id', $composition->id)->get();
    //         $bacteria[$composition->id] = Antibacteria_test::where('composition_id', $composition->id)->get();
    //     }

    return view('user.dashboard', compact('pdfFile', 'experiments','compositions', 'materials', 'fruits', 'bacteria'));
}

}
