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
        if(empty($selected_materials) && empty($selected_bacteria) && empty($selected_fruits) && empty($selected_phMaterials) && empty($selected_antibacteriaTestTypes)) {
            $selected_compositions = [];
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
    public function show(string $id)
    {
        $experiment_id = Material_composition::select('experiment_id')->where('id', $id)->firstOrFail()->experiment_id;

        $experiment = Experiment::findOrFail($experiment_id);
        $materials = Material::where('composition_id', $id)->get();
        $film_conditions = Film_condition::where('composition_id', $id)->get();
        $charactaristic_tests = Charactaristic_test::where('composition_id', $id)->get();
        $storing_tests = Storing_test::where('composition_id', $id)->get();
        $antibacteria_tests = Antibacteria_test::where('composition_id', $id)->get();
        $notes = Note::where('composition_id', $id)->get();
      
        return view('user.search.show', compact('experiment', 'materials','film_conditions',
                    'charactaristic_tests','storing_tests','antibacteria_tests','notes'));
    }
}
