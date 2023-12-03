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
use App\Models\Material_detail;
use App\Models\Additive_detail;
use App\Models\Fruit_detail;
use App\Models\Bacteria_detail;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Symfony\Component\Mime\CharacterStream;

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
        $experiments = Experiment::where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(4);

        $materialCounts = [];
        $additiveCounts = [];
        $film_conditionCounts = [];
        $charactaristic_testCounts = [];
        $storing_testCounts = [];
        $antibacteria_testCounts = [];

        foreach ($experiments as $experiment) {
            $materialCounts[$experiment->id] = Material::where('experiment_id', $experiment->id)->count();
            $additiveCounts[$experiment->id] = Additive::where('experiment_id', $experiment->id)->count();
            $film_conditionCounts[$experiment->id] = Film_condition::where('experiment_id', $experiment->id)->count();
            $charactaristic_testCounts[$experiment->id] = Charactaristic_test::where('experiment_id', $experiment->id)->count();
            $storing_testCounts[$experiment->id] = Storing_test::where('experiment_id', $experiment->id)->count();
            $antibacteria_testCounts[$experiment->id] = Antibacteria_test::where('experiment_id', $experiment->id)->count();
        }
       
        return view('user.profile.index', compact('userInformation','experiments','materialCounts','additiveCounts','film_conditionCounts',
            'charactaristic_testCounts','storing_testCounts','antibacteria_testCounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createExperiment()
    {
        return view('user.profile.create');
    }

    public function create($id, $formType)
    {
        $materials_list = Material_detail::orderby('name', 'asc')->get();
        $additives_list = Additive_detail::orderby('name', 'asc')->get();
        $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
        $bacteria_list = Bacteria_detail::orderby('name','asc')->get();
        // $id を使用して必要な処理を行う
        if ($formType === 'material') {
            return view('user.profile.material_create', compact('id', 'materials_list'));
        } elseif ($formType === 'additive') {
            return view('user.profile.additive_create', compact('id', 'additives_list'));
        } elseif ($formType === 'film_condition') {
            return view('user.profile.film_condition_create', ['id'=>$id]);
        } elseif ($formType === 'charactaristic_test') {
            return view('user.profile.charactaristic_test_create', ['id'=>$id]);
        } elseif ($formType === 'storing_test') {
            return view('user.profile.storing_test_create', compact('id', 'fruits_list'));
        } elseif ($formType === 'antibacteria_test') {
            return view('user.profile.antibacteria_test_create', compact('id', 'bacteria_list'));
        } 
        // return view('user.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  
    {
       

        if($request->formType === 'experiment'){
            $request->validate([
                'title' => ['required', 'string', 'max:255','unique:experiments'], 
                'name' => ['required', 'string', 'max:255'],
                'date' => ['required','date'],
                'paper' => ['string', 'max:255','nullable'],
            ]);

            $experiment = new Experiment;
            $experiment -> user_id = Auth::user()->id;
            $experiment->title = $request->title;
            $experiment->name = $request->name;
            $experiment->date = $request->date;
            $experiment->paper = $request->paper;        
            $experiment->save();
        }elseif($request->formType === 'material'){
            $request->validate([
                'm_name' =>['required', 'string', 'max:255'],
                'price' => ['numeric', 'nullable'],
                'heat' => ['numeric', 'nullable'],
                'water_temperature' => ['numeric', 'nullable'],
                'starler_speed' => ['numeric', 'nullable'],
                'repeat' => ['numeric', 'nullable'],
                'staler_time' => ['numeric', 'nullable'],
                'ph_adjustment' => ['numeric', 'nullable'],
                'ph_material' => ['numeric', 'nullable'],
                'ph_target' => ['numeric', 'nullable'],    
            ]);
            
            $materialDetail = Material_detail::where('name', $request->m_name)->first();

            $material = new Material;
            $material-> experiment_id = $request->id;
            $material-> m_name = $request->m_name;
            $material-> material_id = $materialDetail->id;
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

        }elseif($request->formType === 'additive'){
            $request->validate([
                'ad_name' =>['required', 'string', 'max:255'],
                'price' => ['numeric', 'nullable'],
                'concentration' =>['numeric', 'nullable'],
            ]);

            $additiveDetail = Additive_detail::where('name', $request->ad_name)->first();

            $additive = new Additive;
            $additive-> experiment_id = $request->id;
            $additive-> ad_name = $request->ad_name;
            $additive-> additive_id = $additiveDetail->id;
            $additive-> price = $request->price;
            $additive-> concentration = $request->concentration;
            $additive->save();

        }elseif($request->formType === 'film_condition'){
            $request->validate([
                'degassing_temperature' => ['numeric', 'nullable'],
                'dish_type' => ['string', 'nullable'],
                'dish_area' => ['numeric', 'nullable'],
                'casting_ml' => ['numeric', 'nullable'],
                'incubator_type' => ['string', 'nullable'],
                'drying_temperature' => ['numeric', 'nullable'],
                'drying_humidity' => ['numeric', 'nullable'],
                'drying_time' => ['numeric', 'nullable'],
            ]);

            $film_condition = new Film_condition;
            $film_condition-> experiment_id = $request->id;
            $film_condition-> degassing_temperature = $request->degassing_temperature;
            $film_condition-> dish_type = $request->dish_type;
            $film_condition-> dish_area = $request->dish_area;
            $film_condition-> casting_ml = $request->casting_ml;
            $film_condition-> incubator_type = $request->incubator_type;
            $film_condition-> drying_temperature = $request->drying_temperature;
            $film_condition-> drying_humidity = $request->drying_humidity;
            $film_condition-> drying_time = $request->drying_time;
            $film_condition->save();

        }elseif($request->formType === 'charactaristic_test'){
            $request->validate([
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
                'afm1' => ['nullable'],
                'afm2' => ['nullable'],
                'sem1' => ['nullable'],
                'sem2' => ['nullable'],
                'dsc1' => ['nullable'],
                'dsc2' => ['nullable'],
                'ftir1' => ['nullable'],
                'ftir2' => ['nullable'],
            ]);


            $afmImage_1 = $request->file('afm1');
            $afmImage_2 = $request->file('afm2');
            $semImage_1 = $request->file('sem1');
            $semImage_2 = $request->file('sem2');
            $dscImage_1 = $request->file('dsc1');
            $dscImage_2 = $request->file('dsc2');
            $ftirImage_1 = $request->file('ftir1');
            $ftirImage_2 = $request->file('ftir2');

            $filePath_afm1 = $afmImage_1 ? $afmImage_1->store('images', 'public') : null;
            $filePath_afm2 = $afmImage_2 ? $afmImage_2->store('images', 'public') : null;
            $filePath_sem1 = $semImage_1 ? $semImage_1->store('images', 'public') : null;
            $filePath_sem2 = $semImage_2 ? $semImage_2->store('images', 'public') : null;
            $filePath_dsc1 = $dscImage_1 ? $dscImage_1->store('images', 'public') : null;
            $filePath_dsc2 = $dscImage_2 ? $dscImage_2->store('images', 'public') : null;
            $filePath_ftir1 = $ftirImage_1 ? $ftirImage_1->store('images', 'public') : null;
            $filePath_ftir2 = $ftirImage_2 ? $ftirImage_2->store('images', 'public') : null;

            $charactaristic_test = new Charactaristic_test;
            $charactaristic_test-> experiment_id = $request->id;
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
            $charactaristic_test-> afm1 = $filePath_afm1;
            $charactaristic_test-> afm2 = $filePath_afm2;
            $charactaristic_test-> sem1 = $filePath_sem1;
            $charactaristic_test-> sem2 = $filePath_sem2;
            $charactaristic_test-> dsc1 = $filePath_dsc1;
            $charactaristic_test-> dsc2 = $filePath_dsc2;
            $charactaristic_test-> ftir1 = $filePath_ftir1;
            $charactaristic_test-> ftir2 = $filePath_ftir2;
            $charactaristic_test->save();

        }elseif($request->formType === 'storing_test'){
            $request->validate([
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
                'moisture_content' => ['numeric', 'nullable']
            ]);

            $fruitDetail = Fruit_detail::where('name', $request->s_name)->first();

            $storing_test = new Storing_test;
            $storing_test-> experiment_id = $request->id;
            $storing_test-> s_name = $request->s_name;
            $storing_test-> fruit_id = $fruitDetail->id;
            $storing_test-> storing_days = $request->storing_days;
            $storing_test-> mass_loss_rate = $request->mass_loss_rate;
            $storing_test-> color_l = $request->color_l;
            $storing_test-> color_a = $request->color_a;
            $storing_test-> color_b = $request->color_b;
            $storing_test-> color_e = $request->color_e;
            $storing_test-> ph = $request->ph;
            $storing_test-> tss = $request->tss;
            $storing_test-> hardness = $request->hardness;
            $storing_test-> moisture_content = $request->moisture_content;
            $storing_test->save();

        }else{
            $request->validate([
                'a_name' => ['string', 'nullable'],
                'bacteria_rate' => ['numeric', 'nullable'],
                'a_moisture_content' => ['numeric', 'nullable'],
                'mic' => ['numeric', 'nullable'],
            ]);

            $bacteriaDetail = Bacteria_detail::where('name', $request->a_name)->first();
            
            $antibacteria_test = new Antibacteria_test;
            $antibacteria_test-> experiment_id = $request->id;
            $antibacteria_test-> a_name = $request->a_name;
            $antibacteria_test-> bacteria_id = $bacteriaDetail->id;
            $antibacteria_test-> bacteria_rate = $request->bacteria_rate;
            $antibacteria_test-> mic = $request->mic;
            $antibacteria_test->save();
        }


       

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
        $materials = Material::where('experiment_id', $id)->get();
        $additives = Additive::where('experiment_id', $id)->get();
        $film_conditions = Film_condition::where('experiment_id', $id)->get();
        $charactaristic_tests = Charactaristic_test::where('experiment_id', $id)->get();
        $storing_tests = Storing_test::where('experiment_id', $id)->get();
        $antibacteria_tests = Antibacteria_test::where('experiment_id', $id)->get();

        $materials_list = Material_detail::orderby('name', 'asc')->get();
        $additives_list = Additive_detail::orderby('name', 'asc')->get();
        $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
        $bacteria_list = Bacteria_detail::orderby('name','asc')->get();

        $afm1_image = Charactaristic_test::select('afm1')->where('experiment_id', $id)->first();
        if($afm1_image) {
            $afm1_imagePath = '/storage/' . $afm1_image->afm1;
        }


        return view('user.profile.edit', compact('experiment', 'materials','additives','film_conditions',
                    'charactaristic_tests','storing_tests','antibacteria_tests', 'materials_list', 'additives_list', 
                    'fruits_list', 'bacteria_list', 'afm1_imagePath'));
   
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

            
            $materialDetail = Material_detail::where('name', $request->input("m_name.{$material->id}"))->first();
        
            $material-> experiment_id = $id;
            $material-> m_name = $request->input("m_name.$material->id");
            $material-> material_id = $materialDetail->id;
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

        $additives = Additive::where('experiment_id', $id)->get();
        foreach($additives as $additive) {

            $additiveDetail = Additive_detail::where('name', $request->input("ad_name.{$additive->id}"))->first();

            $additive-> experiment_id = $id;
            $additive-> ad_name = $request->input("ad_name.$additive->id");
            $additive-> additive_id = $additiveDetail->id;
            $additive-> price = $request->input("price.$additive->id");
            $additive-> concentration = $request->input("concentration.$additive->id");
            $additive->save();
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

        $charactaristictests = Charactaristic_test::where('experiment_id', $id)->get();
        foreach($charactaristictests as $charactaristic_test) {

            

            $afmImage_1 = $request->file('afm1');
            $afmImage_2 = $request->file('afm2');
            $semImage_1 = $request->file('sem1');
            $semImage_2 = $request->file('sem2');
            $dscImage_1 = $request->file('dsc1');
            $dscImage_2 = $request->file('dsc2');
            $ftirImage_1 = $request->file('ftir1');
            $ftirImage_2 = $request->file('ftir2');

            // dd($afmImage_1);

            // $afmFilesArray_1 = $request->file('afm1');
            // $afmFilesArray_2 = $request->file('afm2');
            // $semFilesArray_1 = $request->file('sem1');
            // $semFilesArray_1 = $request->file('sem2');
            // $dscFilesArray_1 = $request->file('dsc1');
            // $dscFilesArray_1 = $request->file('dsc2');
            // $ftirFilesArray_1 = $request->file('ftir1');
            // $ftirFilesArray_1 = $request->file('ftir2');

            // dd($afmFilesArray_1);

            // $filePath_afm1 = null; // $filePath_afm1 を初期化
            // if (is_array($afmFilesArray_1)) {
            //     foreach ($afmFilesArray_1 as $file) {
                    // if ($afmFilesArray_1 instanceof Illuminate\Http\UploadedFile) {
                    //     // $file は UploadedFile のインスタンスです
                    //     // ここで必要な処理を行います
                    //     dd($afmFilesArray_1);
                    //     $filePath_afm1 = $afmFilesArray_1->store('images', 'public');
                    //     break;
                    //     // 保存されたファイルのパスなどを取得します
                    // }
            //     }
            // }

            $filePath_afm1 = $afmImage_1 ? $afmImage_1->store('images', 'public') : null;
            $filePath_afm2 = $afmImage_2 ? $afmImage_2->store('images', 'public') : null;
            $filePath_sem1 = $semImage_1 ? $semImage_1->store('images', 'public') : null;
            $filePath_sem2 = $semImage_2 ? $semImage_2->store('images', 'public') : null;
            $filePath_dsc1 = $dscImage_1 ? $dscImage_1->store('images', 'public') : null;
            $filePath_dsc2 = $dscImage_2 ? $dscImage_2->store('images', 'public') : null;
            $filePath_ftir1 = $ftirImage_1 ? $ftirImage_1->store('images', 'public') : null;
            $filePath_ftir2 = $ftirImage_2 ? $ftirImage_2->store('images', 'public') : null;

            $charactaristic_test-> experiment_id = $id;
            $charactaristic_test-> ph = $request->input("ph.$charactaristic_test->id");
            $charactaristic_test-> shear_rate = $request->input("shear_rate.$charactaristic_test->id");
            $charactaristic_test-> shear_stress = $request->input("shear_stress.$charactaristic_test->id");
            $charactaristic_test-> viscosity = $request->input("viscosity.$charactaristic_test->id");
            $charactaristic_test-> moisture_content = $request->input("moisture_content.$charactaristic_test->id");
            $charactaristic_test-> water_solubility = $request->input("water_solubility.$charactaristic_test->id");
            $charactaristic_test-> wvp = $request->input("wvp.$charactaristic_test->id");
            $charactaristic_test-> thickness = $request->input("thickness.$charactaristic_test->id");    
            $charactaristic_test-> contact_angle = $request->input("cotact_angle.$charactaristic_test->id");
            $charactaristic_test-> tensile_strength = $request->input("tensile_strength.$charactaristic_test->id");
            $charactaristic_test-> afm1 = $filePath_afm1;
            $charactaristic_test-> afm2 = $filePath_afm2;
            $charactaristic_test-> sem1 = $filePath_sem1;
            $charactaristic_test-> sem2 = $filePath_sem2;
            $charactaristic_test-> dsc1 = $filePath_dsc1;
            $charactaristic_test-> dsc2 = $filePath_dsc2;
            $charactaristic_test-> ftir1 = $filePath_ftir1;
            $charactaristic_test-> ftir2 = $filePath_ftir2;
            $charactaristic_test->save();
        }

        $storingtests = Storing_test::where('experiment_id', $id)->get();
        foreach($storingtests as $storing_test) {

            $fruitDetail = Fruit_detail::where('name', $request->input("s_name.{$additive->id}"))->first();

            $storing_test-> experiment_id = $id;
            $storing_test-> s_name = $request->input("s_name.$storing_test->id");
            $storing_test-> fruit_id = $fruitDetail->id;
            $storing_test-> storing_days = $request->input("storing_days.$storing_test->id");
            $storing_test-> mass_loss_rate = $request->input("mass_loss_rate.$storing_test->id");
            $storing_test-> color_l = $request->input("color_l.$storing_test->id");
            $storing_test-> color_a = $request->input("color_a.$storing_test->id");
            $storing_test-> color_b = $request->input("color_b.$storing_test->id");
            $storing_test-> color_e = $request->input("color_e.$storing_test->id");
            $storing_test-> ph = $request->input("ph.$storing_test->id");
            $storing_test-> tss = $request->input("tss.$storing_test->id");
            $storing_test-> hardness = $request->input("hardness.$storing_test->id");
            $storing_test-> moisture_content = $request->input("moisture_content.$storing_test->id");
            $storing_test->save();
        }

        $antibacteriatests = Antibacteria_test::where('experiment_id', $id)->get();
        foreach($antibacteriatests as $antibacteria_test) {

            $bacteriaDetail = Bacteria_detail::where('name', $request->input("a_name.{$antibacteria_test->id}"))->first();
            $antibacteria_test-> experiment_id = $id;
            $antibacteria_test-> a_name = $request->input("a_name.$antibacteria_test->id");
            $antibacteria_test-> bacteria_id = $bacteriaDetail->id;
            $antibacteria_test-> bacteria_rate = $request->input("bacteria_rate.$antibacteria_test->id");
            $antibacteria_test-> mic = $request->input("mic.$antibacteria_test->id");
            $antibacteria_test->save();

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
