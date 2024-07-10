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
use App\Models\Enzyme_detail;
use App\Models\Substrate_detail;
use App\Models\Gas_detail;
use App\Models\Solvent_detail;
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
    $solvent = $request->input('solvent');
    $bacterium = $request->input('bacterium');
    $fruit = $request->input('fruit');
    $enzyme = $request->input('enzyme');
    $substrate = $request->input('substrate');
    $gas = $request->input('gas');

    //一旦全部のデータをとる
    $selected_materials = Material_detail::query();
    $selected_solvents = Solvent_detail::query();
    $selected_bacteria = Bacteria_detail::query();
    $selected_fruits = Fruit_detail::query();
    $selected_enzymes = Enzyme_detail::query();
    $selected_substrates = Substrate_detail::query();
    $selected_gases =  Gas_detail::query();


    if(!empty($keyword)){
        $selected_materials->where('name', 'LIKE', "%{$keyword}%");
        $selected_solvents->where('name', 'LIKE', "%{$keyword}%");
        $selected_bacteria->where('name', 'LIKE', "%{$keyword}%");
        $selected_fruits->where('name', 'LIKE', "%{$keyword}%");
        $selected_enzymes->where('name', 'LIKE', "%{$keyword}%");
        $selected_substrates->where('name', 'LIKE', "%{$keyword}%");
        $selected_gases->where('name', 'LIKE', "%{$keyword}%");
    }
    if (!empty($material)) {
        $selected_materials->where('name', 'LIKE', "%{$material}%");
    }
    if (!empty($solvent)) {
        $selected_solvents->where('name', 'LIKE', "%{$solvent}%");
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
    
    //絞ったデータをゲットする，もしインプットに値が入っていなければ，空にする
    if (!empty($keyword) || !empty($material)) {
        $selected_materials = $selected_materials->get();
    } else {
        $selected_materials = [];
    }
    if (!empty($keyword) || !empty($solvent)) {
        $selected_solvents = $selected_solvents->get();
    } else {
        $selected_solvents = [];
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
    if (!empty($keyword) || !empty($enzyme)) {
        $selected_enzymes = $selected_enzymes->get();
    } else {
        $selected_enzymes = [];
    }
    if (!empty($keyword) || !empty($substrate)) {
        $selected_substrates = $selected_substrates->get();
    } else {
        $selected_substrates = [];
    }
    if (!empty($keyword) || !empty($gas)) {
        $selected_gases = $selected_gases->get();
    } else {
        $selected_gases = [];
    }
    
    $materials_list = Material_detail::orderby('name', 'asc')->get();
    $solvents_list = Solvent_detail::orderby('name', 'asc')->get();
    $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
    $bacteria_list = Bacteria_detail::orderby('name', 'asc')->get();
    $enzymes_list = Enzyme_detail::orderby('name', 'asc')->get();
    $substrates_list = Substrate_detail::orderby('name', 'asc')->get();
    $gases_list = Gas_detail::orderby('name', 'asc')->get();

    return view('user.category.index', compact(
        'selected_materials','selected_solvents', 'selected_bacteria', 'selected_fruits', 'selected_enzymes', 'selected_substrates','selected_gases',
        'keyword', 'material', 'materials_list','solvents_list', 'bacteria_list', 'fruits_list', 'enzymes_list', 'substrates_list','gases_list'
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

        }
        elseif($request->formType === 'bacteria'){
            $request->validate([
                'name' =>['required', 'string', 'max:255'],
                'charactaristic' =>  ['string', 'nullable']
            ]);

            $bacteria_detail = new Bacteria_detail();
            $bacteria_detail-> name = $request->name;
            $bacteria_detail-> charactaristic = $request->charactaristic;
            $bacteria_detail->save();

        }
        elseif($request->formType === 'solvent'){
            $request->validate([
                'name' =>['required', 'string', 'max:255'],
                'charactaristic' =>  ['string', 'nullable']
            ]);

            $solvent_detail = new solvent_detail();
            $solvent_detail-> name = $request->name;
            $solvent_detail-> charactaristic = $request->charactaristic;
            $solvent_detail->save();

        }
        elseif($request->formType === 'enzyme'){
            $request->validate([
                'name' =>['required', 'string', 'max:255'],
                'charactaristic' =>  ['string', 'nullable']
            ]);

            $enzyme_detail = new Enzyme_detail();
            $enzyme_detail-> name = $request->name;
            $enzyme_detail-> charactaristic = $request->charactaristic;
            $enzyme_detail->save();

        }
        elseif($request->formType === 'substrate'){
            $request->validate([
                'name' =>['required', 'string', 'max:255'],
                'charactaristic' =>  ['string', 'nullable']
            ]);

            $substrate_detail = new Substrate_detail();
            $substrate_detail-> name = $request->name;
            $substrate_detail-> charactaristic = $request->charactaristic;
            $substrate_detail->save();

        }
        elseif($request->formType === 'gas'){
            $request->validate([
                'name' =>['required', 'string', 'max:255'],
                'charactaristic' =>  ['string', 'nullable']
            ]);

            $gas_detail = new gas_detail();
            $gas_detail-> name = $request->name;
            $gas_detail-> charactaristic = $request->charactaristic;
            $gas_detail->save();

        }

        elseif($request->formType === 'ph_material'){
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
