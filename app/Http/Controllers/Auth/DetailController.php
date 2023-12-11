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
       
        return view('user.detail.index', compact('materials', 'fruits', 'bacteria'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($formType)
    {
        if ($formType === 'material') {
            return view('user.detail.material_create');
        } elseif ($formType === 'film_condition') {
            return view('user.detail.fruit_create');
        } elseif ($formType === 'charactaristic_test') {
            return view('user.detail.bacteria_create');
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
                'price' => ['numeric', 'nullable'],
                'charactaristic' =>  ['string', 'nullable']
            ]);

            $material_detail = new Fruit_detail();
            $material_detail-> name = $request->name;
            $material_detail-> charactaristic = $request->charactaristic;
            $material_detail->save();

        }elseif($request->formType === 'bacteria'){
            $request->validate([
                'name' =>['required', 'string', 'max:255'],
                'price' => ['numeric', 'nullable'],
                'charactaristic' =>  ['string', 'nullable']
            ]);

            $material_detail = new Bacteria_detail();
            $material_detail-> name = $request->name;
            $material_detail-> charactaristic = $request->charactaristic;
            $material_detail->save();

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
        $experiment = Experiment::findOrFail($id);
        $materials = Material::where('experiment_id', $id)->get();
        $film_conditions = Film_condition::where('experiment_id', $id)->get();
        $charactaristic_tests = Charactaristic_test::where('experiment_id', $id)->get();
        $storing_tests = Storing_test::where('experiment_id', $id)->get();
        $antibacteria_tests = Antibacteria_test::where('experiment_id', $id)->get();
        
        

        return view('user.profile.edit', compact('experiment', 'materials','film_conditions',
                    'charactaristic_tests','storing_tests','antibacteria_tests'));
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $experiment = Experiment::findOrFail($id);
        $experiment->title = $request->title;
        $experiment->name = $request->name;
        $experiment->date = $request->date;
        $experiment->paper = $request->paper;        
        $experiment->save();

        $materials = Material::where('experiment_id', $id)->get();
        foreach($materials as $material) {
            $material-> experiment_id = $id;
            $material-> m_name = $request->input("m_name.$material->id");
            $material-> price = $request->input("price.$material->id");
            $material-> concentration = $request->input("concentration.$material->id");
            $material-> heat = $request->input("heat.$material->id");
            $material-> water_temperature = $request->input("water_temperature.$material->id");
            $material-> water_rate = $request->input("water_rate.$material->id");
            $material-> material_rate = $request->input("material_rate.$material->id");
            $material-> staler_speed = $request->input("staler_speed.$material->id");
            $material-> repeat = $request->input("repeat.$material->id");
            $material-> staler_time = $request->input("staler_time.$material->id");
            $material-> ph_adjustment = $request->input("ph_adjustment.$material->id");
            $material-> ph_material = $request->input("ph_material.$material->id");
            $material-> ph_target = $request->input("ph_target.$material->id");
            $material->save();
        }

        $filmconditions = Film_condition::where('experiment_id', $id)->get();
        foreach($filmconditions as $film_condition) {
            $film_condition-> experiment_id = $id;
            $film_condition-> degassing_temperature = $request->input("degassing_temperature.$film_condition->id");
            $film_condition-> dish_type = $request->input("dish_type.$film_condition->id");
            $film_condition-> dish_area = $request->input("dish_area.$film_condition->id");
            $film_condition-> casting_ml = $request->input("casting_ml.$film_condition->id");
            $film_condition-> incubator_type = $request->input("incubator_type.$film_condition->id");
            $film_condition-> drying_temperature = $request->input("drying_temperature.$film_condition->id");
            $film_condition-> drying_humidity = $request->input("drying_humidity.$film_condition->id");
            $film_condition-> drying_time = $request->input("drying_time.$film_condition->id");
            $film_condition->save();
        }

        
        

        return redirect()
        ->route('user.profile.index')
        ->with(['message'=>'Update Complete',
        'status'=>'info']);
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
