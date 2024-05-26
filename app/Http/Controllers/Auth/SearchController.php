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
use App\Models\Antibacteria_test;
use App\Models\Material;
use App\Models\Material_detail;
use App\Models\Fruit_detail;
use App\Models\Bacteria_detail;
use App\Models\Antibacteria_test_type;
use App\Models\Ph_material_detail;
use App\Models\Note;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
         public function index(Request $request)
     {
        $keyword = $request->input('keyword');
        $material = $request->input('material');
        $bacterium = $request->input('bacterium');
        $fruit = $request->input('fruit');
        $ph_material = $request->input('ph_material');
        $antibacteria_test_type = $request->input('antibacteria_test_type');

        $selected_materials = Material_detail::query();
        $selected_bacteria = Bacteria_detail::query();
        $selected_fruits = Fruit_detail::query();
        $selected_phMaterials = Ph_material_detail::query();
        $selected_antibacteriaTestTypes = Antibacteria_test_type::query();
        $selected_compositions = Material_composition::query();
        // $selected_experiments = Experiment::query();


        if(!empty($keyword)){
            $selected_materials->where('name', 'LIKE', "%{$keyword}%");
            $selected_bacteria->where('name', 'LIKE', "%{$keyword}%");
            $selected_fruits->where('name', 'LIKE', "%{$keyword}%");
            $selected_phMaterials->where('name', 'LIKE', "%{$keyword}%");
            $selected_antibacteriaTestTypes->where('name', 'LIKE', "%{$keyword}%");
        }
        if (!empty($material)) {
            $selected_materials->where('name', 'LIKE', "%{$material}%");
        }
        if (!empty($bacterium)) {
            $selected_bacteria->where('name', 'LIKE', "%{$bacterium}%");
        }
        if (!empty($fruit)) {
            $selected_fruits->where('name', 'LIKE', "%{$fruit}%");
        }
        if (!empty($ph_material)) {
            $selected_phMaterials->where('name', 'LIKE', "%{$ph_material}%");
        }
        if (!empty($antibacteria_test_type)) {
            $selected_antibacteriaTestTypes->where('name', 'LIKE', "%{$antibacteria_test_type}%");
        }

        //絞ったデータをゲットする，もしインプットに値が入っていなければ，空にする
        if (!empty($keyword) || !empty($material)) {
            $selected_materials = $selected_materials->get();
        } else {
            $selected_materials = [];
        }
        if (!empty($keyword) || !empty($bacterium)) {
            $selected_bacteria = $selected_bacteria->get();
        } else {
            $selected_bacteria = [];
        }
        if (!empty($keyword) || !empty($fruit)) {
            $selected_fruits = $selected_fruits->get();
        } else {
            $selected_fruits = [];
        }
        if (!empty($keyword) || !empty($ph_material)) {
            $selected_phMaterials = $selected_phMaterials->get();
        } else {
            $selected_phMaterials = [];
        }
        if (!empty($keyword) || !empty($antibacteria_test_type)) {
            $selected_antibacteriaTestTypes = $selected_antibacteriaTestTypes->get();
        } else {
            $selected_antibacteriaTestTypes = [];
        }
        if(empty($selected_materials) && empty($selected_bacteria) && empty($selected_fruits) &&
         empty($selected_phMaterials) && empty($selected_antibacteriaTestTypes)) {
            $selected_compositions = [];
            // $selected_experiments = [];
        }

        foreach($selected_materials as $selected_material){
            $material = Material::where('material_id', $selected_material->id)->first();
            if($material){
                $selected_compositions->where('id', $material->composition_id);
            }
        }
        foreach($selected_bacteria as $selected_bacterium){
            $bacteria = Antibacteria_test::where('bacteria_id', $selected_bacterium->id)->first();
            if($bacteria){
                $selected_compositions->orWhere('id', $bacteria->composition_id);
            }
        }
        foreach($selected_fruits as $selected_fruit){
            $fruit = Storing_test::where('storing_fruit_id', $selected_fruit->id)->first();
            if($fruit){
                $selected_compositions->orWhere('id', $fruit->composition_id);
            }
        }
        foreach($selected_phMaterials as $selected_phMaterial){
            $phMaterial = Material::where('ph_material_id', $selected_phMaterial->id)->first();
            if($phMaterial){
                $selected_compositions->orWhere('id', $phMaterial->composition_id);
            }
        }
        foreach($selected_antibacteriaTestTypes as $selected_antibacteriaTestType){
            $antibacteriaTestType = Antibacteria_test::where('test_id', $selected_antibacteriaTestType->id)->first();
            if($antibacteriaTestType){
                $selected_compositions->orWhere('id', $antibacteriaTestType->composition_id);
            }
        }
        
        if(!empty($selected_compositions))
            $selected_compositions = $selected_compositions->paginate(5);

        $materials=[];
        $fruits = [];
        $bacteria = [];

        foreach($selected_compositions as $composition){
            $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
            $fruits[$composition->id] = Storing_test::where('composition_id', $composition->id)->get();
            $bacteria[$composition->id] = Antibacteria_test::where('composition_id', $composition->id)->get();
        }
    
        $materials_list = Material::select('material_id')->distinct()->get();
        $fruits_list = Storing_test::select('storing_fruit_id')->distinct()->get();
        $bacteria_list = Antibacteria_test::select('bacteria_id')->distinct()->get();
        $phMaterial_list = Material::select('ph_material_id')->distinct()->get();
        $antibacteriaTypeTest_list = Antibacteria_test::select('test_id')->distinct()->get();

        
        // return view('user.search.index', compact(
        //     'materials_list', 'bacteria_list', 'fruits_list', 'phMaterial_list', 'antibacteriaTypeTest_list',
        //     'selected_compositions','keyword', 
        // ));
        return view('user.search.index', compact(
            'materials_list', 'bacteria_list', 'fruits_list', 'phMaterial_list', 'antibacteriaTypeTest_list',
            'selected_compositions','keyword', 'materials', 'fruits', 'bacteria'
        ));
 
        } 

        public function experimentIndex($composition_id)
        {
            $experiment_id = Material_composition::where('id', $composition_id)->first()->experiment_id;
            $experiment = Experiment::where('id', $experiment_id)->first();
            $film_condition = Film_condition::where('experiment_id', $experiment_id )->get();
            $film_condition_data = $film_condition->first();
            $materials = [];
            $storings_tests = [];
            $bacteria_tests = []; 
            $characteristic_tests = [];
            $characteristic_tests_data = [];
            $charactaristic_testCounts = [];
    
    
    
            $materials_list = Material_detail::orderby('name', 'asc')->get();
            $ph_materials_list = Ph_material_detail::orderby('name', 'asc')->get();
            $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
            $bacteria_list = Bacteria_detail::orderby('name','asc')->get();
            $antibacteria_test_list = Antibacteria_test_type::orderby('name','asc')->get();
    
    
            $compositions = Material_Composition::where('experiment_id', $experiment->id)->orderby('id', 'asc')->get();
            
            $compositions_id = Material_Composition::where('experiment_id', $experiment->id)->pluck('id');
            $characteristic_test = Charactaristic_test::whereIn('composition_id', $compositions_id)->get();
            $storing_test = Storing_test::whereIn('composition_id', $compositions_id)->get();
    

            foreach($compositions as $composition) {
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $storing_tests[$composition->id] = Storing_test::where('composition_id', $composition->id)->get();
                $bacteria_tests[$composition->id] = Antibacteria_test::where('composition_id', $composition->id)->get();
                $characteristic_tests[$composition->id] = Charactaristic_test::where('composition_id', $composition->id)->get();
                $charactaristic_testCounts[$composition->id] = Charactaristic_test::where('composition_id', $composition->id)->count();
    
                // $characteristic_tests_data[$composition->id] = $characteristic_tests[$composition->id]->first();
            }
    
            return view('user.search.experiment_show', compact('experiment','materials', 'compositions', 'storing_tests','storing_test',
                'bacteria_tests', 'characteristic_tests', 'characteristic_test','characteristic_tests_data', 'film_condition', 'film_condition_data', 'materials_list', 'ph_materials_list',
                'bacteria_list', 'fruits_list', 'antibacteria_test_list','charactaristic_testCounts'));
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
