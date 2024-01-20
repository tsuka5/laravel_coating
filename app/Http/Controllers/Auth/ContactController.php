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
use App\Models\Contact_reply;
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

    public function store(Request $request)  
    {
        $contact = new Contact();
        $contact-> user_id = Auth::user()->id;
        $contact-> title = $request->title;
        $contact-> content = $request->content;
        $contact-> reply = false;
        $contact->save();

        return redirect()->route('user.contact.index')
        ->with(['message'=>'Transmission Complete',
        'status'=>'info'] );
    }

    public function show(string $id)
    {
        $contact = Contact_reply::where("user_contact_id", $id)->first();
        
        return view('user.contact.show', compact('contact'));
        
    }

}
