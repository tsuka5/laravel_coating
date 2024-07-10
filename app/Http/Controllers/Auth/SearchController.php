<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experiment; 
use App\Models\Material_composition;
use App\Models\Film_condition; 
use App\Models\Charactaristic_test; 
use App\Models\Storing_test;
use App\Models\Enzyme_test;
use App\Models\Tga_test;
use App\Models\Antibacteria_test;
use App\Models\Material;
use App\Models\Material_detail;
use App\Models\Fruit_detail;
use App\Models\Bacteria_detail;
use App\Models\Antibacteria_test_type;
use App\Models\Ph_material_detail;
use App\Models\Enzyme_detail;
use App\Models\Substrate_detail;
use App\Models\Gas_detail;
use App\Models\Note;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    
    public function index(Request $request)
    {
    $keyword = $request->input('keyword');
    $material = $request->input('material');
    // dd($material);
    $bacterium = $request->input('bacterium');
    $fruit = $request->input('fruit');
    // $ph_material = $request->input('ph_material');
    // $antibacteria_test_type = $request->input('antibacteria_test_type');
    $enzyme = $request->input('enzyme');
    $substrate = $request->input('substrate');
    $gas = $request->input('gas');

    $selected_materials = Material_detail::query();
    $selected_bacteria = Bacteria_detail::query();
    $selected_fruits = Fruit_detail::query();
    // $selected_phMaterials = Ph_material_detail::query();
    // $selected_antibacteriaTestTypes = Antibacteria_test_type::query();
    $selected_enzymes = Enzyme_detail::query();
    $selected_substrates = Substrate_detail::query();
    $selected_gases = Gas_detail::query();
    $selected_experiments = Experiment::query();

    if(!empty($keyword)){
        $selected_materials->where('name', 'LIKE', "%{$keyword}%");
        $selected_bacteria->where('name', 'LIKE', "%{$keyword}%");
        $selected_fruits->where('name', 'LIKE', "%{$keyword}%");
        $selected_enzymes->where('name', 'LIKE', "%{$keyword}%");
        $selected_substrates->where('name', 'LIKE', "%{$keyword}%");
        $selected_gases->where('name', 'LIKE', "%{$keyword}%");
    }
    if (!empty($material)) {
        $selected_materials->where('name', 'LIKE', "%{$material}%");
        // dd($selected_materials);
    }
    if (!empty($bacterium)) {
        $selected_bacteria->where('name', 'LIKE', "%{$bacterium}%");
    }
    if (!empty($fruit)) {
        $selected_fruits->where('name', 'LIKE', "%{$fruit}%");
    }
    if (!empty($enzyme)) {
        $selected_enzymes->where('name', 'LIKE', "%{$enzyme}%");
    }
    if (!empty($substrate)) {
        $selected_substrates->where('name', 'LIKE', "%{$substrate}%");
    }
    if (!empty($gas)) {
        $selected_gases->where('name', 'LIKE', "%{$gas}%");
    }

    if (!empty($keyword) || !empty($material)) {
        $selected_materials = $selected_materials->get();
        // dd($selected_materials);
    } else {
        $selected_materials = collect();
    }
    if (!empty($keyword) || !empty($bacterium)) {
        $selected_bacteria = $selected_bacteria->get();
    } else {
        $selected_bacteria = collect();
    }
    if (!empty($keyword) || !empty($fruit)) {
        $selected_fruits = $selected_fruits->get();
    } else {
        $selected_fruits = collect();
    }
    if (!empty($keyword) || !empty($enzyme)) {
        $selected_enzymes = $selected_enzymes->get();
    } else {
        $selected_enzymes = collect();
    }
    if (!empty($keyword) || !empty($substrate)) {
        $selected_substrates = $selected_substrates->get();
    } else {
        $selected_substrates = collect();
    }
    if (!empty($keyword) || !empty($gas)) {
        $selected_gases = $selected_gases->get();
    } else {
        $selected_gases = collect();
    }

    if($selected_materials->isEmpty() && $selected_bacteria->isEmpty() && $selected_fruits->isEmpty() &&
        $selected_enzymes->isEmpty() && $selected_substrates->isEmpty() && $selected_gases->isEmpty()) {
            $selected_experiments = [];
        } else {
        foreach($selected_materials as $selected_material){
            $material = Material::where('material_id', $selected_material->id)->pluck('composition_id');
            if($material){
                $experiments_id = Material_Composition::whereIn('id', $material)->pluck('experiment_id');
                $selected_experiments->orwhereIn('id', $experiments_id);
            }
        }


        foreach($selected_bacteria as $selected_bacterium){
            $bacteria = Antibacteria_test::where('bacteria_id', $selected_bacterium->id)->pluck('experiment_id');
            if($bacteria){
                $selected_experiments->orWhereIn('id', $bacteria);
            }
        }
        // dd($selected_experiments);

        foreach($selected_fruits as $selected_fruit){
            $fruit = Storing_test::where('storing_fruit_id', $selected_fruit->id)->pluck('experiment_id');
            if($fruit){
                $selected_experiments->orWhereIn('id', $fruit);
            }
        }
        foreach($selected_enzymes as $selected_enzyme){
            $enzyme = Enzyme_test::where('enzyme_id', $selected_enzyme->id)->pluck('experiment_id');
            if($enzyme){
                $selected_experiments->orWhereIn('id', $enzyme);
            }
        }
        foreach($selected_substrates as $selected_substrate){
            $substrate = Enzyme_test::where('substrate_id', $selected_substrate->id)->pluck('experiment_id');
            if($substrate){
                $selected_experiments->orWhereIn('id', $substrate);
            }
        }
        foreach($selected_gases as $selected_gas){
            $gas = Tga_test::where('gas_id', $selected_gas->id)->pluck('experiment_id');
            if($gas){
                $selected_experiments->orWhereIn('id', $gas);
            }
        }
        $selected_experiments = $selected_experiments->paginate(5);

    }


    $materials = [];
    $fruits = [];
    $bacteria = [];
    $enzymes = [];
    $substrates = [];
    $gases = [];

    $composition_id=[];

    foreach($selected_experiments as $experiment){
        $composition_id[$experiment->id] = Material_composition::where('experiment_id', $experiment->id)->pluck('id');
        $materials[$experiment->id] = Material::whereIn('composition_id', $composition_id[$experiment->id])->get();
        $fruits[$experiment->id] = Storing_test::where('experiment_id', $experiment->id)->get();
        $bacteria[$experiment->id] = Antibacteria_test::where('experiment_id', $experiment->id)->get();
        $enzymes[$experiment->id] = Enzyme_test::where('experiment_id', $experiment->id)->get();
        $substrates[$experiment->id] = Enzyme_test::where('experiment_id', $experiment->id)->get();
        $gases[$experiment->id] = Tga_test::where('experiment_id', $experiment->id)->get();
    }

    $materials_list = Material::select('material_id')->distinct()->get();
    $fruits_list = Storing_test::select('storing_fruit_id')->distinct()->get();
    $bacteria_list = Antibacteria_test::select('bacteria_id')->distinct()->get();
    $enzymes_list = Enzyme_test::select('enzyme_id')->distinct()->get();
    $substrates_list = Enzyme_test::select('substrate_id')->distinct()->get();
    $gases_list = Tga_test::select('gas_id')->distinct()->get();

    return view('user.search.index', compact(
        'materials_list', 'bacteria_list', 'fruits_list', 'enzymes_list', 'substrates_list','gases_list',
        'selected_experiments', 'keyword', 'materials', 'fruits', 'bacteria', 'enzymes', 'substrates', 'gases'
    ));
    }

    public function experimentIndex($experiment_id)
    {
        // $experiment_id = Material_composition::where('id', $composition_id)->first()->experiment_id;
        $experiment = Experiment::where('id', $experiment_id)->first();
        // $film_condition = Film_condition::where('experiment_id', $experiment_id )->get();
        // $film_condition_data = $film_condition->first();
        $materials = [];
        $film_conditions = [];
        $storings_tests = [];
        $bacteria_tests = []; 
        $enzyme_tests = []; 
        $substrate_tests = []; 
        $tga_tests = []; 
        $characteristic_tests = [];
        $characteristic_tests_data = [];
        $charactaristic_testCounts = [];



        $materials_list = Material_detail::orderby('name', 'asc')->get();
        $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
        $bacteria_list = Bacteria_detail::orderby('name','asc')->get();
        $enzyme_list = Enzyme_detail::orderby('name','asc')->get();
        $substrate_list = Substrate_detail::orderby('name','asc')->get();
        $gas_list = gas_detail::orderby('name','asc')->get();


        $compositions = Material_Composition::where('experiment_id', $experiment_id)->orderby('id', 'asc')->get();
        
        $compositions_id = Material_Composition::where('experiment_id', $experiment->id)->pluck('id');
        $characteristic_test = Charactaristic_test::whereIn('composition_id', $compositions_id)->get();
        $film_condition = Film_condition::where('experiment_id', $experiment_id)->get();
        $storing_test = Storing_test::where('experiment_id', $experiment_id)->get();
        $antibacteria_test = Antibacteria_test::where('experiment_id', $experiment_id)->get();
        $enzyme_test = Enzyme_test::where('experiment_id', $experiment_id)->get();
        $tga_test = Tga_test::where('experiment_id', $experiment_id)->get();

        foreach($compositions as $composition) {
            $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
            $characteristic_tests[$composition->id] = Charactaristic_test::where('composition_id', $composition->id)->get();
            $charactaristic_testCounts[$composition->id] = Charactaristic_test::where('composition_id', $composition->id)->count();
            // $characteristic_tests_data[$composition->id] = $characteristic_tests[$composition->id]->first();
        }

        return view('user.search.experiment_show', compact('experiment','materials', 'compositions','storing_test',
            'antibacteria_test','enzyme_test','tga_test', 'characteristic_tests', 'characteristic_test','characteristic_tests_data', 'film_condition', 'materials_list', 'enzyme_list',
            'substrate_list', 'gas_list','fruits_list', 'charactaristic_testCounts'));
    }


    public function show($id)
    {
        $experiment_id = Material_composition::select('experiment_id')->where('id', $id)->firstOrFail()->experiment_id;

        $experiment = Experiment::findOrFail($experiment_id);
        $materials = Material::where('composition_id', $id)->get();
        $film_conditions = Film_condition::where('experiment_id', $experiment_id)->get();
        $charactaristic_tests = Charactaristic_test::where('composition_id', $id)->get();
        $storing_tests = Storing_test::where('composition_id', $id)->get();
        $antibacteria_tests = Antibacteria_test::where('composition_id', $id)->get();
        $notes = Note::where('composition_id', $id)->get();
      
        return view('user.search.show', compact('experiment', 'materials','film_conditions',
                    'charactaristic_tests','storing_tests','antibacteria_tests','notes'));
    }

    public function experimentDetailshow($type, $id)
    {

        if($type == 'experiment'){
            $experiment_id = $id;
            $experiment = Experiment::findOrFail($id);
            return view('user.search.experiment_show_detail', compact('type','experiment','experiment_id'));
        }elseif($type == 'film_condition'){
            $experiment_id = Film_condition::select('experiment_id')->where('id', $id)->first();
            $film_condition = Film_condition::findOrFail($id);
            return view('user.search.experiment_show_detail', compact('type', 'film_condition','experiment_id'));
        }elseif($type == 'characteristic_test'){
            $experiment_id = Material_composition::select('experiment_id')->where('id', $id)->first();
            $characteristic_tests = Charactaristic_test::where('composition_id', $id)->get();
            return view('user.search.experiment_show_detail', compact('type', 'characteristic_tests','experiment_id'));
        }elseif($type == 'material'){
            $experiment_id = Material_composition::select('experiment_id')->where('id', $id)->first();
            $materials = Material::where('composition_id', $id)->get();
            return view('user.search.experiment_show_detail', compact('type', 'materials','experiment_id'));
        }elseif($type == 'storing_test'){
            $experiment_id = Material_composition::select('experiment_id')->where('id', $id)->first();
            $storing_tests = Storing_test::where('composition_id', $id)->get();
            return view('user.search.experiment_show_detail', compact('type', 'storing_tests','experiment_id'));
        }elseif($type == 'antibacteria_test'){
            $experiment_id = Material_composition::select('experiment_id')->where('id', $id)->first();
            $antibacteria_tests = Antibacteria_test::where('composition_id', $id)->get();
            return view('user.search.experiment_show_detail', compact('type', 'antibacteria_tests','experiment_id'));
        }

    }

    public function compareWholeData($type, $item)
    {
        if($type === 'characteristic_test'){
            if($item === 'ph'){
                $ph = [];
                $ph = Charactaristic_test::pluck('ph', 'composition_id')->toArray();
                return view('user.search.chart_show', compact('type', 'item', 'ph'));
                            }
        }
        

        return view('user.search.chart_show');

    }
}
