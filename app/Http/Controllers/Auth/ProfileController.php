<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experiment; //エロクアント
use App\Models\User; 
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
        ]);

        Experiment::create([
            'user_id'=>Auth::user()->id,
            'title' => $request->title,
            'name' => $request->name,
            'date' => $request->date,
            'paper' => $request->paper,
            
        ]);

        return redirect()->route('user.profile.index')
        ->with(['message'=>'Registration Complete',
        'status'=>'info'] );
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
