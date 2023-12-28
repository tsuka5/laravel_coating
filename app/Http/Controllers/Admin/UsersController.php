<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; //エロクアント
use App\Models\Affiliation; 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;




class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()  //コントローラーでのバリデーション
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::select('id', 'name', 'email', 'created_at')
        ->paginate(5);
       
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $affiliations_list = Affiliation::all();
        return view('admin.users.create', compact('affiliations_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //フォームに入力した値がRequestクラスにありそれをインスタンス化する役割
    {
        // $request->name;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ]);

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        $affiliation = new User;
        $affiliation->name = $request->name;
        $affiliation->affiliation_id = $request->affiliation;
        $affiliation->email = $request->email;
        $affiliation->password = $request->password;
        $affiliation->save();

        return redirect()->route('admin.users.index')
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
        $user = User::findOrFail($id);
        
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()
        ->route('admin.users.index')
        ->with(['message'=>'Update Complete',
        'status'=>'info']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete(); //ソフトデリート

        return redirect()
        ->route('admin.users.index')
        ->with(['message'=>'Delete Complete',
        'status'=>'alert']);
    }

    public function expiredUserIndex(){
        $expiredUsers = User::onlyTrashed()->get();
        return view('admin.expired-users', compact('expiredUsers'));
    }

    public function expiredUserDestroy($id){
        User::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.expired-users.index');
    }

}
