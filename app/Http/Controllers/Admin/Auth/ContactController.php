<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact_reply;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    } 

    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.contact.index', compact('contacts'));
    }

    public function create($user_id)
    {
        return view('admin.contact.create', compact('user_id'));
    }

    public function store(Request $request)  
    {
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

    public function show(string $id)
    {
        $contact = Contact_reply::where("user_contact_id", $id)->first();
        
        return view('admin.contact.show', compact('contact'));
    }

}
