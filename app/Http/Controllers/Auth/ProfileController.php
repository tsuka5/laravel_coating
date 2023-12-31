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
use App\Models\Affiliation;
use App\Models\Note;
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
        $film_conditionCounts = [];
        $charactaristic_testCounts = [];
        $storing_testCounts = [];
        $antibacteria_testCounts = [];
        $noteCounts = [];

        foreach ($experiments as $experiment) {
            $materialCounts[$experiment->id] = Material::where('experiment_id', $experiment->id)->count();
            $film_conditionCounts[$experiment->id] = Film_condition::where('experiment_id', $experiment->id)->count();
            $charactaristic_testCounts[$experiment->id] = Charactaristic_test::where('experiment_id', $experiment->id)->count();
            $storing_testCounts[$experiment->id] = Storing_test::where('experiment_id', $experiment->id)->count();
            $antibacteria_testCounts[$experiment->id] = Antibacteria_test::where('experiment_id', $experiment->id)->count();
            $noteCounts[$experiment->id] = Note::where('experiment_id', $experiment->id)->count();
            
        }
       
        return view('user.profile.index', compact('userInformation','experiments','materialCounts','film_conditionCounts',
            'charactaristic_testCounts','storing_testCounts','antibacteria_testCounts', 'noteCounts'));
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
        $ph_materials_list = Ph_material_detail::orderby('name', 'asc')->get();
        $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
        $bacteria_list = Bacteria_detail::orderby('name','asc')->get();
        $antibacteria_test_list = Antibacteria_test_type::orderby('name','asc')->get();

        // $id を使用して必要な処理を行う
        if ($formType === 'material') {
            return view('user.profile.material_create', compact('id', 'materials_list', 'ph_materials_list'));
        } elseif ($formType === 'film_condition') {
            return view('user.profile.film_condition_create', ['id'=>$id]);
        } elseif ($formType === 'charactaristic_test') {
            return view('user.profile.charactaristic_test_create', ['id'=>$id]);
        } elseif ($formType === 'storing_test') {
            return view('user.profile.storing_test_create', compact('id', 'fruits_list'));
        } elseif ($formType === 'antibacteria_test') {
            return view('user.profile.antibacteria_test_create', compact('id', 'bacteria_list', 'fruits_list', 'antibacteria_test_list'));
        } elseif ($formType === 'note') {
            return view('user.profile.note_create', compact('id'));
        } 
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
                'paper_name' => ['string', 'max:255','nullable'],
                'paper_url' => ['string', 'max:255','nullable'],
            ]);

            $experiment = new Experiment;
            $experiment -> user_id = Auth::user()->id;
            $experiment->title = $request->title;
            $experiment->name = $request->name;
            $experiment->date = $request->date;
            $experiment->paper_name = $request->paper_name;        
            $experiment->paper_url = $request->paper_url;        
            $experiment->save();
        }elseif($request->formType === 'material'){
            $request->validate([
                'concentration' =>['numeric', 'nullable'],
                'ph_adjustment' => ['numeric', 'nullable'],
                'ph_purpose' => ['numeric', 'nullable'],    
            ]);

            $material = new Material;
            $material-> experiment_id = $request->id;
            $materialDetail = Material_detail::select('id')->where('name', $request->material_name)->first();
            $material->material_id = $materialDetail->id;
            $material-> concentration = $request->concentration;
            $material-> ph_adjustment = $request->ph_adjustment;
            if(!empty($request->ph_material)){
            $phMaterialDetail = Ph_material_detail::select('id')->where('name', $request->ph_material)->first();
            $material-> ph_material_id = $phMaterialDetail->id;
            }
            $material-> ph_purpose = $request->ph_purpose;
            $material->save();

        }elseif($request->formType === 'film_condition'){
            $request->validate([
                'casting_amount' => ['numeric', 'nullable'],
                'petri_dish_area' => ['string', 'nullable'],
                'degas_temperature' => ['numeric', 'nullable'],
                'drying_temperature' => ['numeric', 'nullable'],
                'drying_humidity' => ['numeric', 'nullable'],
                'drying_time' => ['numeric', 'nullable'],
            ]);

            $film_condition = new Film_condition;
            $film_condition-> experiment_id = $request->id;
            $film_condition-> casting_amount = $request->casting_amount;
            $film_condition-> petri_dish_area = $request->petri_dish_area;
            $film_condition-> degas_temperature = $request->degas_temperature;
            $film_condition-> drying_temperature = $request->drying_temperature;
            $film_condition-> drying_humidity = $request->drying_humidity;
            $film_condition-> drying_time = $request->drying_time;
            $film_condition->save();

        }elseif($request->formType === 'charactaristic_test'){
            $request->validate([
                'ph' => ['numeric', 'nullable'],
                'temperature' => ['numeric', 'nullable'],
                'shear_rate' => ['numeric', 'nullable'],
                'shear_stress' => ['numeric', 'nullable'],
                'rotation_speed' => ['numeric', 'nullable'],
                'viscosity' => ['numeric', 'nullable'],
                'mc' => ['numeric', 'nullable'],
                'ws' => ['numeric', 'nullable'],
                'wvp' => ['numeric', 'nullable'],
                'thickness' => ['numeric', 'nullable'],
                'ca' => ['numeric', 'nullable'],
                'ts' => ['numeric', 'nullable'],
                'd43' => ['numeric', 'nullable'],
                'd32' => ['numeric', 'nullable'],
                'eab' => ['numeric', 'nullable'],
                'light_transmittance' => ['numeric', 'nullable'],
                'xrd' => ['string', 'nullable'],
                'afm' => ['nullable'],
                'sem' => ['nullable'],
                'dsc' => ['nullable'],
                'ftir' => ['nullable'],
                'clsm' => ['nullable'],
            ]);


            $afmImage = $request->file('afm');
            $semImage = $request->file('sem');
            $dscImage = $request->file('dsc');
            $ftirImage = $request->file('ftir');
            $clsmImage = $request->file('clsm');

            $filePath_afm = $afmImage ? $afmImage->store('images', 'public') : null;
            $filePath_sem = $semImage ? $semImage->store('images', 'public') : null;
            $filePath_dsc = $dscImage ? $dscImage->store('images', 'public') : null;
            $filePath_ftir = $ftirImage ? $ftirImage->store('images', 'public') : null;
            $filePath_clsm = $clsmImage ? $clsmImage->store('images', 'public') : null;

            $charactaristic_test = new Charactaristic_test;
            $charactaristic_test-> experiment_id = $request->id;
            $charactaristic_test-> ph = $request->ph;
            $charactaristic_test-> temperature = $request->temperature;
            $charactaristic_test-> shear_rate = $request->shear_rate;
            $charactaristic_test-> shear_stress = $request->shear_stress;
            $charactaristic_test-> rotation_speed = $request->rotation_speed;
            $charactaristic_test-> viscosity = $request->viscosity;
            $charactaristic_test-> mc = $request->mc;
            $charactaristic_test-> ws = $request->ws;
            $charactaristic_test-> wvp = $request->wvp;
            $charactaristic_test-> thickness = $request->thickness;
            $charactaristic_test-> ca = $request->ca;
            $charactaristic_test-> ts = $request->ts;
            $charactaristic_test-> d43 = $request->d43;
            $charactaristic_test-> d32 = $request->d32;
            $charactaristic_test-> eab = $request->eab;
            $charactaristic_test-> light_transmittance = $request->light_transmittance;
            $charactaristic_test-> xrd = $request->xrd;
            $charactaristic_test-> afm = $filePath_afm;
            $charactaristic_test-> sem = $filePath_sem;
            $charactaristic_test-> dsc = $filePath_dsc;
            $charactaristic_test-> ftir = $filePath_ftir;
            $charactaristic_test-> clsm = $filePath_clsm;
            $charactaristic_test->save();

        }elseif($request->formType === 'storing_test'){
            $request->validate([
                'storing_temperature' => ['numeric', 'nullable'],
                'storing_humidity' => ['numeric', 'nullable'],
                'storing_day' => ['numeric', 'nullable'],
                'mass_loss_rate' => ['numeric', 'nullable'],
                'l' => ['numeric', 'nullable'],
                'a' => ['numeric', 'nullable'],
                'b' => ['numeric', 'nullable'],
                'e' => ['numeric', 'nullable'],
                'ph' => ['numeric', 'nullable'],
                'tss' => ['numeric', 'nullable'],
                'hardness' => ['numeric', 'nullable'],
                'moisture_content' => ['numeric', 'nullable'],
                'ta' => ['numeric', 'nullable'],
                'vitamin_c' => ['numeric', 'nullable'],
                'rr' => ['numeric', 'nullable'],
                'sem' => ['nullable'],
                'clsm' => ['nullable'],
                'afm' => ['nullable'],
                'ftir' => ['nullable'],
                'dsc' => ['nullable'],
                
            ]);

            $afmImage = $request->file('afm');
            $semImage = $request->file('sem');
            $dscImage = $request->file('dsc');
            $ftirImage = $request->file('ftir');
            $clsmImage = $request->file('clsm');

            $filePath_afm = $afmImage ? $afmImage->store('images', 'public') : null;
            $filePath_sem = $semImage ? $semImage->store('images', 'public') : null;
            $filePath_dsc = $dscImage ? $dscImage->store('images', 'public') : null;
            $filePath_ftir = $ftirImage ? $ftirImage->store('images', 'public') : null;
            $filePath_clsm = $clsmImage ? $clsmImage->store('images', 'public') : null;

            $storing_test = new Storing_test;
            $storing_test-> experiment_id = $request->id;
            $fruitDetail = Fruit_detail::select('id')->where('name', $request->fruit_name)->first();
            $storing_test-> storing_fruit_id = $fruitDetail->id;
            $storing_test-> storing_temperature = $request->storing_temperature;
            $storing_test-> storing_humidity = $request->storing_humidity;
            $storing_test-> storing_day = $request->storing_day;
            $storing_test-> mass_loss_rate = $request->mass_loss_rate;
            $storing_test-> l = $request->l;
            $storing_test-> a = $request->a;
            $storing_test-> b = $request->b;
            $storing_test-> e = $request->e;
            $storing_test-> ph = $request->ph;
            $storing_test-> tss = $request->tss;
            $storing_test-> hardness = $request->hardness;
            $storing_test-> moisture_content = $request->moisture_content;
            $storing_test-> ta = $request->ta;
            $storing_test-> vitamin_c = $request->vitamin_c;
            $storing_test-> rr = $request->rr;
            $storing_test-> afm = $filePath_afm;
            $storing_test-> sem = $filePath_sem;
            $storing_test-> dsc = $filePath_dsc;
            $storing_test-> ftir = $filePath_ftir;
            $storing_test-> clsm = $filePath_clsm;
            $storing_test->save();

        }elseif($request->formType === 'antibacteria_test'){
            $request->validate([
                'invivo_invitro' => ['string', 'nullable'],
                'bacteria_concentration' => ['numeric', 'nullable'],
                'mic' => ['numeric', 'nullable'],
            ]);
            $antibacteria_test = new Antibacteria_test;
            $antibacteria_test-> experiment_id = $request->id;
            $bacteriaDetail = Bacteria_detail::select('id')->where('name', $request->bacteria_name)->first();
            $antibacteria_test-> bacteria_id = $bacteriaDetail->id;
            $fruitDetail = Fruit_detail::select('id')->where('name', $request->fruit_name)->first();
            $antibacteria_test-> antibacteria_fruit_id = $fruitDetail->id;
            $antibacteriaTestType = Antibacteria_test_type::select('id')->where('name', $request->test_name)->first();
            $antibacteria_test->test_id = $antibacteriaTestType->id;
            $antibacteria_test-> invivo_invitro = $request->invivo_invitro;
            $antibacteria_test-> bacteria_concentration = $request->bacteria_concentration;
            $antibacteria_test-> mic = $request->mic;
            $antibacteria_test->save();
        }else{
            $request->validate([
                'note' => ['string', 'nullable'],
                'img1' => ['string', 'nullable'],
                'img2' => ['string', 'nullable'],
                'img3' => ['string', 'nullable'],
                'img4' => ['string', 'nullable'],
            ]);
            $note = new Note;
            $note->experiment_id = $request->id;
            $note->note = $request->note;
            $note->img1 = $request->img1;
            $note->img2 = $request->img2;
            $note->img3 = $request->img3;
            $note->img4 = $request->img4;
            $note->save();
        
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
        $materials_list = Material_detail::orderby('name', 'asc')->get();
        $ph_materials_list = Ph_material_detail::orderby('name', 'asc')->get();
        $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
        $bacteria_list = Bacteria_detail::orderby('name','asc')->get();
        $antibacteria_test_list = Antibacteria_test_type::orderby('name','asc')->get();

        $experiment = Experiment::findOrFail($id);
        $materials = Material::where('experiment_id', $id)->get();
        $film_conditions = Film_condition::where('experiment_id', $id)->get();
        $charactaristic_tests = Charactaristic_test::where('experiment_id', $id)->get();
        $storing_tests = Storing_test::where('experiment_id', $id)->get();
        $antibacteria_tests = Antibacteria_test::where('experiment_id', $id)->get();
        $notes = Note::where('experiment_id', $id)->get();
        

        return view('user.profile.edit', compact('experiment', 'materials','film_conditions',
                    'charactaristic_tests','storing_tests','antibacteria_tests', 'materials_list',
                    'ph_materials_list', 'fruits_list', 'bacteria_list', 'antibacteria_test_list',
                    'notes'));
   
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
        $experiment->paper_name = $request->paper_name;
        $experiment->paper_url = $request->paper_url;        
        $experiment->save();

        $materials = Material::where('experiment_id', $id)->get();
        foreach($materials as $material) {
            $material-> experiment_id = $id;
            $materialDetail = Material_detail::select('id')->where('name', $request->input("material_name.$material->id"))->first();
            $material-> material_id = $materialDetail->id;
            $material-> concentration = $request->input("concentration.$material->id");
            $material-> ph_adjustment = $request->input("ph_adjustment.$material->id");
            $phMaterialDetail = Ph_material_detail::select('id')->where('name', $request->input("ph_material.$material->id"))->first();
            if($phMaterialDetail != null){
                $material-> ph_material_id = $phMaterialDetail->id;
            }
            $material-> ph_purpose = $request->input("ph_purpose.$material->id");
            $material->save();
        }

        $filmconditions = Film_condition::where('experiment_id', $id)->get();
        foreach($filmconditions as $film_condition) {
            $film_condition-> experiment_id = $id;
            $film_condition-> casting_amount = $request->input("casting_amount.$film_condition->id");
            $film_condition-> petri_dish_area = $request->input("petri_dish_area.$film_condition->id");
            $film_condition-> degas_temperature = $request->input("degas_temperature.$film_condition->id");
            $film_condition-> drying_temperature = $request->input("drying_temperature.$film_condition->id");
            $film_condition-> drying_humidity = $request->input("drying_humidity.$film_condition->id");
            $film_condition-> drying_time = $request->input("drying_time.$film_condition->id");
            $film_condition->save();
        }


        $charactaristictests = Charactaristic_test::where('experiment_id', $id)->get();
        foreach($charactaristictests as $charactaristic_test) {
            $afmImage = $request->file("afm.{$charactaristic_test->id}");
            $semImage = $request->file("sem.{$charactaristic_test->id}");
            $dscImage = $request->file("dsc.{$charactaristic_test->id}");
            $ftirImage = $request->file("ftir.{$charactaristic_test->id}");
            $clsmImage = $request->file("clsm.{$charactaristic_test->id}");
 
            $filePath_afm = $afmImage ? $afmImage->store('images', 'public') : null;
            $filePath_sem = $semImage ? $semImage->store('images', 'public') : null;
            $filePath_dsc = $dscImage ? $dscImage->store('images', 'public') : null;
            $filePath_ftir = $ftirImage ? $ftirImage->store('images', 'public') : null;
            $filePath_clsm = $clsmImage ? $clsmImage->store('images', 'public') : null;

            if (!$afmImage){
                $previousAfmValue = $charactaristic_test->afm;
                $filePath_afm = $previousAfmValue ? $previousAfmValue : null;
            }
            if (!$semImage){
                $previousSemValue = $charactaristic_test->sem;
                $filePath_sem = $previousSemValue ? $previousSemValue : null;
            }
            if (!$dscImage){
                $previousDscValue = $charactaristic_test->dsc;
                $filePath_dsc = $previousDscValue ? $previousDscValue : null;
            }
            if (!$ftirImage){
                $previousFtirValue = $charactaristic_test->ftir;
                $filePath_ftir = $previousFtirValue ? $previousFtirValue : null;
            }
            if (!$clsmImage){
                $previousClsmValue = $charactaristic_test->clsm;
                $filePath_clsm = $previousClsmValue ? $previousClsmValue : null;
            }

            $charactaristic_test-> experiment_id = $id;
            $charactaristic_test-> ph = $request->input("ph.$charactaristic_test->id");
            $charactaristic_test-> temperature = $request->input("temperature.$charactaristic_test->id");
            $charactaristic_test-> shear_rate = $request->input("shear_rate.$charactaristic_test->id");
            $charactaristic_test-> shear_stress = $request->input("shear_stress.$charactaristic_test->id");
            $charactaristic_test-> rotation_speed = $request->input("rotation_speed.$charactaristic_test->id");
            $charactaristic_test-> viscosity = $request->input("viscosity.$charactaristic_test->id");
            $charactaristic_test-> mc = $request->input("mc.$charactaristic_test->id");
            $charactaristic_test-> ws = $request->input("ws.$charactaristic_test->id");
            $charactaristic_test-> wvp = $request->input("wvp.$charactaristic_test->id");
            $charactaristic_test-> thickness = $request->input("thickness.$charactaristic_test->id");    
            $charactaristic_test-> ca = $request->input("ca.$charactaristic_test->id");
            $charactaristic_test-> ts = $request->input("ts.$charactaristic_test->id");
            $charactaristic_test-> d43 = $request->input("d43.$charactaristic_test->id");
            $charactaristic_test-> d32 = $request->input("d32.$charactaristic_test->id");
            $charactaristic_test-> eab = $request->input("eab.$charactaristic_test->id");
            $charactaristic_test-> light_transmittance = $request->input("light_transmittance.$charactaristic_test->id");
            $charactaristic_test-> xrd = $request->input("xrd.$charactaristic_test->id");
            $charactaristic_test-> afm = $filePath_afm;
            $charactaristic_test-> sem = $filePath_sem;
            $charactaristic_test-> dsc = $filePath_dsc;
            $charactaristic_test-> ftir = $filePath_ftir;
            $charactaristic_test-> clsm = $filePath_clsm;
            $charactaristic_test->save();
        }

        $storingtests = Storing_test::where('experiment_id', $id)->get();
        foreach($storingtests as $storing_test) {
            $afmImage = $request->file("s-afm.{$storing_test->id}");
            $semImage = $request->file("s-sem.{$storing_test->id}");
            $dscImage = $request->file("s-dsc.{$storing_test->id}");
            $ftirImage = $request->file("s-ftir.{$storing_test->id}");
            $clsmImage = $request->file("s-clsm.{$storing_test->id}");
 
            $filePath_afm = $afmImage ? $afmImage->store('images', 'public') : null;
            $filePath_sem = $semImage ? $semImage->store('images', 'public') : null;
            $filePath_dsc = $dscImage ? $dscImage->store('images', 'public') : null;
            $filePath_ftir = $ftirImage ? $ftirImage->store('images', 'public') : null;
            $filePath_clsm = $clsmImage ? $clsmImage->store('images', 'public') : null;

            if (!$afmImage){
                $previousAfmValue = $storing_test->afm;
                $filePath_afm = $previousAfmValue ? $previousAfmValue : null;
            }
            if (!$semImage){
                $previousSemValue = $storing_test->sem;
                $filePath_sem = $previousSemValue ? $previousSemValue : null;
            }
            if (!$dscImage){
                $previousDscValue = $storing_test->dsc;
                $filePath_dsc = $previousDscValue ? $previousDscValue : null;
            }
            if (!$ftirImage){
                $previousFtirValue = $storing_test->ftir;
                $filePath_ftir = $previousFtirValue ? $previousFtirValue : null;
            }
            if (!$clsmImage){
                $previousClsmValue = $storing_test->clsm;
                $filePath_clsm = $previousClsmValue ? $previousClsmValue : null;
            }

            $storing_test-> experiment_id = $id;
            $fruitDetail = Fruit_detail::select('id')->where('name', $request->input("storing_fruit_name.$storing_test->id"))->first();
            $storing_test-> storing_fruit_id = $fruitDetail->id;
            $storing_test-> storing_temperature = $request->input("storing_temperature.$storing_test->id");
            $storing_test-> storing_humidity = $request->input("storing_humidity.$storing_test->id");
            $storing_test-> storing_day = $request->input("storing_day.$storing_test->id");
            $storing_test-> mass_loss_rate = $request->input("mass_loss_rate.$storing_test->id");
            $storing_test-> l = $request->input("l.$storing_test->id");
            $storing_test-> a = $request->input("a.$storing_test->id");
            $storing_test-> b = $request->input("b.$storing_test->id");
            $storing_test-> e = $request->input("e.$storing_test->id");
            $storing_test-> ph = $request->input("ph.$storing_test->id");
            $storing_test-> tss = $request->input("tss.$storing_test->id");
            $storing_test-> hardness = $request->input("hardness.$storing_test->id");
            $storing_test-> moisture_content = $request->input("moisture_content.$storing_test->id");
            $storing_test-> ta = $request->input("ta.$storing_test->id");
            $storing_test-> vitamin_c = $request->input("vitamin_c.$storing_test->id");
            $storing_test-> rr = $request->input("rr.$storing_test->id");
            $storing_test-> afm = $filePath_afm;
            $storing_test-> sem = $filePath_sem;
            $storing_test-> dsc = $filePath_dsc;
            $storing_test-> ftir = $filePath_ftir;
            $storing_test-> clsm = $filePath_clsm;
            $storing_test->save();
        }

        $antibacteriatests = Antibacteria_test::where('experiment_id', $id)->get();
        foreach($antibacteriatests as $antibacteria_test) {
            $antibacteria_test-> experiment_id = $id;
            $bacteriaDetail = Bacteria_detail::select('id')->where('name', $request->input("bacteria_name.$antibacteria_test->id"))->first();
            $antibacteria_test-> bacteria_id = $bacteriaDetail->id;
            $fruitDetail = Fruit_detail::select('id')->where('name', $request->input("antibacteria_fruit_name.$antibacteria_test->id"))->first();
            $antibacteria_test-> antibacteria_fruit_id = $fruitDetail->id;
            $antibacteriaTestType = Antibacteria_test_type::select('id')->where('name', $request->input("test_name.$antibacteria_test->id"))->first();
            $antibacteria_test-> test_id = $antibacteriaTestType->id;
            $antibacteria_test-> invivo_invitro = $request->input("invivo_invitro.$antibacteria_test->id");
            $antibacteria_test-> bacteria_concentration = $request->input("bacteria_concentration.$antibacteria_test->id");
            $antibacteria_test-> mic = $request->input("mic.$antibacteria_test->id");
            $antibacteria_test->save();

        }

        $notes = Note::where('experiment_id', $id)->get();
        foreach($notes as $note) {
            $img1 = $request->file("img1.{$note->id}");
            $img2 = $request->file("img2.{$note->id}");
            $img3 = $request->file("img3.{$note->id}");
            $img4 = $request->file("img4.{$note->id}");
 
            $filePath_img1 = $img1 ? $img1->store('images', 'public') : null;
            $filePath_img2 = $img2 ? $img2->store('images', 'public') : null;
            $filePath_img3 = $img3 ? $img3->store('images', 'public') : null;
            $filePath_img4 = $img4 ? $img4->store('images', 'public') : null;

            if (!$img1){
                $previousImg1Value = $note->img1;
                $filePath_img1 = $previousImg1Value ? $previousImg1Value : null;
            }
            if (!$img2){
                $previousImg2Value = $note->img2;
                $filePath_img2 = $previousImg2Value ? $previousImg2Value : null;
            }
            if (!$img3){
                $previousImg3Value = $note->img3;
                $filePath_img3 = $previousImg3Value ? $previousImg3Value : null;
            }
            if (!$img4){
                $previousImg4Value = $note->img4;
                $filePath_img4 = $previousImg4Value ? $previousImg4Value : null;
            }
            

            $note-> experiment_id = $id;
            $note-> note = $request->input("note.$note->id");
            $note-> img1 = $filePath_img1;
            $note-> img2 = $filePath_img2;
            $note-> img3 = $filePath_img3;
            $note-> img4 = $filePath_img4;
            $note->save();
        }
        // dd($notes);

 
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
