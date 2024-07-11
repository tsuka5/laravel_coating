<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experiment; 
use App\Models\Material_composition;
use App\Models\Film_condition; 
use App\Models\Charactaristic_test; 
use App\Models\Material;
use App\Models\Storing_test;
use App\Models\Antibacteria_test;
use App\Models\Material_detail;
use App\Models\Solvent_detail;
use App\Models\Fruit_detail;
use App\Models\Bacteria_detail;
use App\Models\Enzyme_detail;
use App\Models\Substrate_detail;
use App\Models\Affiliation;
use App\Models\Colony_test;
use App\Models\Note;
use App\Models\Storing_multiple_test;
use App\Models\Tga_test;
use App\Models\Tga_value;
use App\Models\Enzyme_test;
use App\Models\Enzyme_value;
use App\Models\Growthcurve_test;
use App\Models\Viscosity_test;
use App\Models\Wvp_test;
use App\Models\Cfu_test;
use App\Models\Survivalrate_test;
use App\Models\Gas_detail;
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

    public function experimentIndex($experiment_id)
    {
        $experiment = Experiment::where('id', $experiment_id)->first();
        // $film_condition = Film_condition::where('experiment_id', $experiment_id )->get();
        // $film_condition_data = $film_condition->first();
        $materials = [];
        $film_conditions = [];
        $multiple_tests = [];
        $bacteria_tests = []; 
        $characteristic_tests = [];
        $characteristic_tests_data = [];
        $charactaristic_testCounts = [];

        $materials_list = Material_detail::orderby('name', 'asc')->get();
        $solvents_list = Solvent_detail::orderby('name', 'asc')->get();
        // $ph_materials_list = Ph_material_detail::orderby('name', 'asc')->get();
        $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
        $bacteria_list = Bacteria_detail::orderby('name','asc')->get();
        // $antibacteria_test_list = Antibacteria_test_type::orderby('name','asc')->get();
        $enzymes_list = Enzyme_detail::orderby('name', 'asc')->get();
        $substrates_list = Substrate_detail::orderby('name', 'asc')->get();
        $gas_list = Gas_detail::orderby('name', 'asc')->get();

        $compositions = Material_Composition::where('experiment_id', $experiment->id)->orderby('id', 'asc')->get();

        //この実験の組成idを取得
        $compositions_id = Material_Composition::where('experiment_id', $experiment->id)->pluck('id');
        //実験の条件を取得
        $film_condition = Film_condition::where('experiment_id', $experiment->id)->first();
        $storing_test = Storing_test::where('experiment_id', $experiment->id)->first();
        $antibacteria_test = Antibacteria_test::where('experiment_id', $experiment->id )->first();

        //実験の結果を取得
        $characteristic_test = Charactaristic_test::whereIn('composition_id', $compositions_id)->get();
    
        $multiple_test = null;
        // dd($compositions);

        $eager_composition_antibacteria = Material_composition::with(['colony_test', 'cfu_test', 'survivalrate_test', 'growthcurve_test'])
                                                    ->whereIn('id', $compositions_id)
                                                    ->get();
        $antibacteria_tests_check = $eager_composition_antibacteria->isEmpty() || $eager_composition_antibacteria->every(function ($eager_composition_antibacteria) {
            return $eager_composition_antibacteria->colony_test->isEmpty() &&
                    $eager_composition_antibacteria->cfu_test->isEmpty() &&
                    $eager_composition_antibacteria->survivalrate_test->isEmpty() &&
                    $eager_composition_antibacteria->growthcurve_test->isEmpty();
        });
        
        $eager_experiment_enzyme = Experiment::with(['enzyme_test.enzyme_detail'])->where('id', $experiment_id)->first();
        $eager_composition_enzyme = Material_composition::with(['enzyme_value'])->whereIn('id', $compositions_id)->get();
        $enzyme_value_check = $eager_composition_enzyme->isEmpty() || $eager_composition_enzyme->every(function ($eager_composition_enzyme){
            return $eager_composition_enzyme->enzyme_value->isEmpty();
        });

        $eager_experiment_tga = Experiment::with(['tga_test.gas_detail'])->where('id', $experiment_id)->first();
        $eager_composition_tga = Material_composition::with(['tga_value'])->whereIn('id', $compositions_id)->get();
        $tga_value_check = $eager_composition_tga->isEmpty() || $eager_composition_tga->every(function ($eager_composition_tga){
            return $eager_composition_tga->tga_value->isEmpty();
        });

        //あとでイーガーローディングで書き直す
        if($compositions->isNotEmpty()){
            foreach($compositions as $composition) {
                // $film_conditions[$composition->id] = Film_condition::where('composition_id', $composition->id )->get();
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                $multiple_tests[$composition->id] = Storing_multiple_test::where('composition_id', $composition->id)->get();
                $multiple_test = Storing_multiple_test::where('composition_id', $composition->id)->first();
                // $storing_tests[$composition->id] = Storing_test::where('composition_id', $composition->id)->get();
                $characteristic_tests[$composition->id] = Charactaristic_test::where('composition_id', $composition->id)->get();
                $charactaristic_testCounts[$composition->id] = Charactaristic_test::where('composition_id', $composition->id)->count();
            }  
        } else {
            $materials = collect();
            $multiple_tests = collect();
            $multiple_test = null;
            $characteristic_tests = collect();
            $characteristic_testCounts = collect();
        }
        // dd($multiple_tests);
        

        return view('user.profile.experiment_register', compact('experiment','materials', 'compositions', 'storing_test','multiple_tests','multiple_test',
             'characteristic_tests', 'characteristic_test', 'characteristic_tests_data', 'film_condition', 'materials_list','antibacteria_test',
             'solvents_list', 'bacteria_list', 'fruits_list','enzymes_list','substrates_list','gas_list', 'charactaristic_testCounts', 'antibacteria_tests_check',
             'eager_experiment_enzyme', 'eager_composition_enzyme', 'enzyme_value_check', 'eager_experiment_tga', 'eager_composition_tga', 'tga_value_check'));
    }

    public function index()
    {
        $experiments = Experiment::where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(6);
        $compositions = [];
        $materialCounts = [];
        $film_conditionCounts = [];
        $charactaristic_testCounts = [];
        $storing_testCounts = [];
        $antibacteria_testCounts = [];
        $noteCounts = [];
        $materials = [];
        $fruits = [];
        $bacteria = [];

        foreach ($experiments as $experiment) {
            $compositions[$experiment->id] = Material_Composition::where('experiment_id', $experiment->id)->orderby('id', 'asc')->get();
            $film_conditionCounts[$experiment->id] = Film_condition::where('experiment_id', $experiment->id)->count();
            $storing_testCounts[$experiment->id] = Storing_test::where('experiment_id', $experiment->id)->count();
            $antibacteria_testCounts[$experiment->id] = Antibacteria_test::where('experiment_id', $experiment->id)->count();
            $fruits[$experiment->id] = Storing_test::where('experiment_id', $experiment->id)->get();
            $bacteria[$experiment->id] = Antibacteria_test::where('experiment_id', $experiment->id)->get();
        foreach($compositions[$experiment->id] as $composition) {
                $materialCounts[$composition->id] = Material::where('composition_id', $composition->id)->count();
                // $film_conditionCounts[$composition->id] = Film_condition::where('composition_id', $composition->id)->count();
                $charactaristic_testCounts[$composition->id] = Charactaristic_test::where('composition_id', $composition->id)->count();
                // $storing_testCounts[$composition->id] = Storing_test::where('composition_id', $composition->id)->count();
                // $antibacteria_testCounts[$composition->id] = Antibacteria_test::where('composition_id', $composition->id)->count();
                $noteCounts[$composition->id] = Note::where('composition_id', $composition->id)->count();   
                $materials[$composition->id] = Material::where('composition_id', $composition->id)->get();
                // $fruits[$composition->id] = Storing_test::where('composition_id', $composition->id)->get();
                // $bacteria[$composition->id] = Antibacteria_test::where('composition_id', $composition->id)->get();
        }
    }
        return view('user.profile.index', compact('experiments', 'compositions','materialCounts','film_conditionCounts',
            'charactaristic_testCounts','storing_testCounts','antibacteria_testCounts', 'noteCounts', 'materials', 'fruits', 'bacteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createExperiment($type)
    {
        return view('user.profile.create', compact('type'));
    }
    
    public function createCopy($experiment_id, $composition_id)
    {
        $composition = new Material_composition;
        $composition->experiment_id = $experiment_id;
        $composition->save();

        $current_composition_id = Material_composition::latest('id')->first();

        $copy_materials = Material::where('composition_id', $composition_id)->get();

        foreach($copy_materials as $c_material){
            $material = new Material;
            $material->composition_id = $current_composition_id->id;
            $material-> material_id = $c_material->material_id;
            $material-> solvent_id = $c_material->solvent_id;
            $material->concentration = $c_material->concentration;
            $material-> solvent_concentration = $c_material->solvent_concentration;
            $material->save();
        }
        return redirect()->route('user.experiment_register', compact('experiment_id'))
        ->with(['message'=>'Create Composition Complete', 'status'=>'info'] );;

    }
    public function createComposition($experiment_id)
    {
        $composition = new Material_composition;
        $composition-> experiment_id =  $experiment_id;   
        $composition->save();
        // return redirect()->route('user.profile.index')
        // ->with(['message'=>'Create Composition Complete',
        // 'status'=>'info'] );;
        return redirect()->route('user.experiment_register', compact('experiment_id'))
        ->with(['message'=>'Create Composition Complete',
        'status'=>'info'] );;

    }

//     public function create($id, $formType)
//     {
//         $materials_list = Material_detail::orderby('name', 'asc')->get();
//         $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
//         $bacteria_list = Bacteria_detail::orderby('name','asc')->get();

//         if ($formType === 'material') {
//             return view('user.profile.additional_create', compact('id', 'materials_list', 'formType'));
//         } elseif ($formType === 'film_condition') {
//             return view('user.profile.additional_create', compact('id', 'formType'));
//         } elseif ($formType === 'charactaristic_test') {
//             return view('user.profile.additional_create', compact('id', 'formType'));
//         } elseif ($formType === 'storing_test') {
//             return view('user.profile.additional_create', compact('id', 'fruits_list', 'formType'));
//         } elseif ($formType === 'antibacteria_test') {
//             return view('user.profile.additional_create', compact('id', 'bacteria_list', 'fruits_list', 'formType'));
//         } elseif ($formType === 'enzyme_test') {
//             return view('user.profile.additional_create', compact('id', 'bacteria_list', 'fruits_list', 'formType'));
//         } elseif ($formType === 'note') {
//             return view('user.profile.additional_create', compact('id', 'formType'));
//         } 
// }

    /**
     * Store a newly created resource in storage.
     */
    public function storeExperiment(Request $request)
    {
            $request->validate([
                'title' => ['required', 'string', 'max:255','unique:experiments'], 
                'name' => ['nullable', 'string', 'max:255'],
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

            $latest_experiment_id = Experiment::orderBy('id', 'desc')->first()->id;

            $composition = new Material_composition;
            $composition-> experiment_id =  $latest_experiment_id;   
            $composition->save();
       
        return redirect()->route('user.profile.index')
        ->with(['message'=>'Registration Complete',
        'status'=>'info'] );

    }

    public function store(Request $request)  
    {
        if($request->formType === 'material'){
            $request->validate([
                'concentration' =>['numeric', 'nullable'],
                'solvent_concentration' => ['numeric', 'nullable'],
            ]);

            $material = new Material;
            $material-> composition_id = $request->id;
            $materialDetail = Material_detail::select('id')->where('name', $request->material_name)->first();
            $material-> material_id = $materialDetail->id;
            $solventDetail = Solvent_detail::select('id')->where('name', $request->solvent_name)->first();
            $material-> solvent_id = $solventDetail->id;
            $material->concentration = $request->concentration;
            $material-> solvent_concentration = $request->solvent_concentration;
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
            $charactaristic_test-> composition_id = $request->id;
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
            // $charactaristic_test-> afm = $filePath_afm;
            // $charactaristic_test-> sem = $filePath_sem;
            // $charactaristic_test-> dsc = $filePath_dsc;
            // $charactaristic_test-> ftir = $filePath_ftir;
            // $charactaristic_test-> clsm = $filePath_clsm;
            $charactaristic_test->save();

        }elseif($request->formType === 'storing_test'){
            $request->validate([
                'storing_temperature' => ['numeric', 'nullable'],
                'storing_humidity' => ['numeric', 'nullable'],
                'storing_day' => ['numeric', 'nullable'],
                // 'mass_loss_rate' => ['numeric', 'nullable'],
                // 'l' => ['numeric', 'nullable'],
                // 'a' => ['numeric', 'nullable'],
                // 'b' => ['numeric', 'nullable'],
                // 'e' => ['numeric', 'nullable'],
                // 'ph' => ['numeric', 'nullable'],
                // 'tss' => ['numeric', 'nullable'],
                // 'hardness' => ['numeric', 'nullable'],
                // 'moisture_content' => ['numeric', 'nullable'],
                // 'ta' => ['numeric', 'nullable'],
                // 'vitamin_c' => ['numeric', 'nullable'],
                // 'rr' => ['numeric', 'nullable'],
                // 'sem' => ['nullable'],
                // 'clsm' => ['nullable'],
                // 'afm' => ['nullable'],
                // 'ftir' => ['nullable'],
                // 'dsc' => ['nullable'],
                'memo' => ['nullable']
                
            ]);

            // $afmImage = $request->file('afm');
            // $semImage = $request->file('sem');
            // $dscImage = $request->file('dsc');
            // $ftirImage = $request->file('ftir');
            // $clsmImage = $request->file('clsm');

            // $filePath_afm = $afmImage ? $afmImage->store('images', 'public') : null;
            // $filePath_sem = $semImage ? $semImage->store('images', 'public') : null;
            // $filePath_dsc = $dscImage ? $dscImage->store('images', 'public') : null;
            // $filePath_ftir = $ftirImage ? $ftirImage->store('images', 'public') : null;
            // $filePath_clsm = $clsmImage ? $clsmImage->store('images', 'public') : null;

            $storing_test = new Storing_test;
            $storing_test-> experiment_id = $request->id;
            $fruitDetail = Fruit_detail::select('id')->where('name', $request->fruit_name)->first();
            $storing_test-> storing_fruit_id = $fruitDetail->id;
            $storing_test-> storing_temperature = $request->storing_temperature;
            $storing_test-> storing_humidity = $request->storing_humidity;
            $storing_test-> storing_day = $request->storing_day;
            $storing_test-> memo = $request->memo;
            // $storing_test-> mass_loss_rate = $request->mass_loss_rate;
            // $storing_test-> l = $request->l;
            // $storing_test-> a = $request->a;
            // $storing_test-> b = $request->b;
            // $storing_test-> e = $request->e;
            // $storing_test-> ph = $request->ph;
            // $storing_test-> tss = $request->tss;
            // $storing_test-> hardness = $request->hardness;
            // $storing_test-> moisture_content = $request->moisture_content;
            // $storing_test-> ta = $request->ta;
            // $storing_test-> vitamin_c = $request->vitamin_c;
            // $storing_test-> rr = $request->rr;
            // $storing_test-> afm = $filePath_afm;
            // $storing_test-> sem = $filePath_sem;
            // $storing_test-> dsc = $filePath_dsc;
            // $storing_test-> ftir = $filePath_ftir;
            // $storing_test-> clsm = $filePath_clsm;
            $storing_test->save();

        }elseif($request->formType === 'antibacteria_test'){
            $request->validate([
                'invivo_invitro' => ['string', 'nullable'],
                'bacteria_concentration' => ['numeric', 'nullable'],
                'mic' => ['numeric', 'nullable'],
                'memo' => ['string', 'nullable']
            ]);
            $antibacteria_test = new Antibacteria_test;
            $antibacteria_test-> experiment_id = $request->experiment_id;
            $bacteriaDetail = Bacteria_detail::select('id')->where('name', $request->bacteria_name)->first();
            $antibacteria_test-> bacteria_id = $bacteriaDetail->id;
            $fruitDetail = Fruit_detail::select('id')->where('name', $request->fruit_name)->first();
            $antibacteria_test-> antibacteria_fruit_id = $fruitDetail->id;
            // $antibacteriaTestType = Antibacteria_test_type::select('id')->where('name', $request->test_name)->first();
            // $antibacteria_test->test_id = $antibacteriaTestType->id;
            // $antibacteria_test-> invivo_invitro = $request->invivo_invitro;
            // $antibacteria_test-> bacteria_concentration = $request->bacteria_concentration;
            // $antibacteria_test-> mic = $request->mic;
            $antibacteria_test->memo = $request->memo;
            $antibacteria_test->save();
        }elseif($request->formType === 'enzyme_test'){
            $request->validate([
                'enzyme_concentration' => ['string', 'nullable'],
                'substrate_concentration' => ['numeric', 'nullable'],
                'ph' => ['numeric', 'nullable'],
                'temperature' => ['numeric', 'nullable'],
                'volume' => ['numeric', 'nullable'],
                'time' => ['numeric', 'nullable'],
                'memo' => ['string', 'nullable']
            ]);
            $enzyme_test = new Enzyme_test;
            $enzyme_test-> experiment_id = $request->experiment_id;
            $enzymeDetail = Enzyme_detail::select('id')->where('name', $request->enzyme_name)->first();
            $enzyme_test-> enzyme_id = $enzymeDetail->id;
            $substrateDetail = Substrate_detail::select('id')->where('name', $request->substrate_name)->first();
            $enzyme_test-> substrate_id = $substrateDetail->id;
            $enzyme_test->enzyme_concentration = $request->enzyme_concentration;
            $enzyme_test->substrate_concentration = $request->substrate_concentration;
            $enzyme_test->ph = $request->ph;
            $enzyme_test->temperature = $request->temperature;
            $enzyme_test->volume = $request->valume;
            $enzyme_test->time = $request->time;
            $enzyme_test->memo = $request->memo;
            $enzyme_test->save();

        }elseif($request->formType === 'tga_test'){
            $request->validate([
                'flow_rate' => ['numeric', 'nullable'],
                'start_temperature' => ['numeric', 'nullable'],
                'end_temperature' => ['numeric', 'nullable'],
                'tmeperature_range' => ['numeric', 'nullable'],
                'heating_rate' => ['numeric', 'nullable'],
                'memo' => ['string', 'nullable']
        ]);
        $tga_test = new Tga_test;
        $tga_test-> experiment_id = $request->experiment_id;
        $gasDetail = Gas_detail::select('id')->where('name', $request->gas_name)->first();
        $tga_test-> gas_id = $gasDetail->id;
        $tga_test->flow_rate = $request->flow_rate;
        $tga_test->start_temperature = $request->start_temperature;
        $tga_test->end_temperature = $request->end_temperature;
        $tga_test->temperature_range = $request->temperature_range;
        $tga_test->heating_rate = $request->heating_rate;
        $tga_test->memo = $request->memo;
        $tga_test->save();

    }

        else{
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

        $experiment_id = $request->experiment_id;
        // dd($experiment_id);
        // return redirect()->route('user.profile.index')
        // ->with(['message'=>'Registration Complete',
        // 'status'=>'info'] );
        return redirect()->route('user.experiment_register', compact('experiment_id'))
        ->with(['message'=>'Registration Complete',
        'status'=>'info'] );
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $experiment_id = Material_composition::select('experiment_id')->where('id', $id)->firstOrFail()->experiment_id;

        $experiment = Experiment::findOrFail($experiment_id);
        $materials = Material::where('composition_id', $id)->get();
        $film_conditions = Film_condition::where('experiment_id', $experiment_id)->get();
        $charactaristic_tests = Charactaristic_test::where('composition_id', $id)->get();
        $storing_tests = Storing_test::where('composition_id', $id)->get();
        $antibacteria_tests = Antibacteria_test::where('composition_id', $id)->get();
        $notes = Note::where('composition_id', $id)->get();
      
        return view('user.profile.show', compact('experiment', 'materials','film_conditions',
                    'charactaristic_tests','storing_tests','antibacteria_tests','notes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    public function editExperiment($editType, $id)
    {
        $materials_list = Material_detail::orderby('name', 'asc')->get();
        $solvents_list = Solvent_detail::orderby('name', 'asc')->get();
        // $ph_materials_list = Ph_material_detail::orderby('name', 'asc')->get();
        $fruits_list = Fruit_detail::orderby('name', 'asc')->get();
        $bacteria_list = Bacteria_detail::orderby('name','asc')->get();
        // $antibacteria_test_list = Antibacteria_test_type::orderby('name','asc')->get();
        $enzyme_list = Enzyme_detail::orderby('name', 'asc')->get();
        $substrate_list = Substrate_detail::orderby('name', 'asc')->get();
        $gas_list = Gas_detail::orderby('name', 'asc')->get();
      
        
        if ($editType === 'experiment') {
            $experiment = Experiment::findOrFail($id);
            return view('user.profile.edit_experiment', compact('editType', 'id', 'experiment'));
        } elseif ($editType === 'material') {
            $material = Material::findOrFail($id);
            $composition_id = Material::select('composition_id')->where('id',$id)->first();
            $experiment_id = Material_composition::select('experiment_id')->where('id',$composition_id->composition_id)->first();
            return view('user.profile.edit_experiment', compact('id', 'material', 'materials_list','solvents_list', 'editType', 'experiment_id'));
        } elseif ($editType === 'film_condition') {
            $film_condition = Film_condition::findOrFail($id);
            $experiment_id = Film_condition::select('experiment_id')->where('id',$id)->first();
            return view('user.profile.edit_experiment', compact('id', 'film_condition', 'editType', 'experiment_id'));
        } elseif ($editType === 'charactaristic_test') {
            $charactaristic_test = Charactaristic_test::findOrFail($id);
            $composition_id = Charactaristic_test::select('composition_id')->where('id',$id)->first();
            $experiment_id = Material_composition::select('experiment_id')->where('id',$composition_id->composition_id)->first();
            
            return view('user.profile.edit_experiment', compact('editType', 'id', 'charactaristic_test', 'experiment_id'));
        } elseif ($editType === 'storing_test') {
            $storing_test = Storing_test::findOrFail($id);
            return view('user.profile.edit_experiment', compact('id', 'storing_test', 'fruits_list', 'editType'));
        } elseif ($editType === 'antibacteria_test') {
            $antibacteria_test = Antibacteria_test::findOrFail($id);
            return view('user.profile.edit_experiment', compact('id', 'antibacteria_test',  'bacteria_list', 'fruits_list', 'editType'));
        } elseif ($editType === 'enzyme_test') {
            $enzyme_test = Enzyme_test::findOrFail($id);
            return view('user.profile.edit_experiment', compact('id', 'enzyme_test',  'enzyme_list', 'substrate_list', 'editType'));
        } elseif ($editType === 'tga_test') {
            $tga_test = tga_test::findOrFail($id);
            return view('user.profile.edit_experiment', compact('id', 'tga_test',  'gas_list', 'editType'));
        } elseif ($editType === 'note') {
            $note = Note::findOrFail($id);
            $composition_id = Note::select('composition_id')->where('id',$id)->first();
            $experiment_id = Material_composition::select('experiment_id')->where('id',$composition_id->composition_id)->first();
            return view('user.profile.edit_experiment', compact('id', 'note', 'editType', 'experiment_id'));
        } 

   
    }

    public function updateExperiment(Request $request)
    {

        if($request->editType === 'experiment'){
            $id = $request->id;
            $experiment_id = $id;

            $experiment = Experiment::findOrFail($id);
            $experiment->title = $request->title;
            $experiment->name = $request->name;
            $experiment->date = $request->date;
            $experiment->paper_name = $request->paper_name;
            $experiment->paper_url = $request->paper_url;        
            $experiment->save();

        }

        elseif($request->editType === 'material'){
            $id = $request->id;

            $composition_id = Material::select('composition_id')->where('id',$id)->first();
            $experiment_id = Material_composition::select('experiment_id')->where('id',$composition_id->composition_id)->first();
            $composition_id = $composition_id->composition_id;
            $experiment_id = $experiment_id->experiment_id;

            $material = Material::findOrFail($id);
            // $material-> composition_id = $composition_id;
            // $materialDetail = Material_detail::select('id')->where('name', $request->material_name)->first();
            // $material-> material_id = $materialDetail->id;
            // $material-> concentration = $request->concentration;
            // $material-> ph_adjustment = $request->ph_adjustmen;
            // $phMaterialDetail = Ph_material_detail::select('id')->where('name', $request->ph_material)->first();
            // if($phMaterialDetail != null){
            //     $material-> ph_material_id = $phMaterialDetail->id;
            // }
            // $material-> ph_purpose = $request->ph_purpose;
            $material-> composition_id = $composition_id;
            $materialDetail = Material_detail::select('id')->where('name', $request->material_name)->first();
            $material-> material_id = $materialDetail->id;
            $solventDetail = Solvent_detail::select('id')->where('name', $request->solvent_name)->first();
            $material-> solvent_id = $solventDetail->id;
            $material->concentration = $request->concentration;
            $material-> solvent_concentration = $request->solvent_concentration;
            $material->save();
        }
        
        elseif($request->editType === 'film_condition'){
            $id = $request->id;

            $experiment_id = Film_condition::select('experiment_id')->where('id',$id)->first();
            $experiment_id = $experiment_id->experiment_id;

            $film_condition = Film_condition::findOrFail($id);
            $film_condition-> experiment_id = $experiment_id;
            $film_condition-> casting_amount = $request->casting_amount;
            $film_condition-> petri_dish_area = $request->petri_dish_area;
            $film_condition-> degas_temperature = $request->degas_temperature;
            $film_condition-> drying_temperature = $request->drying_temperature;
            $film_condition-> drying_humidity = $request->drying_humidity;
            $film_condition-> drying_time = $request->drying_time;
            $film_condition->save();
            }
        


       
        elseif($request->editType === 'charactaristic_test'){

            $id = $request->id;
            $charactaristic_test = Charactaristic_test::findOrFail($id);

            $composition_id = Charactaristic_test::select('composition_id')->where('id',$id)->first();
            $experiment_id = Material_composition::select('experiment_id')->where('id',$composition_id->composition_id)->first();
            $composition_id = $composition_id->composition_id;
            $experiment_id = $experiment_id->experiment_id;

            $afmImage = $request->file("afm");
            $semImage = $request->file("sem");
            $dscImage = $request->file("dsc");
            $ftirImage = $request->file("ftir");
            $clsmImage = $request->file("clsm");
 
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
            
            // dd($request->temperature);
            $charactaristic_test = Charactaristic_test::findOrFail($id);
            $charactaristic_test-> composition_id = $composition_id;
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

          
        }

        elseif($request->editType === 'storing_test'){
            $id = $request->id;

            // $composition_id = Storing_test::select('composition_id')->where('id',$id)->first();
            // $experiment_id = Material_composition::select('experiment_id')->where('id',->composition_id)->first();
            // $composition_id = $composition_id->composition_id;
            // $experiment_id = $experiment_id->experiment_id;

            

            $storing_test = Storing_test::findOrFail($id);
            $experiment_id = $storing_test->experiment_id;
            // $afmImage = $request->file("s-afm");
            // $semImage = $request->file("s-sem");
            // $dscImage = $request->file("s-dsc");
            // $ftirImage = $request->file("s-ftir");
            // $clsmImage = $request->file("s-clsm");
 
            // $filePath_afm = $afmImage ? $afmImage->store('images', 'public') : null;
            // $filePath_sem = $semImage ? $semImage->store('images', 'public') : null;
            // $filePath_dsc = $dscImage ? $dscImage->store('images', 'public') : null;
            // $filePath_ftir = $ftirImage ? $ftirImage->store('images', 'public') : null;
            // $filePath_clsm = $clsmImage ? $clsmImage->store('images', 'public') : null;

            // if (!$afmImage){
            //     $previousAfmValue = $storing_test->afm;
            //     $filePath_afm = $previousAfmValue ? $previousAfmValue : null;
            // }
            // if (!$semImage){
            //     $previousSemValue = $storing_test->sem;
            //     $filePath_sem = $previousSemValue ? $previousSemValue : null;
            // }
            // if (!$dscImage){
            //     $previousDscValue = $storing_test->dsc;
            //     $filePath_dsc = $previousDscValue ? $previousDscValue : null;
            // }
            // if (!$ftirImage){
            //     $previousFtirValue = $storing_test->ftir;
            //     $filePath_ftir = $previousFtirValue ? $previousFtirValue : null;
            // }
            // if (!$clsmImage){
            //     $previousClsmValue = $storing_test->clsm;
            //     $filePath_clsm = $previousClsmValue ? $previousClsmValue : null;
            // }
            $storing_test-> experiment_id = $storing_test->experiment_id;
            $fruitDetail = Fruit_detail::select('id')->where('name', $request->storing_fruit_name)->first();
            $storing_test-> storing_fruit_id = $fruitDetail->id;
            $storing_test-> storing_temperature = $request->storing_temperature;
            $storing_test-> storing_humidity = $request->storing_humidity;
            $storing_test-> storing_day = $request->storing_day;
            // $storing_test-> mass_loss_rate = $request->mass_loss_rate;
            // $storing_test-> l = $request->l;
            // $storing_test-> a = $request->a;
            // $storing_test-> b = $request->b;
            // $storing_test-> e = $request->e;
            // $storing_test-> ph = $request->ph;
            // $storing_test-> tss = $request->tss;
            // $storing_test-> hardness = $request->hardness;
            // $storing_test-> moisture_content = $request->moisture_content;
            // $storing_test-> ta = $request->ta;
            // $storing_test-> vitamin_c = $request->vitamin_c;
            // $storing_test-> rr = $request->rr;
            // $storing_test-> afm = $filePath_afm;
            // $storing_test-> sem = $filePath_sem;
            // $storing_test-> dsc = $filePath_dsc;
            // $storing_test-> ftir = $filePath_ftir;
            // $storing_test-> clsm = $filePath_clsm;7
            $storing_test-> memo = $request->memo;
            $storing_test->save();
        }

        elseif($request->editType === 'antibacteria_test'){
            $id = $request->id;
            $antibacteria_test = Antibacteria_test::findOrFail($id);
            $experiment_id = $antibacteria_test->experiment_id;
            $bacteriaDetail = Bacteria_detail::select('id')->where('name', $request->bacteria_name)->first();
            $antibacteria_test-> bacteria_id = $bacteriaDetail->id;
            $fruitDetail = Fruit_detail::select('id')->where('name', $request->antibacteria_fruit_name)->first();
            $antibacteria_test-> antibacteria_fruit_id = $fruitDetail->id;
            $antibacteria_test->memo = $request->memo;
            $antibacteria_test->save();
        }
        elseif($request->editType === 'enzyme_test'){
            $id = $request->id;
            $enzyme_test = Enzyme_test::findOrFail($id);
            $experiment_id = $enzyme_test->experiment_id;
            $enzymeDetail = enzyme_detail::select('id')->where('name', $request->enzyme_name)->first();
            $enzyme_test-> enzyme_id = $enzymeDetail->id;
            $substrateDetail = substrate_detail::select('id')->where('name', $request->substrate_name)->first();
            $enzyme_test-> substrate_id = $substrateDetail->id;
            $enzyme_test->enzyme_concentration = $request->enzyme_concentration;
            $enzyme_test->substrate_concentration = $request->substrate_concentration;
            $enzyme_test->ph = $request->ph;
            $enzyme_test->temperature = $request->temperature;
            $enzyme_test->volume = $request->volume;
            $enzyme_test->time = $request->time;
            $enzyme_test->memo = $request->memo;
            $enzyme_test->save();
        }
        elseif($request->editType === 'tga_test'){
            $id = $request->id;
            $tga_test = tga_test::findOrFail($id);
            $experiment_id = $tga_test->experiment_id;
            $gasDetail = gas_detail::select('id')->where('name', $request->gas_name)->first();
            $tga_test-> gas_id = $gasDetail->id;
            $tga_test->flow_rate = $request->flow_rate;
            $tga_test->start_temperature = $request->start_temperature;
            $tga_test->end_temperature = $request->end_temperature;
            $tga_test->temperature_range = $request->temperature_range;
            $tga_test->heating_rate = $request->heating_rate;
            $tga_test->memo = $request->memo;
            $tga_test->save();
        }

 
        return redirect()
        ->route('user.experiment_register', compact('experiment_id'))
        ->with(['message'=>'Update Complete',
        'status'=>'info']);
    }
    
 

    public function destroy(string $id)
    {
        Material_composition::findOrFail($id)->delete(); 

        return redirect()
        ->route('user.profile.index')
        ->with(['message'=>'Delete Complete',
        'status'=>'alert']);
    }
    

    public function destroyData($experiment_id, $type, $id)
    {
        if($type === 'experiment'){
            Experiment::findOrFail($id)->delete(); 
            return redirect()
        ->route('user.profile.index')
        ->with(['message'=>'Delete Complete',
        'status'=>'alert']);
        }
        elseif($type === 'composition'){
            Material_composition::findOrFail($id)->delete(); 
        }
        elseif($type === 'film_condition'){
            // Material::findOrFail($id)->delete(); 
            Film_condition::where('experiment_id', $experiment_id)->delete();
        }
        elseif($type === 'characteristic_test'){
            $composition_id = Material_composition::where('experiment_id', $id)->pluck('id');
            Charactaristic_test::whereIn('composition_id', $composition_id)->delete();
            Viscosity_test::whereIn('composition_id', $composition_id)->delete();
            Wvp_test::whereIn('composition_id', $composition_id)->delete();
        }
        elseif($type === 'material'){
            Material::findOrFail($id)->delete(); 
        }
        elseif($type === 'storing_test'){
            Storing_test::where('experiment_id',$experiment_id)->delete();             
        }
        elseif($type === 'multiple_test'){
            $composition_id = Material_composition::where('experiment_id', $id)->pluck('id');
            Storing_multiple_test::whereIn('composition_id', $composition_id)->delete();
            Enzyme_value::whereIn('composition_id', $composition_id)->delete();
        }
        elseif($type === 'antibacteria_test'){
            Antibacteria_test::where('experiment_id', $experiment_id)->delete();
        }
        elseif($type === 'enzyme_test'){
            Enzyme_test::where('experiment_id', $experiment_id)->delete();
        }
        elseif($type === 'enzyme_value'){
            $composition_id = Material_composition::where('experiment_id', $id)->pluck('id');
            Enzyme_value::whereIn('composition_id', $composition_id)->delete();
        }
        elseif($type === 'tga_test'){
            tga_test::where('experiment_id', $experiment_id)->delete();
        }
        elseif($type === 'tga_value'){
            // dd($experiment_id);
            $composition_id = Material_composition::where('experiment_id', $id)->pluck('id');
            tga_value::whereIn('composition_id', $composition_id)->delete();
        }
        elseif($type === 'antibacteria_multiple_test'){
            $composition_id = Material_composition::where('experiment_id', $id)->pluck('id');
            Colony_test::whereIn('composition_id', $composition_id)->delete();
            Cfu_test::whereIn('composition_id', $composition_id)->delete();
            Survivalrate_test::whereIn('composition_id', $composition_id)->delete();
            Growthcurve_test::whereIn('composition_id', $composition_id)->delete();
        }
        
        return redirect()
        ->route('user.experiment_register', compact('experiment_id'))
        ->with(['message'=>'Delete Complete',
        'status'=>'alert']);
    }
}
