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

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth:users');
    } 

    public function index()
    {
        
        $materials = Material_detail::orderby('name', 'asc')->simplePaginate(7);
        $fruits = Fruit_detail::orderby('name', 'asc')->simplePaginate(7);
        $bacteria = Bacteria_detail::orderby('name', 'asc')->simplePaginate(7);
        $ph_materials = Ph_material_detail::orderby('name', 'asc')->simplePaginate(7);
        $test_types = Antibacteria_test_type::orderby('name', 'asc')->simplePaginate(7);
       
        return view('user.detail.index', compact('materials', 'fruits', 'bacteria', 'ph_materials', 'test_types'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($formType)
    {
        if ($formType === 'material') {
            return view('user.detail.material_create');
        } elseif ($formType === 'fruit') {
            return view('user.detail.fruit_create');
        } elseif ($formType === 'bacteria') {
            return view('user.detail.bacteria_create');
        } elseif ($formType === 'ph_material') {
            return view('user.detail.ph_material_create');
        } elseif ($formType === 'test_type') {
            return view('user.detail.test_type_create');
        }
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

        return redirect()->route('user.detail.index')
        ->with(['message'=>'Registration Complete',
        'status'=>'info'] );

       

        //save()を使わないとcreateでは同じフォーム内のインスタンスを使うことができなかった。

       
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $experiment = Experiment::findOrFail($id);
        // $materials = Material::where('experiment_id', $id)->get();
        // $film_conditions = Film_condition::where('experiment_id', $id)->get();
        // $charactaristic_tests = Charactaristic_test::where('experiment_id', $id)->get();
        // $storing_tests = Storing_test::where('experiment_id', $id)->get();
        // $antibacteria_tests = Antibacteria_test::where('experiment_id', $id)->get();
        
        

        // return view('user.profile.edit', compact('experiment', 'materials','film_conditions',
        //             'charactaristic_tests','storing_tests','antibacteria_tests'));
   
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
