<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experiment; //エロクアント
use App\Models\Film_condition; 
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
         
        ]);

        $experiment = new Experiment;
        $experiment -> user_id = Auth::user()->id;
        $experiment->title = $request->title;
        $experiment->name = $request->name;
        $experiment->date = $request->date;
        $experiment->paper = $request->paper;        
        $experiment->save();

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

        return redirect()->route('user.profile.index')
        ->with(['message'=>'Registration Complete',
        'status'=>'info'] );

        // Experiment::create([
        //     'user_id'=>Auth::user()->id,
        //     'title' => $request->title,
        //     'name' => $request->name,
        //     'date' => $request->date,
        //     'paper' => $request->paper,
        // ]);

        // Film_condition::create([
        //     'experiment_id'=>Experiment::id(),
        //     'degassing_temperature' => $request->degassing_temperature,
        //     'dish_type' => $request->dish_type,
        //     'dish_area' => $request->dish_area,
        //     'casting' => $request->casting,
        //     'incubator_type' => $request->incubator_type,
        //     'drying_temperature' => $request->drying_temperature,
        //     'drying_humidity' => $request->drying_humidity,
        //     'drying_time' => $request->drying_time,
        // ]);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
