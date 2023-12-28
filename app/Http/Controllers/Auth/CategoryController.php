<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experiment; 
use App\Models\Film_condition; 
use App\Models\Charactaristic_test; 
use App\Models\Material;
use App\Models\Storing_test;
use App\Models\Antibacteria_test;
use App\Models\Material_detail;
use App\Models\Fruit_detail;
use App\Models\Bacteria_detail;
use App\Models\Ph_material_detail;
use App\Models\Antibacteria_test_type;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Symfony\Component\Mime\CharacterStream;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth:users');
    } 

public function index(Request $request)
{
    $keyword = $request->input('keyword');
    $material = $request->input('material');
    $bacterium = $request->input('bacterium');
    $fruit = $request->input('fruit');
    $ph_material = $request->input('ph_material');
    $antibacteria_test_type = $request->input('antibacteria_test_type');

    //一旦全部のデータをとる
    $selected_materials = Material_detail::query();
    $selected_bacteria = Bacteria_detail::query();
    $selected_fruits = Fruit_detail::query();
    $selected_phMaterials = Ph_material_detail::query();
    $selected_antibacteriaTestTypes = Antibacteria_test_type::query();


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
    
    $materials_list = Material_detail::orderby('name', 'asc')->get();
    $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
    $bacteria_list = Bacteria_detail::orderby('name', 'asc')->get();
    $phMaterial_list = Ph_material_detail::orderby('name', 'asc')->get();
    $antibacteriaTypeTest_list = Antibacteria_test_type::orderby('name', 'asc')->get();

    return view('user.category.index', compact(
        'selected_materials', 'selected_bacteria', 'selected_fruits', 'selected_phMaterials', 'selected_antibacteriaTestTypes',
        'keyword', 'material', 'materials_list', 'bacteria_list', 'fruits_list', 'phMaterial_list', 'antibacteriaTypeTest_list'
    ));
}
    

    /**
     * Show the form for creating a new resource.
     */

    public function create($categoryType)
    {
        return view('user.category.create', compact('categoryType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  
    {
        
        if($request->formType === 'material'){
            $request->validate([
                'name' =>['required', 'string', 'max:255'],
                'charactaristic' =>  ['string', 'nullable']
            ]);

            $material_detail = new Material_detail();
            $material_detail-> name = $request->name;
            $material_detail-> charactaristic = $request->charactaristic;
            $material_detail->save();

        }elseif($request->formType === 'fruit'){
            $request->validate([
                'name' =>['required', 'string', 'max:255'],
                'charactaristic' =>  ['string', 'nullable']
            ]);

            $fruit_detail = new Fruit_detail();
            $fruit_detail-> name = $request->name;
            $fruit_detail-> charactaristic = $request->charactaristic;
            $fruit_detail->save();

        }elseif($request->formType === 'bacteria'){
            $request->validate([
                'name' =>['required', 'string', 'max:255'],
                'charactaristic' =>  ['string', 'nullable']
            ]);

            $bacteria_detail = new Bacteria_detail();
            $bacteria_detail-> name = $request->name;
            $bacteria_detail-> charactaristic = $request->charactaristic;
            $bacteria_detail->save();

        }elseif($request->formType === 'ph_material'){
            $request->validate([
                'name' =>['required', 'string', 'max:255'],
                'charactaristic' =>  ['string', 'nullable']
            ]);

            $ph_material_detail = new Ph_material_detail();
            $ph_material_detail-> name = $request->name;
            $ph_material_detail-> charactaristic = $request->charactaristic;
            $ph_material_detail->save();

        }elseif($request->formType === 'test_type'){
            $request->validate([
                'name' =>['required', 'string', 'max:255'],
                'charactaristic' =>  ['string', 'nullable']
            ]);

            $antibacteria_test_type = new Antibacteria_test_type();
            $antibacteria_test_type-> name = $request->name;
            $antibacteria_test_type-> charactaristic = $request->charactaristic;
            $antibacteria_test_type->save();

        }

        return redirect()->route('user.contact.index')
        ->with(['message'=>'Registration Complete! When you add somethings, please tell me using contact page.',
        'status'=>'info'] );

       

        //save()を使わないとcreateでは同じフォーム内のインスタンスを使うことができなかった。

       
    }


    /**
     * Display the specified resource.
     */
    public function show($id, $category_type)
{
    switch ($category_type) {
        case 'material':
            $material = Material_detail::where('id', $id)->first();
            return view('user.category.show', compact('id', 'category_type', 'material'));
            
        case 'bacteria':
            $bacteria = Bacteria_detail::where('id', $id)->first();
            return view('user.category.show', compact('id', 'category_type', 'bacteria'));
            
        case 'fruit':
            $fruit = Fruit_detail::where('id', $id)->first();
            return view('user.category.show', compact('id', 'category_type', 'fruit'));
            
        case 'phMaterial':
            $phMaterial = Ph_material_detail::where('id', $id)->first();
            return view('user.category.show', compact('id', 'category_type', 'phMaterial'));
            
        case 'antibacteriaTestType':
            $antibacteriaTestType = Antibacteria_test_type::where('id', $id)->first();
            return view('user.category.show', compact('id', 'category_type', 'antibacteriaTestType'));
    }
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Experiment::findOrFail($id)->delete(); 

        return redirect()
        ->route('user.profile.index')
        ->with(['message'=>'Delete Complete',
        'status'=>'alert']);
    }
}
