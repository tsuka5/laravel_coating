<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experiment; 
use App\Models\Film_condition; 
use App\Models\Charactaristic_test; 
use App\Models\Material;
use App\Models\Additive;
use App\Models\Storing_test;
use App\Models\Antibacteria_test;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
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

        $userInformation = Auth::user();

        // $experiments = Experiment::where('user_id', Auth::user()->id)->get();
        $experiments = Experiment::where('user_id', Auth::user()->id)->get();


        return view('user.profile.index', compact('userInformation','experiments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255','unique:experiments'], 
            'name' => ['required', 'string', 'max:255'],
            'date' => ['required','date'],
            'paper' => ['string', 'max:255','nullable'],

            'degassing_temperature' => ['numeric', 'nullable'],
            'dish_type' => ['string', 'nullable'],
            'dish_area' => ['numeric', 'nullable'],
            'casting_ml' => ['numeric', 'nullable'],
            'incubator_type' => ['string', 'nullable'],
            'drying_temperature' => ['numeric', 'nullable'],
            'drying_humidity' => ['numeric', 'nullable'],
            'drying_time' => ['numeric', 'nullable'],

            'ph' => ['numeric', 'nullable'],
            'shear_rate' => ['numeric', 'nullable'],
            'shear_stress' => ['numeric', 'nullable'],
            'viscosity' => ['numeric', 'nullable'],
            'moisture_content' => ['numeric', 'nullable'],
            'water_solubility' => ['numeric', 'nullable'],
            'wvp' => ['numeric', 'nullable'],
            'thickness' => ['numeric', 'nullable'],
            'contact_angle' => ['numeric', 'nullable'],
            'tensile_strength' => ['numeric', 'nullable'],
         
            's_name' => ['string', 'nullable'],
            'storing_days' => ['numeric', 'nullable'],
            'mass_loss_rate' => ['numeric', 'nullable'],
            'color_l' => ['numeric', 'nullable'],
            'color_a' => ['numeric', 'nullable'],
            'color_b' => ['numeric', 'nullable'],
            'color_e' => ['numeric', 'nullable'],
            'ph' => ['numeric', 'nullable'],
            'tss' => ['numeric', 'nullable'],
            'hardness' => ['numeric', 'nullable'],

            'a_name' => ['string', 'nullable'],
            'bacteria_rate' => ['numeric', 'nullable'],
            'a_moisture_content' => ['numeric', 'nullable'],
            'afm' => ['nullable'],
            'sem' => ['nullable'],
            'dsc' => ['nullable'],
            'ftir' => ['nullable'],
            // 'ftir' => ['mimes:jpg,jpeg,png', 'nullable'],
           
        ]);

        $experiment = new Experiment;
        $experiment -> user_id = Auth::user()->id;
        $experiment->title = $request->title;
        $experiment->name = $request->name;
        $experiment->date = $request->date;
        $experiment->paper = $request->paper;        
        $experiment->save();

        $material = new Material;
        $material-> experiment_id = $experiment->id;
        $material-> name = $request->name;
        $material-> price = $request->price;
        $material-> concentration = $request->concentration;
        $material-> heat = $request->heat;
        $material-> water_temperature = $request->water_temperature;
        $material-> water_rate = $request->water_rate;
        $material-> material_rate = $request->material_rate;
        $material-> staler_speed = $request->staler_speed;
        $material-> repeat = $request->repeat;
        $material-> staler_time = $request->staler_time;
        $material-> ph_adjustment = $request->ph_adjustment;
        $material-> ph_material = $request->ph_material;
        $material-> ph_target = $request->ph_target;
        $material->save();

        $additive = new Additive;
        $additive-> experiment_id = $experiment->id;
        $additive-> name = $request->name;
        $additive-> price = $request->price;
        $additive-> concentration = $request->concentration;
        $additive->save();

        $film_condition = new Film_condition;
        $film_condition-> experiment_id = $experiment->id;
        $film_condition-> degassing_temperature = $request->degassing_temperature;
        $film_condition-> dish_type = $request->dish_type;
        $film_condition-> dish_area = $request->dish_area;
        $film_condition-> casting_ml = $request->casting_ml;
        $film_condition-> incubator_type = $request->incubator_type;
        $film_condition-> drying_temperature = $request->drying_temperature;
        $film_condition-> drying_humidity = $request->drying_humidity;
        $film_condition-> drying_time = $request->drying_time;
        $film_condition->save();

        $charactaristic_test = new Charactaristic_test;
        $charactaristic_test-> experiment_id = $experiment->id;
        $charactaristic_test-> ph = $request->ph;
        $charactaristic_test-> shear_rate = $request->shear_rate;
        $charactaristic_test-> shear_stress = $request->shear_stress;
        $charactaristic_test-> viscosity = $request->viscosity;
        $charactaristic_test-> moisture_content = $request->moisture_content;
        $charactaristic_test-> water_solubility = $request->water_solubility;
        $charactaristic_test-> wvp = $request->wvp;
        $charactaristic_test-> thickness = $request->thickness;
        $charactaristic_test-> contact_angle = $request->contact_angle;
        $charactaristic_test-> tensile_strength = $request->tensile_strength;
        $charactaristic_test->save();

        $storing_test = new Storing_test;
        $storing_test-> experiment_id = $experiment->id;
        $storing_test-> s_name = $request->s_name;
        $storing_test-> storing_days = $request->storing_days;
        $storing_test-> mass_loss_rate = $request->mass_loss_rate;
        $storing_test-> color_l = $request->color_l;
        $storing_test-> color_a = $request->color_a;
        $storing_test-> color_b = $request->color_b;
        $storing_test-> color_e = $request->color_e;
        $storing_test-> ph = $request->ph;
        $storing_test-> tss = $request->tss;
        $storing_test-> hardness = $request->hardness;
        $storing_test->save();

        $antibacteria_test = new Antibacteria_test;
        $antibacteria_test-> experiment_id = $experiment->id;
        $antibacteria_test-> a_name = $request->a_name;
        $antibacteria_test-> bacteria_rate = $request->bacteria_rate;
        $antibacteria_test-> a_moisture_content = $request->a_moisture_content;
        $antibacteria_test-> afm = $request->afm;
        $antibacteria_test-> sem = $request->sem;
        $antibacteria_test-> dsc = $request->dsc;
        $antibacteria_test-> ftir = $request->ftir;
        $antibacteria_test->save();

        return redirect()->route('user.profile.index')
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

        return view('user.profile.edit', compact('experiment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $experiment = Experiment::findOrFail($id);
        $experiment->title = $request->title;
        $experiment->name = $request->name;
        // $experiment->date = $request->date;
        // $experiment->paper = $request->paper;        
        $experiment->save();

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
        Experiment::findOrFail($id)->delete(); //ソフトデリート

        return redirect()
        ->route('user.profile.index')
        ->with(['message'=>'Delete Complete',
        'status'=>'alert']);
    }
}
