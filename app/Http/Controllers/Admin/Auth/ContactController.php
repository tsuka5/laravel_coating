<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact_reply;
use App\Models\Contact;
use App\Models\Admin;
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
        $this->middleware('auth:admin');
    } 

    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($user_id)
    {
        return view('admin.contact.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  
    {
        // dd($request->user_id);
        $contact = new Contact_reply();
        $contact-> admin_id = Auth::user()->id;
        $contact-> user_contact_id = $request->user_id;
        $contact-> title = $request->title;
        $contact-> content = $request->content;
        $contact->save();

        $userContact = Contact::findOrFail($request->user_id);
        $userContact-> reply = true;
        $userContact->save();

        return redirect()->route('admin.contact.index')
        ->with(['message'=>'Transmission Complete',
        'status'=>'info'] );
       
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact_reply::where("user_contact_id", $id)->first();
        
        return view('admin.contact.show', compact('contact'));
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
        // Experiment::findOrFail($id)->delete(); 

        // return redirect()
        // ->route('user.contact.index')
        // ->with(['message'=>'Delete Complete',
        // 'status'=>'alert']);
    }
}
