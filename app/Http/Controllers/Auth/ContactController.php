<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Symfony\Component\Mime\CharacterStream;

class ContactController extends Controller
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
        $contacts = Contact::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')->paginate(3);
        return view('user.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($formType)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  
    {
        $contact = new Contact();
        $contact-> user_id = Auth::user()->id;
        $contact-> title = $request->title;
        $contact-> content = $request->content;
        $contact->save();

        return redirect()->route('user.contact.index')
        ->with(['message'=>'Transmission Complete',
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
        // Experiment::findOrFail($id)->delete(); 

        // return redirect()
        // ->route('user.contact.index')
        // ->with(['message'=>'Delete Complete',
        // 'status'=>'alert']);
    }
}
